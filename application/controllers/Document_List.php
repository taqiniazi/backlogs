<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Doccument list Controller
 *
 * @package    CI
 * @subpackage Controller
 */
class Document_List extends CI_Controller
{

	private $h_data = array('styles' => array('css/linearicons.css', 'css/patient/style.css'));
	private $f_data = array('javascripts' => array('js/document_list/document_list.js'));


	/**
	 * Constructor to load models and helpers
	 */
	public function __construct()
	{
		parent::__construct();

		/*error_reporting(E_ALL);
		ini_set('display_errors', 1);*/

		$this->load->database();
		// Libs and helper
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->load->helper(array('url', 'language', 'cookie', 'activity_helper', 'dashboard_functions_helper', 'ec_helper'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->load->model('Document_List_Model', 'Document_List_Model');
		if (!$this->ion_auth->logged_in()) {
			//redirect them to the login page
			return redirect('', 'refresh');
		}
		$group_type = $this->ion_auth->get_users_groups()->row()->group_type;
		if ($group_type != 'A' && $group_type != 'D' && $group_type != 'H' && $group_type != 'HA' && $group_type != 'L') {
			//return redirect('', 'refresh');
		}
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
	}


	public function index($searchtype = 0)
	{
		$data = array();
		$group_type = $this->ion_auth->get_users_groups()->row()->group_type;

		$data['group_type'] = $group_type;

		$this->load->model('Laboratory_model');
		$data["user_info"] = $this->Laboratory_model->get_lab_users();
		$data['category'] = $this->Document_List_Model->getCategory();

		$data['searchtype'] = $searchtype;
		// echo "<pre>"; print_r($data["category"]); die;

		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/document_list', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}

	public function view_pdf($id = 0){
		$result = $this->db->where('id', $id)->get('document')->row_array();
		$pdfUrl = $result['document_pdf'];
		if(!empty($pdfUrl)) echo base_url()."uploads/".$pdfUrl;
		else echo "0";

	}
	public function get_document_list($searchtype = 0)
	{
		$data = array('data' => array());
		$res = $this->Document_List_Model->fetch_document_list($searchtype);
		$this->load->model('Userextramodel');
		// echo "<pre>"; print_r($res); die;
		$no_r = 0;
		foreach ($res as $row) {
			$decryptedDetails = $this->Userextramodel->getUserDecryptedDetailsByid($row['document_owner_id']);
			$profile_picture_path  = $decryptedDetails->profile_picture_path;
			$img = get_profile_picture($profile_picture_path, $decryptedDetails->first_name, $decryptedDetails->last_name);

			$viewCout = $this->Document_List_Model->view_count($row['document_id']);

			$effectiveDate = date('Y-m-d', strtotime("+3 months", strtotime(date('Y-m-d'))));
			$rowClss = '';
			//After the review date 
			if ($row['date_of_next_review'] <= date('Y-m-d')) {
				$rowClss = 'row_red';
			}
			//With 3 months of review date 
			if ($row['date_of_next_review'] >= date('Y-m-d') && $row['date_of_next_review'] <= $effectiveDate) {
				$rowClss = 'row_orange';
			}
			// More than 3 months
			if ($row['date_of_next_review'] >= $effectiveDate) {
				$rowClss = 'row_green';
			}


			$document = array(
				'id' => $row['document_id'],
				'document_number' => '#' . $row['document_number'] . '<br> ' . $row['document_title'],
				'document_title' => $row['document_title'],
				'document_owner' => $img,
				'viewCout' => $viewCout,
				'document_category' => $row['cat_name'],
				'document_subcategory' => $row['subcat_name'],
				'date_of_1_issue' => $row['date_of_1_issue'],
				'date_of_current_issue' => $row['date_of_current_issue'],
				'live_revision_number' => $row['live_revision_number'],
				'status' => ($row['status']) ? 'Live' : 'Obsolete',
				'location' => $row['location'],
				'type' => $row['short_name'],
				'interval_months' => $row['interval_months'] . ' M',
				'date_of_next_review' => $row['date_of_next_review'],
				'rowClss' => $rowClss,
				'document_status' => $row['document_status'],
				'Rcount' => $no_r,
				'document_published' => $row['is_published'],
			);
			array_push($data['data'], $document);
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
	}




	function getSubCategory($catId = 1)
	{

		$categoey = $this->Document_List_Model->getSubCategory($catId);
		$option = '';
		if(!empty($categoey)){
			foreach ($categoey as $row) {
	
				$option .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
			}
			echo $option;
		}
	}

	public function view($id, $action = "", $field = "")
	{
		switch ($action) {
			case "update":
				$this->_update_patient($id, $field);

				break;
			case "delete":
				$this->_delete_document($id);

				break;
			case "":
				$this->_show_view_page($id);

				break;
			default:
				$this->_show_view_page($id);
		}
	}

	private function _delete_document($id)
	{
		if ($id != '') {
			$count = $this->db->get_where('document', array('id' => $id))->num_rows();
			if ($count > 0) {
				$this->db->where('id', $id);
				$this->db->delete('document');
			}
			// Delete document information
			$this->db->where('document_id', $id);
			$this->db->delete('document_information');

			// Delete document revision
			$this->db->where('document_id', $id);
			$this->db->delete('document_revision');

			// Delete document revision
			$this->db->where('document_id', $id);
			$this->db->delete('document_share');

			// Delete document Uploaded forms
			$this->db->where('document_id', $id);
			$this->db->delete('document_upload_forms');

			// Delete document Uploaded Viewrs
			$this->db->where('document_id', $id);
			$this->db->delete('document_viewers');

			// Delete document viewers history
			$this->db->where('document_id', $id);
			$this->db->delete('document_viewers_history');
		}
		redirect("/Document_List", "refresh");
		exit;
	}


	public function delete_bulk_document()
	{
		$pt_ids = $this->input->post('patient_id');
		if (!empty($pt_ids)) {
			for ($i = 0; $i < count($pt_ids); $i++) {
				$count = $this->db->get_where('document', array('id' => $pt_ids[$i]))->num_rows();
				if ($count > 0) {
					$this->db->where('id', $pt_ids[$i]);
					$this->db->delete('document');
				}
			}
		}
		redirect("/Document_List", "refresh");
		exit;
	}

	public function document_section($documentId = 0)
	{
		if ($documentId == 0) {
			$data['page_title'] = 'Create New Document';
		} else {
			$data['page_title'] = 'Edit Document';
		}

		$data['category'] = $this->Document_List_Model->getCategory();
		$data['issueTo'] = $this->Document_List_Model->getIssueTo();
		$data['users'] = $this->Document_List_Model->getUsers();
		$this->load->model('Laboratory_model');
		$data["user_info"] = $this->Laboratory_model->get_lab_users();

		// Get subcategpry here
		$data['sub_cat'] = $this->Document_List_Model->getSubCategoryList();
		$data['status'] =  array(1 => 'Live', 2 => 'Obsolete');
		$data['interval_months'] =  array(12 => ' 12 M', 24 => '24 M', 36 => '36 M');

		$this->form_validation->set_rules('document_number', 'document_number', 'required');
		$user_id = $this->ion_auth->user()->row()->id;



		if ($this->form_validation->run() == TRUE) {

			$fieldsArr = array('submit');
			foreach ($this->input->post() as $key => $values) {
				if (in_array($key, $fieldsArr)) {
				} elseif ($key == 'date_of_1_issue') {
					$formData[$key] = date("Y-m-d", strtotime($values));
				} else if ($key == 'date_of_current_issue') {
					$formData[$key] = date("Y-m-d", strtotime($values));
				} else if ($key == 'revised_review_date') {
					$formData[$key] = date("Y-m-d", strtotime($values));
				} else {
					$formData[$key] = $values;
				}
			}

			// Upload PDF here
			if ($_FILES['document_pdf']['size'] != 0){
				if (!empty($_FILES['document_pdf'])) {
					$tempFile = $_FILES['document_pdf']['tmp_name'];
					$temp = $_FILES["document_pdf"]["name"];
					$path_parts = pathinfo($temp);
					$t = preg_replace('/\s+/', '', microtime());
					$fileName = $path_parts['filename'] . $t . '.' . $path_parts['extension'];
					$targetPath = './uploads/';
					$targetFile = $targetPath . $fileName;
					// echo $fileName;
					$formData['document_pdf']  = $fileName;
					move_uploaded_file($tempFile, $targetFile);
				}

			}


			$da = "+" . $formData['interval_months'] . " months";

			$date_of_next_review = date('Y-m-d', strtotime($da, strtotime($formData['date_of_current_issue'])));

			$formData['date_of_next_review']  = $date_of_next_review;

			if ($documentId == 0) {
				$formData['document_owner_id']  = $user_id;
				$formData['created_by'] = $user_id;
				$formData['created_at'] = date("Y-m-d H:i:s");

				$this->db->insert('document', $formData);
				$lastId = $this->db->insert_id();

				$this->session->set_flashdata('showMessage', true);
				$this->session->set_flashdata('type', 'success');
				$this->session->set_flashdata('message', 'Document added successfully.');
				redirect('/Document_List', 'refresh');
			} else {
				// print_r($formData); die;
				$this->db->update('document', $formData, array('id' => $documentId));

				$this->session->set_flashdata('showMessage', true);
				$this->session->set_flashdata('type', 'success');
				$this->session->set_flashdata('message', 'Document Updated successfully.');
				redirect('/Document_List', 'refresh');
			}
		}


		$result = $this->db->where('id', $documentId)->get('document')->row_array();
		$data['result'] = $result;
		$userinfo = getLoggedInUserProfile(intval($this->ion_auth->user()->row()->id));
		$data['loginUsername'] = $userinfo[0]->first_name . ' ' . $userinfo[0]->last_name;

		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/document_section', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}



	public function share_document()
	{
		if ($this->input->is_ajax_request()) {
			$user_id = $this->ion_auth->user()->row()->id;
			$fieldsArr = array('btnSubmit');
			foreach ($this->input->post() as $key => $values) {
				if (in_array($key, $fieldsArr)) {
				} else {
					if ($key == 'to_user_id') {
						$userArr =  $values;
					} else {
						$formData[$key] = $values;
					}
				}
			}

			if (!empty($userArr)) {
				foreach ($userArr as $row) {
					$formData['from_user_id']  = $user_id;
					$formData['to_user_id']  = $row;
					$formData['created_by'] = $user_id;

					$formData['created_at'] = date("Y-m-d H:i:s");

					$this->db->insert('document_share', $formData);
				}
			}

			$lastId = 1;
			if ($lastId) {
				echo json_encode(['lastId' => $lastId, 'type' => 'success', 'msg' => 'Document shared successfully.']);
			} else {
				echo json_encode(['lastId' => 0, 'type' => 'error', 'msg' => 'Something went wrong, Please Try Again..!']);
			}
		} else {
			echo json_encode(['type' => 'error', 'msg' => 'Something went wrong, Please Try Again..!']);
		}
		die;
	}


	public function shared_list()
	{


		$data = array();
		$group_type = $this->ion_auth->get_users_groups()->row()->group_type;

		$data['group_type'] = $group_type;

		$data['category'] = $this->Document_List_Model->getCategory();
		$data['issueTo'] = $this->Document_List_Model->getIssueTo();
		$data['users'] = $this->Document_List_Model->getUsers();


		/*if(in_array($group_type,LAB_GROUP))
		{
           $data['hospitals'] = $this->patient->fetch_hospitals();        
		}
		else
		{
		$data['hospitals'] = $this->patient->fetch_hospitals(); 	
		}*/


		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/shared_list', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}



	public function get_sharedfrom_list()
	{
		$data = array('data' => array());
		$res = $this->Document_List_Model->fetch_sharedfrom_list();
		$this->load->model('Userextramodel');
		//echo "<pre>"; print_r($res);
		$no_r = 0;
		foreach ($res as $row) {
			$decryptedDetails = $this->Userextramodel->getUserDecryptedDetailsByid($row['document_owner_id']);
			$profile_picture_path  = $decryptedDetails->profile_picture_path;
			$img = get_profile_picture($profile_picture_path, $decryptedDetails->first_name, $decryptedDetails->last_name);

			$document = array(
				'id' => $row['document_share_id'],
				'document_id' => $row['document_id'],
				'view_permission' => $row['view_permission'],
				'delete_permission' => $row['delete_permission'],
				'download_permission' => $row['download_permission'],
				'edit_permission' => $row['edit_permission'],
				'document_number' => '#' . $row['document_number'] . '<br>' . $row['document_title'],
				'document_title' => $row['document_title'],
				'document_owner' => $img,
				'document_category' => $row['cat_name'],
				'date_of_1_issue' => $row['date_of_1_issue'],
				'date_of_current_issue' => $row['date_of_current_issue'],
				'live_revision_number' => $row['live_revision_number'],
				'status' => ($row['status']) ? 'Live' : 'Obsolete',
				'location' => $row['location'],
				'type' => $row['short_name'],
				'interval_months' => $row['interval_months'] . 'M',
				'date_of_next_review' => $row['date_of_next_review'],
				'description' => $row['description'],
				'Rcount' => $no_r,
			);
			array_push($data['data'], $document);
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
	}


	public function get_sharedto_list()
	{
		$data = array('data' => array());
		$res = $this->Document_List_Model->fetch_sharedto_list();
		$this->load->model('Userextramodel');
		//echo "<pre>"; print_r($res);
		$no_r = 0;
		foreach ($res as $row) {
			$decryptedDetails = $this->Userextramodel->getUserDecryptedDetailsByid($row['document_owner_id']);
			$profile_picture_path  = $decryptedDetails->profile_picture_path;
			$img = get_profile_picture($profile_picture_path, $decryptedDetails->first_name, $decryptedDetails->last_name);

			$document = array(
				'id' => $row['document_share_id'],
				'document_id' => $row['document_id'],
				'view_permission' => $row['view_permission'],
				'delete_permission' => $row['delete_permission'],
				'download_permission' => $row['download_permission'],
				'edit_permission' => $row['edit_permission'],
				'document_number' => '#' . $row['document_number'] . '<br>' . $row['document_title'],
				'document_title' => $row['document_title'],
				'document_owner' => $img,
				'document_category' => $row['cat_name'],
				'date_of_1_issue' => $row['date_of_1_issue'],
				'date_of_current_issue' => $row['date_of_current_issue'],
				'live_revision_number' => $row['live_revision_number'],
				'status' => ($row['status']) ? 'Live' : 'Obsolete',
				'location' => $row['location'],
				'type' => $row['short_name'],
				'interval_months' => $row['interval_months'],
				'date_of_next_review' => $row['date_of_next_review'],
				'description' => $row['description'],
				'Rcount' => $no_r,
			);
			array_push($data['data'], $document);
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
	}


	public function delete_shared($id)
	{

		if ($id != '') {
			$count = $this->db->get_where('document_share', array('id' => $id))->num_rows();
			if ($count > 0) {

				$user_id = $this->ion_auth->user()->row()->id;

				$formDataV['viewer_user_id']  = $user_id;
				$formDataV['document_id'] = $documentId;
				$formDataV['created_by'] = $user_id;
				$this->db->insert('document_viewers_history', $formDataV);


				$this->db->where('id', $id);
				$this->db->delete('document_share');
			}
		}
		redirect("/Document_List/shared_list", "refresh");
		exit;
	}



	public function getUsersByDocumentIdByAjax($documentId = 0)
	{

		if ($this->input->is_ajax_request()) {

			$users  = $this->Document_List_Model->getUsersByDocumentId($documentId);


			$bedge = '';

			foreach ($users as $row) {
				$name = $row['enc_first_name'] . " " . $row['enc_last_name'];
				$id = $row['user_id'] . "_" . $documentId;
				$spnId = 'user_' . $id;
				$bedge .= '<span id="' . $spnId . '" class="badge badge-secondary mr-2">' . $name . ' <span><a class="remove_bedge" id="' . $id . '" href="">X</a> </span></span>';
			}

			echo $bedge;
		}
	}


	public function document_share_section($documentId = 0)
	{
		if ($documentId == 0) {
			$data['page_title'] = 'Add Document';
		} else {
			$data['page_title'] = 'Edit Document';
		}



		$data['category'] = $this->Document_List_Model->getCategory();
		$data['issueTo'] = $this->Document_List_Model->getIssueTo();
		$data['users'] = $this->Document_List_Model->getUsers();
		$this->load->model('Laboratory_model');
		$data["user_info"] = $this->Laboratory_model->get_lab_users();





		$data['status'] =  array(1 => 'Live', 2 => 'Obsolete');
		$data['interval_months'] =  array(12 => ' 12 M', 24 => '24 M', 36 => '36 M');

		$this->form_validation->set_rules('document_number', 'document_number', 'required');
		$user_id = $this->ion_auth->user()->row()->id;

		if ($this->form_validation->run() == TRUE) {

			$fieldsArr = array('submit');
			foreach ($this->input->post() as $key => $values) {
				if (in_array($key, $fieldsArr)) {
				} elseif ($key == 'date_of_1_issue') {
					$formData[$key] = date("Y-m-d", strtotime($values));
				} else if ($key == 'date_of_current_issue') {
					$formData[$key] = date("Y-m-d", strtotime($values));
				} else if ($key == 'revised_review_date') {
					$formData[$key] = date("Y-m-d", strtotime($values));
				} else {
					$formData[$key] = $values;
				}
			}

			$da = "+" . $formData['interval_months'] . " months";

			$date_of_next_review = date('Y-m-d', strtotime($da, strtotime($formData['date_of_current_issue'])));

			//$formData['date_of_next_review']  = $date_of_next_review;


			$formData['document_id']  = $documentId;
			$formData['updated_by'] = $user_id;

			$formData['document_owner_id']  = $user_id;
			$formData['created_by'] = $user_id;
			$formData['created_at'] = date("Y-m-d H:i:s");

			$this->db->insert('document_revision', $formData);
			$lastId = $this->db->insert_id();


			if ($lastId) {

				$this->session->set_flashdata('showMessage', true);
				$this->session->set_flashdata('type', 'success');
				$this->session->set_flashdata('message', 'Document added successfully.');
				redirect('/Document_List/shared_list', 'refresh');
			} else {
				$this->session->set_flashdata('showMessage', true);
				$this->session->set_flashdata('type', 'error');
				$this->session->set_flashdata('message', 'Invalid Data, Please Try Again.');
				redirect('/Document_List/document_section/0', 'refresh');
			}
		}


		$result = $this->db->where('id', $documentId)->get('document')->row_array();
		$data['result'] = $result;

		$formDataV['viewer_user_id']  = $user_id;
		$formDataV['document_id'] = $documentId;
		$formDataV['created_by'] = $user_id;
		$this->db->insert('document_viewers_history', $formDataV);

		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/document_section_share', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}


	public function document_revision($documentId = 0)
	{


		$data = array();
		$group_type = $this->ion_auth->get_users_groups()->row()->group_type;
		$data['group_type'] = $group_type;

		$data['category'] = $this->Document_List_Model->getCategory();
		$data['issueTo'] = $this->Document_List_Model->getIssueTo();
		$data['users'] = $this->Document_List_Model->getUsers();

		$res = $this->Document_List_Model->fetch_revision_list($documentId);
		$this->load->model('Userextramodel');
		//echo "<pre>"; print_r($res);
		$no_r = 0;
		$result =  array();
		foreach ($res as $row) {
			$decryptedDetails = $this->Userextramodel->getUserDecryptedDetailsByid($row['updated_by']);
			$profile_picture_path  = $decryptedDetails->profile_picture_path;
			$img = get_profile_picture($profile_picture_path, $decryptedDetails->first_name, $decryptedDetails->last_name);
			$row['img'] = $img;
			$result[] = $row;
		}

		$data['result'] = $result;
		$data['documentId'] = $documentId;


		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/revision_list', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}

	public function document_revision_verify($revisionId = 0)
	{
		if ($revisionId == 0) {
			$data['page_title'] = 'Add Document';
		} else {
			$data['page_title'] = 'Verify Document';
		}

		$data['category'] = $this->Document_List_Model->getCategory();
		$data['issueTo'] = $this->Document_List_Model->getIssueTo();
		$data['users'] = $this->Document_List_Model->getUsers();
		$this->load->model('Laboratory_model');
		$data["user_info"] = $this->Laboratory_model->get_lab_users();

		$result = $this->db->where('id', $revisionId)->get('document_revision')->row_array();
		$data['result'] = $result;

		$data['status'] =  array(1 => 'Live', 2 => 'Obsolete');
		$data['interval_months'] =  array(12 => ' 12 M', 24 => '24 M', 36 => '36 M');

		$this->form_validation->set_rules('document_number', 'document_number', 'required');
		$user_id = $this->ion_auth->user()->row()->id;

		if ($this->form_validation->run() == TRUE) {

			$fieldsArr = array('submit');
			$approved = $reject = 0;
			foreach ($this->input->post() as $key => $values) {
				if (in_array($key, $fieldsArr)) {
				} elseif ($key == 'date_of_1_issue') {
					$formData[$key] = date("Y-m-d", strtotime($values));
				} else if ($key == 'date_of_current_issue') {
					$formData[$key] = date("Y-m-d", strtotime($values));
				} else if ($key == 'revised_review_date') {
					$formData[$key] = date("Y-m-d", strtotime($values));
				} else if ($key == 'approved') {
					$approved = 1;
				} else if ($key == 'reject') {

					$reject = 1;
				} else {
					$formData[$key] = $values;
				}
			}

			if ($reject == 1) {
				$formDataup['revision_status'] = 1;
				$this->db->update('document_revision', $formDataup, array('id' => $revisionId));

				$formDataupShare['revision_status'] = 1;
				$this->db->update('document_share', $formDataupShare, array('document_id' => $result['document_id'], 'to_user_id' => $result['updated_by']));

				$this->session->set_flashdata('showMessage', true);
				$this->session->set_flashdata('type', 'success');
				$this->session->set_flashdata('message', 'Document update successfully.');
				redirect('/Document_List/document_revision/' . $result['document_id'], 'refresh');
			}

			if ($approved == 1) {
				$this->db->update('document', $formData, array('id' => $result['document_id']));

				$formDataupShare['revision_status'] = 2;
				$this->db->update('document_revision', $formDataupShare, array('id' => $revisionId));

				$formDataup['revision_status'] = 2;
				$this->db->update('document_share', $formDataup, array('document_id' => $result['document_id'], 'to_user_id' => $result['updated_by']));


				$this->session->set_flashdata('showMessage', true);
				$this->session->set_flashdata('type', 'success');
				$this->session->set_flashdata('message', 'Document update successfully.');
				redirect('/Document_List', 'refresh');
			}
		}

		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/document_section_verify', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}


	public function document_viewer($documentId = 0)
	{


		$data = array();
		$group_type = $this->ion_auth->get_users_groups()->row()->group_type;
		$data['group_type'] = $group_type;

		$data['category'] = $this->Document_List_Model->getCategory();
		$data['issueTo'] = $this->Document_List_Model->getIssueTo();
		$data['users'] = $this->Document_List_Model->getUsers();

		$res = $this->Document_List_Model->fetch_viwer_list($documentId);
		$this->load->model('Userextramodel');
		//echo "<pre>"; print_r($res);
		$no_r = 0;
		$result =  array();
		foreach ($res as $row) {
			$decryptedDetails = $this->Userextramodel->getUserDecryptedDetailsByid($row['document_owner_id']);
			$profile_picture_path  = $decryptedDetails->profile_picture_path;
			$img = get_profile_picture($profile_picture_path, $decryptedDetails->first_name, $decryptedDetails->last_name);
			$row['img'] = $img;
			$row['owner'] = $decryptedDetails->first_name . ' ' . $decryptedDetails->last_name;


			$decryptedDetails = $this->Userextramodel->getUserDecryptedDetailsByid($row['viewer_user_id']);
			$profile_picture_path  = $decryptedDetails->profile_picture_path;
			$img = get_profile_picture($profile_picture_path, $decryptedDetails->first_name, $decryptedDetails->last_name);
			$row['imgv'] = $img;
			$row['ownerv'] = $decryptedDetails->first_name . ' ' . $decryptedDetails->last_name;


			$result[] = $row;
		}

		$data['result'] = $result;

		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/viewer_list', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}


	public function category_list()
	{


		$data = array();
		$group_type = $this->ion_auth->get_users_groups()->row()->group_type;
		$data['group_type'] = $group_type;
		$data['result'] = $this->Document_List_Model->getCategory();
		foreach ($data['result'] as $key => $value) {
			$data['result'][$key][] = $this->Document_List_Model->fetch_document_list("cat=" . $value['id']);
		}
		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/category_list', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}

	function category_section($categoryId = 0)
	{

		if ($categoryId == 0) {
			$data['page_title'] = 'Add Category';
		} else {
			$data['page_title'] = 'Edit Category';
		}

		$this->form_validation->set_rules('name', 'Category Name', 'required');
		$user_id = $this->ion_auth->user()->row()->id;

		if ($this->form_validation->run() == TRUE) {

			$fieldsArr = array('submit');
			foreach ($this->input->post() as $key => $values) {
				if (in_array($key, $fieldsArr)) {
				} else {
					$formData[$key] = $values;
				}
			}

			if ($categoryId == 0) {

				$formData['created_by'] = $user_id;
				$formData['created_at'] = date("Y-m-d H:i:s");
				$this->db->insert('document_category', $formData);

				$this->session->set_flashdata('showMessage', true);
				$this->session->set_flashdata('type', 'success');
				$this->session->set_flashdata('message', 'Category added successfully.');
				redirect('/Document_List/category_list', 'refresh');
			} else {

				$this->db->update('document_category', $formData, array('id' => $categoryId));
				$this->session->set_flashdata('showMessage', true);
				$this->session->set_flashdata('type', 'success');
				$this->session->set_flashdata('message', 'Category Updated successfully.');
				redirect('/Document_List/category_list', 'refresh');
			}
		}


		$result = $this->db->where('id', $categoryId)->get('document_category')->row_array();
		$data['result'] = $result;

		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/categoey_section', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}

	function delete_category($id)
	{

		if ($id != '') {
			$count = $this->db->get_where('document_category', array('id' => $id))->num_rows();
			if ($count > 0) {

				$this->db->where('id', $id);
				$this->db->delete('document_category');

				$this->session->set_flashdata('showMessage', true);
				$this->session->set_flashdata('type', 'success');
				$this->session->set_flashdata('message', 'Category delete successfully.');
			}
		}
		redirect("/Document_List/category_list", "refresh");
		exit;
	}



	public function sub_category_list()
	{


		$data = array();
		$group_type = $this->ion_auth->get_users_groups()->row()->group_type;
		$data['group_type'] = $group_type;
		$data['result'] = $this->Document_List_Model->getSubCategoryList();

		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/sub_category_list', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}

	function sub_category_section($categoryId = 0, $subcategoryId = 0)
	{

		if ($subcategoryId == 0) {
			$data['page_title'] = 'Add Sub Category';
		} else {
			$data['page_title'] = 'Edit Sub Category';
		}

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('category_id', 'Category', 'required');
		$user_id = $this->ion_auth->user()->row()->id;

		if ($this->form_validation->run() == TRUE) {

			$fieldsArr = array('submit');
			foreach ($this->input->post() as $key => $values) {
				if (in_array($key, $fieldsArr)) {
				} else {
					$formData[$key] = $values;
				}
			}

			if ($subcategoryId == 0) {

				$formData['created_by'] = $user_id;
				$formData['created_at'] = date("Y-m-d H:i:s");
				$this->db->insert('document_subcategory', $formData);

				$this->session->set_flashdata('showMessage', true);
				$this->session->set_flashdata('type', 'success');
				$this->session->set_flashdata('message', 'Sub Category added successfully.');
				redirect('/Document_List/sub_category_list', 'refresh');
			} else {

				$this->db->update('document_subcategory', $formData, array('id' => $subcategoryId));
				$this->session->set_flashdata('showMessage', true);
				$this->session->set_flashdata('type', 'success');
				$this->session->set_flashdata('message', 'Sub Category Updated successfully.');
				redirect('/Document_List/sub_category_list', 'refresh');
			}
		}


		$result = $this->db->where('id', $subcategoryId)->get('document_subcategory')->row_array();
		$data['result'] = $result;
		$data['category'] = $this->Document_List_Model->getCategory();
		$data['categoryId'] = $categoryId;

		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/sub_categoey_section', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}

	function delete_sub_category($id)
	{

		if ($id != '') {
			$count = $this->db->get_where('document_subcategory', array('id' => $id))->num_rows();
			if ($count > 0) {

				$this->db->where('id', $id);
				$this->db->delete('document_subcategory');
				$this->session->set_flashdata('showMessage', true);
				$this->session->set_flashdata('type', 'success');
				$this->session->set_flashdata('message', 'Sub Category delete successfully.');
			}
		}
		redirect("/Document_List/sub_category_list", "refresh");
		exit;
	}

	public function delete_revision($id, $documentId)
	{

		if ($id != '') {
			$count = $this->db->get_where('document_revision', array('id' => $id))->num_rows();
			if ($count > 0) {

				$this->db->where('id', $id);
				$this->db->delete('document_revision');
				$this->session->set_flashdata('showMessage', true);
				$this->session->set_flashdata('type', 'success');
				$this->session->set_flashdata('message', 'Document Revision delete successfully.');
			}
		}
		redirect("/Document_List/document_revision/" . $documentId, "refresh");
		exit;
	}

	function statusChange($id, $status)
	{

		$this->db->update('document', array('document_status' => $status), array('id' => $id));
		$this->session->set_flashdata('showMessage', true);
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('message', 'Status Updated successfully.');
		redirect('/Document_List', 'refresh');
	}


	function publishDocument($id, $status)
	{

		$this->db->update('document', array('is_published' => $status), array('id' => $id));
		$this->session->set_flashdata('showMessage', true);
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('message', 'Documents publeshed successfully.');
		redirect('/Document_List', 'refresh');
	}



	public function published($searchtype = 0)
	{
		$data = array();
		$group_type = $this->ion_auth->get_users_groups()->row()->group_type;

		$data['group_type'] = $group_type;

		$this->load->model('Laboratory_model');
		$data["user_info"] = $this->Laboratory_model->get_lab_users();

		$data['searchtype'] = $searchtype;
		//echo "<pre>"; print_r($data["user_info"]);

		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/publeshed_list', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}

	public function get_publeshed_list($searchtype = 0)
	{
		$data = array('data' => array());
		$res = $this->Document_List_Model->fetch_document_published_list($searchtype);
		$this->load->model('Userextramodel');
		//echo "<pre>"; print_r($res);
		$no_r = 0;
		foreach ($res as $row) {
			$decryptedDetails = $this->Userextramodel->getUserDecryptedDetailsByid($row['document_owner_id']);
			$profile_picture_path  = $decryptedDetails->profile_picture_path;
			$img = get_profile_picture($profile_picture_path, $decryptedDetails->first_name, $decryptedDetails->last_name);

			$viewCout = $this->Document_List_Model->view_count($row['document_id']);

			$effectiveDate = date('Y-m-d', strtotime("+3 months", strtotime(date('Y-m-d'))));
			$rowClss = '';
			//After the review date 
			if ($row['date_of_next_review'] <= date('Y-m-d')) {
				$rowClss = 'row_red';
			}
			//With 3 months of review date 
			if ($row['date_of_next_review'] >= date('Y-m-d') && $row['date_of_next_review'] <= $effectiveDate) {
				$rowClss = 'row_orange';
			}
			// More than 3 months
			if ($row['date_of_next_review'] >= $effectiveDate) {
				$rowClss = 'row_green';
			}


			$document = array(
				'id' => $row['document_id'],
				'document_number' => '#' . $row['document_number'] . '<br> ' . $row['document_title'],
				'document_title' => $row['document_title'],
				'document_owner' => $img,
				'viewCout' => $viewCout,
				'document_category' => $row['cat_name'],
				'date_of_1_issue' => $row['date_of_1_issue'],
				'date_of_current_issue' => $row['date_of_current_issue'],
				'live_revision_number' => $row['live_revision_number'],
				'status' => ($row['status']) ? 'Live' : 'Obsolete',
				'location' => $row['location'],
				'type' => $row['short_name'],
				'interval_months' => $row['interval_months'] . ' M',
				'date_of_next_review' => $row['date_of_next_review'],
				'rowClss' => $rowClss,
				'document_status' => $row['document_status'],
				'Rcount' => $no_r,
			);
			array_push($data['data'], $document);
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
	}


	public function comments_send()
	{
		if ($this->input->is_ajax_request()) {
			$user_id = $this->ion_auth->user()->row()->id;
			$fieldsArr = array('btnSubmit');
			foreach ($this->input->post() as $key => $values) {
				if (in_array($key, $fieldsArr)) {
				} else {
					$formData[$key] = $values;
				}
			}

			if (!empty($formData)) {
				$formData['sender_id']  = $user_id;
				$formData['created_by'] = $user_id;
				$formData['created_at'] = date("Y-m-d H:i:s");
				$this->db->insert('document_comments', $formData);
			}

			$lastId = 1;
			if ($lastId) {
				echo json_encode(['lastId' => $lastId, 'type' => 'success', 'msg' => 'Commets send successfully.']);
			} else {
				echo json_encode(['lastId' => 0, 'type' => 'error', 'msg' => 'Something went wrong, Please Try Again..!']);
			}
		} else {
			echo json_encode(['type' => 'error', 'msg' => 'Something went wrong, Please Try Again..!']);
		}
		die;
	}



	function commments($document_id = 0)
	{

		$comments = $this->Document_List_Model->getDocumentComments($document_id);

		$data['statusArr'] = array(1 => 'Modify', 2 => 'Reject');
		$data['comments'] = $comments;

		$data['document'] = $this->db->get_where('document', array('id' => $document_id))->row_array();
		$data['user_info'] = $this->Userextramodel->getUserDecryptedDetailsByid($data['document']['document_owner_id']);


		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/document_comments', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}

	function updateCommetsStatus($documentId, $status)
	{

		if ($this->input->is_ajax_request()) {
			if (!empty($documentId)) {

				$formDataupShare['status'] = $status;
				$this->db->update('document_comments', $formDataupShare, array('id' => $documentId));
			}
		}
	}
	function temp_weekly_data()
	{
		$start = $this->input->get('start');
		$end = $this->input->get('end');

		$this->db->select("*");
		$this->db->from('temperature_logbook');
		$this->db->where("DATE_FORMAT(created_at,'%Y-%m-%d') >='$start'");
		$this->db->where("DATE_FORMAT(created_at,'%Y-%m-%d') <='$end'");
		$temperature_logbook = $this->db->get()->result_array();

		foreach ($temperature_logbook as $key => $value) {

			$id = $value['id'];
			$delete_url = site_url('Document_List/delete_forms/') . "?id=$id&action=temperature_logbook&redirect=temperature_logbook";

			// Measured Temp
			$temp = explode(",", $value['measured_temperature']);
			// For Monday
			if ($temp[0] == "0-5") $_0_5 = "selected";
			else $_0_5 = '';
			if ($temp[0] == "5-10") $_5_10 = "selected";
			else $_5_10 = '';
			if ($temp[0] == "10-15") $_10_15 = "selected";
			else $_10_15 = '';
			if ($temp[0] == "15-20") $_15_20 = "selected";
			else $_15_20 = '';
			if ($temp[0] == "20-25") $_20_25 = "selected";
			else $_20_25 = '';
			if ($temp[0] == "25-30") $_25_30 = "selected";
			else $_25_30 = '';
			if ($temp[0] == "30-35") $_30_35 = "selected";
			else $_30_35 = '';
			if ($temp[0] == "35-40") $_35_40 = "selected";
			else $_35_40 = '';
			if ($temp[0] == "40-45") $_40_45 = "selected";
			else $_40_45 = '';
			if ($temp[0] == "45-50") $_45_50 = "selected";
			else $_45_50 = '';

			$temp1 = "<label>Monday<select data-temp_id=$id class='tempid_$id form-control update_temp'><option value='0-5' $_0_5>0-5</option><option value='5-10' $_5_10>5-10</option><option value='10-15' $_10_15>10-15</option><option value='15-20' $_15_20>15-20</option><option value='20-25' $_20_25>20-25</option><option value='25-30' $_25_30>25-30</option><option value='30-35' $_30_35>30-35</option><option value='35-40' $_35_40>35-40</option><option value='40-45' $_40_45>40-45</option><option value='45-50' $_45_50>45-50</option></select></label>";

			// For Tuesday
			if ($temp[1] == "0-5") $_0_5 = "selected";
			else $_0_5 = '';
			if ($temp[1] == "5-10") $_5_10 = "selected";
			else $_5_10 = '';
			if ($temp[1] == "10-15") $_10_15 = "selected";
			else $_10_15 = '';
			if ($temp[1] == "15-20") $_15_20 = "selected";
			else $_15_20 = '';
			if ($temp[1] == "20-25") $_20_25 = "selected";
			else $_20_25 = '';
			if ($temp[1] == "25-30") $_25_30 = "selected";
			else $_25_30 = '';
			if ($temp[1] == "30-35") $_30_35 = "selected";
			else $_30_35 = '';
			if ($temp[1] == "35-40") $_35_40 = "selected";
			else $_35_40 = '';
			if ($temp[1] == "40-45") $_40_45 = "selected";
			else $_40_45 = '';
			if ($temp[1] == "45-50") $_45_50 = "selected";
			else $_45_50 = '';
			$temp1 .= "<label>Tuesday<select data-temp_id=$id class='tempid_$id form-control update_temp'><option value='0-5' $_0_5>0-5</option><option value='5-10' $_5_10>5-10</option><option value='10-15' $_10_15>10-15</option><option value='15-20' $_15_20>15-20</option><option value='20-25' $_20_25>20-25</option><option value='25-30' $_25_30>25-30</option><option value='30-35' $_30_35>30-35</option><option value='35-40' $_35_40>35-40</option><option value='40-45' $_40_45>40-45</option><option value='45-50' $_45_50>45-50</option></select></label>";

			// For Wednesday
			if ($temp[2] == "0-5") $_0_5 = "selected";
			else $_0_5 = '';
			if ($temp[2] == "5-10") $_5_10 = "selected";
			else $_5_10 = '';
			if ($temp[2] == "10-15") $_10_15 = "selected";
			else $_10_15 = '';
			if ($temp[2] == "15-20") $_15_20 = "selected";
			else $_15_20 = '';
			if ($temp[2] == "20-25") $_20_25 = "selected";
			else $_20_25 = '';
			if ($temp[2] == "25-30") $_25_30 = "selected";
			else $_25_30 = '';
			if ($temp[2] == "30-35") $_30_35 = "selected";
			else $_30_35 = '';
			if ($temp[2] == "35-40") $_35_40 = "selected";
			else $_35_40 = '';
			if ($temp[2] == "40-45") $_40_45 = "selected";
			else $_40_45 = '';
			if ($temp[2] == "45-50") $_45_50 = "selected";
			else $_45_50 = '';
			$temp1 .= "<label>Wednesday<select data-temp_id=$id class='tempid_$id form-control update_temp'><option value='0-5' $_0_5>0-5</option><option value='5-10' $_5_10>5-10</option><option value='10-15' $_10_15>10-15</option><option value='15-20' $_15_20>15-20</option><option value='20-25' $_20_25>20-25</option><option value='25-30' $_25_30>25-30</option><option value='30-35' $_30_35>30-35</option><option value='35-40' $_35_40>35-40</option><option value='40-45' $_40_45>40-45</option><option value='45-50' $_45_50>45-50</option></select></label>";

			// For Thursday
			if ($temp[3] == "0-5") $_0_5 = "selected";
			else $_0_5 = '';
			if ($temp[3] == "5-10") $_5_10 = "selected";
			else $_5_10 = '';
			if ($temp[3] == "10-15") $_10_15 = "selected";
			else $_10_15 = '';
			if ($temp[3] == "15-20") $_15_20 = "selected";
			else $_15_20 = '';
			if ($temp[3] == "20-25") $_20_25 = "selected";
			else $_20_25 = '';
			if ($temp[3] == "25-30") $_25_30 = "selected";
			else $_25_30 = '';
			if ($temp[3] == "30-35") $_30_35 = "selected";
			else $_30_35 = '';
			if ($temp[3] == "35-40") $_35_40 = "selected";
			else $_35_40 = '';
			if ($temp[3] == "40-45") $_40_45 = "selected";
			else $_40_45 = '';
			if ($temp[3] == "45-50") $_45_50 = "selected";
			else $_45_50 = '';
			$temp1 .= "<label>Thursday<select data-temp_id=$id class='tempid_$id form-control update_temp'><option value='0-5' $_0_5>0-5</option><option value='5-10' $_5_10>5-10</option><option value='10-15' $_10_15>10-15</option><option value='15-20' $_15_20>15-20</option><option value='20-25' $_20_25>20-25</option><option value='25-30' $_25_30>25-30</option><option value='30-35' $_30_35>30-35</option><option value='35-40' $_35_40>35-40</option><option value='40-45' $_40_45>40-45</option><option value='45-50' $_45_50>45-50</option></select></label>";

			// For Friday
			if ($temp[4] == "0-5") $_0_5 = "selected";
			else $_0_5 = '';
			if ($temp[4] == "5-10") $_5_10 = "selected";
			else $_5_10 = '';
			if ($temp[4] == "10-15") $_10_15 = "selected";
			else $_10_15 = '';
			if ($temp[4] == "15-20") $_15_20 = "selected";
			else $_15_20 = '';
			if ($temp[4] == "20-25") $_20_25 = "selected";
			else $_20_25 = '';
			if ($temp[4] == "25-30") $_25_30 = "selected";
			else $_25_30 = '';
			if ($temp[4] == "30-35") $_30_35 = "selected";
			else $_30_35 = '';
			if ($temp[4] == "35-40") $_35_40 = "selected";
			else $_35_40 = '';
			if ($temp[4] == "40-45") $_40_45 = "selected";
			else $_40_45 = '';
			if ($temp[4] == "45-50") $_45_50 = "selected";
			else $_45_50 = '';
			$temp1 .= "<label>Friday<select data-temp_id=$id class='tempid_$id form-control update_temp'><option value='0-5' $_0_5>0-5</option><option value='5-10' $_5_10>5-10</option><option value='10-15' $_10_15>10-15</option><option value='15-20' $_15_20>15-20</option><option value='20-25' $_20_25>20-25</option><option value='25-30' $_25_30>25-30</option><option value='30-35' $_30_35>30-35</option><option value='35-40' $_35_40>35-40</option><option value='40-45' $_40_45>40-45</option><option value='45-50' $_45_50>45-50</option></select></label>";

			$output = "<tr>";
			$output .= "<td>" . $value['equipment_item'] . "</td>";
			$output .= "<td>" . $value['temperature_range'] . "</td>";
			$output .= "<td>" . $temp1 . "</td>";
			$output .= "<td><a href=" . site_url('Document_List/add_temperature_logbook/') . "$id><i class='fa fa-pencil m-r-5'></i></a> <a href=" . $delete_url . "><i class='fa fa-trash-o m-r-5'></i></a></td>";
			$output .= "</tr>";
			echo $output;
		}
	}

	function forms()
	{
		$data = [];
		$data['lab_task'] = $this->db->query('SELECT * FROM timesheet_category')->num_rows();
		$data['cor_act'] = $this->db->query('SELECT * FROM corrective_actions')->num_rows();
		$data['mon_sta'] = $this->db->query('SELECT * FROM monthly_stainer')->num_rows();
		//$data['lab_task'] = $this->db->query('SELECT * FROM corrective_actions')->num_rows();
		$data['phy_ass'] = $this->db->query('SELECT * FROM physical_asset_register')->num_rows();
		$data['rea_con'] = $this->db->query('SELECT * FROM reagent_consumable_register')->num_rows();
		$data['sup_lis'] = $this->db->query('SELECT * FROM supplier_list')->num_rows();
		$data['temp'] = $this->db->query('SELECT * FROM temperature_logbook')->num_rows();
		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/forms', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}
	function labortary_task_checklist()
	{
		$data = [];
		$data['categories'] = $this->Document_List_Model->getWorksheetCategory();
		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/labortary_task_checklist', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}

	function labortary_task_checklist_new()
	{
		$data = [];
		$data['categories'] = $this->Document_List_Model->getWorksheetCategory();
		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/labortary_task_checklist_new', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}

	function improvment_corrective_action_register()
	{
		$data['corrective_actions'] = $this->db->get('corrective_actions')->result_array();
		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/improvment_corrective_action_register', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}
	function add_improvment_corrective_action_register($id = 0)
	{
		
		
		$this->load->model('Userextramodel');
		$this->load->model('Incident_LedgerModel');

		$data['usersList'] = $this->Userextramodel->getAllusersForImprovementPage();
		$ticketId = $this->input->get('ticket');
		if(!empty($ticketId)) $data['ticketData'] = $this->Incident_LedgerModel->getTicketData($ticketId);
		else $data['ticketData'] = [];

		// print_r($data['ticketData']); die;
		if ($id != 0) {
			$data['result'] = $this->db->query("SELECT * FROM `corrective_actions` WHERE id = $id")->row_array();
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$formData = [];
			$subbmittedForm = $this->input->post();
			array_shift($subbmittedForm);
			array_pop($subbmittedForm);

			foreach ($subbmittedForm as $key => $value) {


				if ($key == 'correactive_checkboxes') $formData[$key] = implode(",", $value);
				elseif ($key == 'preventive_checkbox') $formData[$key] = implode(",", $value);
				elseif ($key == 'implementation_corrective_checkbox') $formData[$key] = implode(",", $value);
				elseif ($key == 'implementation_preventive_checkbox') $formData[$key] = implode(",", $value);
				elseif ($key == 'verification_corrective_checkbox') $formData[$key] = implode(",", $value);
				elseif ($key == 'verification_preventive_checkbox') $formData[$key] = implode(",", $value);
				else $formData[$key] = $value;
			}
			// print_r($formData); die;

			if ($this->input->post('improvment_corrective_action_register_id') != 0 and !empty($this->input->post('improvment_corrective_action_register_id'))) {

				$this->db->where('id', $this->input->post('improvment_corrective_action_register_id'));
				$this->db->update('corrective_actions', $formData);
			} else {
				$this->db->insert('corrective_actions', $formData);
			}
			return redirect('/Document_List/improvment_corrective_action_register');
		}

		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/add_improvment_corrective_action_register', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}

	function add_monthly_stainer($id = 0)
	{

		$this->load->model('Laboratory_model');
		$data["user_info"] = $this->Laboratory_model->get_lab_users();
		$data['page_title'] = "Monthly Stainer Section";
		if ($id != 0) {
			$data['result'] = $this->db->query("SELECT * FROM `monthly_stainer` WHERE id = $id")->row_array();
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$formData['source'] = $this->input->post('source');
			$formData['ref'] = $this->input->post('ref');
			$formData['intiative'] = $this->input->post('intiative');
			$formData['action_owner'] = $this->input->post('action_owner');
			$formData['target_date'] = $this->input->post('target_date');
			$formData['status'] = $this->input->post('status');
			$formData['comment'] = $this->input->post('comment');
			$formData['added_by'] = $this->ion_auth->user()->row()->id;

			if ($this->input->post('monthly_stainer_id') != 0 and !empty($this->input->post('monthly_stainer_id'))) {

				$this->db->where('id', $this->input->post('monthly_stainer_id'));
				$this->db->update('monthly_stainer', $formData);
			} else {
				$this->db->insert('monthly_stainer', $formData);
			}
			return redirect('/Document_List/monthaly_stainer_checklist');
		}

		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/add_monthly_stainer', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}

	// function add_monthly_task($id = 0)
	// {

	// 	$this->load->model('Laboratory_model');
	// 	$data["user_info"] = $this->Laboratory_model->get_lab_users();
	// 	$data['page_title'] = "Monthly Task Section";
	// 	if ($id != 0) {
	// 		$data['result'] = $this->db->query("SELECT * FROM `monthly_task` WHERE id = $id")->row_array();
	// 	}
	// 	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// 		$formData['source'] = $this->input->post('source');
	// 		$formData['ref'] = $this->input->post('ref');
	// 		$formData['intiative'] = $this->input->post('intiative');
	// 		$formData['action_owner'] = $this->input->post('action_owner');
	// 		$formData['target_date'] = $this->input->post('target_date');
	// 		$formData['status'] = $this->input->post('status');
	// 		$formData['comment'] = $this->input->post('comment');
	// 		$formData['added_by'] = $this->ion_auth->user()->row()->id;

	// 		if ($this->input->post('monthly_stainer_id') != 0 and !empty($this->input->post('monthly_stainer_id'))) {

	// 			$this->db->where('id', $this->input->post('monthly_stainer_id'));
	// 			$this->db->update('monthly_task', $formData);
	// 		} else {
	// 			$this->db->insert('monthly_task', $formData);
	// 		}
	// 		return redirect('/Document_List/monthaly_task_checklist');
	// 	}

	// 	$this->load->view('templates/header-new.php', $this->h_data);
	// 	$this->load->view('document_list/add_monthly_task', $data);
	// 	$this->load->view('templates/footer-new.php', $this->f_data);
	// }

	function monthaly_stainer_checklist()
	{
		$data = [];
		$data['monthly_stainer'] = $this->Document_List_Model->getMonthlyStainer();
		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/monthaly_stainer_checklist', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}

	function monthly_task_checklist_view()
	{
		$user_id = $this->ion_auth->user()->row()->id;
		$year = $this->input->post('year');
		// $data['data'] = $this->db->select('log_data')->where('year', $year)->where('user_id',$user_id)->get('monthly_task')->row_array();
		$data['data'] = $this->db->select('log_data')->where('year', $year)->order_by("id DESC")->limit(1)->get('monthly_task')->row_array();
		$result['html'] = $this->load->view('document_list/monthly_task_checklist_view', $data, true);
		$result['year'] = $year;
		echo json_encode($result);
		exit;
	}
	function monthly_task_checklist_view_new()
	{
		$year = $this->input->post('year');
		$data['data'] = $this->db->select('log_data')->where('year', $year)->get('monthly_task_new')->row_array();
		$result['html'] = $this->load->view('document_list/monthly_task_checklist_view_new', $data, true);
		$result['year'] = $year;
		echo json_encode($result);
		exit;
	}

	function monthaly_task_checklist()
	{
		$user_id = $this->ion_auth->user()->row()->id;
		$year = date('Y');
		$data['data'] = $this->db->select('log_data')->where('year', $year)->order_by("id DESC")->limit(1)->get('monthly_task')->row_array();
		// $data['data'] = $this->db->select('log_data')->where('user_id', $user_id)->where('year', $year)->get('monthly_task')->row_array();
		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/monthaly_task_checklist', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}

	function monthaly_task_checklist_new()
	{
		$user_id = $this->ion_auth->user()->row()->id;
		$year = date('Y');
		$data['data'] = $this->db->select('log_data')->where('user_id', $user_id)->where('year', $year)->get('monthly_task_new')->row_array();
		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/monthaly_task_checklist_new', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}

	function physical_asset_register()
	{
		$data['physical_asset_register'] = $this->db->get('physical_asset_register')->result_array();
		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/physical_asset_register', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}
	function add_physical_asset_register($id = 0)
	{
		$this->load->model('Userextramodel');
		$data['usersList'] = $this->Userextramodel->getAllusersForadminList();
		if ($id != 0) {
			$data['result'] = $this->db->query("SELECT * FROM `physical_asset_register` WHERE id = $id")->row_array();
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$formData['asset_title'] = $this->input->post('asset_title');
			$formData['serial_number'] = $this->input->post('serial_number');
			$formData['date_received'] = $this->input->post('date_received');
			$formData['date_into_service'] = $this->input->post('date_into_service');
			$formData['warranty'] = $this->input->post('warranty');
			$formData['date_retire_service'] = $this->input->post('date_retire_service');
			$formData['owner'] = $this->input->post('owner');

			if ($this->input->post('physical_asset_register_id') != 0 and !empty($this->input->post('physical_asset_register_id'))) {

				$this->db->where('id', $this->input->post('physical_asset_register_id'));
				$this->db->update('physical_asset_register', $formData);
			} else {
				$this->db->insert('physical_asset_register', $formData);
			}
			return redirect('/Document_List/physical_asset_register');
		}

		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/add_physical_asset_register', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}
	function reagent_consumable_register()
	{
		$data['reagent_consumable_register'] = $this->db->get('reagent_consumable_register')->result_array();
		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/reagent_consumable_register', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}
	function add_reagent_consumable_register($id = 0)
	{
		$this->load->model('Userextramodel');
		$data['usersList'] = $this->Userextramodel->getAllusersForadminList();
		if ($id != 0) {
			$data['result'] = $this->db->query("SELECT * FROM `reagent_consumable_register` WHERE id = $id")->row_array();
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$formData['reagent_name'] = $this->input->post('reagent_name');
			$formData['date_received'] = $this->input->post('date_received');
			$formData['received_by'] = $this->input->post('received_by');
			$formData['batch_number'] = $this->input->post('batch_number');
			$formData['expiry_date'] = $this->input->post('expiry_date');
			$formData['date_in_use'] = $this->input->post('date_in_use');
			$formData['completed_date'] = $this->input->post('completed_date');
			$formData['quality_control_whom'] = $this->input->post('quality_control_whom');
			$formData['quality_control_date'] = $this->input->post('quality_control_date');
			$formData['pass_fail'] = $this->input->post('pass_fail');
			$formData['owner'] = $this->input->post('owner');

			if ($this->input->post('reagent_consumable_register_id') != 0 and !empty($this->input->post('reagent_consumable_register_id'))) {

				$this->db->where('id', $this->input->post('reagent_consumable_register_id'));
				$this->db->update('reagent_consumable_register', $formData);
			} else {
				$this->db->insert('reagent_consumable_register', $formData);
			}
			return redirect('/Document_List/reagent_consumable_register');
		}

		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/add_reagent_consumable_register', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}

	function temperature_logbook()
	{
		if ($this->input->is_ajax_request()) {
			$data = $this->input->get('days');
			$tempid = $this->input->get('tempid');
			$temp = $data[0] . ',' . $data[1]  . ',' . $data[2]  . ',' . $data[3]  . ',' . $data[4];

			$data = [
				'measured_temperature' => $temp,
			];
			$this->db->where('id', $tempid);
			$this->db->update('temperature_logbook', $data);
			die;
		}
		$data['temperature_logbook'] = $this->db->get('temperature_logbook')->result_array();
		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/temperature_logbook', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}
	function add_temperature_logbook($id = 0)
	{

		if ($id != 0) {
			$data['result'] = $this->db->query("SELECT * FROM `temperature_logbook` WHERE id = $id")->row_array();
			$measuremnt_data = explode(",", $data['result']['measured_temperature']);
			$data['result']['monday'] = $measuremnt_data[0];
			$data['result']['tuesday'] = $measuremnt_data[1];
			$data['result']['wednesday'] = $measuremnt_data[2];
			$data['result']['thursday'] = $measuremnt_data[3];
			$data['result']['friday'] = $measuremnt_data[4];
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$formData['equipment_item'] = $this->input->post('equipment_item');
			$formData['temperature_range'] = $this->input->post('temperature_range');

			$formData['measured_temperature'] = $this->input->post('monday') . ',' . $this->input->post('tuesday') . ',' . $this->input->post('wednesday') . ',' . $this->input->post('thursday') . ',' . $this->input->post('friday');
			if ($this->input->post('temperature_logbook_id') != 0 and !empty($this->input->post('temperature_logbook_id'))) {

				$this->db->where('id', $this->input->post('temperature_logbook_id'));
				$this->db->update('temperature_logbook', $formData);
			} else {
				$this->db->insert('temperature_logbook', $formData);
			}
			return redirect('/Document_List/temperature_logbook');
		}

		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/add_temperature_logbook', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}

	function supplier_list()
	{
		$data['supplier_list'] = $this->db->get('supplier_list')->result_array();
		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/supplier_list', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}

	function add_supplier_list($id = 0)
	{
		$this->load->model('Userextramodel');
		$data['usersList'] = $this->Userextramodel->getAllusersForadminList();
		if ($id != 0) {
			$data['result'] = $this->db->query("SELECT * FROM `supplier_list` WHERE id = $id")->row_array();
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$formData['supplier'] = $this->input->post('supplier');
			$formData['contact_name'] = $this->input->post('contact_name');
			$formData['contact_number'] = $this->input->post('contact_number');
			$formData['contact_email'] = $this->input->post('contact_email');
			$formData['product_supplied'] = $this->input->post('product_supplied');
			if ($this->input->post('supplier_id') != 0 and !empty($this->input->post('supplier_id'))) {

				$this->db->where('id', $this->input->post('supplier_id'));
				$this->db->update('supplier_list', $formData);
			} else {
				$this->db->insert('supplier_list', $formData);
			}
			return redirect('/Document_List/supplier_list');
		}

		$this->load->view('templates/header-new.php', $this->h_data);
		$this->load->view('document_list/add_supplier_list', $data);
		$this->load->view('templates/footer-new.php', $this->f_data);
	}

	/**
	 * Function to update temprature logs weekly
	 * return true or false
	 */
	public function update_temprature_logs_weekly()
	{
		$user_id = $this->ion_auth->user()->row()->id;
		$weekDate = $this->input->post('week_date');
		$check_booked_out_status = $this->db->where('week_date', $weekDate)->get('temperature_logs')->row_array();
		if ($check_booked_out_status) {
			$timesheetLogs = array('log_data' => json_encode($this->input->post()));
			$this->db->where('id', $check_booked_out_status['id']);
			$this->db->where('user_id', $user_id);
			$this->db->update('temperature_logs', $timesheetLogs);
		} else {
			$timesheetLogs = array(
				'user_id' => $user_id,
				'week_date' => $weekDate,
				'log_data' => json_encode($this->input->post()),
			);
			$this->db->insert('temperature_logs', $timesheetLogs);
		}


		echo json_encode(array('message' => 'Record has been updated successfully!!!!'));
		exit;
	}

	public function get_temprature_logs_weekly(){

		$weekDate = $this->input->post('weekdate');
		$user_id = $this->ion_auth->user()->row()->id;
		$data['weekdate'] = $weekDate;
		$data['result'] = $this->db->where('week_date', $weekDate)->get('temperature_logs')->row_array();
		// echo "<pre>";
		// print_r($data['result']);die;
		$result['html'] = $this->load->view('document_list/temprature_logbook_weekly_view', $data, true);
		$result['next_date'] = substr($weekDate,0,10);
		echo json_encode($result);
		exit;
	}
	/**
	 * Function to get weekly timesheet data
	 * return Json data
	 */
	public function monthly_stainer_checklist()
	{
		$user_id = $this->ion_auth->user()->row()->id;
		$data['fdate'] = date('Y-m-d', strtotime($this->input->post('fdate')));
		$data['tdate'] = date('Y-m-d', strtotime($this->input->post('tdate')));
		
		
		//Adjustment added by Vishal - Start
		$my_date = $data['tdate']; 
		$week = date("W", strtotime($my_date)); // get week
		$y =    date("Y", strtotime($my_date)); // get year
		$data['fdate'] =  date('Y-m-d',strtotime($y."W".$week)); //first date 
		$data['tdate'] = date("Y-m-d",strtotime("+4 day", strtotime($data['fdate'])));
		//Adjustment added by Vishal - end
		
		$data['result'] = $this->Document_List_Model->monthly_stainer_checklist($user_id, $data['fdate'], $data['tdate']);
		$data['categories'] = $this->Document_List_Model->getmonthlyCategory();
		$my_date = $data['tdate'];
		$week = date("W", strtotime($my_date)); // get week
		$y =    date("Y", strtotime($my_date)); // get year
		$first_date =  date('d-m-Y', strtotime($y . "W" . $week)); //first date 
		$last_date = date("d-m-Y", strtotime("+4 day", strtotime($first_date)));
		$result['html'] = $this->load->view('document_list/documnt_monthly_stainer_checklist', $data, true);
		$result['first_date'] = $first_date;
		$result['last_date'] = $last_date;
		echo json_encode($result);
		exit;
	}

	/**
	 * Function to get weekly timesheet data
	 * return Json data
	 */
	public function get_weekly_timesheet()
	{
		$user_id = $this->ion_auth->user()->row()->id;
		$data['fdate'] = date('Y-m-d', strtotime($this->input->post('fdate')));
		$data['tdate'] = date('Y-m-d', strtotime($this->input->post('tdate')));

		//Adjustment added by Vishal - Start
		$my_date = $data['tdate']; 
		$week = date("W", strtotime($my_date)); // get week
		$y =    date("Y", strtotime($my_date)); // get year
		$data['fdate'] =  date('Y-m-d',strtotime($y."W".$week)); //first date 
		$data['tdate'] = date("Y-m-d",strtotime("+4 day", strtotime($data['fdate'])));
		//Adjustment added by Vishal - end

		$data['result'] = $this->Document_List_Model->get_weekly_request($user_id, $data['fdate'], $data['tdate']);
		$data['categories'] = $this->Document_List_Model->getWorksheetCategory(); 
		$my_date = $data['tdate'];
		$week = date("W", strtotime($my_date)); // get week
		$y =    date("Y", strtotime($my_date)); // get year
		$first_date =  date('d-m-Y', strtotime($y . "W" . $week)); //first date 
		$last_date = date("d-m-Y", strtotime("+4 day", strtotime($first_date)));
		$result['html'] = $this->load->view('document_list/documnt_checklist_weekly_view', $data, true);
		$result['first_date'] = $first_date;
		$result['last_date'] = $last_date;
		echo json_encode($result);
		exit;
	}

	public function get_weekly_timesheet_new()
	{
		$user_id = $this->ion_auth->user()->row()->id;
		$data['fdate'] = date('Y-m-d', strtotime($this->input->post('fdate')));
		$data['tdate'] = date('Y-m-d', strtotime($this->input->post('tdate')));

		//Adjustment added by Vishal - Start
		$my_date = $data['tdate']; 
		$week = date("W", strtotime($my_date)); // get week
		$y =    date("Y", strtotime($my_date)); // get year
		$data['fdate'] =  date('Y-m-d',strtotime($y."W".$week)); //first date 
		$data['tdate'] = date("Y-m-d",strtotime("+4 day", strtotime($data['fdate'])));
		//Adjustment added by Vishal - end

		$data['result'] = $this->Document_List_Model->get_weekly_request_new($user_id, $data['fdate'], $data['tdate']);
		$data['categories'] = $this->Document_List_Model->getWorksheetCategory_new();
		$my_date = $data['tdate'];
		$week = date("W", strtotime($my_date)); // get week
		$y =    date("Y", strtotime($my_date)); // get year
		$first_date =  date('d-m-Y', strtotime($y . "W" . $week)); //first date 
		$last_date = date("d-m-Y", strtotime("+4 day", strtotime($first_date)));
		$result['html'] = $this->load->view('document_list/documnt_checklist_weekly_view_new', $data, true);
		$result['first_date'] = $first_date;
		$result['last_date'] = $last_date;
		echo json_encode($result);
		exit;
	}

	public function update_weekly_timesheetData()
	{
		$user_id = $this->ion_auth->user()->row()->id;
		foreach ($this->input->post() as $key => $post) {
			$date = date('Y-m-d', strtotime($key));
				$check_booked_out_status = $this->db->where('log_date', $date)->get('timesheet_logs')->row_array();
			if ($check_booked_out_status) {
				$timesheetLogs = array('log_data' => json_encode($this->input->post()[$key]));
				$this->db->where('id', $check_booked_out_status['id']);
				//$this->db->where('user_id', $user_id);
				$this->db->update('timesheet_logs', $timesheetLogs);
			} else {
				$timesheetLogs = array(
					'user_id' => $user_id,
					'log_date' => $date,
					'log_data' => json_encode($this->input->post()[$key]),
				);
				$this->db->insert('timesheet_logs', $timesheetLogs);
			}
		}

		echo json_encode(array('message' => 'Record has been updated successfully!!!!'));
		exit;
	}

	public function update_weekly_timesheetData_new()
	{
		$user_id = $this->ion_auth->user()->row()->id;
		foreach ($this->input->post() as $key => $post) {
			$date = date('Y-m-d', strtotime($key));
				$check_booked_out_status = $this->db->where('log_date', $date)->get('timesheet_logs_new')->row_array();
			if ($check_booked_out_status) {
				$timesheetLogs = array('log_data' => json_encode($this->input->post()[$key]));
				$this->db->where('id', $check_booked_out_status['id']);
				//$this->db->where('user_id', $user_id);
				$this->db->update('timesheet_logs_new', $timesheetLogs);
			} else {
				$timesheetLogs = array(
					'user_id' => $user_id,
					'log_date' => $date,
					'log_data' => json_encode($this->input->post()[$key]),
				);
				$this->db->insert('timesheet_logs_new', $timesheetLogs);
			}
		}

		echo json_encode(array('message' => 'Record has been updated successfully!!!!'));
		exit;
	}

	public function update_monthaly_stainer_checklist()
	{
		$user_id = $this->ion_auth->user()->row()->id;
		foreach ($this->input->post() as $key => $post) {
			$date = date('Y-m-d', strtotime($key));
			$check_booked_out_status = $this->db->where('log_date', $date)->where('user_id', $user_id)->get('monthly_stainer_checklist')->row_array();
			if ($check_booked_out_status) {
				$timesheetLogs = array('log_data' => json_encode($this->input->post()[$key]));
				$this->db->where('id', $check_booked_out_status['id']);
				$this->db->where('user_id', $user_id);
				$this->db->update('monthly_stainer_checklist', $timesheetLogs);
			} else {
				$timesheetLogs = array(
					'user_id' => $user_id,
					'log_date' => $date,
					'log_data' => json_encode($this->input->post()[$key]),
				);
				$this->db->insert('monthly_stainer_checklist', $timesheetLogs);
			}
		}

		echo json_encode(array('message' => 'Record has been updated successfully!!!!'));
		exit;
	}

	public function update_monthly_task_checklist()
	{
		$user_id = $this->ion_auth->user()->row()->id;
		foreach ($this->input->post() as $key => $post) {
			$date = $this->input->post('current_year');

			$check_booked_out_status = $this->db->where('year', $date)->order_by("id DESC")->limit(1)->get('monthly_task')->row_array();
			if ($check_booked_out_status) {
				$timesheetLogs = array('log_data' => json_encode($this->input->post()));
				$this->db->where('id', $check_booked_out_status['id']);
				// $this->db->where('user_id', $user_id);
				$this->db->update('monthly_task', $timesheetLogs);
			} else {
				$timesheetLogs = array(
					'user_id' => $user_id,
					'year' => $date,
					'log_data' => json_encode($this->input->post()),
				);
				$this->db->insert('monthly_task', $timesheetLogs);
			}
		}

		echo json_encode(array('message' => 'Record has been updated successfully!!!!'));
		exit;
	}

	public function update_monthly_task_checklist_new()
	{
		$user_id = $this->ion_auth->user()->row()->id;
		foreach ($this->input->post() as $key => $post) {
			$date = $this->input->post('current_year');

			$check_booked_out_status = $this->db->where('year', $date)->get('monthly_task_new')->row_array();
			if ($check_booked_out_status) {
				$timesheetLogs = array('log_data' => json_encode($this->input->post()));
				$this->db->where('id', $check_booked_out_status['id']);
				$this->db->where('user_id', $user_id);
				$this->db->update('monthly_task_new', $timesheetLogs);
			} else {
				$timesheetLogs = array(
					'user_id' => $user_id,
					'year' => $date,
					'log_data' => json_encode($this->input->post()),
				);
				$this->db->insert('monthly_task_new', $timesheetLogs);
			}
		}

		echo json_encode(array('message' => 'Record has been updated successfully!!!!'));
		exit;
	}

	public function deleteMonthlyStainer($id)
	{
		$this->db->delete('monthly_stainer', ['id' => $id]);
		redirect('/Document_List/monthaly_stainer_checklist', 'refresh');
	}

	// public function deleteMonthlyTask($id) {
	//     $this->db->delete('monthly_task', ['id' => $id]);
	//     redirect('/Document_List/monthaly_task_checklist', 'refresh');     
	// }

	function delete_forms()
	{
		$action = $this->input->get('action');
		$id = $this->input->get('id');
		$redirect = $this->input->get('redirect');
		$this->db->where('id', $id);
		$this->db->delete($action);
		return redirect('/Document_List' . '/' . $redirect);
	}

	function update_form_status()
	{
		$status = $this->input->post('status');
		$id = $this->input->post('id');
		$table = $this->input->post('table');

		$data = [
			'status' => $status
		];
		$this->db->where('id', $id);
		$this->db->update($table, $data);
	}
}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Laboratory Controller
 *
 * @package    CI
 * @subpackage Controller
 * @author     Uralensis <info@oxbridgemedica.com>
 * @version    1.0.0
 */
Class Laboratory extends CI_Controller {

    private $group_id = 0;
    private $user_id = 0;
    private $group_type = "";

    /**
     * Constructor to load models and helpers
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Laboratory_model', 'lab');
        $this->load->helper(array('url', 'activity_helper'));
        $this->load->model('Doctor_model');
        $this->load->model('Institute_model');
        $this->load->model('Pm_model');
        $this->load->model('invoice_model');
        $this->load->helper('form');
        $this->load->helper(array('url', 'activity_helper', 'dashboard_functions_helper', 'datasets_helper', 'ec_helper'));
        $this->load->library('email');
        // $this->load->library('word');
        $this->load->helper("file");
        $this->load->model('Userextramodel');
        $this->load->model('Laboratory_model');
        $this->load->model('Admin_model');
        track_user_activity();

        $this->user_id = $this->ion_auth->user()->row()->id;
        $group_row = $this->ion_auth->get_users_groups()->row();
        $this->group_type = $group_row->group_type;
        $this->group_id = $group_row->id;
    }

    /**
     * Dashboard Function
     * Load Dashboard View
     *
     * @return void
     */
    public function index() {
        $data['javascripts'] = array(
            'js/custom_js/laboratory_dashboard.js',
        );
        $data['usersLogins'] = $this->lab->getUsersLogins();
        $lab_id = $this->ion_auth->user()->row()->id;
        $group_row = $this->ion_auth->get_users_groups()->row();
        $group_id = $group_row->id; // hospital ID

        $lab_information = $this->Laboratory_model->get_lab_information($group_id);
        $data['lab_info'] = $lab_information;
        $data["firstRowCounts"] = $this->Admin_model->getDashboardFirstRowCount();
        $data["hospital_list"] = $this->Admin_model->getLaboratoryHospitals($group_id);
		$data["hospital_count"] = $this->Admin_model->getLaboratoryHospitalsCount($group_id);
		
        $data["hospital_networks"] = $this->Admin_model->getHospitalNetworks();
        $data['upload_docs'] = $this->Laboratory_model->get_upload_doc_forms();

        $data["pathologist"] = $this->Userextramodel->getAllusersForadmin($group_id);
        //$data["pathologist"] = $this->Institute_model->get_pathologists($group_id);

        $this->load->view('laboratory/inc/header-new');
        $this->load->view('laboratory/dashboard', $data);
        $this->load->view('laboratory/inc/footer-new');
    }

    public function Labview() 
	{
	 if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $data['javascripts'] = array(
            'js/custom_js/laboratory_dashboard.js',
        );
		
		
		$hospital_row = $this->ion_auth->get_users_groups()->row();            
		$groupType= $hospital_row->group_type;
		$hospital_id = $hospital_row->id;
		$hospitalUserGroupArray = array("H","HA");
		if  (in_array($groupType, $hospitalUserGroupArray)) 
		{
			$data["lab_info"] = $this->Laboratory_model->get_alllab_information($hospital_id);
		}
		else
		{
		$data["lab_info"] = $this->Laboratory_model->get_alllab_information(0);
		}
		
		
		
        $data['usersLogins'] = $this->lab->getUsersLogins();
        $lab_id = $this->ion_auth->user()->row()->id;
        $group_row = $this->ion_auth->get_users_groups()->row();
        $group_id = $group_row->id;
       
	    $data['user_error'] = array();
	   
        $this->load->view('templates/header-new');
        $this->load->view('laboratory/lab_view', $data);
        $this->load->view('templates/footer-new');
    }

    public function pathologist_view()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $data['javascripts'] = array(
            'js/custom_js/laboratory_dashboard.js',
        );

        $hospital_row = $this->ion_auth->get_users_groups()->row();
        $groupType= $hospital_row->group_type;
        $hospital_id = $hospital_row->id;
        $data["pathologist_info"] = $this->Userextramodel->getAllusersForadmin($hospital_id);
        //$data["pathologist_info"] = $this->Institute_model->get_pathologists($hospital_id);

        $data['usersLogins'] = $this->lab->getUsersLogins();
        $lab_id = $this->ion_auth->user()->row()->id;
        $group_row = $this->ion_auth->get_users_groups()->row();
        $group_id = $group_row->id;

        $data['user_error'] = array();

        $this->load->view('templates/header-new');
        $this->load->view('laboratory/pathologist_view', $data);
        $this->load->view('templates/footer-new');
    }


    /**
     * Search record based on barcode scanner
     *
     * @return {html}
     */
    public function search_barcode_record() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }

        $json = array();
        $encode = '';
        $status_data_1 = '';
        $status_data_2 = '';
        $status_data_3 = '';
        if ($this->input->method() == 'post') {

            if (!empty($_POST['search_type']) && $_POST['search_type'] === 'ura_barcode_no') {
                $search_type = $this->input->post('search_type');
                $search_term = $this->input->post('barcode');
                $msg = 'Barcode No';
            } elseif (!empty($_POST['search_type']) && $_POST['search_type'] === 'serial_number') {
                $search_type = $this->input->post('search_type');
                $search_term = $this->input->post('track_no_ul');
                $msg = 'Serial No';
            } elseif (!empty($_POST['search_type']) && $_POST['search_type'] === 'lab_number') {
                $search_type = $this->input->post('search_type');
                $search_term = $this->input->post('track_no_lab');
                $msg = 'Lab No';
            }

            $this->db->select('ura_rec_track_no,ura_rec_track_record_id,ura_rec_track_location,ura_rec_track_status,ura_rec_track_pathologist,timestamp');
            $this->db->from('request');
            $this->db->join('uralensis_record_track_status', 'request.uralensis_request_id = uralensis_record_track_status.ura_rec_track_record_id');
            $this->db->where($search_type, $search_term);
            $query = $this->db->get()->result_array();

            //Get the record ID and barcode based on barcode no.
            $this->db->select('uralensis_request_id,ura_barcode_no');
            $this->db->from('request');
            $this->db->where($search_type, $search_term);
            $get_record_data = $this->db->get()->row_array();

            $barcode = '';
            $record_id = '';
            if (!empty($get_record_data)) {
                $barcode = $get_record_data['ura_barcode_no'];
                $record_id = $get_record_data['uralensis_request_id'];
            }

            $status_data_1 .= '<a class="institute_book_in_from_clinic text-center" href="javascript:;" data-barcode="' . $barcode . '" data-recordid="' . $record_id . '" data-statuskey="book_in_from_clinic">';
            $status_data_1 .= '<img src="' . base_url('assets/img/01_Book-In-From-Clinic.jpg') . '">';
            $status_data_1 .= '</a>';

            $status_data_2 .= '<a class="institute_book_out_to_lab_primary_release text-center" href="javascript:;" data-barcode="' . $barcode . '" data-recordid="' . $record_id . '" data-statuskey="book_out_to_lab_primary_release">';
            $status_data_2 .= '<img src="' . base_url('assets/img/02_Booked-out-to-Lab-Primary-Release.jpg') . '">';
            $status_data_2 .= '</a>';

            $status_data_3 .= '<a class="institute_book_out_to_lab_fw_completed text-center" href="javascript:;" data-barcode="' . $barcode . '" data-recordid="' . $record_id . '" data-statuskey="book_out_to_lab_fw_completed">';
            $status_data_3 .= '<img src="' . base_url('assets/img/03_Booked-out-to-Lab-FW-Completed.jpg') . '">';
            $status_data_3 .= '</a>';

            if (!empty($query)) {
                $encode .= '<table class="table">';
                $encode .= '<tr class="bg-primary">';
                $encode .= '<th>Track No.</th>';
                $encode .= '<th>Time/Date</th>';
                $encode .= '<th>Location</th>';
                $encode .= '<th>Status</th>';
                $encode .= '<th>Pathologist</th>';
                $encode .= '</tr>';
                foreach ($query as $data) {
                    $encode .= '<tr class="bg-info">';
                    $encode .= '<td>' . $data['ura_rec_track_no'] . '</td>';
                    $encode .= '<td>' . date('h:i, d/m/Y', $data['timestamp']) . '</td>';
                    $encode .= '<td>' . $data['ura_rec_track_location'] . '</td>';
                    $encode .= '<td>' . $data['ura_rec_track_status'] . '</td>';
                    $encode .= '<td>' . $data['ura_rec_track_pathologist'] . '</td>';
                    $encode .= '</tr>';
                }
                $encode .= '<table>';

                $json['type'] = 'success';
                $json['encode_data'] = $encode;
                $json['encode_status_data_1'] = $status_data_1;
                $json['encode_status_data_2'] = $status_data_2;
                $json['encode_status_data_3'] = $status_data_3;
                $json['msg'] = $msg . ' record found.';
                echo json_encode($json);
                die;
            } else {
                $json['type'] = 'error';
                $json['add_specimen_btn'] = '<a class="btn btn-success add_specimen_hide" data-toggle="collapse" data-target="#specimen_tracking" href="javascript:;">Add Specimen</a>';
                $json['msg'] = 'No record add yet against this ' . $msg;
                echo json_encode($json);
                die;
            }
        } else {
            $json['type'] = 'error';
            $json['msg'] = 'Barcode field must not be empty.';
            echo json_encode($json);
            die;
        }
    }

    /**
     * Set Track Record Statuses
     *
     * @return void
     */
    public function set_laboratory_record_history_track_status() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $json = array();
        $record_track_data = '';
        $record_id = $this->input->post('record_id');
        $get_lab_name = $this->db->select('lab_name')->where('uralensis_request_id', $record_id)->get('request')->row_array();
        if (!empty($_POST['record_id']) && $_POST['track_status_key'] === 'book_in_from_clinic') {
            $record_id = $this->input->post('record_id');
            $barcode_no = $this->input->post('barcode_no');
            $status_key = $this->input->post('track_status_key');
            $check_assign_stat = $this->db->select('user_id')->where('request_id', $record_id)->get('request_assignee')->row_array();
            if (empty($check_assign_stat)) {
                $pathologist_status = 'Not Assigned';
            } else {
                $pathologist_name = $this->get_uralensis_username($check_assign_stat['user_id']);
                $pathologist_status = $pathologist_name;
            }
            $track_data = array(
                'ura_rec_track_no' => $barcode_no,
                'ura_rec_track_location' => !empty($get_lab_name['lab_name']) ? $get_lab_name['lab_name'] : '',
                'ura_rec_track_record_id' => intval($record_id),
                'ura_rec_track_status' => $status_key,
                'ura_rec_track_pathologist' => $pathologist_status,
                'timestamp' => time()
            );
            $this->db->insert('uralensis_record_track_status', $track_data);
            $track_sql = "SELECT * FROM uralensis_record_track_status WHERE uralensis_record_track_status.ura_rec_track_record_id = $record_id";
            $record_track_query = $this->db->query($track_sql)->result_array();
            if (!empty($record_track_query)) {
                $record_track_data .= '<hr>';
                $record_track_data .= '<table class="table">';
                $record_track_data .= '<tr class="bg-primary">';
                $record_track_data .= '<th>Track No.</th>';
                $record_track_data .= '<th>Time/Date</th>';
                $record_track_data .= '<th>Location</th>';
                $record_track_data .= '<th>Status</th>';
                $record_track_data .= '<th>Pathologist</th>';
                $record_track_data .= '</tr>';
                foreach ($record_track_query as $data) {
                    $record_track_data .= '<tr class="bg-info">';
                    $record_track_data .= '<td>' . $data['ura_rec_track_no'] . '</td>';
                    $record_track_data .= '<td>' . date('h:i, d/m/Y', $data['timestamp']) . '</td>';
                    $record_track_data .= '<td>' . $data['ura_rec_track_location'] . '</td>';
                    $record_track_data .= '<td>' . $data['ura_rec_track_status'] . '</td>';
                    $record_track_data .= '<td>' . $data['ura_rec_track_pathologist'] . '</td>';
                    $record_track_data .= '</tr>';
                }
                $record_track_data .= '</table>';
            }

            $json['type'] = 'success';
            $json['record_track_data'] = $record_track_data;
            $json['msg'] = 'Data updated successfully.';
            echo json_encode($json);
            die;
        } elseif (!empty($_POST['record_id']) && $_POST['track_status_key'] === 'book_out_to_lab_primary_release') {
            $record_id = $this->input->post('record_id');
            $barcode_no = $this->input->post('barcode_no');
            $status_key = $this->input->post('track_status_key');

            $check_assign_stat = $this->db->select('user_id')->where('request_id', $record_id)->get('request_assignee')->row_array();
            if (empty($check_assign_stat)) {
                $pathologist_status = 'Not Assigned';
            } else {
                $pathologist_name = $this->get_uralensis_username($check_assign_stat['user_id']);
                $pathologist_status = $pathologist_name;
            }
            $track_data = array(
                'ura_rec_track_no' => $barcode_no,
                'ura_rec_track_location' => !empty($get_lab_name['lab_name']) ? $get_lab_name['lab_name'] : '',
                'ura_rec_track_record_id' => intval($record_id),
                'ura_rec_track_status' => $status_key,
                'ura_rec_track_pathologist' => $pathologist_status,
                'timestamp' => time()
            );
            $this->db->insert('uralensis_record_track_status', $track_data);
            $track_sql = "SELECT * FROM uralensis_record_track_status WHERE uralensis_record_track_status.ura_rec_track_record_id = $record_id";
            $record_track_query = $this->db->query($track_sql)->result_array();
            if (!empty($record_track_query)) {
                $record_track_data .= '<hr>';
                $record_track_data .= '<table class="table">';
                $record_track_data .= '<tr class="bg-primary">';
                $record_track_data .= '<th>Track No.</th>';
                $record_track_data .= '<th>Time/Date</th>';
                $record_track_data .= '<th>Location</th>';
                $record_track_data .= '<th>Status</th>';
                $record_track_data .= '<th>Pathologist</th>';
                $record_track_data .= '</tr>';
                foreach ($record_track_query as $data) {
                    $record_track_data .= '<tr class="bg-info">';
                    $record_track_data .= '<td>' . $data['ura_rec_track_no'] . '</td>';
                    $record_track_data .= '<td>' . date('h:i, d/m/Y', $data['timestamp']) . '</td>';
                    $record_track_data .= '<td>' . $data['ura_rec_track_location'] . '</td>';
                    $record_track_data .= '<td>' . $data['ura_rec_track_status'] . '</td>';
                    $record_track_data .= '<td>' . $data['ura_rec_track_pathologist'] . '</td>';
                    $record_track_data .= '</tr>';
                }
                $record_track_data .= '</table>';
            }
            $json['type'] = 'success';
            $json['record_track_data'] = $record_track_data;
            $json['msg'] = 'Data updated successfully.';
            echo json_encode($json);
            die;
        } elseif (!empty($_POST['record_id']) && $_POST['track_status_key'] === 'book_out_to_lab_fw_completed') {
            $record_id = $this->input->post('record_id');
            $barcode_no = $this->input->post('barcode_no');
            $status_key = $this->input->post('track_status_key');
            $check_assign_stat = $this->db->select('user_id')->where('request_id', $record_id)->get('request_assignee')->row_array();
            if (empty($check_assign_stat)) {
                $pathologist_status = 'Not Assigned';
            } else {
                $pathologist_name = $this->get_uralensis_username($check_assign_stat['user_id']);
                $pathologist_status = $pathologist_name;
            }
            $track_data = array(
                'ura_rec_track_no' => $barcode_no,
                'ura_rec_track_location' => !empty($get_lab_name['lab_name']) ? $get_lab_name['lab_name'] : '',
                'ura_rec_track_record_id' => intval($record_id),
                'ura_rec_track_status' => $status_key,
                'ura_rec_track_pathologist' => $pathologist_status,
                'timestamp' => time()
            );
            $this->db->insert('uralensis_record_track_status', $track_data);
            $track_sql = "SELECT * FROM uralensis_record_track_status WHERE uralensis_record_track_status.ura_rec_track_record_id = $record_id";
            $record_track_query = $this->db->query($track_sql)->result_array();
            if (!empty($record_track_query)) {
                $record_track_data .= '<hr>';
                $record_track_data .= '<table class="table">';
                $record_track_data .= '<tr class="bg-primary">';
                $record_track_data .= '<th>Track No.</th>';
                $record_track_data .= '<th>Time/Date</th>';
                $record_track_data .= '<th>Location</th>';
                $record_track_data .= '<th>Status</th>';
                $record_track_data .= '<th>Pathologist</th>';
                $record_track_data .= '</tr>';
                foreach ($record_track_query as $data) {
                    $record_track_data .= '<tr class="bg-info">';
                    $record_track_data .= '<td>' . $data['ura_rec_track_no'] . '</td>';
                    $record_track_data .= '<td>' . date('h:i, d/m/Y', $data['timestamp']) . '</td>';
                    $record_track_data .= '<td>' . $data['ura_rec_track_location'] . '</td>';
                    $record_track_data .= '<td>' . $data['ura_rec_track_status'] . '</td>';
                    $record_track_data .= '<td>' . $data['ura_rec_track_pathologist'] . '</td>';
                    $record_track_data .= '</tr>';
                }
                $record_track_data .= '</table>';
            }
            $json['type'] = 'success';
            $json['record_track_data'] = $record_track_data;
            $json['msg'] = 'Data updated successfully.';
            echo json_encode($json);
            die;
        }
    }

    /**
     * Get User first and last name
     * @param type $user_id
     * @return string
     */
    public function get_uralensis_username($user_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        if (!empty($user_id)) {

            $f_name = $this->ion_auth->user($user_id)->row()->first_name;
            $l_name = $this->ion_auth->user($user_id)->row()->last_name;
            $username = $f_name . ' ' . $l_name;

            return $username;
        }
    }

    /**
     * Swith Back User Account To Admin
     *
     * @param int $admin_id
     * @return void
     */
    public function switchUserAccountToAdmin($admin_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }

        if (!empty($admin_id)) {
            @$this->Ion_auth_model->identity_column = $this->config->item('identity', 'ion_auth');
            @$this->Ion_auth_model->tables = $this->config->item('tables', 'ion_auth');
            $query = $this->db->select($this->Ion_auth_model->identity_column . ', username, email, id, password, active, last_login, memorable')
                    ->where('id', $admin_id)
                    ->limit(1)
                    ->order_by('id', 'desc')
                    ->get($this->Ion_auth_model->tables['users']);
            $user = $query->row();

            if (insert_logout_time() == true) {
                insert_logout_time();
            }

            $session_data = array(
                'identity' => $user->email,
                'username' => $user->username,
                'email' => $user->email,
                'user_id' => $user->id, //everyone likes to overwrite id so we'll use user_id
                'old_last_login' => $user->last_login,
            );
            $this->session->set_userdata($session_data);
            $this->session->sess_regenerate(TRUE);
            redirect('/', 'refresh');
        }
    }

    /**
     * Search Receipent Users
     *
     * @return void
     */
    public function searchReceipentUsers() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }

        $user_id = $this->ion_auth->user()->row()->id;
        if (isset($_REQUEST['query'])) {
            $search_query = $_REQUEST['query'];
            $query = $this->db->query("SELECT * FROM users WHERE users.username LIKE '%$search_query%' AND users.id != $user_id ORDER BY users.username");
            $array = array();
            foreach ($query->result() as $row) {
                $array[$row->id]['user_id'] = $row->id;
                $array[$row->id]['username'] = $row->username;
                $array[$row->id]['first_name'] = $row->first_name;
                $array[$row->id]['last_name'] = $row->last_name;
            }
            echo json_encode($array); //Return the JSON Array
        }
    }

    /**
     * View Laboratory Record
     *
     * @param int $record_id
     * @return void
     */
    public function view_record($record_id = '') {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }

        $result_array = array();
        if (!empty($record_id)) {
            $doctor_id = $this->db->select('user_id')->where('request_id', $record_id)->get('request_assignee')->row_array()['user_id'];
            $record_data['record_query'] = $this->lab->record_detail($record_id, $doctor_id);
            $specimen_data['specimen_query'] = $this->lab->record_detail_specimen($record_id, $doctor_id);
            $result_array = array_merge($record_data, $specimen_data);
        }
        $this->load->view('laboratory/inc/header');
        $this->load->view('laboratory/record_view', $result_array);
        $this->load->view('laboratory/inc/footer');
    }

    public function template_test() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }

        if ($this->group_type !== 'A' && $this->group_type !== 'L') {
            redirect('/', 'refresh');
        }

        $h_data = array('styles' => array());
        $f_data = array('javascripts' => array(
                '/assets/js/laboratory.js',
        ));

        $user_id = $this->ion_auth->user()->row()->id;
        $res = $this->db
                        ->select("
        `users`.`id` as id, 
        AES_DECRYPT(first_name, '" . DATA_KEY . "') AS first_name, 
        AES_DECRYPT(last_name, '" . DATA_KEY . "') AS last_name,
        profile_picture_path as profile_picture
        ")->where('id', $user_id)
                        ->get('users')->result_array()[0];

        $data_array['user_data']['profile_picture_path'] = $res['profile_picture'];
        $data_array['user_data']['id'] = $user_id;
        $data_array['user_data']['first_name'] = $res['first_name'];
        $data_array['user_data']['last_name'] = $res['last_name'];
        $data_array['group_id'] = $this->group_id;
        $data_array['group_type'] = $this->group_type;
        $data_array['user_id'] = $this->user_id;
        if ($this->group_type === 'A') {
            $data_array['labs'] = $this->lab->get_lab_names();
        } else if ($this->group_type === 'L') {
            $data_array['lab'] = $this->lab->get_lab_name($this->group_id);
        }
        $test_id = date("Y") . "-";
        $test_id = $test_id . str_pad((intval($this->db->select('id')->order_by('id', 'DESC')->get('groups')->result_array()[0]['id']) + 1), 7, "0", STR_PAD_LEFT);
        $data_array['test_id'] = $test_id;
        $data_array['speciality_groups'] = $this->lab->get_speciality_group_data();
        $data_array["codeType"] = $this->invoice_model->getBillingCodes();
        $data_array["codeName"] = $this->invoice_model->getBillingCodesName();
		$data_array["costCode"] = $this->invoice_model->getCostCodesName();
//        echo "<pre>";
    //    print_r($data_array["costCode2"]); exit; 

        $this->load->view('doctor/inc/header-new');
//        $this->load->view('templates/header-new', $h_data);
        $this->load->view('laboratory/laboratory_sample_tests', $data_array);
        $this->load->view('doctor/inc/footer-new');
//        $this->load->view('templates/footer-new', $f_data);
    }

    public function laboratory_add_test() 
	{
        if (!$this->ion_auth->logged_in()) {
           // redirect('auth/login', 'refresh');
        }
        if ($this->group_type == 'H' || $this->group_type == 'HA' ) {
            $this->hospital_labs_test();
            return;
        }

        if ($this->group_type !== 'A' && $this->group_type !== 'L') {
            redirect('/', 'refresh');
        }

        $h_data = array('styles' => array());
        $f_data = array('javascripts' => array(
                '/assets/js/laboratory.js',
        ));

        $user_id = $this->ion_auth->user()->row()->id;
        $res = $this->db->select("`users`.`id` as id,AES_DECRYPT(first_name, '" . DATA_KEY . "') AS first_name,AES_DECRYPT(last_name, '" . DATA_KEY . "') AS last_name,profile_picture_path as profile_picture")->where('id', $user_id)->get('users')->result_array()[0];

        $data_array['user_data']['profile_picture_path'] = $res['profile_picture'];
        $data_array['user_data']['id'] = $user_id;
        $data_array['user_data']['first_name'] = $res['first_name'];
        $data_array['user_data']['last_name'] = $res['last_name'];
        $data_array['group_id'] = $this->group_id;
        $data_array['group_type'] = $this->group_type;
        $data_array['user_id'] = $this->user_id;
        if ($this->group_type === 'A') {
            $data_array['labs'] = $this->lab->get_lab_names();
        } else if ($this->group_type === 'L') {
            $data_array['lab'] = $this->lab->get_lab_name($this->group_id);
        }

        $labName = $this->lab->get_lab_name($this->group_id);
        $labInitial = $labName['first_initial'].$labName['last_initial'];
        $labTestRef = $this->lab->lab_ref_test_no($labInitial);
        $data_array["test_id"] = $labTestRef["test_id"];
        $data_array["ref_name"] = $labTestRef["ref_name"];

        $data_array['speciality_groups'] = $this->lab->get_speciality_group_data();
        $data_array["codeType"] = $this->invoice_model->getBillingCodes();
        $data_array["codeName"] = $this->invoice_model->getBillingCodesName();
		
        $data_array["testMainCategories"] = getMainTestCategories();
		
//        $data_array["testSubCategories"] = getSubTestCatAgainstMainCat(1);
//
//        $data_array["testSubCategories"] = getSubTestCatAgainstMainCat(1);
		
        $data_array["categoriesTests"] = getTestAgsinstSubCat('1');
		//exit;
		
		$data_array["costCode"] = $this->invoice_model->getCostCodesName();

       // print_r($data_array["testMainCategories"]);  
//        echo "<pre>";
//        print_r($data_array["codeType"]); exit; 

        $this->load->view('doctor/inc/header-new');
//        $this->load->view('templates/header-new', $h_data);
        $this->load->view('laboratory/laboratory_add_test', $data_array);
        $this->load->view('doctor/inc/footer-new');
//        $this->load->view('templates/footer-new', $f_data);
    }

    public function hospital_labs_test()
	{
//        $user_id = $this->ion_auth->user()->row()->id;
//        $hospital_group_id = $this->ion_auth->get_users_groups($user_id)->row()->id;

        $labsArray = $this->Institute_model->getHospitalLabs($this->group_id);


        $labIds = implode(', ', array_map(function ($entry) {
            return $entry->id;
        }, $labsArray));

        $labTestArray = $this->lab->get_hospital_laboratory_test($labIds);
        $data_array['lab_test'] = $labTestArray;
        $this->load->view('doctor/inc/header-new');
//        $this->load->view('templates/header-new', $h_data);
        $this->load->view('laboratory/hospital_laboratory_test', $data_array);
        $this->load->view('doctor/inc/footer-new');
//        $this->load->view('templates/footer-new', $f_data);
    }

    public function get_sub_categories()
	{
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $catId = $this->input->post("catId");
        $getData = $this->db->where(array("main_category_id"=>$catId,"is_active"=>'1'))->select("id,name")->get("tests_sub_categories")->result();
        echo json_encode($getData);exit;
    }

    public function add_test() 
	{
        if ($this->group_type !== 'A' && $this->group_type !== 'L') {
            redirect('/', 'refresh');
        }
//        echo '<pre>'; print_r($this->input->post()); echo'</pre>'; exit;
        $lab_id = $this->input->post('lab_id');
        $laboratory_test_category_ids = $this->input->post('laboratory_test_category_id');
//        echo print_r($this->input->post('billing_code'));
//        exit; 
//        pexplode("-", $this->input->post('billing_code')); exit; 
        $labName = $this->lab->get_lab_name($this->group_id);
        $labInitials = substr($labName["name"], 0, 4);

        $cost_code = implode(",", $this->input->post('cost_code'));
		$cost_sum = $this->lab->get_cost_price($cost_code);     
	    $cost_sum= $cost_sum[0]['total_cost'];
		
		$billing_code = implode(",", $this->input->post('billing_code'));
		$sale_sum = $this->lab->get_sale_price($billing_code);     
	    $sale_sum= $sale_sum[0]['total_sale'];
		

        $data = array(
            'lab_id' => $lab_id,
            'speciality_group_id' => $this->input->post('specialty_id'),
            'test_id' => $this->input->post('test_id'),
            'department_id' => $this->input->post('department_id'),
            'specialty_id' => $this->input->post('specialty_id'),
            'lab_ref_name' => $this->input->post('lab_ref'),
            'name' => $this->input->post('test_name'),
            'test_category_id' => $this->input->post('test_category'),
            'category_id' => $this->input->post('test_category_main'),
            'sub_category_id' => $this->input->post('test_sub_category_main'),
            // 'cost'=>$this->input->post('cost'),
            'sale'=>$sale_sum,
            'user_id' => $this->input->post('user_id'),
            'created_at' => date("Y-m-d H:i:s"),
            'cost_code_id' => $cost_code,
            'billing_code_id' => implode(",", $this->input->post('billing_code')),
			'cost' => $cost_sum,
            'path_index' => $labInitials . "-" . date("y-m") . "-" . date("hi")
        );

        $this->db->trans_start();
        $this->db->insert('laboratory_tests', $data);
        $laboratory_test_id = $this->db->insert_id();
        $this->db->insert('lab_test', ['lab_id' => $lab_id, 'laboratory_test_id' => $laboratory_test_id]);

//        if (is_array($laboratory_test_category_ids) && !empty($laboratory_test_category_ids)) {
//            foreach ($laboratory_test_category_ids as $laboratory_test_category_id) {
//                $this->db->insert('laboratory_test_hierarchy', ['laboratory_test_id' => $laboratory_test_id, 'hospital_test_hierarchy_id' => $laboratory_test_category_id]);
//            }
//        }

        $last = $this->db->last_query();
        $this->db->trans_complete();
        $json['type'] = 'success';
        $json['msg'] = 'Laboratory Test Inserted successfully.';
        echo json_encode($json);
        die;
    }

    public function edit_test()
	{
        if ($this->group_type !== 'A' && $this->group_type !== 'L') {
            redirect('/', 'refresh');
        }

//        echo $this->input->post('test_sub_category_main');exit;
//        echo '<pre>'; print_r($this->input->post()); echo'</pre>'; exit;
        $edit_id = $this->input->post('edit_id');
        $lab_id = $this->input->post('lab_id');
        $laboratory_test_category_ids = $this->input->post('laboratory_test_category_id');
//        echo print_r($this->input->post('billing_code'));
//        exit;
//        pexplode("-", $this->input->post('billing_code')); exit;
        $labName = $this->lab->get_lab_name($this->group_id);
        $labInitials = substr($labName["name"], 0, 4);

        $cost_code = implode(",", $this->input->post('cost_code'));
		$cost_sum = $this->lab->get_cost_price($cost_code);
	    $cost_sum= $cost_sum[0]['total_cost'];

		$billing_code = implode(",", $this->input->post('billing_code'));
		$sale_sum = $this->lab->get_sale_price($billing_code);
	    $sale_sum= $sale_sum[0]['total_sale'];


        $data = array(
            'speciality_group_id' => $this->input->post('specialty_id'),
            'test_id' => $this->input->post('test_id'),
            'department_id' => $this->input->post('department_id'),
            'specialty_id' => $this->input->post('specialty_id'),
            'lab_ref_name' => $this->input->post('lab_ref'),
            'name' => $this->input->post('test_name'),
            'test_category_id' => $this->input->post('test_category'),
            'category_id' => $this->input->post('test_category_main'),
            'sub_category_id' => $this->input->post('test_sub_category_main'),
            // 'cost'=>$this->input->post('cost'),
            'sale'=>$sale_sum,
            'user_id' => $this->input->post('user_id'),
            'created_at' => date("Y-m-d H:i:s"),
            'cost_code_id' => $cost_code,
            'billing_code_id' => implode(",", $this->input->post('billing_code')),
			'cost' => $cost_sum,
            'path_index' => $labInitials . "-" . date("y-m") . "-" . date("hi")
        );

        $this->db->trans_start();
        $this->db->where(array("id"=>$edit_id))->update('laboratory_tests', $data);
        $this->db->where(array("laboratory_test_id"=>$edit_id))->update('lab_test', ['lab_id' => $lab_id, 'laboratory_test_id' => $edit_id]);

        $this->db->where(array("laboratory_test_id"=>$edit_id))->delete('laboratory_test_hierarchy');

//        if (is_array($laboratory_test_category_ids) && !empty($laboratory_test_category_ids)) {
//            foreach ($laboratory_test_category_ids as $laboratory_test_category_id) {
//                $this->db->insert('laboratory_test_hierarchy', ['laboratory_test_id' => $edit_id, 'hospital_test_hierarchy_id' => $laboratory_test_category_id]);
//            }
//        }

        $last = $this->db->last_query();
        $this->db->trans_complete();
        $json['type'] = 'success';
        $json['msg'] = 'Laboratory Test updated successfully.';
        echo json_encode($json);
        die;
    }

    public function deleteLabTest($testId)
	{
        if ($this->group_type !== 'A' && $this->group_type !== 'L') {
            redirect('/', 'refresh');
        }

        $this->db->where(array("id"=>$testId))->delete('laboratory_tests');
        $this->db->where(array("laboratory_test_id"=>$testId))->delete('lab_test');

        $this->db->where(array("laboratory_test_id"=>$testId))->delete('laboratory_test_hierarchy');

        redirect("laboratory/laboratory_add_test");
    }

    public function get_laboratory_test_data_ajax() {
        $draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
       $query = $this->lab->get_laboratory_test_data_ajax($start,$length);
//        echo $this->db->last_query();
//echo "<pre>";print_r($query->result_array());exit;

        $data = [];
        foreach ($query->result_array() as $key => $row) {

            $get_pic_path = get_profile_picture($row['profile_picture_path'], $row['first_name'], $row['last_name']);
            $row['new_profile_pic'] = $get_pic_path;
            $actionsColData = '<div class="dropdown dropdown-action">
                                <a href="javascript:;" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                   aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <textarea id="test_data_'.$row["id"].'" style="display: none">'.json_encode($row).'</textarea>
                                    <a class="dropdown-item edit_btn" href="javascript:void(0)" data-id="'.$row["id"].'"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="'.base_url().'laboratory/deleteLabTest/'.$row["id"].'"><i class="fa fa-trash-o m-r-5"></i> Delete</a>

                                </div>
                            </div>';
            $data[] = array(
                'checkbox' => '<input type="checkbox" value="' . $row['id'] . '">',
                'name' => $row['name'],
                'test_id' => $row['test_id'],
                'lab_name' => str_replace(",", "<br/>", $row['lab_name']),
                'test_category' => str_replace(",", "<br/>", $row['test_category']),
                'lab_ref' => $row['lab_ref_name'],
                'speciality_group' => '<span class="badge badge-success">' . $row['spec_grp_name'] . '</span>',
                'cost' => $row['cost'],
                'sale' => $row['sale'],
                'user_id' => $row['user_name'],
                'created_at' => $row['created_at'],
                'action' => $actionsColData
            );
        }

        $result = array(
            "draw" => $draw,
            "recordsTotal" => $this->lab->get_laboratory_test_count_all(),
            "recordsFiltered" => $this->lab->get_laboratory_test_count_all(),
            "data" => $data
        );
        echo json_encode($result);
        exit();
    }

    public function get_laboratory_test_hirarchy() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }

        $level = $this->input->post('level');
        $parent_id = $this->input->post('parent_id');

        $test_category_hirarchy = $this->lab->get_laboratory_test_hirarchy($parent_id, $level);
        $data = [];
        if (is_array($test_category_hirarchy) && !empty($test_category_hirarchy)) {
            foreach ($test_category_hirarchy as $test_category) {
                $data[] = [
                    'text' => $test_category['name'],
                    'nodes' => $this->lab->get_test_category_hirarchy_children($test_category['id'], $test_category['level']),
                    'id' => $test_category['id'],
                    'parent_id' => $test_category['id'],
                    'level' => $test_category['level'],
                    'has_level' => $test_category['has_level'],
                ];
            }
        }

        echo json_encode($data);
        exit();
    }

    public function get_lab_departments() {
        if (!in_array($this->group_type, ['A', 'LA', 'H', 'D'])) {
            $this->output->set_status_header(405)->set_output("Not Authorized");
            return;
        }
        $lab_id = $this->input->get('lab_id');
        // Get related hospital
        $this->load->model('DepartmentModel', 'department');
        try {
            $departments = $this->department->get_laboratory_department($lab_id);

            $labName = $this->lab->get_lab_name($lab_id);
            $labInitial = $labName['first_initial'].$labName['last_initial'];
            $labTestRef = $this->lab->lab_ref_test_no($labInitial);
            $data_array["test_id"] = $labTestRef["test_id"];
            $data_array["ref_name"] = $labTestRef["ref_name"];



//            echo "<pre>";
//            print_r($departments); 
//            exit;
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode(array('status' => 'success', 'departments' => $departments,'lab_test_codes'=>$data_array)));
        } catch (Exception $e) {
            $this->output->set_status_header(404)->set_output("Laboratory Not found");
            return;
        }
    }

    public function add_category() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }

        $this->load->view('doctor/inc/header-new');
        $this->load->view('laboratory/add_category');
        $this->load->view('doctor/inc/footer-new');
    }

    public function getDataAgainstBillingCode() {
        $POST = $this->input->post("NULL", TRUE);
        $result = $this->invoice_model->getCodeDetails($this->input->post('billingCode'));

        $html = "";
        foreach ($result as $resKey => $resValue) {
            $html .= '<table class="table table-striped custom-table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>PathHub Index</th>
                        <th>Department</th>
                        <th>Category</th>
                        <th>Code Type</th>
                        <th>Code Name</th>
                        <th>Rate</th>
                        <th>Country </th>
                        <th>Description</th>
                      
                    </tr>
                </thead>';

            $cnt = 0;
            foreach ($result as $resKey => $resValue) {
                $cnt ++;


                $html .= '<tr>
                        <td>' . $cnt . '</td>
                        <td>' . $resValue["pathhub_index"] . '</td>
                        <td>' . $resValue["department_name"] . '</td>
                        <td>' . $resValue["category_name"] . '</td>
                        <td>' . $resValue["code_type"] . '</td>
                        <td>' . $resValue["billing_code"] . "-" . $resValue["billing_code_name"] . '</td>
                        <td>' . $resValue["rate"] . " " . $resValue["currency"] . '</td>
                        <td>' . $resValue["country"] . '</td>
                        <td>' . $resValue["description"] . '</td>
                       
                        
                    </tr>';
            }

            $html .= '</tbody> </table>';

            echo $html;
        }
    }

    public function allLoginUsers() {
        $data['usersLogins'] = $this->lab->getUsersLogins(TRUE);
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $explodeDate = explode(" - ", $this->input->post("start_end_date"));
            $data['usersLogins'] = $this->lab->getUsersLogins(TRUE, $explodeDate);
            $data['date_filtered'] = $this->input->post("start_end_date");
        }
        $data['route'] = "laboratory/";


        $data['styles'] = array(
            'css/daterangepicker.css'
        );
        $data['javascripts'] = array(
            'js/daterangepicker.js',
            'js/custom_js/activities.js');
        $this->load->view('templates/header-new', $data);
        $this->load->view('institute/login_user_list', $data);
        $this->load->view('templates/footer-new', $data);
    }

    public function getLoginDetail($id = FALSE) {
        $explodeId = explode("___", base64_decode($id));
        $data['usersLogins'] = $this->lab->getLoginDetail($explodeId);
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $explodeDate = explode(" - ", $this->input->post("start_end_date"));
            $data['usersLogins'] = $this->lab->getLoginDetail($explodeId, $explodeDate);
            $data['date_filtered'] = $this->input->post("start_end_date");
        }
        $data['route'] = "laboratory/";

        $data['styles'] = array(
            'css/daterangepicker.css'
        );
        $data['javascripts'] = array(
            'js/daterangepicker.js',
            'js/custom_js/activities.js');
        $this->load->view('templates/header-new', $data);
        $this->load->view('institute/login_user_detail', $data);
        $this->load->view('templates/footer-new', $data);
    }

    public function showUserActivity($id = FALSE) {
        $explodeId = base64_decode($id);
        $data['usersLogins'] = getUserTrackActivity($explodeId);
        $data['route'] = "laboratory/";
        $this->load->view('templates/header-new', $data);
        $this->load->view('institute/login_user_activities', $data);
        $this->load->view('templates/footer-new', $data);
    }

    public function update_prefixes() {
        $lab_id = $this->input->post('lab_info_id');
        $update_data = array(
            "lab_specimen_prefix" => $this->input->post('specimen_prefix'),
            "lab_specimen_block_prefix" => $this->input->post('specimen_block_prefix'),
            "lab_no_prefix" => $this->input->post('lab_no_prefix')
        );
        $result = $this->Laboratory_model->update_lab_prefixes($update_data, $lab_id);
        $response = array();
        if ($result) {
            $response['type'] = 'success';
            $response['msg'] = 'Prefixes updates successfully';
        } else {
            $response['type'] = 'error';
            $response['msg'] = 'Something went wrong!';
        }
        echo json_encode($response);
        exit;
    }

    function fetch_all_linked_hospital() {

        $lab_row = $this->ion_auth->get_users_groups()->row();
        $lab_id = $lab_row->id;
        $get_file_path_query = $this->db->query("SELECT * FROM `groups` where group_type = 'H' and id IN(select group_id from hospital_group where group_id=$lab_id)");
        $res = $get_file_path_query->result();
        return $res;
    }

function testimportcsv() 
        {
        if($_REQUEST) 
		{
		//print_r($_REQUEST);
		
            $fileName = $_FILES["UploadCSV"]["tmp_name"];
			print $_FILES["UploadCSV"]["size"];
			
			////�xit;
			if ($_FILES["UploadCSV"]["size"] > 0) 
			{
                $postdata = array();
                $file = fopen($fileName, "r");
                $i = 0;
                $j = 1;
                $records_data = "";

                $hospital_row = $this->ion_auth->get_users_groups()->row();
                $hospital_id = $hospital_row->id;
                $f_initial = '';
                $l_initial = '';
                if (!empty($this->ion_auth->group($hospital_row->id)->row()->first_initial)) {
                    $f_initial = $this->ion_auth->group($hospital_row->id)->row()->first_initial;
                }
                if (!empty($this->ion_auth->group($hospital_row->id)->row()->last_initial)) {
                    $l_initial = $this->ion_auth->group($hospital_row->id)->row()->last_initial;
                }
                if (!empty($f_initial) && !empty($l_initial)) {
                    $last_d = str_pad($j, 4, "0", STR_PAD_LEFT);
                    $batch_no = $f_initial . $l_initial . '.' . date('y') . '.' . $last_d;
                } else {
                    $last_d = str_pad($j, 4, "0", STR_PAD_LEFT);
                    $batch_no = "AD" . '.' . date('y') . '.' . $last_d;
                }
			    while (($column = fgetcsv($file, 10000, ",")) !== FALSE) 
				{
				print "<pre>";
				print_r($column);

						$lab_row = $this->ion_auth->get_users_groups()->row();
						//$request['user_id'] = $lab_row->id;
				
                    if ($i >= 1) {
                        if (isset($column[0])) {
                            $request['test_category_id'] = $column[0];
                        }
						if (isset($column[1])) {
                            $request['test_subcategory_id'] = $column[1];
                        }
                        if (isset($column[2])) {
                            $request['name'] = $column[2];                            
                        }
                        if (isset($column[3])) {
                         //   $request['dob'] = $column[3];                           
                        }
                        if (isset($column[4])) {
                            $request['department_id'] = $column[4];                            
                        }
                        if (isset($column[5])) {
                            $request['specialty_id'] = $column[5];
                        }
                        if (isset($column[6])) {
                            $request['billing_code_id'] = $column[6];
                        }
					
					 $labName = $this->lab->get_lab_name($lab_row->id);
                     $labInitials = substr($labName["name"], 0, 4);
	
                         $request['lab_ref_name'] = $labInitials;
                         $request['cost'] = "";
                         $request['sale'] = "";		
                         $request['created_at'] = date("Y-m-d H:i:s");
						 $request['path_index'] = $labInitials . "-" . date("y-m") . "-" . date("hi");
							
						$this->db->insert('laboratory_tests',$request);
                        $lab_request['lab_id'] = $lab_row->id;
						$lab_request['laboratory_test_id'] = $this->db->insert_id();
                        $this->db->insert('lab_test',$lab_request);
                        $laboratorycate_id=1;
$this->db->insert('laboratory_test_hierarchy', ['laboratory_test_id' => $this->db->insert_id(), 'hospital_test_hierarchy_id' => $laboratorycate_id]);

                        if ($column[1] != '') {/*
                            $get_serial_number = $this->db->query("SELECT * FROM request ORDER BY uralensis_request_id DESC LIMIT 1")->row_array();
                            if ($get_serial_number == '') {
                                $req_id_before_insert = 1;
                            } else {
                                $req_id_before_insert = $get_serial_number['uralensis_request_id'];
                            }
                            $serial_query = $this->db->query("SELECT serial_number FROM request WHERE uralensis_request_id = $req_id_before_insert");
                            if ($serial_query->num_rows() > 0) {
                                $row = $serial_query->row();
                                $last_inserted_serial_number = $row->serial_number;
                                $keyParts = explode('-', $last_inserted_serial_number);
                                if ($keyParts[1] == date('y')) {
                                    $Klast_d = str_pad(($keyParts[2] + 1), 4, "0", STR_PAD_LEFT);
                                    $key = 'PCI' . "." . $keyParts[1] . "." . ($Klast_d);
                                } else {
                                    $key = 'PCI' . "." . date("y") . ".00001";
                                }
                            } else if ($serial_query->num_rows() < 0) {
                                $key = 'PCI.' . date('y') . '.00001';
                            } else {
                                $key = 'PCI.' . date('y') . '.00001';
                            }
                            $this->db->insert('patients', $patients);
                            $request['patient_id'] = $this->db->insert_id();
                            $request['record_batch_id'] = $batch_no;
                            $request['serial_number'] = $key;
                            $this->db->insert('request', $request);
                            $request_assignee['request_id'] = $this->db->insert_id();
                            //$request_assignee['assign_status']=0;
                            //$request_assignee['user_id']=0;
                            //$this->db->insert('request_assignee', $request_assignee);
                        */}
                    }
                    $i++;
                    $j++;
                }
                redirect('laboratory/laboratory_add_test', 'refresh');
                return;
            } else {
                redirect('laboratory/laboratory_add_test', 'refresh');
                return;
            }
        } else {
            print "error";
        }
        exit;
    }

    public function labsetting() {
        $data['javascripts'] = array(
            'js/custom_js/laboratory_dashboard.js',
        );
        $data['countries'] = $this->Institute_model->get_countries();
        $data['usersLogins'] = $this->lab->getUsersLogins();
        $lab_id = $this->ion_auth->user()->row()->id;
        $group_row = $this->ion_auth->get_users_groups()->row();
        $group_id = $group_row->id;
       
       $getNewGroupId = "SELECT * FROM  users_groups where institute_id > 0 and user_id = $lab_id";
       $getNewGroupIdRes = $this->db->query($getNewGroupId)->result_array();
       $newGroupId = $getNewGroupIdRes[0]["institute_id"];
       //print_r($getNewGroupIdRes); exit;  
        
        
//        echo $group_id; exit; 

        if ($this->input->method() === 'get') {
            $data = array();
            $h_f_data = array();
            $h_f_data['javascripts'] = array(
                '/js/typeahead.jquery.js',
                '/newtheme/js/custom_js/admin_settings.js',
                '/js/institute/settings_lab_users.js',
                'password/js/jquery.passwordRequirements.min.js',
                'password/js/custom.js'
            );
            $h_f_data['styles'] = array('password/css/jquery.passwordRequirements.css');

            $data['countries'] = $this->Institute_model->get_countries();
            $data['errors'] = FALSE;
            if (!empty($_SESSION['form_data'])) {
                $data['errors'] = TRUE;
                $data['hospital_data'] = $_SESSION['form_data'];
            } else {
                $hospital_data = $this->Institute_model->get_hospital_information();
                $data['hospital_data'] = $hospital_data;
            }

            $data["getAllLabsUsersGroup"] = $this->Institute_model->getLabsUsersGroup();
            $lab_row = $this->ion_auth->get_users_groups()->row();
            $lab_id = $lab_row->id;


//                echo $lab_id; exit; 

            $get_hosptial_count = $this->db->query("SELECT count(*) as total_hosp FROM `groups` where group_type = 'H' and id IN(select hospital_id from hospital_group where group_id=$lab_id)");
            $data['get_hosp_count'] = $get_hosptial_count->result();


            $get_file_path_query = $this->db->query("SELECT * FROM `groups` where group_type = 'H' and id IN(select hospital_id from hospital_group where group_id=$lab_id)");
            $data['hospital_count'] = $get_hosptial_count->result();

            $pathologistArr = $this->Userextramodel->getAllusersForadmin($group_id);
            $data["pathologist_count"] = count($pathologistArr);

            $data['lab_users'] = $this->Laboratory_model->get_lab_users();
            $lab_information = $this->Laboratory_model->get_lab_information($newGroupId);
            $data["group_type"] = $this->group_type; 
            $data["group_id"] = $this->group_id; 
            $data["user_id"] = $this->user_id; 
           // echo $data["user_id"]."-".$data["group_id"];exit;

            $data['lab_info'] = $lab_information;
            $this->load->view('templates/header-new');
            $this->load->view('laboratory/lab_edit', $data);
            $this->load->view('templates/footer-new', $h_f_data);
        } else if ($this->input->method() === 'post') {

            $this->form_validation->set_rules('laboratory_name', 'Institute Name', 'trim|required');
            $this->form_validation->set_rules('laboratory_initials_1', 'First Initial', 'trim|required|exact_length[1]');
            $this->form_validation->set_rules('laboratory_initials_2', 'Second Initial', 'trim|required|exact_length[1]');
            $this->form_validation->set_rules('laboratory_email', 'Email', 'trim|valid_email');
            if ($this->form_validation->run() === TRUE) {
                $main_group_info = array(
                    'description' => $this->input->post('laboratory_name'),
                    'first_initial' => $this->input->post('laboratory_initials_1'),
                    'last_initial' => $this->input->post('laboratory_initials_2'),
                    'name' => strtolower(str_replace(' ', '', $this->input->post('laboratory_name'))),
                );
                $lab_info = array(
                    'lab_address' => $this->input->post('lab_address'),
                    'lab_country' => $this->input->post('lab_country'),
                    'lab_city' => $this->input->post('lab_city'),
                    'lab_state' => $this->input->post('lab_state'),
                    'lab_post_code' => $this->input->post('lab_post_code'),
                    'lab_email' => $this->input->post('laboratory_email'),
                    'lab_phone' => $this->input->post('lab_phone'),
                    'lab_mobile' => $this->input->post('lab_mobile'),
                    'lab_fax' => $this->input->post('lab_fax'),
                    'lab_website' => $this->input->post('lab_website'),
                );

                $this->Laboratory_model->save_lab_data($main_group_info, $lab_info);
                return redirect('/laboratory/labsetting', 'refresh');
            } else {
                
            }
        }
    }

     /* Upload SOP Files */
    public function upload_docs_form() {
        $user_id = $this->ion_auth->user()->row()->id;
        //$hospital_group_id = $this->ion_auth->get_users_groups($user_id)->row()->id;

        if (isset($_FILES['upload_doc']) && $_FILES['upload_doc']['name'] != '') {
            $ref_key = $user_id;
            $upload_doc = $this->do_upload_lab_files('upload_doc', $ref_key);
            if ($upload_doc === FALSE) {
                $error = array('upload_error' => $this->upload->display_errors());
                $this->session->set_flashdata('upload_error', $error['upload_error']);
                redirect('laboratory');
            } else {
                $data = $this->upload->data();
                $checklist_file_name = $data['file_name'];
                $file_path = "lab_uploads/" . $checklist_file_name;
                $file_type = $this->input->post('file_type');
            }

            if (!empty($checklist_file_name)) {
                $sop_upload_data = array(
                    'file_name' => !empty($checklist_file_name) ? $checklist_file_name : '',
                    'file_path' => !empty($file_path) ? $file_path : '',
                    'file_type' => !empty($file_type) ? $file_type : '',
                    'uploaded_by' => !empty($user_id) ? $user_id : '',
                    'uploaded_at' => date('Y-m-d H:i:s')
                );
                $this->db->insert('uralensis_upload_forms', $sop_upload_data);
                $this->session->set_flashdata('upload_success', 'File upload successfully.');
                redirect('laboratory');
            }
        }
    }

    /* Upload Laboratory Files */
    public function do_upload_lab_files($lab_file_name, $ref_key) {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $config['upload_path'] = './lab_uploads/';
        $config['allowed_types'] = 'pdf|doc|xls|xlsx|png|jpeg|jpg';
        $config['max_size'] = 20400;
        $config['overwrite'] = TRUE;
        $new_name = $ref_key . '-' . $_FILES[$lab_file_name]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($lab_file_name)) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /* Download SOP Files */
    public function download_forms($filename) {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        // load download helder
        $this->load->helper('download');
        // read file contents
        $data = file_get_contents(base_url('lab_uploads/' . $filename));
        force_download($filename, $data);
    }

    /* Delete SOP Files */
    public function delete_upload_docs($file_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $record_id = $this->session->userdata('record_id');
        $hospital_id = $this->ion_auth->user()->row()->id;
        if (isset($file_id) && isset($hospital_id)) {
            $get_file_path_query = $this->db->query("SELECT * FROM uralensis_upload_forms WHERE id = $file_id ");
            $get_file_path = $get_file_path_query->result();
            $this->db->query("DELETE FROM uralensis_upload_forms WHERE id = $file_id");
            unlink($get_file_path[0]->file_path);
            $delete_file = '<p class="bg-warning" style="padding:7px;">File Successfully Deleted.</p>';
            $this->session->set_flashdata('delete_file', $delete_file);
            redirect('laboratory', 'refresh');
        }
    }

    /* Track for viewer */
    public function track_viewer(){
        $json['status'] = "error";
        $json['message'] = "There might be some error. Please try again";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $userId = $this->ion_auth->user()->row()->id;
            $dataArr = array(
                'document_id'   => $this->input->post('document_id'),
                'viewer_id'     => $userId,
                'created_by'    => $userId,
                'created_at'    => date('Y-m-d H:i:s')
            );
            $this->db->insert("document_viewers", $dataArr);
            if ($this->db->insert_id() > 0) {
                $json['status'] = "success";
                $json['message'] = "Viewer data save successfully";
            }
        }
        echo json_encode($json); exit;
    }

    public function supportZoneArea(){
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $lab_id = $this->group_id;

//        $this->load->view('doctor/inc/header-new');
//        $this->load->view('laboratory/add_category');
//        $this->load->view('doctor/inc/footer-new');

        if($_SERVER['REQUEST_METHOD']=="POST"){

            $status = $this->input->post("status");
            if($status=="delete"){

            }
            $area_name = $this->input->post("leave_group");

            $insData['lab_id'] = $lab_id;
            $insData['area'] = $area_name;
            $checkStatus = $this->db->insert("lab_support_area",$insData);
            if($checkStatus){
                $json['status'] = 'success';
                $json['message'] = 'Data added successfully.';
                echo json_encode($json);
            } else {
                $json['status'] = 'fail';
                $json['message'] = 'Failed to add data';
                echo json_encode($json);
            }
            exit;

        }

        $getLabArea = $this->db->select("*")->where(array("lab_id"=>$lab_id))->get("lab_support_area")->result();

        $data['lab_areas'] = $getLabArea;

        $this->load->view('templates/header-new');
        $this->load->view('laboratory/support_category', $data);
        $this->load->view('templates/footer-new', $data);
    }

    public function getLabSupportArea(){
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $lab_id = $this->input->post("dataId");
            $getLabArea = $this->db->select("*")->where(array("lab_id"=>$lab_id))->get("lab_support_area")->result();
            $createHtml= "";
            $createHtml .= "<option value=''>Select Area</option>";
            foreach ($getLabArea as $labArea){
                $createHtml .= "<option value='".$labArea->id."'>".$labArea->area."</option>";
            }
            $json['html'] = $createHtml;
            echo json_encode($json);
            exit;

        }
    }

    public function create_user()
    {
        // Post Request Part
        track_user_activity();
        $this->load->model('Admin_model');
        $this->data['title'] = $this->lang->line('create_user_heading');
        $this->data['javascripts'] = array('password/js/jquery.passwordRequirements.min.js', 'password/js/custom.js', 'js/auth/create_user.js');
        array_unshift($this->h_data['styles'], 'password/css/jquery.passwordRequirements.css');
        $includes['styles'] = array('password/css/jquery.passwordRequirements.css');

        if (!$this->ion_auth->logged_in())
        {
            redirect('auth', 'refresh');
        }

        $tables = $this->config->item('tables', 'ion_auth');
        $identity_column = $this->config->item('identity', 'ion_auth');
        $this->data['identity_column'] = $identity_column;

        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
//        if ($identity_column !== 'email') {
//            $this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
//            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email');
//        } else {
//            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email|callback__unique_email');
//        }
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
        $this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
        $this->form_validation->set_rules('user_role', 'User role is required', 'required');
        $this->form_validation->set_rules('memorable', 'Memorable word is required', 'required');

        $form_submitted = true;

        if ($this->form_validation->run() === TRUE)
        {
            // If Post Data Valid. Complete Save Data

            $last_user_id = $this->db->select_max("id")->get("users")->result_array();
            if (empty($last_user_id)) {
                $last_user_id = '';
            } else {
                $last_user_id = intval($last_user_id[0]["id"]) + 1;
            }

            $username = strtolower($this->input->post('first_name')) . '_' . strtolower($this->input->post('last_name')) . $last_user_id;
            $email = $this->input->post('email');
            $identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
            $password = $this->input->post('password');
            $user_role = $this->input->post('user_role');
            $group_id = $user_role;//$this->Admin_model->get_group_id(trim($user_role));
            if($this->input->post('user_role')==62)
            {
                $is_hospital_admin = 1;
            }
            else
            {
                $is_hospital_admin = 0;
            }
            $profile_picture = DEFAULT_PROFILE_PIC;

            // Upload profile picture if exists

            if (!empty($_FILES['profile_pic']["name"])) { //when user submit basic profile info with profile image
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10000';
                $config['file_name'] = time() . '-' . $_FILES['profile_pic']["name"];

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('profile_pic'))
                {
                    $error = 0;
                } else {
                    $filedata = array('upload_data' => $this->upload->data());
                    $profile_image = $filedata['upload_data']['file_name'];
                    $image_path = 'uploads/' . $config['file_name'];
                    $profile_picture = $image_path;
                }
            }

            $additional_data = [
                'username' => $this->db->escape($username),
                'first_name' => $this->db->escape($this->input->post('first_name')),
                'last_name' => $this->db->escape($this->input->post('last_name')),
                'company' => $this->db->escape($this->input->post('company')),
                'phone' => $this->db->escape($this->input->post('phone')),
                'memorable' => $this->db->escape($this->input->post('memorable')),
                'is_hospital_admin' => $is_hospital_admin,
                'profile_picture_path' => $this->db->escape($profile_picture),
                'user_type' => $this->db->escape($user_role),
                'sub_role' => $this->input->post('user_sub_role'),
                'group_id' => $group_id
            ];

            // Check User Group
            $groups_array = array($group_id);

            $user_ids=$this->ion_auth->register($identity, $password, $email, $additional_data, $groups_array);
            if ($user_ids)
            {
                $userRoles = $this->input->post('Hgroup_id');
                foreach ($userRoles as $role=>$roleData){
                    $temp_data = array(
                        'user_id' => $user_ids,
                        'group_id' => NULL,
                        'institute_id' => $roleData
                    );
                    $this->db->insert('users_groups', $temp_data);

                    $hos_data = array(
                        'hospital_id' => $roleData,
                        'group_id' => $user_ids
                    );

                    $this->db->insert('hospital_group', $hos_data);
                }
                $this->sendVerificationEmail($email);
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("auth", 'refresh');
                return;
            }
        }

        // Display the create user form
        // Set the flash data error message if there is one
//        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
        $this->data['first_name'] = [
            'name' => 'first_name',
            'id' => 'first_name',
            'type' => 'text',
            'value' => $this->form_validation->set_value('first_name'),
        ];
        $this->data['last_name'] = [
            'name' => 'last_name',
            'id' => 'last_name',
            'type' => 'text',
            'value' => $this->form_validation->set_value('last_name'),
        ];
        $this->data['email'] = [
            'name' => 'email',
            'id' => 'email',
            'type' => 'text',
            'value' => $this->form_validation->set_value('email'),
        ];
        $this->data['company'] = [
            'name' => 'company',
            'id' => 'company',
            'type' => 'text',
            'value' => $this->form_validation->set_value('company'),
        ];
        $this->data['phone'] = [
            'name' => 'phone',
            'id' => 'phone',
            'type' => 'text',
            'value' => $this->form_validation->set_value('phone'),
        ];
        $this->data['password'] = [
            'name' => 'password',
            'id' => 'password',
            'type' => 'password',
            'value' => $this->form_validation->set_value('password'),
        ];
        $this->data['password_confirm'] = [
            'name' => 'password_confirm',
            'id' => 'password_confirm',
            'type' => 'password',
            'value' => $this->form_validation->set_value('password_confirm'),
        ];
        $this->data['memorable'] = [
            'name' => 'memorable',
            'id' => 'memorable',
            'type' => 'text',
            'value' => $this->form_validation->set_value('memorable'),
        ];
        $this->data['user_roles'] = $this->Admin_model->getUserGroupsuserCreation();
        $this->data['user_typeH'] = $this->Admin_model->getGroupsDateByType('H');
        $this->data['user_typeL'] = $this->Admin_model->getGroupsDateByType('L');

        $this->data['user_typeP'] = $this->Admin_model->getGroupsDateByType('P');

        $this->load->view('templates/header-new', $includes);
        $this->load->view('laboratory/create_new_user', $this->data);
        $this->load->view('templates/footer-new');
    }

    public function sendVerificationEmail($email) {
        $message = $this->load->view("auth/email/verify_email", array('email' => $email), TRUE);
        $config = array(
            'mailtype' => 'html',
            'charset' => 'utf-8', //iso-8859-1
            'newline' => '\r\n',
            'wordwrap' => TRUE
        );
        $this->load->library('email', $config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
//        $logo = $this->email->attach("./uploads/logo/uralensis_latest.jpg", "inline");
//        $cid = $this->email->attachment_cid($logo);
        $this->email->from($this->session->email, 'PathHub');
        $this->email->to($email);
//        $this->email->set_header('Content-Type', 'text/html');
        $this->email->subject("Pathology Healthcare Email Verification");
        $this->email->message($message);
        $this->email->send();
//        if(!$this->email->send()){
//            print_r($this->email->print_debugger());
//        }
    }
}

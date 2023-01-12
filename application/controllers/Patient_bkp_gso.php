<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Auth Controller
 *
 * @package    CI
 * @subpackage Controller
 */
class Patient extends CI_Controller
{

    private $h_data = array('styles' => array('css/linearicons.css', 'css/patient/style.css'));
    private $f_data = array('javascripts' => array('js/patient/patients.js'));

    /**
     * Constructor to load models and helpers
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        // Libs and helper
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language', 'cookie', 'activity_helper', 'dashboard_functions_helper', 'ec_helper'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->load->model('PatientModel', 'patient');
        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            return redirect('', 'refresh');
        }
        $group_type = $this->ion_auth->get_users_groups()->row()->group_type;
        if ($group_type != 'A' && $group_type != 'D' && $group_type != 'H' && $group_type != 'HA' && $group_type != 'L') 
		{
            //return redirect('', 'refresh');
        }
    }

    public function index()
    {   	     
        $data = array();
        $group_type = $this->ion_auth->get_users_groups()->row()->group_type;
        
        $data['group_type'] = $group_type;
		if(in_array($group_type,LAB_GROUP))
		{
           $data['hospitals'] = $this->patient->fetch_hospitals();        
		}
		else
		{
		$data['hospitals'] = $this->patient->fetch_hospitals(); 	
		}
		$this->load->view('templates/header-new.php', $this->h_data);
        $this->load->view('patient/patients.php', $data);
        $this->load->view('templates/footer-new.php', $this->f_data);
    }
    
    public function view($id, $action = "", $field = "")
    {
        switch ($action) 
		{
            case "update":
                $this->_update_patient($id, $field);
				
                break;
            case "delete":
                $this->_delete_patient($id);
				
                break;
            case "":
                $this->_show_view_page($id);
				
                break;
            default:
                $this->_show_view_page($id);
        }
    }

    private function _show_view_page($id)
    {
		
		
		
        if (!is_numeric($id)) {
            //show_404();
            return;
        }
        $data = array();
		
		$group_type = $this->ion_auth->get_users_groups()->row()->group_type;
        $data['group_type'] = $group_type;
		
		
        try {
            $data['patient'] = $this->patient->get_patient_data($id);            
            $dob_obj = date_create($data['patient']['dob']);
            $today = new DateTime();
            $diff = $today->diff($dob_obj);
            $age = $diff->y;
            $data['patient']['age'] = $age;
            $dob = date_format($dob_obj, "dS M, Y");
            $dob_format = date_format($dob_obj, "Y-m-d");
            $data['patient']['dob'] = $dob;
			$data['patient']['hos_id'] = $data['patient']['hospital_id'];
            $data['patient']['nhs_format'] = format_nhs_number($data['patient']['nhs_number']);
            $data['patient']['dob_format'] = $dob_format;

            $data['patient']['pid'] = $this->patient->get_patient_id($data['patient']['patient_id']);

           // $data['patient']['address1'] = "";
           // $data['patient']['address2'] = "";
		   $data['patient']['address1']= $data['patient']['address_1'];
            $address_line = $data['patient']['address_1'];
            if (!empty($address_line)) {
                $address_line = explode("\n", $address_line);
                $data['patient']['address1'] = $address_line[0];
                if (count($address_line) > 1) {
                    $data['patient']['address2'] = $address_line[1];
                }
            }
		
		
       
			
        } catch (\Exception $e) {
           // show_404();
        }
		
		$data['hospitals'] = $this->patient->fetch_hospitals();	
		
		
        $data['records'] = $this->patient->get_patient_records($id);
        // echo $this->db->last_query();exit;
        $data['profile_picture_path'] = $this->patient->get_profile_picture($id);
        $this->load->view('templates/header-new.php', $this->h_data);
        $this->load->view('patient/patient.php', $data);
        $this->load->view('templates/footer-new.php', $this->f_data);
    }

    private function _update_patient($id, $field)
    {
        if ($this->input->method() !== "post") {
            $this->output->set_status_header(405);
            $this->output->set_output("Method not allowed");
            return;
        }
        switch ($field) {
            case "picture":
                if (empty($_FILES['profile_pic']["name"]) || empty($id) || !is_numeric($id)) {
                    $this->output->set_status_header(400);
                    $this->output->set_output("Please provide patient id and picture");
                    return;
                }
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10000';
                $config['file_name'] = time() . '-' . $_FILES['profile_pic']["name"];

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('profile_pic')) {
                    $this->output->set_status_header(500);
                    $this->output->set_output($this->upload->display_errors("", ""));
                    return;
                }

                $filedata = array('upload_data' => $this->upload->data());
                $profile_image = $filedata['upload_data']['file_name'];
                $image_path = 'uploads/' . $config['file_name'];
                $profile_picture = $image_path;

                try {
                    $this->patient->set_profile_picture($id, $profile_picture);
                    custom_log("Patient Profile pic set");
                    // Profile safely uploaded
                    return;
                } catch (Exception $e) {
                    if ($e->getCode() === 404) {
                        $this->output->set_status_header(404);
                        $this->output->set_output("Patient does not exists");
                    } else if ($e->getCode() === 400) {
                        $this->output->set_status_header(500);
                        $this->output->set_output("Profile picture not uploaded");
                    }
                }
                break;

            case "profile":
                $address1 = $this->input->post('address1');
                $address2 = $this->input->post('address2');
				$p_id_1 = $this->input->post('p_id_1');
                $p_id_2 = $this->input->post('p_id_2');

                $address = "$address1"." $address2";

                

                if (!empty($address1)) {
                    $address = $address1 . '\n' . $address2;
                }

                $hospital_id = $this->input->post('group');

                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'nhs_number' => $this->input->post('nhs_number'),
                    'gender' => $this->input->post('gender'),
                    'dob' => $this->input->post('dob'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'address_1' => $address,
					'p_id_1' => $this->input->post('p_id_1'),
					'p_id_2' => $this->input->post('p_id_2'),
                    'country' => $this->input->post('country'),
					'hospital_id' => $hospital_id,
                    'state' => $this->input->post('state'),
                    'city' => $this->input->post('city'),
                    'post_code' => $this->input->post('post_code'),
                    'updated_at' => date("Y-m-d H:i:s")
                );

                $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
                $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
               // $this->form_validation->set_rules('nhs_number', 'NHS Number', 'trim|required|exact_length[10]');
                $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
               // $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

                /*$res = $this->db
                ->where("hospital_id = ".$hospital_id." AND id != ".$id."")
                ->get("patients")->num_rows();

                if ($this->form_validation->run() == FALSE || $res > 0) {
                    custom_log(validation_errors(), 'Validation errors');
                    custom_log($res, 'Res');
					redirect("/patient/view/".$id, "refresh");
                    //$this->output->set_status_header(400);
                    //echo "Invalid input";
                    //return;
                }*/

                $this->db
                ->where('id', $id)
                ->update("patients", $data);

                redirect("/patient/view/".$id, "refresh");

                break;
            default:
			redirect("/patient/view/".$id, "refresh");
                //$this->output->set_status_header(404);
                //$this->output->set_output("Field not found");
        }
    }
    public function delete_bulk_patient(){
        $pt_ids = $this->input->post('patient_id');        
        if(!empty($pt_ids))
		{            
			for($i=0; $i<count($pt_ids); $i++){
                $count = $this->db->get_where('request', array('patient_id' => $pt_ids[$i]))->num_rows();                
                if($count==0)
                {
                    $this->db->where('id', $pt_ids[$i]);
                    $this->db->delete('patients');
                }
            }
		}
		redirect("/patient", "refresh");exit;
    }
    private function _delete_patient($id)
    {
		if($id!='')
		{
			$count = $this->db->get_where('request', array('patient_id' => $id))->num_rows();
			if($count==0)
			{
				$this->db->where('id', $id);
				$this->db->delete('patients');
			}
		}
		redirect("/patient", "refresh");
		exit;
    }

    public function unique_email($patient_id = "")
    {
        $email = $this->input->get('email');
        $group_id = $this->input->get('group_id');
        if (empty($email)) {
            $this->output
                ->set_status_header(400);
            echo "Please provide email";
            return;
        }
        $res = 0;
        if ($patient_id === "") {
            $res = $this->db->get_where('patients', array('email' => $email, 'hospital_id' => $group_id))->num_rows();
        } else {
            $res = $this->db
                ->where("email", $email)
                ->where("hospital_id", $group_id)
                ->where("id !=", $patient_id)
                ->get("patients")->num_rows();
        }
        $this->output
            ->set_content_type('application/json');

        if ($res === 0) {
            $this->output
                ->set_output(json_encode(TRUE));
        } else {
            $this->output
                ->set_output(json_encode(FALSE));
        }
    }

    public function unique_nhs($patient_id = "")
    {
        $nhs_number = $this->input->get('nhs_number');
        $group_id = $this->input->get('group_id');
        if (empty($nhs_number)) {
            $this->output
                ->set_status_header(400);
            echo "Please provide nhs number";
            return;
        }
        $res = 0;
        if ($patient_id === "") {
            $res = $this->db->get_where('patients', array('nhs_number' => $nhs_number, 'hospital_id' => $group_id))->num_rows();
        } else {
            $res = $this->db
                ->where("nhs_number", $nhs_number)
                ->where("hospital_id", $group_id)
                ->where("id !=", $patient_id)
                ->get("patients")->num_rows();
        }
        $this->output
            ->set_content_type('application/json');

        if ($res === 0) {
            $this->output
                ->set_output(json_encode(TRUE));
        } else {
            $this->output
                ->set_output(json_encode(FALSE));
        }
    }

    public function get_patients()
    {
        $data = array('data' => array());
        $res = $this->patient->fetch_patients();
        foreach ($res as $p) 
		{	
			$p_id=$p['patient_id'];
			$no_r=get_record_count('request',"patient_id=$p_id");
            $dob_obj = date_create($p['dob']);
            $today = new DateTime();
            $diff = $today->diff($dob_obj);
            $age = $diff->y.' Y';
            $dob = date_format($dob_obj, "dS M, Y") . '<br/>' . $age;
            $pt_id_1 = '1. --';
            $pt_id_2 = '<br> 2. --';
            if($p['p_id_1']) {
                $pt_id_1 = '1. '.$p['p_id_1'];
            }
            if($p['p_id_2']){
                $pt_id_2 = '<br> 2. '.$p['p_id_2'];
            }
            
            $patient = array(
                'id' => $p['patient_id'],
                'name' => $p['first_name'] . ' ' . $p['last_name']."<br>".$age.'/'.$p['gender'],
                'dob' => $pt_id_1.$pt_id_2,
                'nhs' => $p['email'].'<br>'.$p['phone'],
                'gender' => $p['address_1'].'<br>'.$p['post_code'].'<br>'.$p['country'],
                'hospital' => $p['description'],
				'Rcount' => $no_r,
            );
            array_push($data['data'], $patient);
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    public function add_patient()
    {
        $address1 = $this->input->post('address1');
        $address2 = $this->input->post('address2');

        $address = "";

        if (empty($address1) && !empty($address2)) {
            $address = $address2;
        }

        if (empty($address2) && !empty($address1)) {
            $address = $address1;
        }

        if (!empty($address2) && !empty($address1)) {
            $address = $address1 . '\n' . $address2;
        }


        $data = array(
            'hospital_id' => $this->input->post('group'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            /*'nhs_number' => $this->input->post('nhs_number'),*/
            'gender' => $this->input->post('gender'),
            'dob' => $this->input->post('dob'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'address_1' => $address,
            'country' => $this->input->post('country'),
            'state' => $this->input->post('state'),
			/*'p_id_1' => $this->input->post('p_id_1'),
            'p_id_2' => $this->input->post('p_id_2'),*/
            'city' => $this->input->post('city'),
            'post_code' => $this->input->post('post_code'),
            'medicare_card_no' => $this->input->post('post_code'),
            'hospital_status' => $this->input->post('hospital_status'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        );

        $this->form_validation->set_rules('group', 'Hospital', 'required|integer');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('hospital_status', 'Hospital Status', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        
        $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
       // $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        $res = $this->db
        ->where("hospital_id = ".$data['hospital_id']." AND dob = '".$data['dob']."'")
        ->get("patients")->num_rows();

        if ($this->form_validation->run() == FALSE || $res > 0) {
            custom_log(validation_errors(), 'Validation errors');
            custom_log($res, 'Res');
            $this->output->set_status_header(400);
            echo "Invalid input";
            return;
        }

        $this->db->insert('patients', $data);
        echo "Patient added";
    }

    public function save_flag_comments(){

        if (!empty($_POST['flag_comment'])) {
            $record_id = $_POST['record_id'];
            $flag_comments = $_POST['flag_comment'];
            $user_id = $this->ion_auth->user()->row()->id;
            $comments_data = array(
                'ufc_record_id' => $record_id,
                'ufc_comments' => strip_tags($flag_comments),
                'ufc_user_id' => $user_id,
                'ufc_timestamp' => time()
            );
            $this->db->insert('uralensis_flag_comments', $comments_data);
            echo json_encode(['type' => 'success', 'msg' => 'Comment added Successfully.']);die;
        } else {
            echo json_encode(['type' => 'error', 'msg' => 'Please Add The Comments First.']);die;
        }
    }
}

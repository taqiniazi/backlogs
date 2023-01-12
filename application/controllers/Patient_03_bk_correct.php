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
        if ($group_type != 'A' && $group_type != 'D' && $group_type != 'H' && $group_type != 'HA' && $group_type != 'L') {
            //return redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data = array();
        $group_type = $this->ion_auth->get_users_groups()->row()->group_type;

        $data['group_type'] = $group_type;
        if (in_array($group_type, LAB_GROUP)) {
            $data['hospitals'] = $this->patient->fetch_hospitals();
        } else {
            $data['hospitals'] = $this->patient->fetch_hospitals();
        }
        if ($_GET['p']) {
            $data['patient'] = $this->patient->get_patient_data($_GET['p']);
            $data['profile_picture_path'] = $this->patient->get_profile_picture($_GET['p']);
        }
        $this->load->view('templates/header-new.php', $this->h_data);
        $this->load->view('patient/patients.php', $data);
        $this->load->view('templates/footer-new.php', $this->f_data);
    }

    public function view($id, $action = "", $field = "")
    {
        switch ($action) {
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
            $data['profile_picture_path'] = $this->patient->get_profile_picture($_GET['p']);
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
            $data['patient']['address1'] = $data['patient']['address_1'];
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

                $address = "$address1" . " $address2";



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
                    'town' => $this->input->post('town'),
                    'hospital_id' => $hospital_id,
                    'state' => $this->input->post('state'),
                    'suburb' => $this->input->post('suburb'),
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

                redirect("/patient/view/" . $id, "refresh");

                break;
            default:
                redirect("/patient/view/" . $id, "refresh");
                //$this->output->set_status_header(404);
                //$this->output->set_output("Field not found");
        }
    }
    public function delete_bulk_patient()
    {
        $pt_ids = $this->input->post('patient_id');
        if (!empty($pt_ids)) {
            for ($i = 0; $i < count($pt_ids); $i++) {
                $count = $this->db->get_where('request', array('patient_id' => $pt_ids[$i]))->num_rows();
                if ($count == 0) {
                    $this->db->where('id', $pt_ids[$i]);
                    $this->db->delete('patients');
                }
            }
        }
        redirect("/patient", "refresh");
        exit;
    }
    private function _delete_patient($id)
    {
        if ($id != '') {
            $count = $this->db->get_where('request', array('patient_id' => $id))->num_rows();
            if ($count == 0) {
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
        if ($this->input->get('pid') && $this->input->get('pid') != 0) {
            $patient_id = $this->input->get('pid');
            // Check here if patient id exist then retun true
            $res = $this->db
                ->where("email", $email)
                ->where("hospital_id", $group_id)
                ->where("id =", $patient_id)
                ->get("patients")->num_rows();
            if($res != 0) {
                $this->output
                ->set_output(json_encode(TRUE));
                return true;
            }
        }
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
        // Check if patient type available
        $patient_type = $this->input->get('patient_type');
        if(!empty($patient_type)) $res = $this->patient->fetch_patients($patient_type);
            else $res = $this->patient->fetch_patients();
        $data = array('data' => array());
        foreach ($res as $p) {
            $p_id = $p['patient_id'];
            $no_r = get_record_count('request', "patient_id=$p_id");
            $dob_obj = date_create($p['dob']);
            $today = new DateTime();
            $diff = $today->diff($dob_obj);
            $age = $diff->y . ' Y';
            $dob = date_format($dob_obj, "dS M, Y") . '<br/>' . $age;
            $pt_id_1 = '1. --';
            $pt_id_2 = '<br> 2. --';
            if ($p['p_id_1']) {
                $pt_id_1 = '1. ' . $p['p_id_1'];
            }
            if ($p['p_id_2']) {
                $pt_id_2 = '<br> 2. ' . $p['p_id_2'];
            }

            // CHeck if medicare_card_no is exist or not
            if(empty($p['medicare_card_no'])) {
                $medicare_card_no ="<span style='font-weight:bold;'> (Private)</span>";
            } 
            else {
                $medicare_card_no = "";
            }

            $patient = array(
                'id' => $p['patient_id'],
                'name' => $p['first_name'] . ' ' . $p['last_name'] . "<br>" . $age . '/' . $p['gender'].$medicare_card_no,
                'dob' => $pt_id_1 . $pt_id_2,
                'nhs' => $p['email'] . '<br>' . $p['phone'],
                'gender' => $p['address_1'] . '<br>' . $p['suburb'] . '<br>' . $p['town'] . '<br>' . $p['post_code'],
                'hospital' => $p['description'],
                'Rcount' => $no_r,
                'hl7' => $p['hl7']
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
            'town' => $this->input->post('town'),
            'state' => $this->input->post('state'),
            /*'p_id_1' => $this->input->post('p_id_1'),
            'p_id_2' => $this->input->post('p_id_2'),*/
            'suburb' => $this->input->post('suburb'),
            'post_code' => $this->input->post('post_code'),
            'medicare_card_no' => $this->input->post('medicare_card_no'),
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
            ->where("hospital_id = " . $data['hospital_id'] . " AND dob = '" . $data['dob'] . "'")
            ->get("patients")->num_rows();

        if ($this->form_validation->run() == FALSE || $res > 1111111) {
            custom_log(validation_errors(), 'Validation errors');
            custom_log($res, 'Res');
            $this->output->set_status_header(400);
            echo "Invalid input";
            return;
        }
        if ($this->input->post('pid') && $this->input->post('pid') != 0) {
            unset($data['created_at']);
            $this->db
                ->where('id', $this->input->post('pid'))
                ->update("patients", $data);
            $pt_id = $this->input->post('pid');
        } else {
            $this->db->insert('patients', $data);
            $pt_id = $this->db->insert_id();
        }

        

        // Uploading Image
        if (!empty($_FILES['profile_pic']["name"]) && !empty($pt_id) && is_numeric($pt_id)) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '10000';
            $config['file_name'] = time() . '-' . $_FILES['profile_pic']["name"];
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('profile_pic')) {
                $filedata = array('upload_data' => $this->upload->data());
                $profile_image = $filedata['upload_data']['file_name'];
                $image_path = 'uploads/' . $config['file_name'];
                $profile_picture = $image_path;
                $this->patient->set_profile_picture($pt_id, $profile_picture);
            }
        }


        $other_data = array(
            'patient_id' => $pt_id,
            'mrn_number' => $this->input->post('mrn_number'),
            'title' => $this->input->post('title'),
            'other_name' => $this->input->post('other_name'),
            'nick_name' => $this->input->post('nick_name'),
            'home_contact' => $this->input->post('home'),
            'mobile' => $this->input->post('mobile'),
            'business_contact' => $this->input->post('business_contact'),
            'other_contact' => $this->input->post('other'),
            'fax' => $this->input->post('fax'),
        );
        $flag = false;;
        $count = $this->db->get_where('patient_other_details', array('patient_id' => $this->input->post('pid')))->num_rows();
        if ($this->input->post('pid') && $this->input->post('pid') != 0 && $count != 0) {
            $flag = true;
            $this->db
                ->where('patient_id', $this->input->post('pid'))
                ->update("patient_other_details", $other_data);
        } else {
            $flag = true;
            $this->db->insert('patient_other_details', $other_data);
        }
        if($flag && $this->input->post('rid')){
            $dob = date('Y-m-d', strtotime($this->input->post('dob')));
            $diff = date_diff(date_create($dob), date_create(date('Y-m-d')), TRUE);
            $age = $diff->format('%y');

            $Rdata = array(
                'f_name' => $_POST['first_name'],
                'sur_name' => $_POST['last_name'],
                'gender' => $_POST['gender'],
                'dob' => $_POST['dob'],
                'age' => $age,
                'nhs_number' => $_POST['mrn_number'],                
            );
            $this->db->where('patient_id', $this->input->post('pid'));
            $this->db->update('request', $Rdata);
        }
        echo $pt_id;
    }

    public function save_flag_comments()
    {

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
            echo json_encode(['type' => 'success', 'msg' => 'Comment added Successfully.']);
            die;
        } else {
            echo json_encode(['type' => 'error', 'msg' => 'Please Add The Comments First.']);
            die;
        }
    }
    public function update_health_info()
    {
        $comments_data = array(
            'health_fund_code' => $this->input->post('health_fund_code'),
            'issue_date' => $this->input->post('issue_date'),
            'policy_number' => $this->input->post('policy_number'),
            'upi' => $this->input->post('upi'),
            'expiry_date' => $this->input->post('expiry_date'),
            'health_fund_name' => $this->input->post('health_fund_name'),
            'alias_surname' => $this->input->post('alias_surname'),
            'alias_name' => $this->input->post('alias_name')
        );
        $count = $this->db->get_where('patient_other_details', array('patient_id' => $this->input->post('pt_id')))->num_rows();
        $flag = false;
        if ($count == 0) {
            $flag = true;
            $comments_data['patient_id'] = $this->input->post('pt_id');
            $this->db->insert('patient_other_details', $comments_data);
        }else{
            $flag = true;
             $this->db->where('patient_id', $this->input->post('pt_id'));
            $this->db->update('patient_other_details', $comments_data);
        }
        if($flag && $this->input->post('rid')){
            $dob = date('Y-m-d', strtotime($this->input->post('dob')));
            $diff = date_diff(date_create($dob), date_create(date('Y-m-d')), TRUE);
            $age = $diff->format('%y');

            $Rdata = array(
                'health_fund_code' => $_POST['health_fund_code'],   
                'health_fund_name' => $_POST['health_fund_name'],   
                'policy_number' => $_POST['policy_number'],       
            );
            $this->db->where('patient_id', $this->input->post('pt_id'));
            $this->db->update('request', $Rdata);
        }
        echo 'updated';
        exit;
    }
    public function update_other_info()
    {
        $other_data = array(
            'pensioner_card_number' => $this->input->post('pensioner_card_number'),
            'health_care_card_number' => $this->input->post('health_care_card_number'),
            'repat_health_care_card_number' => $this->input->post('repat_health_care_card_number'),
            'repat_pharmacy_benefits_card' => $this->input->post('repat_pharmacy_benefits_card'),
            'seniors_health_care_card_number' => $this->input->post('seniors_health_care_card_number'),
            'safety_net_entitlement_card_number_number' => $this->input->post('safety_net_entitlement_card_number_number'),
            'safety_net_concession_card_number' => $this->input->post('safety_net_concession_card_number'),
            'service_number' => $this->input->post('service_number'),
            'religion' => $this->input->post('religion')
        );
        $count = $this->db->get_where('patient_other_details', array('patient_id' => $this->input->post('pt_id')))->num_rows();
        $flag = false;
        if ($count == 0) {
            $flag = true;
            $other_data['patient_id'] = $this->input->post('pt_id');
            $this->db->insert('patient_other_details', $other_data);
        }else{
            $flag = true;
             $this->db->where('patient_id', $this->input->post('pt_id'));
            $this->db->update('patient_other_details', $other_data);
        }
        if($flag && $this->input->post('rid')){
            $dob = date('Y-m-d', strtotime($this->input->post('dob')));
            $diff = date_diff(date_create($dob), date_create(date('Y-m-d')), TRUE);
            $age = $diff->format('%y');

            $Rdata = array(
                'pensioner_card_number' => $_POST['pensioner_card_number'],
                'health_care_card_number' => $_POST['health_care_card_number']
            );
            $this->db->where('patient_id', $this->input->post('pt_id'));
            $this->db->update('request', $Rdata);
        }
        echo 'updated';
        exit;
    }
    public function update_other_identifier()
    {
        $other_data = array(
            'my_health_record_number' => $this->input->post('my_health_record_number'),
            'my_health_record_consent_withdrawn' => $this->input->post('my_health_record_consent_withdrawn'),
            'health_data_respository' => $this->input->post('health_data_respository'),
        );

        $count = $this->db->get_where('patient_other_details', array('patient_id' => $this->input->post('pt_id')))->num_rows();
        if ($count == 0) {
            $other_data['patient_id'] = $this->input->post('pt_id');
            $this->db->insert('patient_other_details', $other_data);
        }else{
             $this->db->where('patient_id', $this->input->post('pt_id'));
            $this->db->update('patient_other_details', $other_data);
        }
        echo 'updated';
        exit;
    }
    public function update_other_data()
    {
        $other_data = array(
            'deceased' => $this->input->post('deceased'),
            'in_active' => $this->input->post('in_active'),
            'enter_by' => $this->input->post('enter_by'),
        );

        $count = $this->db->get_where('patient_other_details', array('patient_id' => $this->input->post('pt_id')))->num_rows();
        if ($count == 0) {
            $other_data['patient_id'] = $this->input->post('pt_id');
            $this->db->insert('patient_other_details', $other_data);
        }else{
             $this->db->where('patient_id', $this->input->post('pt_id'));
            $this->db->update('patient_other_details', $other_data);
        }

        echo 'updated';
        exit;
    }

    private function text_file_content($data){

        /* Constant Data */
        $const_Field_Separator               = 'MSH';
        $const_Encoding_Characters           = '^~\&';
        $const_Sending_Application           = 'Pathhub 1.0';
        $const_Sending_Facility              = 'HealthLink Pathology Partners';
        $const_Receiving_Application         = 'MDR';
        $const_Receiving_Facility            = 'pms3medd';
        $const_Security                      = '';
        $const_Message_Type                  = 'ORU';
        $const_Trigger_Event                 = 'R01';
        $const_Processing_ID                 = 'P';
        $const_Version_ID                    = '2.3.1';
        $const_Sequence_Number               = '';
        $const_Continuation_Pointer          = '';
        $const_Accept_Acknowledgment_Type    = 'AL';
        $const_Application_Acknowledgment_Type = 'AL';
        $const_Country_Code                  = 'AUS';
        $const_Character_Set                 = '';
        $const_Principal_Language_Of_Message = '';

        $const_Assigning_Authority           = 'Far North Queensland Histopathology';
        $const_Doctor_Assigning_Authority    = 'PMS3MEDD';
        $const_Value_Type                    = 'ST';


        /* Patient Data */
        $pId = $data->id;
        $pFirstName = $data->first_name;
        $pLastName = $data->last_name;
        $pGender = ($data->gender == 'Male') ? 'M' : 'F';
        $pDob = (!empty($data->dob) && $data->dob != '0000-00-00') ? date('Ymd', strtotime($data->dob)).'000000+1000' : '';
        $address = "$data->address_1^$data->city^$data->state^$data->post_code^^$data->country";
        $pId1 = $data->p_id_1;
        $pId2 = $data->p_id_2;
        $patientState = $data->state;

        /* Doctor Data */
        $referDoctorId = $data->doctor->id;
        $referDoctorFirstName = $data->doctor->first_name;
        $referDoctorLastName = $data->doctor->last_name;
        $referDoctorState = $data->doctor->state;

        $dId = $data->doctor->id;
        $dFirstName = $data->doctor->first_name;
        $dLastName = $data->doctor->last_name;
        $dSentDate = date('YmdHis', strtotime($data->doctor->date_sent_touralensis)).'+1000';

        $serialNumber = $data->doctor->serial_number;
        $pciNumber = $data->doctor->pci_number;
        $labNumber = $data->doctor->lab_number;
        $labName = $data->doctor->lab_name;
        $requestDateTime = date('YmdHis', strtotime($data->doctor->request_datetime)).'+1000';
        $observationDateTime = date('YmdHis', strtotime($data->doctor->publish_datetime)).'+1000';
        $doctorRecordDateTime = date('YmdHis', strtotime($data->doctor->date_rec_by_doctor)).'+1000';

        /* Patient related extra data */
        //$senderName = $data->details->sender_name;
        //$senderCompany = $data->details->sender_company;
        //$receiverName = $data->details->receiver_name;
        //$receiverCompany = $data->details->receiver_company;

        $dateTime = date('YmdHis') . '+1000';
        $messageControlID = date('YmdHis');
        $messageStructure = 'ORU_R01';
        //$unique_identifies = $this->unique_identifies_number($data->id);

        $res = '';
//        $res .= "MSH|^~\&|Best Practice 1.12.0.965|BP099999|$receiverName|$receiverCompany|20220222162828+1000||ORM^O01|9999920220222.42743AFE00|P|2.4|121||NE|AL|AU\n";
//        $res .= "PID|1||73^^^BPS^PI~8003606789131483^^^AUSHIC^NI||$pFirstName^$pLastName^^^^^L||19451214|$pGender||9^Not Stated/Inadequately Described^602543|76 Frederick St^^Woodlane^SA^5254^^1||^PRN^CP^^^^0468955011\n";
//        $res .= "MSH|^~\&|PathHub|$senderName|HL7Soup|$receiverCompany|$dateTime||ORM^O01|MSGID$dateTime|P|2.4\n";
//pre($data, false);

        $res .= "$const_Field_Separator|$const_Encoding_Characters|$const_Sending_Application|$const_Sending_Facility|$const_Receiving_Application|$const_Receiving_Facility|$dateTime|$const_Security|$const_Message_Type^$const_Trigger_Event^$messageStructure|$messageControlID|$const_Processing_ID|$const_Version_ID|$const_Sequence_Number|$const_Continuation_Pointer|$const_Accept_Acknowledgment_Type|$const_Application_Acknowledgment_Type|$const_Country_Code\n";
        $res .= "PID|$pId||$pId1^^^$const_Assigning_Authority|$pId2|$pLastName^$pFirstName^^^||$pDob|$pGender|||$address|||||||\n";
        $res .= "PV1||O|$patientState^PAREG^|||||$referDoctorId^$referDoctorFirstName^$referDoctorLastName^^^^^^$const_Doctor_Assigning_Authority|||OP|||||||||2|||||||||||||||||||||||||$doctorRecordDateTime|\n";
        $res .= "ORC|RE||$serialNumber^ACME Pathology^7654^AUSNATA||CM||$dSentDate||$dSentDate|||$dId^$dFirstName^$dLastName^^^DR^^^AUSHICPR^L^^^PRN\n";
        $res .= "BR|1|$pciNumber|$labNumber^$labName^7654^AUSNATA|CBC^MASTER FULL BLOOD COUNT^7654||$requestDateTime|$observationDateTime|$doctorRecordDateTime||||||$doctorRecordDateTime||$dId^$dFirstName^$dLastName^^^DR^^^PMS3MEDD^L^^^PRN||||||$doctorRecordDateTime||HM|F||^^^$doctorRecordDateTime|1234567X ^^^^^DR^^^PMSBESTP^L^^^UPIN~0191324T^SPECIALIST^ANDREW^^^DR^^^AUSHICPR^L^^^UPIN||||123457Z&Davidson&John&&MBBS&Dr.\n";

        $obx=0;
        foreach ($data->test as $test){
            $obx++;
            $testId = $test->id;
            $testName = $test->name;
            $testDescription = $test->description;
            $observationDate = date('YmdHis', strtotime($test->date_entered)).'+1000';
            $res .= "OBX|$obx|$const_Value_Type|$testId^$testDescription^$testName||$testDescription||||||F|||$observationDate\n";
        }
        $obx++;
        $res .= "OBX|$obx|XCN|^Billing Provider||^000000AA^Roy^Jason^^^DR^^^AUSHICPR^L^^^UPIN||||||F\n";
        $obx++;
        $res .= "OBX|$obx|CE|^Patient Episode Initiation||^43234||||||F\n";
        $obx++;
        $res .= "OBX|$obx|CE|^Histology Complexity Billing Code||^88342||||||F\n";
//pre($res);exit;

        return ['res' => $res, 'message_control_id' => $messageControlID];
        //return $res;
    }

    public function generate_hl7_file()
    {
        $resArr = ['status' => 'error', 'message' => 'Something went wrong, Please Try Again.'];
        if ($this->input->post()) {
            $id = $this->input->post('id');
            $request_id = $this->input->post('request_id');
            if (isset($id) && !empty($id)) {
                $pData = $this->db->query("SELECT * FROM `patients` WHERE id = $id")->row();
                if (isset($pData)) {
                    $this->load->model('Doctor_model');
                    $pData->test = $this->Doctor_model->specimen_block_detail($request_id);

                    $where = "";
                    if(isset($request_id) && !empty($request_id)){
                        $where .= "request.uralensis_request_id = $request_id";
                    }
                    //$where .= "AND request.patient_id = $id";

                    $pData->doctor = $this->db->query("
                        SELECT users.id, users.state,
                            AES_DECRYPT(phone, '" . DATA_KEY . "') AS phone,
                            AES_DECRYPT(company, '" . DATA_KEY . "') AS company,
                            AES_DECRYPT(last_name, '" . DATA_KEY . "') AS last_name,
                            AES_DECRYPT(first_name, '" . DATA_KEY . "') AS first_name,
                            AES_DECRYPT(email, '" . DATA_KEY . "') AS email,
                            AES_DECRYPT(username, '" . DATA_KEY . "') AS username,
                            patient_id as p_id,
                            uralensis_request_id, 
                            record_batch_id, 
                            serial_number, 
                            ura_barcode_no, 
                            patient_initial,
                            patient_id, 
                            pci_number, 
                            request_datetime, 
                            publish_datetime,
                            publish_datetime_modified, 
                            emis_number, 
                            nhs_number, 
                            lab_number, 
                            hos_number, 
                            sur_name, f_name, dob, age, lab_id, lab_name, 
                            date_received_bylab, 
                            data_processed_bylab, 
                            date_sent_touralensis,
                            date_rec_by_doctor, 
                            gender,
                            hospital_group_id
                            /*specimen.specimen_microscopic_description*/
                        FROM request
                        INNER JOIN request_assignee ON request_assignee.request_id = request.uralensis_request_id
                        INNER JOIN users ON request_assignee.user_id = users.id
                        WHERE $where")->row();

                    $this->load->helper('file');
                    $content = $this->text_file_content($pData);
                    $filePath = "./uploads/patient_detail/$id-" . time() . ".txt";

                    if (!is_dir('./uploads/patient_detail')) {
                        mkdir('./uploads/patient_detail', 0777, TRUE);
                    }
                    if (!write_file($filePath, $content['res'])) {
                        $resArr = ['status' => 'error', 'message' => 'Unable to write the file'];
                    } else {
                        $createdBy = $this->ion_auth->user()->row()->id;
                        $this->db->insert('hl7_message_id', [
                            'patient_id' => $id,
                            'request_id' => $request_id,
                            'message_control_id' => $content['message_control_id'],
                            'created_by' => $createdBy
                        ]);
                        $this->db->update('patients', ['hl7' => $filePath], ['id' => $id]);
                        $resArr = ['status' => 'success', 'message' => 'Successfully generate HL7 text file'];
                    }
                } else {
                    $resArr = ['status' => 'error', 'message' => 'Patient data not found on database'];
                }
            }
        }
        echo json_encode($resArr);
        exit;
    }

    public function read_hl7_file()
    {
        $resArr = ['status' => 'error', 'message' => 'Something went wrong, Please Try Again.'];
        if ($this->input->post()) {
            $id = $this->input->post('id');
            if (isset($id) && !empty($id)) {
                $pData = $this->db->query("SELECT * FROM `patients` WHERE id = $id")->row();
                if (isset($pData)) {
                    if (!empty($pData->hl7)) {
                        if (file_exists($pData->hl7)) {
                            $fp = fopen($pData->hl7, "r");
                            $content = fread($fp, filesize($pData->hl7));
                            //$lines = explode("\n", $content);
                            $lines = $content;
                            fclose($fp);
                            $resArr = ['status' => 'success', 'title' => "HL7 Content for patient ($pData->first_name $pData->last_name)", 'data' => $lines];
                        } else {
                            $resArr = ['status' => 'error', 'message' => 'The file does not exist.<br> Please generate HL7 for this patient.'];
                        }
                    } else {
                        $resArr = ['status' => 'error', 'message' => 'Please generate HL7 for this patient'];
                    }
                } else {
                    $resArr = ['status' => 'error', 'message' => 'Patient data not found on database'];
                }
            }
        }
        echo json_encode($resArr);
        exit;
    }

    public function download_hl7_file()
    {
        $resArr = ['status' => 'error', 'message' => 'Something went wrong, Please Try Again.'];
        if ($this->input->post()) {
            $id = $this->input->post('id');
            if (isset($id) && !empty($id)) {
                $pData = $this->db->query("SELECT * FROM `patients` WHERE id = $id")->row();
                if (isset($pData)) {
                    if (!empty($pData->hl7)) {
                        if (file_exists($pData->hl7)) {
                            //base_url(substr($pData->hl7, 1))
                            $resArr = ['status' => 'success', 'download_url' => base_url($pData->hl7)];
                        } else {
                            $resArr = ['status' => 'error', 'message' => 'The file does not exist.'];
                        }
                    } else {
                        $resArr = ['status' => 'error', 'message' => 'Please generate HL7 for this patient'];
                    }
                } else {
                    $resArr = ['status' => 'error', 'message' => 'Patient data not found on database'];
                }
            }
        }
        echo json_encode($resArr);
        exit;
    }

    private function unique_identifies_number($patientID)
    {
        $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 4; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $result = $patientID . implode($pass) . time(); //turn the array into a string
        return $result;
    }

    public function hl7_demo(){
        $id = 1964;
        $request_id = 1941;

        if (isset($id) && !empty($id)) {
            $pData = $this->db->query("SELECT * FROM `patients` WHERE id = $id")->row();

            if (isset($pData)) {
                $this->load->model('Doctor_model');
                $pData->test = $this->Doctor_model->specimen_block_detail($request_id);

                $where = "";
                if(isset($request_id) && !empty($request_id)){
                    $where .= "request.uralensis_request_id = $request_id";
                }
                //$where .= "AND request.patient_id = $id";

                $pData->doctor = $this->db->query("
                        SELECT users.id, users.state,
                            AES_DECRYPT(phone, '" . DATA_KEY . "') AS phone,
                            AES_DECRYPT(company, '" . DATA_KEY . "') AS company,
                            AES_DECRYPT(last_name, '" . DATA_KEY . "') AS last_name,
                            AES_DECRYPT(first_name, '" . DATA_KEY . "') AS first_name,
                            AES_DECRYPT(email, '" . DATA_KEY . "') AS email,
                            AES_DECRYPT(username, '" . DATA_KEY . "') AS username,
                            patient_id as p_id,
                            uralensis_request_id, 
                            record_batch_id, 
                            serial_number, 
                            ura_barcode_no, 
                            patient_initial,
                            patient_id, 
                            pci_number, 
                            request_datetime, 
                            publish_datetime,
                            publish_datetime_modified, 
                            emis_number, 
                            nhs_number, 
                            lab_number, 
                            hos_number, 
                            sur_name, f_name, dob, age, lab_id, lab_name, 
                            date_received_bylab, 
                            data_processed_bylab, 
                            date_sent_touralensis,
                            date_rec_by_doctor, 
                            gender,
                            hospital_group_id
                            /*specimen.specimen_microscopic_description*/
                        FROM request
                        INNER JOIN request_assignee ON request_assignee.request_id = request.uralensis_request_id
                        INNER JOIN users ON request_assignee.user_id = users.id
                        WHERE $where")->row();

                $content = $this->text_file_content($pData);

                $filePath = "./uploads/patient_detail/$id-" . time() . ".txt";

                if (!is_dir('./uploads/patient_detail')) {
                    mkdir('./uploads/patient_detail', 0777, TRUE);
                }
                if (!write_file($filePath, $content)) {
                    echo 'Unable to write the file';
                } else {
                    $createdBy = $this->ion_auth->user()->row()->id;
                    $this->db->insert('hl7_message_id', [
                        'patient_id' => $id,
                        'request_id' => $request_id,
                        'message_control_id' => $content['message_control_id'],
                        'created_by' => $createdBy
                    ]);
                    $this->db->update('patients', ['hl7' => $filePath], ['id' => $id]);
                    echo 'Successfully generate HL7 text file';
                }
            }
        }
    }

//    private function text_file_content($data)
//    {
//
//        /* Patient Data */
//        //pre($data);
//        $pId = $data->id;
//        $pFirstName = $data->first_name;
//        $pLastName = $data->last_name;
//        $pGender = ($data->gender == 'Male') ? 'M' : 'F';
//        $pDob = (!empty($data->dob) && $data->dob != '0000-00-00') ? date('Ymd', strtotime($data->dob)) : '';
//        $address = "$data->address_1^$data->suburb^$data->town^$data->post_code";
//        $pId1 = $data->p_id_1;
//        $pId2 = $data->p_id_2;
//
//        /* Patient related extra data */
//        $senderName = $data->details->sender_name;
//        $senderCompany = $data->details->sender_company;
//        $receiverName = $data->details->receiver_name;
//        $receiverCompany = $data->details->receiver_company;
//        $dateTime = date('YmdHis');
//        //$unique_identifies = $this->unique_identifies_number($data->id);
//        //pre($unique_identifies);
//
//        $res = '';
//        //        $res .= "MSH|^~\&|Best Practice 1.12.0.965|BP099999|$receiverName|$receiverCompany|20220222162828+1000||ORM^O01|9999920220222.42743AFE00|P|2.4|121||NE|AL|AU\n";
//        //        $res .= "PID|1||73^^^BPS^PI~8003606789131483^^^AUSHIC^NI||$pFirstName^$pLastName^^^^^L||19451214|$pGender||9^Not Stated/Inadequately Described^602543|76 Frederick St^^Woodlane^SA^5254^^1||^PRN^CP^^^^0468955011\n";
//        $res .= "MSH|^~\&|PathHub|$senderName|HL7Soup|$receiverCompany|$dateTime||ORM^O01|MSGID$dateTime|P|2.4\n";
//        $res .= "PID|$pId||$pId1|$pId2|$pLastName^$pFirstName^^^||$pDob|$pGender|||$address|||||||\n";
//        $res .= "PV1||O|OP^PAREG^||||2342^Jones^Bob|||OP|||||||||2|||||||||||||||||||||||||20060307110111|\n";
//        $res .= "ORC|NW|20060307110114\n";
//        $res .= "OBR|1|20060307110114||003038^Urinalysis^L|||20060307110114\n";
//
//        //pre($res);
//        return $res;
//    }

}

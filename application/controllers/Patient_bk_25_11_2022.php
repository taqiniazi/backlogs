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

    private function text_file_content($data, $type=''){

        /* Constant Data */
        if($type == 'HL7'){
            $constArr = $data->constant;

            $const_Field_Separator                  = $constArr->field_separator;                 //MSH
            $const_Encoding_Characters              = $constArr->encoding_characters;             //^~\&
            $const_Sending_Application              = $constArr->sending_application;             //Pathhub 1.0
            $const_Sending_Facility                 = $constArr->sending_facility;                //HealthLink Pathology Partners
            $const_Receiving_Application            = $constArr->receiving_application;           //MDR
            $const_Receiving_Facility               = $constArr->receiving_facility;              //pms3medd
            $const_Security                         = $constArr->security;                        //''
            $const_Message_Type                     = $constArr->message_type;                    //ORU
            $const_Trigger_Event                    = $constArr->trigger_event;                   //R01
            $const_Processing_ID                    = $constArr->processing_id;                   //P
            $const_Version_ID                       = $constArr->version_id;                      //2.3.1
            $const_Sequence_Number                  = $constArr->sequence_number;                 //
            $const_Continuation_Pointer             = $constArr->continuation_pointer;            //
            $const_Accept_Acknowledgment_Type       = $constArr->accept_acknowledgment_type;      //AL
            $const_Application_Acknowledgment_Type  = $constArr->application_acknowledgment_type; //AL
            $const_Country_Code                     = $constArr->country_code;                    //AUS
            $const_Character_Set                    = $constArr->character_set;                   //''
            $const_Principal_Language_Of_Message    = $constArr->principal_language_of_message;   //''
            $const_Assigning_Authority              = $constArr->assigning_authority;             //Far North Queensland Histopathology
            $const_Doctor_Assigning_Authority       = $constArr->doctor_assigning_authority;      //PMS3MEDD
            $const_Value_Type                       = $constArr->value_type;                      //ST
            $const_Patient_Class                    = $constArr->patient_class;                   //O
            $const_Message_Structure                = $constArr->message_structure;               //ORU_R01
        }else{
            $const_Field_Separator                  = 'MSH';
            $const_Encoding_Characters              = '^~\&';
            $const_Sending_Application              = 'Pathhub 1.0';
            $const_Sending_Facility                 = 'HealthLink Pathology Partners';
            $const_Receiving_Application            = 'MDR';
            $const_Receiving_Facility               = 'pms3medd';
            $const_Security                         = '';
            $const_Message_Type                     = 'ORU';
            $const_Trigger_Event                    = 'R01';
            $const_Processing_ID                    = 'P';
            $const_Version_ID                       = '2.3.1';
            $const_Sequence_Number                  = '';
            $const_Continuation_Pointer             = '';
            $const_Accept_Acknowledgment_Type       = 'AL';
            $const_Application_Acknowledgment_Type  = 'AL';
            $const_Country_Code                     = 'AUS';
            $const_Character_Set                    = '';
            $const_Principal_Language_Of_Message    = '';
            $const_Assigning_Authority              = 'Far North Queensland Histopathology';
            $const_Doctor_Assigning_Authority       = 'PMS3MEDD';
            $const_Value_Type                       = 'ST';
            $const_Patient_Class                    = 'O';
            $const_Message_Structure                = 'ORU_R01';
        }

        /* Patient Data */
        $pId = $data->id;
        $pFirstName = $data->first_name;
        $pLastName = $data->last_name;
        $pGender = ($data->gender == 'Male') ? 'M' : 'F';
        $pDob = (!empty($data->dob) && $data->dob != '0000-00-00') ? date('Ymd', strtotime($data->dob)) : '';
        $address = "$data->address_1^$data->city^$data->state^$data->post_code^^$data->country_code";
        $pId1 = $data->p_id_1;
        $pId2 = $data->p_id_2;
        $patientSSN = $data->medicare_card_no;
        $patientState = ''; //$data->state
        $doctorData = $data->doctor;

        /* Doctor Data */
        $referDoctorId = $doctorData->id;
        $referDoctorFirstName = $doctorData->first_name;
        $referDoctorLastName = $doctorData->last_name;
        $referDoctorState = $doctorData->state;

        $dId = $doctorData->id;
        $dFirstName = $doctorData->first_name;
        $dLastName = $doctorData->last_name;
        $dSentDate = date('YmdHis', strtotime($doctorData->date_sent_touralensis)) . '+1000';

        $serialNumber = $doctorData->serial_number;
        $pciNumber = $doctorData->pci_number;
        $labNumber = $doctorData->lab_number;
        $labName = $doctorData->lab_name;
        $labNata = $doctorData->lab_nata;
        $doctor_mdr_number = $doctorData->doctor_mdr_number;

        $requestInsertDateTime = date('YmdHis', strtotime($doctorData->request_datetime)) . '+1000';
        $requestDateTime = date('YmdHis', strtotime($doctorData->date_taken)) . '+1000';
        $observationDateTime = date('YmdHis', strtotime($doctorData->publish_datetime)) . '+1000';
        $doctorRecordDateTime = date('YmdHis', strtotime($doctorData->date_rec_by_doctor)) . '+1000';

        /* Patient related extra data */
        //$senderName = $data->details->sender_name;
        //$senderCompany = $data->details->sender_company;
        //$receiverName = $data->details->receiver_name;
        //$receiverCompany = $data->details->receiver_company;

        $dateTime = date('YmdHis') . '+1000';
        $messageControlID = date('YmdHis');
        //$messageStructure = 'ORU_R01';
        //$unique_identifies = $this->unique_identifies_number($data->id);

        $res = '';
//        $res .= "MSH|^~\&|Best Practice 1.12.0.965|BP099999|$receiverName|$receiverCompany|20220222162828+1000||ORM^O01|9999920220222.42743AFE00|P|2.4|121||NE|AL|AU\n";
//        $res .= "PID|1||73^^^BPS^PI~8003606789131483^^^AUSHIC^NI||$pFirstName^$pLastName^^^^^L||19451214|$pGender||9^Not Stated/Inadequately Described^602543|76 Frederick St^^Woodlane^SA^5254^^1||^PRN^CP^^^^0468955011\n";
//        $res .= "MSH|^~\&|PathHub|$senderName|HL7Soup|$receiverCompany|$dateTime||ORM^O01|MSGID$dateTime|P|2.4\n";

        $res .= "$const_Field_Separator|$const_Encoding_Characters|$const_Sending_Application|$const_Sending_Facility|$const_Receiving_Application|$const_Receiving_Facility|$dateTime|$const_Security|$const_Message_Type^$const_Trigger_Event^$const_Message_Structure|$messageControlID|$const_Processing_ID|$const_Version_ID|$const_Sequence_Number|$const_Continuation_Pointer|$const_Accept_Acknowledgment_Type|$const_Application_Acknowledgment_Type|$const_Country_Code\n";
        $res .= "PID|$pId||$pId1^^^$const_Assigning_Authority|$pId2|$pLastName^$pFirstName^^^||$pDob|$pGender|||$address||||||||$patientSSN\n";
        $res .= "PV1||$const_Patient_Class|$patientState^^|||||$referDoctorId^$referDoctorFirstName^$referDoctorLastName^^^^^^$const_Doctor_Assigning_Authority|||OP|||||||||2|||||||||||||||||||||||||$doctorRecordDateTime|\n";
        $res .= "ORC|RE||$serialNumber^ACME Pathology^7654^AUSNATA||CM||^^^$dSentDate||$dSentDate|||$dId^$dFirstName^$dLastName^^^DR^^^AUSHICPR^L^^^PRN\n";
        $res .= "OBR|1|$pciNumber|$labNumber^$labName^7654^AUSNATA|CBC^MASTER FULL BLOOD COUNT^7654||$requestInsertDateTime|$observationDateTime|$doctorRecordDateTime||||||$doctorRecordDateTime||$dId^$dFirstName^$dLastName^^^DR^^^PMS3MEDD^L^^^PRN||||DR=$patientSSN,LN=$doctor_mdr_number,RC=Y||$doctorRecordDateTime||HM|F||^^^$doctorRecordDateTime|1234567X ^^^^^DR^^^PMSBESTP^L^^^UPIN~0191324T^SPECIALIST^ANDREW^^^DR^^^AUSHICPR^L^^^UPIN||||\n";

        if ($type == 'HL7') {
            $obx = 0;
            foreach ($data->test as $test) {
                $obx++;
                $testId = $test->id;
                $testName = $test->name;
                $testDescription = $test->description;
                $observationDate = date('YmdHis', strtotime($test->date_entered)) . '+1000';
                $res .= "OBX|$obx|$const_Value_Type|$testId^$testDescription^$testName||$testDescription||||||F|||$observationDate\n";
            }

            foreach ($data->billing_code as $billing){
                $obx++;
                $res .= "OBX|$obx|XCN|^Billing Provider||$billing->bill_code^$billing->bill_code_text^$dFirstName^$dLastName^^^DR^^^AUSHICPR^L^^^UPIN||||||F\n";
            }
            /*$obx++;
            $res .= "OBX|$obx|XCN|^Billing Provider||^000000AA^Roy^Jason^^^DR^^^AUSHICPR^L^^^UPIN||||||F\n";
            $obx++;
            $res .= "OBX|$obx|CE|^Patient Episode Initiation||^43234||||||F\n";
            $obx++;
            $res .= "OBX|$obx|CE|^Histology Complexity Billing Code||^88342||||||F\n";*/
        } elseif ($type == 'OBR'){
            $reportType = 'Histopathology Report';
            $pdfData = $data->pdfData;
            $res .= "OBX|1|FT|$reportType^^AUSLAB||$pdfData||||||F|||$dateTime|^^AUSLAB \n";
        } else {

        }

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
                            date_taken,
                            doctor_mdr_number,
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
                    $pData->doctor->lab_nata = $this->db->get_where('laboratory_information', ['group_id'=>$pData->doctor->lab_id])->row()->lab_nata;
                    $pData->billing_code = $this->db->group_by('bill_code')->get_where('request_billing_code', ['request_id'=>$request_id])->result();
                    $pData->constant = $this->db->get('hl7_constant_data')->row();

                    $this->load->helper('file');
                    $content = $this->text_file_content($pData, 'HL7');
                    $newFileName = "$id-" . time() . ".hl7";
                    $filePath = "./uploads/hl7_output/$newFileName";

                    if (!is_dir('./uploads/hl7_output')) {
                        mkdir('./uploads/hl7_output', 0777, TRUE);
                    }
                    if (!write_file($filePath, $content['res'])) {
                        $resArr = ['status' => 'error', 'message' => 'Unable to write the file'];
                    } else {
                        $createdBy = $this->ion_auth->user()->row()->id;
                        $this->db->insert('generated_file_message_data', [
                            'patient_id'        => $id,
                            'request_id'        => $request_id,
                            'message_control_id'=> $content['message_control_id'],
                            'file_type'         => 'HL7',
                            'file_name'         => $newFileName,
                            'file_path'         => '/uploads/hl7_output/',
                            'created_by'        => $createdBy
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

    public function generate_obr_file(){
        $resArr = ['status' => 'error', 'message' => 'Something went wrong, Please Try Again.'];
        if ($this->input->post()) {
            $id = $this->input->post('id');
            $request_id = $this->input->post('request_id');
            if (isset($id) && !empty($id)) {
                $pData = $this->db->query("SELECT * FROM `patients` WHERE id = $id")->row();
                if (isset($pData)) {

                    $this->load->model('Doctor_model');
                    $pData->test = $this->Doctor_model->specimen_block_detail($request_id);

                    $pData->pdfData = $this->generate_pdf_report($request_id);

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
                            date_taken,
                            doctor_mdr_number,
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
                    $pData->doctor->lab_nata = $this->db->get_where('laboratory_information', ['group_id'=>$pData->doctor->lab_id])->row()->lab_nata;

                    $this->load->helper('file');
                    $content = $this->text_file_content($pData, 'OBR');
                    $newFileName = "$id-".time().".OBR";
                    $filePath = "./uploads/hl7_output/$newFileName";

                    if (!is_dir('./uploads/hl7_output')) {
                        mkdir('./uploads/hl7_output', 0777, TRUE);
                    }
                    if (!write_file($filePath, $content['res'])) {
                        $resArr = ['status' => 'error', 'message' => 'Unable to write the file'];
                    } else {
                        $createdBy = $this->ion_auth->user()->row()->id;
                        $this->db->insert('generated_file_message_data', [
                            'patient_id'        => $id,
                            'request_id'        => $request_id,
                            'message_control_id'=> $content['message_control_id'],
                            'file_type'         => 'OBR',
                            'file_name'         => $newFileName,
                            'file_path'         => '/uploads/hl7_output/',
                            'created_by'        => $createdBy
                        ]);
                        $this->db->update('patients', ['obr' => $filePath], ['id' => $id]);
                        $resArr = ['status' => 'success', 'message' => 'Successfully generate OBR file'];
                    }
                } else {
                    $resArr = ['status' => 'error', 'message' => 'Patient data not found on database'];
                }
            }
        }
        echo json_encode($resArr);
        exit;
    }

    public function read_obr_file(){
        $resArr = ['status' => 'error', 'message' => 'Something went wrong, Please Try Again.'];
        if ($this->input->post()) {
            $id = $this->input->post('id');
            $request_id = $this->input->post('request_id');
            if (isset($id) && !empty($id)) {
                $pData = $this->db->query("SELECT * FROM `patients` WHERE id = $id")->row();
                if (isset($pData)) {
                    $link = '<a href="javascript:void(0);" data-pid="'. $id .'" data-request-id="'. $request_id .'" class="generate_obr" title="Generate OBR File"><i class="fa fa-gear"></i> Click here</a>';
                    if (!empty($pData->obr)) {
                        if (file_exists($pData->obr)) {
                            $fp = fopen($pData->obr, "r");
                            $content = fread($fp, filesize($pData->obr));
                            //$lines = explode("\n", $content);
                            $lines = $content;
                            fclose($fp);
                            $resArr = ['status' => 'success', 'title' => "OBR content for patient ($pData->first_name $pData->last_name)", 'data' => $lines];
                        } else {
                            $resArr = ['status' => 'warning', 'title' => "Generate OBR file for patient ($pData->first_name $pData->last_name)", 'data' => "Please generate OBR file for this patient using below link.<br>$link"];
                            //$resArr = ['status' => 'error', 'message' => 'The file does not exist.<br> Please generate OBR file for this patient.'];
                        }
                    } else {
                        $resArr = ['status' => 'warning', 'title' => "Generate OBR file for patient ($pData->first_name $pData->last_name)", 'data' => "Please generate OBR file for this patient using below link.<br>$link"];
                        //$resArr = ['status' => 'error', 'message' => 'Please generate HL7 for this patient'];
                    }
                } else {
                    $resArr = ['status' => 'error', 'message' => 'Patient data not found on database'];
                }
            }
        }
        echo json_encode($resArr);
        exit;
    }

    public function hl7_demo()
	{
        $id = 2004; //1952; //1946; //1964;
        $request_id = 2025; //1935; // 1904; //1941;

        if (isset($id) && !empty($id)) {
            $pData = $this->db->query("SELECT * FROM `patients` WHERE id = $id")->row();

            if (isset($pData)) {
                $this->load->model('Doctor_model');
                $pData->country_code = $this->db->query("SELECT iso3 FROM `country` WHERE name LIKE '%$pData->country%'")->row()->iso3;
                $pData->test = $this->Doctor_model->specimen_block_detail($request_id);

                $where = "";
                if(isset($request_id) && !empty($request_id)){
                    $where .= "request.uralensis_request_id = $request_id";
                }
                //$where .= "AND request.patient_id = $id";

                $pData->billing_code = $this->db->group_by('bill_code')->get_where('request_billing_code', ['request_id'=>$request_id])->result();
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
                            date_taken,
                            doctor_mdr_number,
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
                $pData->doctor->lab_nata = $this->db->get_where('laboratory_information', ['group_id'=>$pData->doctor->lab_id])->row()->lab_nata;
                $pData->constant = $this->db->get('hl7_constant_data')->row();

                $content = $this->text_file_content($pData, 'HL7');

                $filePath = "./uploads/hl7_output/$id-" . time() . ".txt";

                if (!is_dir('./uploads/hl7_output')) {
                    mkdir('./uploads/hl7_output', 0777, TRUE);
                }
                if (!write_file($filePath, $content)) {
                    echo 'Unable to write the file';
                } else {
                    $createdBy = $this->ion_auth->user()->row()->id;
                    $this->db->insert('generated_file_message_data', [
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

    private function generate_pdf_report($id) {

        $this->load->model('Doctor_model');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        if (isset($id) && !empty($id)) {
            $check_booked_out_status = $this->db->where('ura_rec_track_record_id', $id)->where('ura_rec_track_status', 'Booked out from Lab')->get('uralensis_record_track_status')->row_array();
            $lab_release_date = array();
            if (!empty($check_booked_out_status) && $check_booked_out_status['ura_rec_track_status'] === 'Booked out from Lab') {
                $lab_release_date['release_date'] = date('d-m-Y', $check_booked_out_status['timestamp']);
            }
            $data1['query1'] = $this->Doctor_model->doctor_record_detail($id);
            $data2['query2'] = $this->Doctor_model->doctor_record_detail_specimen($id);
            $data3['query3'] = $this->Doctor_model->get_further_work($id);
            $data4['query4'] = $this->Doctor_model->get_additional_work($id);
            $data5['query5'] = $this->Doctor_model->get_hospital_info($id);

            $templateArr=[];
            if(isset($data5['query5'][0])){
                $whereArr = [
                    'lab_id' => $data5['query5'][0]->lab_id,
                    'created_by' => $data5['query5'][0]->doctor_id,
                    'is_default' => '1'
                ];
                $templateArr = $this->db->order_by('id', 'desc')->get_where('lab_templates', $whereArr)->row_array();
            }
            if(count($templateArr) == 0 || empty($templateArr['logo_path'])){
                $req_data = $this->db->select('uralensis_request_id, lab_id, request_add_user')->get_where('request', ['uralensis_request_id'=>$id])->row_array();
                if($req_data){
                    $whereArr = [
                        'is_default' => '1'
                        //'created_by' => $this->ion_auth->user()->row()->id
                    ];
                    $templateArr = $this->db->get_where('lab_templates', $whereArr)->row_array();
                }
            }
            /*$req_data = $this->db->select('uralensis_request_id, lab_id, request_add_user')->get_where('request', ['uralensis_request_id'=>$id])->row_array();
            if($req_data){
                $whereArr = [
                    'lab_id' => $req_data['lab_id'],
                    'created_by' => $req_data['request_add_user']
                ];
                $templateArr = $this->db->order_by('id', 'desc')->get_where('lab_templates', $whereArr)->row_array();
            }*/
            $data6['template'] = $templateArr;

            $result = array_merge($data1, $data2, $data3, $data4, $data5, $data6, $lab_release_date);

            $htmlData = $this->convert_pdf_data_to_text($result);

            $replaceTag = preg_replace("/<br\W*?\/>/", "\.br\///", trim($htmlData));
            //$replaceTag = preg_replace("/\s*/m", "", trim($replaceTag));
            $replaceTag = preg_replace('/\s+/', ' ', trim($replaceTag));
            $textDataStr = strip_tags($replaceTag);
            $textDataStr = str_replace("///", '', $textDataStr);

            /*$textDataStr = preg_replace('/<[^<]+?>/g', '', $replaceTag);*/
            //pre($textDataStr);

            return $textDataStr;
        }
    }

    private function convert_pdf_data_to_text($result){
        foreach ($result['query1'] as $row1){
            $id = $row1->id;
            $time = $row1->publish_datetime;

            $converted_time = '';
            if ($time != '') {
                $converted_time = date('d-m-Y', strtotime($time));
            }
            $last_modify_publish = '';
            if (!empty($row1->publish_datetime_modified)) {
                $last_modify_publish = date('d-m-Y', $row1->publish_datetime_modified);
                $last_modify_publish = '<tr><td>Latest Published Date:</td><td>' . $last_modify_publish . '</td></tr>';
            }
            if (!empty($row1->date_sent_touralensis)) {
                $lab_release_date = date('d-m-Y', strtotime($row1->date_sent_touralensis));
                $lab_release_date = '<tr><td>Lab Released Date:</td><td>' . $lab_release_date . '</td></tr>';
            }
            if (!empty($row1->date_rec_by_doctor)) {
                $date_rec_by_doctor = date('d-m-Y', strtotime($row1->date_rec_by_doctor));
                $date_rec_by_doctor = '<tr><td>Date Received by Dr : </td><td>' . $date_rec_by_doctor . '</td></tr>';
            }

            //Get the age if first, surname, and date of birth is empty.
            $age = '<tr><td>Age : </td><td></td></tr>';
            $gender = '<tr><td>Gender : </td><td></td></tr>';
            if (!empty($row1->age)) {
                $age = $row1->age;
            }

            if (!empty($row1->gender)) {
                $gender = $row1->gender;
            }

            $serial_number = $row1->serial_number;
            $pci_number = $row1->pci_number;
            $emis_number = $row1->emis_number;
            $nhs_number = $row1->nhs_number;
            $medicare_number = $row1->medicare_card_no;
            $lab_number = $row1->lab_number;
            $hos_number = $row1->hos_number;
            $sur_name = $row1->sur_name;
            $first_name = $row1->f_name;
            $dob = $row1->dob;
            $r_date = $row1->request_datetime;
            $p_date = !empty($row1->publish_datetime) ? date('d-m-Y', strtotime($row1->publish_datetime)) : 'N/A';
            $p_date_time = !empty($row1->publish_datetime) ? date('d-m-Y h:i', strtotime($row1->publish_datetime)) : 'N/A';

            $dermatological_surgeon = $row1->dermatological_surgeon;
            if (!empty($row1->dermatological_surgeon) && ctype_digit($row1->dermatological_surgeon)) {
                $dermatological_surgeon = uralensisGetUsername($row1->dermatological_surgeon, 'fullname');
            }
            $var = $row1->dob;
            $dob = '';
            if (!empty($var)) {
                $date = str_replace('/', '-', $var);
                $change_dob = date('d-m-Y', strtotime($date));
                $dob = !empty($change_dob) ? $change_dob : '';
            }

            $clrk = $row1->clrk;
            if (!empty($row1->clrk) && ctype_digit($row1->clrk)) {
                $clrk = uralensisGetUsername($row1->clrk, 'fullname');
            }
            $date_taken = !empty($row1->date_taken) ? date('d-m-Y', strtotime($row1->date_taken)) : '';
            $urgent = $row1->urgent;
            $hsc = $row1->hsc;
            $cl_detail = $row1->cl_detail;
            $date_rec_bylab = !empty($row1->date_received_bylab) ? date('d-m-Y', strtotime($row1->date_received_bylab)) : 'N/A';
            $Result_clinical = str_replace("\n", '<br />', $cl_detail);
            $comment_section = $row1->comment_section;
            $comment_section_date = $row1->comment_section_date;
            $h_group_id = $row1->hospital_group_id;
        }
        foreach ($result['query4'] as $row4) {
            $additional_work = $row4->description;
            $Result_additional = str_replace("\n", '<br />', $additional_work);
            $additional_work_time = $row4->additional_work_time;
        }
        foreach ($result['query2'] as $row2){
            $specimen_type = $row2->specimen_type;
            $specimen_site = $row2->specimen_site;
            $specimen_right = $row2->specimen_right;
            $specimen_left = $row2->specimen_left;
            $specimen_na = $row2->specimen_na;
            $user_first_name = $row2->first_name;
            $user_last_name = $row2->last_name;
            $user_email = $row2->email;
            $user_phone = $row2->phone;
            $gmc_code = $row2->gmc_code;
        }

        foreach ($result['query5'] as $row5){
            // $hospital_information = $row5->information;
            $hospital_information = "";
        }

        if(isset($result['template'])){
            $templateVal = $result['template'];
        }

        /*$htmlArr = [
            $templateVal['header'],
            "Histology No: $serial_number",
            "Patient: $first_name $sur_name",
            "DOB: $dob",
            "Gender: $gender",
            "Sample Date: $date_rec_bylab",
            "Publish Date: $p_date"
        ];

        $key = "\.br\/";
        $html = implode($key, $htmlArr);*/

        $html = '<table>		
            <tr>
                <td>								
                    <table style="padding-left:25px;">                        
                        <tr ><td align="left">'.$templateVal['header'].'</td></tr>
                    </table>
                </td>							
                <td>
                    <table>							
                        <tr>
                            <td>
                                <table>							
                                    <tr><td><br></td><td><br></td></tr>
                                    <tr><td>Histology No:</td><td><b>'.$serial_number.'</b></td></tr>
                                    <tr><td>Patient:</td><td><b>'.$first_name.' '.$sur_name.'</b></td></tr>
									<tr><td>DOB:</td><td>'.$dob.'</td></tr>
                                    <tr><td>Gender:</td><td>'.$gender.'</td></tr>
									<tr><td>Date Requested:</td><td>'.$date_rec_bylab.'</td></tr>
                                    <tr><td>Date Reported:</td><td>'.$p_date.'</td></tr>                                                                      
                                </table>
                            </td>
                        </tr>	
                    </table>
                </td>
            </tr>
			<tr><td colspan="2"><br><hr><br></td></tr>
        </table>';

        $html .= '<table>
            <tr><td colspan="2"><strong>DIAGNOSTIC SUMMARY</strong><br></td></tr>';
        foreach ($result['query2'] as $key => $row2){
            if($row2->specimen_diagnosis_description !=''){
                $html .= '<tr>
                <td width="99%"><b>'.($key + 1).'.</b> '. $row2->specimen_diagnosis_description . '</td>
                <td width="1%"></td>                
            </tr>';
            }
        }

        $html .= '</table>';
        $html .= '<br><hr><br>';
        if (!empty($cl_detail)) {
            $html .= '<br><table> <tr> <td  colspan="2"><b>Clinical Notes:</b> ' . $Result_clinical . '</td> </tr> </table> <br>';
        } else {
            $specimen_count = 1;
            $html .= '<table>
                        <tr> <td width="98%"><br></td> </tr>
                        <tr><td colspan="2"><strong>Clinical Notes:</strong></td></tr> <tr> <td width="98%"><br></td> </tr>';

            foreach ($result['query2'] as $specimen_data) {
                $specimen_result_clinical = str_replace("\n", '<br />', $specimen_data->specimen_clinical_history);
                if($specimen_result_clinical != ''){
                    $html .= ' <tr> <td >' . $specimen_result_clinical . '</td> <tr> <td ><br></td> </tr> </tr> ';
                    $specimen_count++;
                }
            }
        }
        $count = 1;
        $html .= '</table><br /><br />
                    <table>
                    <tr><td colspan="2"><strong>Macroscopic:</strong></td></tr> <tr>
                            <td width="98%"><br></td>
                            <td width="1%"></td>
                            <td width="1%"></td>               
                        </tr>';
        foreach ($result['query2'] as $row3)
        {
            $result_macro = str_replace("\n", '<br />', $row3->specimen_macroscopic_description);
            //$result_micro = str_replace("\n", '<br />', $row2->specimen_microscopic_description);
            $diagnosis = !empty($row3->specimen_diagnosis_description) ? $row3->specimen_diagnosis_description : '';
            $Result_diagnosis = str_replace("\n", '<br />', $diagnosis);
            if($result_macro != ''){
                $html .= '<tr>
                <td width="98%">'.$result_macro.'</td>
                <td width="1%"></td>
                <td width="1%"></td>
            </tr>            
            <tr>
                <td width="98%"><br></td>
                <td width="1%"></td>
                <td width="1%"></td>               
            </tr>
        </table>';
            }
        }

        $html .= '<br /><br />
    <table>
        <tr><td colspan="2"><strong>Microscopic:</strong></td></tr> <tr>
                <td width="98%"><br></td>
                <td width="1%"></td>
                <td width="1%"></td>               
            </tr>';
        foreach ($result['query2'] as $row2)
        {
            //$result_macro = str_replace("\n", '<br />', $row2->specimen_macroscopic_description);
            $result_micro = str_replace("\n", '<br />', $row2->specimen_microscopic_description);
            $diagnosis = !empty($row2->specimen_diagnosis_description) ? $row2->specimen_diagnosis_description : '';
            $Result_diagnosis = str_replace("\n", '<br />', $diagnosis);
            if($result_micro != ''){
                $html .= '            
                            <tr>
                                <td width="98%">' . $result_micro . '</td>
                                <td width="1%"></td>
                                <td width="1%"></td>               
                            </tr>
                            <tr>
                                <td width="98%"><br></td>
                                <td width="1%"></td>
                                <td width="1%"></td>               
                            </tr>
                        </table>';
            }


            if (!empty($diagnosis)) {
                $html .='<!--<table>
            <br /><br />
        <tr>
            <td width="13%"><b>Diagnosis :</b></td>
            <td width="2%"></td>
            <td width="85%">' . $diagnosis . '</td>
        </tr>
    </table>-->';
            }

            if (empty($comment_section)) {
                if (!empty($row2->specimen_comment_section)) {
                    $format_specimen_comments = str_replace("\n", '<br />', $row2->specimen_comment_section);
                    $specimen_comments_time = '';
                    if ($row2->specimen_comment_section_timestamp != '') {
                        $specimen_comments_time = date('M j Y', $row2->specimen_comment_section_timestamp);
                    }
                    $html .='
<!--<br /><br />
<div style="border-bottom:1px solid black;"></div>
<table>
    <tr>
        <td><b>Additional Comments (Specimen ' . $count . ')  &nbsp; | &nbsp; Comment Date: ' . $specimen_comments_time . ' </b></td>
    </tr>
    <br />
    <tr>
        <td>' . $format_specimen_comments . '</td>
    </tr>
</table>-->

';
                }
            }

            $count++;
        }

        $supp_count = 1;
        foreach ($result['query4'] as $row4) {
            $additional_work = $row4->description;
            $Result_additional = str_replace("\n", '<br />', $additional_work);
            $additional_work_time = $row4->additional_work_time;
            if (isset($Result_additional) && $Result_additional != '') :

                $html .= '<br /><br />
<div style="border-bottom:1px solid black;"></div>
<table>
    <tr>
        <td><b>Supplementary Report ' . $supp_count . ' &nbsp; | &nbsp; Requested Time : ' . date('M j Y g:i A', strtotime($additional_work_time)) . ' </b></td>
    </tr>
    <br />
    <tr>
        <td>' . $Result_additional . '</td>
    </tr>
</table>
';
            endif;
            $supp_count++;
        }

        if (isset($comment_section) && $comment_section != '') {
            $format_comments = str_replace("\n", '<br />', $comment_section);
            $comment_date = '';
            if($comment_section_date != ''){
                $comment_date = date('M j Y', strtotime($comment_section_date));
            }

            $html .='
<table>
    <tr>
        <td><b>Additional Comments  &nbsp; | &nbsp; Comment Date : ' . $comment_date . ' </b></td>
    </tr>
    <br />
    <tr>
        <td>' . $format_comments . '</td>
    </tr>
</table>

';
        }

        if ($result['query1'][0]->mdt_case_status === 'not_for_mdt' && $result['query1'][0]->mdt_case === 'add_to_report') {
            $html .='
<div style="border-bottom:1px solid black;"></div>
<table>
    <tr>
        <td style="font-size:14px;"><b>This case is NOT required for the Local Skin MDT</b></td>
    </tr>
</table>
';
        }
        if ($result['query1'][0]->mdt_case_status === 'for_mdt' && !empty($result['query1'][0]->mdt_case)) {
            $html .='
<div style="border-bottom:1px solid black;"></div>
<table>
    <tr>
        <td style="font-size:14px;"><b>This case should be listed for the Local Skin MDT</b></td>
    </tr>
</table>
';
        }

        if ($result['query1'][0]->mdt_case_status === 'for_mdt') {
            if (!empty($result['query1'][0]->mdt_specimen_status)) {
                $specimen_data = unserialize($result['query1'][0]->mdt_specimen_status);
                $html .=' <table> <tr> <td style="font-size:14px; width:120px;"><b>MDT Specimens.</b></td> ';
                foreach ($specimen_data as $specimen_mdt) {
                    $html .='
        <td style="font-size:14px; width:100px;"><b>' . $specimen_mdt . '</b></td>
    ';
                }
                $html .='</tr></table>';
            }
        }

        /*if($templateVal){
            $footerText = (isset($templateVal['footer'])) ? $templateVal['footer'] : '';
            $footerText = str_replace("<DOCNAME>", "Dr. $user_first_name $user_last_name ", $footerText);
            $footerText = str_replace("<DOCGMC>", "$gmc_code ", $footerText);
            $footerText = str_replace("<DOCEMAIL>", "$user_email ", $footerText);
            $footerText = str_replace("<DOCCONTACT>", "$user_phone ", $footerText);
        }*/
        $footerText = '';

        $html .='<br /><br /><br /><br /><br /><br />'. $footerText;
        $html .='<br /><br /><br /><br /><br /><br />
                <table width="100%">
                    <tr><td style="font-size:14px;"></td><td style="font-size:14px;"><center>-- End Report --<center></td><td style="font-size:14px;"></td></tr>
                </table>';

        $html .= "<table><tr><td><hr></td></tr><tr><td>$footerText</td></tr><tr><td>Reported by: Dr Fiona Makowski, Anatomic Pathologist; fiona.makowski@fnqhpathology.com</td></tr><tr><td><br></td></tr><tr><td>FNQH Pathology Pty Ltd, ABN 12345667</td></tr></table>";

        return $html;
    }
    
     public function generate_file()
    {
        $id = 1978;
        $request_id = 1974;

        if (isset($id) && !empty($id)) {
            $dd = $this->generate_orm_file_new($id, $request_id);
            pre($dd);
        }
    }


    /*Final changes */
 public function generate_orm_file()
	{
        $resArr = ['status' => 'error', 'message' => 'Something went wrong, Please Try Again.'];
        if ($this->input->post()) 
		{
            $id = $this->input->post('id');
            $request_id = $this->input->post('request_id');

            if (isset($id) && !empty($id)) 
			{
                $pData = $this->db->get_where('patients', ['id' => $id])->row();
                if (isset($pData)) {

                    $this->load->model('Doctor_model');
                    $pData->test = $this->Doctor_model->specimen_block_detail($request_id);
                    $pData->constant = $this->db->get('hl7_constant_data')->row();
                    $pData->pdfData = $this->generate_pdf_report($request_id);
					$pData->pdfReportData = @file_get_contents(base_url('uploads/reports_pdf/' . $request_id."_".date(Y).".pdf"));
//$pData->pdf_content=$this->db->get_where('request', ['uralensis_request_id' => $request_id])->row()->hl7_content;


					$pData->rDate=$this->db->get_where('request', ['uralensis_request_id' => $request_id])->row()->date_received_bylab;
					$pData->pDate=$this->db->get_where('request', ['uralensis_request_id' => $request_id])->row()->publish_datetime;

					$pData->pdf_content=$this->db->get_where('request', ['uralensis_request_id' => $request_id])->row()->hl7_content;
                    $hl7_content = $this->db->get_where('request', ['uralensis_request_id' => $request_id])->row()->hl7_content;
                    $this->load->helper('file');
					$filename="$request_id";
                    $newFileName = "FNQH"."0$request_id-" . time() . ".HL7";
                    $createdBy = $this->ion_auth->user()->row()->id;

 					//$pData->hl7_content = $hl7_content;
					$content = $this->text_file_content_type2($pData);

					$filePath1 = './' . MDR_Billing . "/$newFileName";
					if (!is_dir('./' . MDR_Billing)) 
					{
						mkdir('./' . MDR_Billing, 0777, TRUE);
					}

					if (!write_file($filePath1, $content['res'])) 
					{
						$resArr = ['status' => 'error', 'message' => $content['res'].'Unable to write the file'];
					} 
					else 
					{
						$this->db->insert('generated_file_message_data', [
							'patient_id' => $id,
							'request_id' => $request_id,
							'message_control_id' => $content['message_control_id'],
							'file_type' => 'HL7',
							'file_name' => $newFileName,
							'file_path' => '/' . Report_Send . '/',
							'created_by' => $createdBy
						]);
						$this->db->update('patients', ['obr' => $filePath1], ['id' => $id]);
						$resArr = ['status' => 'success', 'message' => 'Successfully generate Report file'];
					}
                } else {
                    $resArr = ['status' => 'error', 'message' => 'Patient data not found on database'];
                }
            }
        }

        echo json_encode($resArr);
		
        return $resArr;
    }
    
    
    
     public function generate_orm_file2()
	{
        $resArr = ['status' => 'error', 'message' => 'Something went wrong, Please Try Again.'];
        if ($this->input->post()) 
		{
            $id = $this->input->post('id');
            $request_id = $this->input->post('request_id');

            if (isset($id) && !empty($id)) 
			{
                $pData = $this->db->get_where('patients', ['id' => $id])->row();
                if (isset($pData)) {

                    $this->load->model('Doctor_model');
                    $pData->test = $this->Doctor_model->specimen_block_detail($request_id);
                    $pData->constant = $this->db->get('hl7_constant_data')->row();
                    $pData->pdfData = $this->generate_pdf_report($request_id);
					$pData->pdfReportData = @file_get_contents(base_url('uploads/reports_pdf/' . $request_id."_".date(Y).".pdf"));
//$pData->pdf_content=$this->db->get_where('request', ['uralensis_request_id' => $request_id])->row()->hl7_content;


					$pData->rDate=$this->db->get_where('request', ['uralensis_request_id' => $request_id])->row()->date_received_bylab;
					$pData->pDate=$this->db->get_where('request', ['uralensis_request_id' => $request_id])->row()->publish_datetime;

					$pData->pdf_content=$this->db->get_where('request', ['uralensis_request_id' => $request_id])->row()->hl7_content;
                    $hl7_content = $this->db->get_where('request', ['uralensis_request_id' => $request_id])->row()->hl7_content;
                    $this->load->helper('file');
					$filename="$request_id";
                    $newFileName = "OFNQH"."0$request_id-" . time() . ".HL7";
                    $createdBy = $this->ion_auth->user()->row()->id;

 					//$pData->hl7_content = $hl7_content;
					$content = $this->text_file_content_type3($pData);

					$filePath1 = './' . MDR_Billing . "/$newFileName";
					if (!is_dir('./' . MDR_Billing)) 
					{
						mkdir('./' . MDR_Billing, 0777, TRUE);
					}

					if (!write_file($filePath1, $content['res'])) 
					{
						$resArr = ['status' => 'error', 'message' => $content['res'].'Unable to write the file'];
					} 
					else 
					{
						$this->db->insert('generated_file_message_data', [
							'patient_id' => $id,
							'request_id' => $request_id,
							'message_control_id' => $content['message_control_id'],
							'file_type' => 'HL7',
							'file_name' => $newFileName,
							'file_path' => '/' . Report_Send . '/',
							'created_by' => $createdBy
						]);
						$this->db->update('patients', ['obr' => $filePath1], ['id' => $id]);
						$resArr = ['status' => 'success', 'message' => 'Successfully generate Report file'];
					}
                } else {
                    $resArr = ['status' => 'error', 'message' => 'Patient data not found on database'];
                }
            }
        }

        echo json_encode($resArr);
		
        return $resArr;
    }
    


    public function generate_billing_file()
	{
        $constArr = $data->constant;
        if (isset($constArr) && !empty($constArr)) 
		{
        /*    $const_Field_Separator = $constArr->field_separator;                            //MSH
            $const_Encoding_Characters = $constArr->encoding_characters;                    //^~\&
            $const_Sending_Application = $constArr->sending_application;                    //Pathhub 1.0
            $const_Sending_Facility = $constArr->sending_facility;                          //HealthLink Pathology Partners
            $const_Receiving_Application = $constArr->receiving_application;                //MDR
            $const_Receiving_Facility = $constArr->receiving_facility;                      //pms3medd
            $const_Security = $constArr->security;                                          //''
            $const_Message_Type = $constArr->message_type;                                  //ORU
            $const_Trigger_Event = $constArr->trigger_event;                                //R01
            $const_Processing_ID = $constArr->processing_id;                                //P
            $const_Version_ID = $constArr->version_id;                                      //2.3.1
            $const_Sequence_Number = $constArr->sequence_number;                            //
            $const_Continuation_Pointer = $constArr->continuation_pointer;                  //
            $const_Accept_Acknowledgment_Type = $constArr->accept_acknowledgment_type;      //AL
            $const_Application_Acknowledgment_Type = $constArr->application_acknowledgment_type; //AL
            $const_Country_Code = $constArr->country_code;                                  //AUS
            $const_Character_Set = $constArr->character_set;                                //''
            $const_Principal_Language_Of_Message = $constArr->principal_language_of_message;//''
            $const_Assigning_Authority = $constArr->assigning_authority;                    //Far North Queensland Histopathology
            $const_Doctor_Assigning_Authority = $constArr->doctor_assigning_authority;      //PMS3MEDD
            $const_Value_Type = $constArr->value_type;                                      //ST
            $const_Patient_Class = $constArr->patient_class;                                //O
            $const_Message_Structure = $constArr->message_structure;                        //ORU_R01
*/       

            $const_Field_Separator = 'MSH';
            $const_Encoding_Characters = '^~\&';
            $const_Sending_Application = 'Pathhub 1.0';
            $const_Sending_Facility = 'FNQHpath';
            $const_Receiving_Application = 'Best Practice';
            $const_Receiving_Facility = 'pms3medd';
            $const_Security = '';
            $const_Message_Type = 'ORU';
            $const_Trigger_Event = 'R01';
            $const_Processing_ID = 'P';
            $const_Version_ID = '2.3.1';
            $const_Sequence_Number = '';
            $const_Continuation_Pointer = '';
            $const_Accept_Acknowledgment_Type = 'AL';
            $const_Application_Acknowledgment_Type = 'AL';
            $const_Country_Code = 'AUS';
            $const_Character_Set = '';
            $const_Principal_Language_Of_Message = '';
            $const_Assigning_Authority = 'Far North Queensland Histopathology';
            $const_Doctor_Assigning_Authority = 'PMS3MEDD';
            $const_Value_Type = 'ST';
            $const_Patient_Class = 'O';
            $const_Message_Structure = 'ORU_R01';
 } else {
            $const_Field_Separator = 'MSH';
            $const_Encoding_Characters = '^~\&';
            $const_Sending_Application = 'Pathhub 1.0';
            $const_Sending_Facility = 'FNQHpath';
            $const_Receiving_Application = 'Best Practice';
            $const_Receiving_Facility = 'pms3medd';
            $const_Security = '';
            $const_Message_Type = 'ORU';
            $const_Trigger_Event = 'R01';
            $const_Processing_ID = 'P';
            $const_Version_ID = '2.3.1';
            $const_Sequence_Number = '';
            $const_Continuation_Pointer = '';
            $const_Accept_Acknowledgment_Type = 'AL';
            $const_Application_Acknowledgment_Type = 'AL';
            $const_Country_Code = 'AUS';
            $const_Character_Set = '';
            $const_Principal_Language_Of_Message = '';
            $const_Assigning_Authority = 'Far North Queensland Histopathology';
            $const_Doctor_Assigning_Authority = 'PMS3MEDD';
            $const_Value_Type = 'ST';
            $const_Patient_Class = 'O';
            $const_Message_Structure = 'ORU_R01';
        }

	//MSH|^~\&|PATHHUB 0.1|fnqhpath|fnqhcair|FNQHCAIR|20221111135802+1000|PKI|ORU^R01|98765444|P|2.3.1|987654363||NE|AL|AUS



        /* Patient Data */
        $pId = $data->id;
        $pFirstName = $data->first_name;
        $pLastName = $data->last_name;
        $pGender = ($data->gender == 'Male') ? 'M' : 'F';
        $pDob = (!empty($data->dob) && $data->dob != '0000-00-00') ? date('Ymd', strtotime($data->dob)) : '';
        $address = "$data->address_1^$data->city^$data->state^$data->post_code^^$data->Country_Code";
        $pId1 = $data->p_id_1;
        $pId2 = $data->p_id_2;
        $patientSSN = $data->medicare_card_no;
        $patientState = ''; //$data->state
        $doctorData = $data->doctor;

        /* Doctor Data */
        $referDoctorId = $doctorData->id;
        $referDoctorFirstName = $doctorData->first_name;
        $referDoctorLastName = $doctorData->last_name;
        $referDoctorState = $doctorData->state;

        //Clinician Details
        $dId = ($data->clinicianInfo && count((array) $data->clinicianInfo) > 0) ? $data->clinicianInfo->id : "";
        $dFirstName = ($data->clinicianInfo && count((array) $data->clinicianInfo) > 0) ? "Dr. ".$data->clinicianInfo->cfirstname : "";
        $dLastName = ($data->clinicianInfo && count((array) $data->clinicianInfo) > 0) ? $data->clinicianInfo->clastname : "";
        $dSentDate = date('YmdHis', strtotime($doctorData->date_sent_touralensis)) . '+1000';

        $serialNumber = $doctorData->serial_number;
        $pciNumber = $doctorData->pci_number;
        $labNumber = $doctorData->lab_number;
        $labName = $doctorData->lab_name;
        $labNata = $doctorData->lab_nata;
        $doctor_mdr_number = $doctorData->doctor_mdr_number;

        $requestInsertDateTime = date('YmdHis', strtotime($doctorData->request_datetime)) . '+1000';
        $requestDateTime = date('YmdHis', strtotime($doctorData->date_taken)) . '+1000';
        $observationDateTime = date('YmdHis', strtotime($doctorData->publish_datetime)) . '+1000';
        $doctorRecordDateTime = date('YmdHis', strtotime($doctorData->date_rec_by_doctor)) . '+1000';

        /* Patient related extra data */
        //$senderName = $data->details->sender_name;
        //$senderCompany = $data->details->sender_company;
        //$receiverName = $data->details->receiver_name;
        //$receiverCompany = $data->details->receiver_company;

        $dateTime = date('YmdHis') . '+1000';
        $messageControlID = date('YmdHis');
        //$messageStructure = 'ORU_R01';
        //$unique_identifies = $this->unique_identifies_number($data->id);

        $res = '';
        //$res .= "$const_Field_Separator|$const_Encoding_Characters|$const_Sending_Application|$const_Sending_Facility|$const_Receiving_Application|$const_Receiving_Facility|$dateTime|$const_Security|$const_Message_Type^$const_Trigger_Event^$const_Message_Structure|$messageControlID|$const_Processing_ID|$const_Version_ID|$const_Sequence_Number|$const_Continuation_Pointer|$const_Accept_Acknowledgment_Type|$const_Application_Acknowledgment_Type|$const_Country_Code\n";
		$res .= "MSH|^~\&|Pathhub 1.0|FAR NORTH QUEENSLAND HISTOPATHOLOGY|MDR|pms3medd|$dateTime|PKI|ORU^R01|$messageControlID|P|2.3.1|$const_Sequence_Number||NE|AL|AUS\r\n";
        $res .= "PID|$pId||$pId1^^^$const_Assigning_Authority|$pId2|$pLastName^$pFirstName^^^||$pDob|$pGender|||$address||||||||$patientSSN\r\n";
        $res .= "PV1||$const_Patient_Class|$patientState^^|||||$referDoctorId^$referDoctorFirstName^$referDoctorLastName^^^^^^$const_Doctor_Assigning_Authority|||OP|||||||||2|||||||||||||||||||||||||$doctorRecordDateTime|\r\n";
        $res .= "ORC|RE||$serialNumber^ACME Pathology^7654^AUSNATA||CM||^^^$dSentDate||$dSentDate|||$dId^$dFirstName^$dLastName^^^DR^^^AUSHICPR^L^^^PRN\r\n";
        $res .= "OBR|1|$pciNumber|$labNumber^$labName^7654^AUSNATA|CBC^MASTER FULL BLOOD COUNT^7654||$requestInsertDateTime|$observationDateTime|$doctorRecordDateTime||||||$doctorRecordDateTime||$dId^$dFirstName^$dLastName^^^DR^^^PMS3MEDD^L^^^PRN||||DR=$patientSSN,LN=$doctor_mdr_number,RC=Y||$doctorRecordDateTime||HM|F||^^^$doctorRecordDateTime|1234567X ^^^^^DR^^^PMSBESTP^L^^^UPIN~0191324T^SPECIALIST^ANDREW^^^DR^^^AUSHICPR^L^^^UPIN||||\r\n";

        $case1 = '';
        $obx = 0;

        foreach ($data->test as $test) 
		{
            // $obx++;
            $testId = $test->id;
            $testName = $test->name;
            $testDescription = $test->description;
            $observationDate = date('YmdHis', strtotime($test->date_entered)) . '+1000';
            $testNames = explode(",",$test->test_names);
            $testIds = explode(",", $test->test_ids);
            foreach($testNames as $tkey => $tname){
                foreach ($data->testListArr as $testRow) 
				{
					static $u=1;
                    if($testRow['name'] == $tname){
                        $obx++;
                        $testidno = $testRow['test_id'];
                        $case1 .= "OBX|$u||$testidno^$tname||||||||F|||$observationDate\r\n";
                    }
                $u++;
				}
                
                
            }
            //$case1 .= "OBX|$obx|$const_Value_Type|$testId^$testDescription^$testName||$testDescription||||||F|||$observationDate\n";
        }

        //Adding Billing code Details

        $billingInfo = $data->billing_code;
        if($billingInfo && count((array) $billingInfo) > 0){
            foreach ($billingInfo as $bkey => $billing) {
                $obx++;
                $billingData = explode(" ", $billing->bill_code);
                $billingId = $billingData[0];
                array_shift($billingData);
                $billingDesc = implode(" ", $billingData);
                $case1 .= "OBX|$obx|CE|^$billingDesc||^$billingId||||||F\r\n";
                //$case1 .= "OBX|$obx|XCN|^Billing Provider||$billing->bill_code^$billing->bill_code_text^$dFirstName^$dLastName^^^DR^^^AUSHICPR^L^^^UPIN||||||F\n";
            }
        }

        // foreach ($data->billing_code as $billing) {
        //     $obx++;
        //     $case1 .= "OBX|$obx|XCN|^Billing Provider||$billing->bill_code^$billing->bill_code_text^$dFirstName^$dLastName^^^DR^^^AUSHICPR^L^^^UPIN||||||F\n";
        // }
        /*$obx++;
        $case1 .= "OBX|$obx|XCN|^Billing Provider||^000000AA^Roy^Jason^^^DR^^^AUSHICPR^L^^^UPIN||||||F\n";
        $obx++;
        $case1 .= "OBX|$obx|CE|^Patient Episode Initiation||^43234||||||F\n";
        $obx++;
        $case1 .= "OBX|$obx|CE|^Histology Complexity Billing Code||^88342||||||F\n";*/

//ORC|RE||07-1234567-FNQH-0^2203.AUSNATA^2203^L||CM
//OBR|1||07-1234567-FNQH-0^2203.AUSNATA^2203^L|Histology|||20221110134528+1000|||L|L||SHAVE BIOPSY RIGHT CHEEK - ?SCC|||279535EF^Rajeswaran^Vinodh^^^Dr^^^AUSHICPR~8003615008279387^Rajeswaran^Vinodh^^^Dr^^^AUSHIC^^^^NPI|||||||||||^^^20221110134528+1000


        $case2 = '';
        $reportType = 'Histopathology Report';
        $pdfData = $data->pdfData;
       // $case2 .= "OBX|1|FT|$reportType^^AUSLAB||$pdfData||||||F|||$dateTime|^^AUSLAB \n";

        return ['res' => $res . $case1, 'res2' => $res . $case2, 'message_control_id' => $messageControlID];
        //return $res;
    }


    private function text_file_content_type1($data)
	{

        $reportType = 'Histopathology Report';
        $pdfData = $data->pdfData;
        $contentText = $data->hl7_content;
        $doctorData = $data->doctor;
        $dFirstName = $doctorData->first_name;
        $dLastName = $doctorData->last_name;
        $dateTime = date('YmdHis') . '+1000';
        $messageControlID = date('YmdHis');

        $res = [];
        $sectionList = ['MSH', 'OBX'];
        $contentArr = explode('<br />', $contentText);
        $obxCnt = 1;
        foreach ($contentArr as $k=>$str){
            $row = explode('|', $str);
            if(in_array(trim($row[0]), $sectionList)){
                if(trim($row[0]) == 'MSH'){
                    $res['Message Header'] = $this->getMSH($row);
                    $res['Message Header']['Date/Time Of Message'] = $dateTime;
                    $res['Message Header']['Message Control ID'] = $messageControlID;
                    $contentArr[$k] = join('|', $res['Message Header']);
                }elseif (trim($row[0]) == 'OBX'){
                    $obxCnt++;
                }
            }
        }

        $const_Value_Type = 'NM';
        foreach ($data->test as $test) {
            $testId = $test->id;
            $testName = $test->name;
            $testDescription = $test->description;
            $observationDate = date('YmdHis', strtotime($test->date_entered)) . '+1000';
            $contentArr[] = "\nOBX|$obxCnt|$const_Value_Type|$testId^$testDescription^$testName||$testDescription||||||F|||$observationDate\n";
            $obxCnt ++;
        }

        foreach ($data->billing_code as $billing) {
            $contentArr[] = "\nOBX|$obxCnt|XCN|^Billing Provider||$billing->bill_code^$billing->bill_code_text^$dFirstName^$dLastName^^^DR^^^AUSHICPR^L^^^UPIN||||||F\n";
            $obxCnt++;
        }

        $contentArr[] = "\nOBX|$obxCnt|FT|$reportType^^AUSLAB||$pdfData||||||F|||$dateTime|^^AUSLAB\n";

        $resContentTxt = join('\n', $contentArr);
        return ['res' => $resContentTxt, 'message_control_id' => $messageControlID];
    }

    private function getMSH($row){
        return [
            'Field Separator'                   => trim($row[0]),
            'Encoding Characters'               => trim($row[1]),
            'Sending Application'               => trim($row[2]),
            'Sending Facility'                  => trim($row[3]),
            'Receiving Application'             => trim($row[4]),
            'Receiving Facility'                => trim($row[5]),
            'Date/Time Of Message'              => trim($row[6]),
            'Security'                          => trim($row[7]),
            'Message Type'                      => trim($row[8]),
            'Message Control ID'                => trim($row[9]),
            'Processing ID'                     => trim($row[10]),
            'Version ID'                        => trim($row[11]),
            'Sequence Number'                   => trim($row[12]),
            'Continuation Pointer'              => trim($row[13]),
            'Accept Acknowledgment Type'        => trim($row[14]),
            'Application Acknowledgment Type'   => trim($row[15]),
            'Country Code'                      => trim($row[16]),
            'Character Set'                     => trim($row[17]),
            'Principal Language of Message'     => trim($row[18])
        ];
    }


    private function convertStringData($contentText){
        $res = [];
        $sectionList = ['MSH', 'PID', 'PV1', 'ORC', 'OBR', 'OBX'];
        $contentArr = explode('<br />', $contentText);
        foreach ($contentArr as $str){
            $row = explode('|', $str);
            if(in_array(trim($row[0]), $sectionList)){
                if(trim($row[0]) == 'MSH'){
                    $res['Message Header'] = $this->getMSH($row);
                }elseif(trim($row[0]) == 'PID'){
                    $res['Patient Identification'] = $this->getPID($row);
                }elseif(trim($row[0]) == 'PV1'){
                    $res['Patient Visit'] = $this->getPV1($row);
                }elseif (trim($row[0]) == 'OBR'){
                    $res['Observation Request'] = $this->getOBR($row);
                }elseif (trim($row[0]) == 'OBX'){
                    $res['Observation Result'][] = $this->getOBX($row);
                }elseif (trim($row[0]) == 'ORC'){
                    $res['Common Order'] = $this->getORC($row);
                }
            }
        }
        $res['original_content'] = $contentText;
        return $res;
    }

    private function text_file_content_type2($data)
	{
        $constArr = $data->constant;       
	    $hl7_content=$data->pdf_content;
		$res_val=explode('<br />', $hl7_content);
		$report=base64_encode($data->pdfReportData);
		$data->rDate."<br>";
		
		$data->pDate."<br>";
		
		$rdate_final=date('YmdHis', strtotime($data->rDate)) . '+1000';
		$pdate_final=date('YmdHis', strtotime($data->pDate)) . '+1000';
		
	/*print "<pre>";
	print_r($res_val);
	print "</pre>";
	exit;*/
	
		//MSH|^~\&|PATHHUB 0.1|fnqhpath|fnqhcair|FNQHCAIR|20221111135802+1000|PKI|ORU^R01|98765444|P|2.3.1|987654363||NE|AL|AUS
       /* Patient Data */
        $pId = $data->id;
        $pFirstName = $data->first_name;
        $pLastName = $data->last_name;
        $pGender = ($data->gender == 'Male') ? 'M' : 'F';
        $pDob = (!empty($data->dob) && $data->dob != '0000-00-00') ? date('Ymd', strtotime($data->dob)) : '';
        $address = "$data->address_1^$data->city^$data->state^$data->post_code^^$data->country_code";
        $pId1 = $data->p_id_1;
        $pId2 = $data->p_id_2;
        $patientSSN = $data->medicare_card_no;
        $patientState = ''; //$data->state
        $doctorData = $data->doctor;

        /* Doctor Data */
        $referDoctorId = $doctorData->id;
        $referDoctorFirstName = $doctorData->first_name;
        $referDoctorLastName = $doctorData->last_name;
        $referDoctorState = $doctorData->state;

        $dId = $doctorData->id;
        $dFirstName = $doctorData->first_name;
        $dLastName = $doctorData->last_name;
        $dSentDate = date('YmdHis', strtotime($doctorData->date_sent_touralensis)) . '+1000';

        $serialNumber = $doctorData->serial_number;
        $pciNumber = $doctorData->pci_number;
        $labNumber = $doctorData->lab_number;
        $labName = $doctorData->lab_name;
        $labNata = $doctorData->lab_nata;
        $doctor_mdr_number = $doctorData->doctor_mdr_number;

        $requestInsertDateTime = date('YmdHis', strtotime($doctorData->request_datetime)) . '+1000';
        $requestDateTime = date('YmdHis', strtotime($doctorData->date_taken)) . '+1000';
        $observationDateTime = date('YmdHis', strtotime($doctorData->publish_datetime)) . '+1000';
        $doctorRecordDateTime = date('YmdHis', strtotime($doctorData->date_rec_by_doctor)) . '+1000';

        /* Patient related extra data */
        //$senderName = $data->details->sender_name;
        //$senderCompany = $data->details->sender_company;
        //$receiverName = $data->details->receiver_name;
        //$receiverCompany = $data->details->receiver_company;

        //$messageStructure = 'ORU_R01';
        //$unique_identifies = $this->unique_identifies_number($data->id);
        //$res .= "$const_Field_Separator|$const_Encoding_Characters|$const_Sending_Application|$const_Sending_Facility|$const_Receiving_Application|$const_Receiving_Facility|$dateTime|$const_Security|$const_Message_Type^$const_Trigger_Event^$const_Message_Structure|$messageControlID|$const_Processing_ID|$const_Version_ID|$const_Sequence_Number|$const_Continuation_Pointer|$const_Accept_Acknowledgment_Type|$const_Application_Acknowledgment_Type|$const_Country_Code\n";

		//OBR|1||07-1234567-FNQH-0^2203.AUSNATA^2203^L|Histology|||20221110134528+1000|||L|L||SHAVE BIOPSY RIGHT CHEEK - ?SCC|||279535EF^Rajeswaran^Vinodh^^^Dr^^^AUSHICPR~8003615008279387^Rajeswaran^Vinodh^^^Dr^^^AUSHIC^^^^NPI|||||||||||^^^20221110134528+1000
		//PID|1||19015^^^BPS^PI~4003851291^9^AUSMC^AUSHIC^MC~8003601157984720^^^AUSHIC^NI||Spear^William^^^Mr^^L||19390815|M||4^Neither Aboriginal nor Torres Strait Islander^602543|78 Golden Grove Drive^^BENTLEY PARK^QLD^4870^^H||^PRN^CP^^^^0408187156~^ORN^PH^^^07^40450308|^WPN^PH^^^^0408187156
		//PV1|1|O||||||279535EF^Rajeswaran^Vinodh^^^Dr^^^AUSHICPR|279535EF^Rajeswaran^Vinodh^^^Dr^^^AUSHICPR|||||||||||BULKBILL
		//ORC|RE||07-1234567-FNQH-0^2203.AUSNATA^2203^L||CM
		//OBR|1||07-1234567-FNQH-0^2203.AUSNATA^2203^L|Histology|||20221110134528+1000|||L|L||SHAVE BIOPSY RIGHT CHEEK - ?SCC|||279535EF^Rajeswaran^Vinodh^^^Dr^^^AUSHICPR~8003615008279387^Rajeswaran^Vinodh^^^Dr^^^AUSHIC^^^^NPI|||||||||||^^^20221110134528+1000
       
	    $dateTime = date('YmdHis') . '+1000';
        $messageControlID = date('YmdHis');

		$obx_array=explode("|",$res_val[4]);
		$pid_array=explode("|",$res_val[1]);
		$pv1_array=explode("|",$res_val[2]);
		//$obx_array[2] = "";
		//$obx_array[3]="07-1234567-FNQH-0^2203.AUSNATA^2203^L";
//$res .= rtrim($res_val[1])."\n";
//$res .= rtrim($res_val[2])."\n";
        $res = '';
		$case2 = '';
        $reportType = 'Histopathology Report';
        $pdfData = $data->pdfData;

        $res .= "MSH|^~\&|PATHHUB 0.1|fnqhpath|fnqhcair|FNQHCAIR|$dateTime|PKI|ORU^R01|$messageControlID|P|2.3.1|$const_Sequence_Number||NE|AL|AUS\r\n";
       	$res .="PID|1||".$pid_array[3]."||".$pid_array[5]."||".$pid_array[7]."|".$pid_array[8]."||".$pid_array[10]."|".$pid_array[11]."||".$pid_array[13]."|".$pid_array[14]."\r\n";		
        $res .="PV1|1|O||||||".$pv1_array[8]."|".$pv1_array[8]."|||||||||||".$pv1_array[20]."\r\n";		
        $res .= "ORC|RE||07-1234567-FNQH-0^2203.AUSNATA^2203^L||CM\r\n";
		$res .="OBR|1||07-1234567-FNQH-0^2203.AUSNATA^2203^L|Histology^FNQH Histology Reports||$rdate_final||||L|L||".$obx_array[13]."|||".$obx_array[16]."|||||||||||^^^$rdate_final\r\n";
        $case2 .= "OBX|1|ED|PDF^Display format in PDF^AUSPDI||^TX^PDF^Base64^$report||||||F|||$pdate_final|^^AUSLAB";

        return ['res' => $res . $case2, 'res2' => $res . $case2, 'message_control_id' => $messageControlID];
        //return $res;
    }
    
    
    private function text_file_content_type3($data)
	{
        $constArr = $data->constant;       
	    $hl7_content=$data->pdf_content;
		$res_val=explode('<br />', $hl7_content);
		$report=base64_encode($data->pdfReportData);
		$data->rDate."<br>";
		
		$data->pDate."<br>";
		
		$rdate_final=date('YmdHis', strtotime($data->rDate)) . '+1000';
		$pdate_final=date('YmdHis', strtotime($data->pDate)) . '+1000';
	
		//MSH|^~\&|PATHHUB 0.1|fnqhpath|fnqhcair|FNQHCAIR|20221111135802+1000|PKI|ORU^R01|98765444|P|2.3.1|987654363||NE|AL|AUS
       /* Patient Data */
        $pId = $data->id;
        $pFirstName = $data->first_name;
        $pLastName = $data->last_name;
        $pGender = ($data->gender == 'Male') ? 'M' : 'F';
        $pDob = (!empty($data->dob) && $data->dob != '0000-00-00') ? date('Ymd', strtotime($data->dob)) : '';
        $address = "$data->address_1^$data->city^$data->state^$data->post_code^^$data->country_code";
        $pId1 = $data->p_id_1;
        $pId2 = $data->p_id_2;
        $patientSSN = $data->medicare_card_no;
        $patientState = ''; //$data->state
        $doctorData = $data->doctor;

        /* Doctor Data */
        $referDoctorId = $doctorData->id;
        $referDoctorFirstName = $doctorData->first_name;
        $referDoctorLastName = $doctorData->last_name;
        $referDoctorState = $doctorData->state;

        $dId = $doctorData->id;
        $dFirstName = $doctorData->first_name;
        $dLastName = $doctorData->last_name;
        $dSentDate = date('YmdHis', strtotime($doctorData->date_sent_touralensis)) . '+1000';

        $serialNumber = $doctorData->serial_number;
        $pciNumber = $doctorData->pci_number;
        $labNumber = $doctorData->lab_number;
        $labName = $doctorData->lab_name;
        $labNata = $doctorData->lab_nata;
        $doctor_mdr_number = $doctorData->doctor_mdr_number;

        $requestInsertDateTime = date('YmdHis', strtotime($doctorData->request_datetime)) . '+1000';
        $requestDateTime = date('YmdHis', strtotime($doctorData->date_taken)) . '+1000';
        $observationDateTime = date('YmdHis', strtotime($doctorData->publish_datetime)) . '+1000';
        $doctorRecordDateTime = date('YmdHis', strtotime($doctorData->date_rec_by_doctor)) . '+1000';

        /* Patient related extra data */
        //$senderName = $data->details->sender_name;
        //$senderCompany = $data->details->sender_company;
        //$receiverName = $data->details->receiver_name;
        //$receiverCompany = $data->details->receiver_company;

        //$messageStructure = 'ORU_R01';
        //$unique_identifies = $this->unique_identifies_number($data->id);
        //$res .= "$const_Field_Separator|$const_Encoding_Characters|$const_Sending_Application|$const_Sending_Facility|$const_Receiving_Application|$const_Receiving_Facility|$dateTime|$const_Security|$const_Message_Type^$const_Trigger_Event^$const_Message_Structure|$messageControlID|$const_Processing_ID|$const_Version_ID|$const_Sequence_Number|$const_Continuation_Pointer|$const_Accept_Acknowledgment_Type|$const_Application_Acknowledgment_Type|$const_Country_Code\n";

		//OBR|1||07-1234567-FNQH-0^2203.AUSNATA^2203^L|Histology|||20221110134528+1000|||L|L||SHAVE BIOPSY RIGHT CHEEK - ?SCC|||279535EF^Rajeswaran^Vinodh^^^Dr^^^AUSHICPR~8003615008279387^Rajeswaran^Vinodh^^^Dr^^^AUSHIC^^^^NPI|||||||||||^^^20221110134528+1000
		//PID|1||19015^^^BPS^PI~4003851291^9^AUSMC^AUSHIC^MC~8003601157984720^^^AUSHIC^NI||Spear^William^^^Mr^^L||19390815|M||4^Neither Aboriginal nor Torres Strait Islander^602543|78 Golden Grove Drive^^BENTLEY PARK^QLD^4870^^H||^PRN^CP^^^^0408187156~^ORN^PH^^^07^40450308|^WPN^PH^^^^0408187156
		//PV1|1|O||||||279535EF^Rajeswaran^Vinodh^^^Dr^^^AUSHICPR|279535EF^Rajeswaran^Vinodh^^^Dr^^^AUSHICPR|||||||||||BULKBILL
		//ORC|RE||07-1234567-FNQH-0^2203.AUSNATA^2203^L||CM
		//OBR|1||07-1234567-FNQH-0^2203.AUSNATA^2203^L|Histology|||20221110134528+1000|||L|L||SHAVE BIOPSY RIGHT CHEEK - ?SCC|||279535EF^Rajeswaran^Vinodh^^^Dr^^^AUSHICPR~8003615008279387^Rajeswaran^Vinodh^^^Dr^^^AUSHIC^^^^NPI|||||||||||^^^20221110134528+1000
       
	    $dateTime = date('YmdHis') . '+1000';
        $messageControlID = date('YmdHis');

		$obx_array=explode("|",$res_val[4]);
		$pid_array=explode("|",$res_val[1]);
		$pv1_array=explode("|",$res_val[2]);
		//$obx_array[2] = "";
		//$obx_array[3]="07-1234567-FNQH-0^2203.AUSNATA^2203^L";
//$res .= rtrim($res_val[1])."\n";
//$res .= rtrim($res_val[2])."\n";
        $res = '';
		$case2 = '';
        $reportType = 'Histopathology Report';
        $pdfData = $data->pdfData;
        
        $const_Assigning_Authority = 'Far North Queensland Histopathology';
        $const_Patient_Class = 'O';
        $const_Doctor_Assigning_Authority = 'PMS3MEDD';

        $res .= "MSH|^~\&|PATHHUB 0.1|fnqhpath|fnqhcair|FNQHCAIR|$dateTime|PKI|ORU^R01|$messageControlID|P|2.3.1|$const_Sequence_Number||NE|AL|AUS\r\n";
        if($hl7_content != '' && count($res_val) > 0)
		{
            $res .="PID|1||".$pid_array[3]."||".$pid_array[5]."||".$pid_array[7]."|".$pid_array[8]."||".$pid_array[10]."|".$pid_array[11]."||".$pid_array[13]."|".$pid_array[14]."\r\n";		
            $res .="PV1|1|O||||||".$pv1_array[8]."|".$pv1_array[8]."|||||||||||".$pv1_array[20]."\r\n";		
        }
		else
		{
			$patientSSN=@str_replace("/","^",$patientSSN);
			$address2=$data->state."^^".$data->post_code;
			
			$res .="PID|1||$PID^^^BPS^PI~$patientSSN^9^AUSMC^AUSHIC^NI||$pLastName^$pFirstName^^^||$pDob|$pGender|||^^$address2\r\n";
			
            //$res .= "PID|1|||^^^BPS^PI^$patientSSN^AUSMC^AUSHIC^MC|$pLastName^$pFirstName^^^||$pDob|$pGender|||$address\r\n";
           
		   $res .="PV1|1|O||||||$referDoctorId^$referDoctorFirstName^$referDoctorLastName^^^Dr^^^$const_Doctor_Assigning_Authority|$referDoctorId^$referDoctorFirstName^$referDoctorLastName^^^Dr^^^$const_Doctor_Assigning_Authority|||||||||||BULKBILL\r\n";
		    //$res .= "PV1|1|||||||$referDoctorId^^^^^^^^|||OP|||||||||2|||||||||||||||||||||||||$doctorRecordDateTime|\r\n";
        }
        $res .= "ORC|RE||07-1234567-FNQH-0^2203.AUSNATA^2203^L||CM\r\n";
		$res .="OBR|1||07-1234567-FNQH-0^2203.AUSNATA^2203^L|Histology^FNQH Histology Reports||$rdate_final||||L|L||".$obx_array[13]."|||".$obx_array[16]."|||||||||||^^^$rdate_final\r\n";
        $case2 .= "OBX|1|ED|PDF^Display format in PDF^AUSPDI||^TX^PDF^Base64^$report||||||F|||$pdate_final|^^AUSLAB";

        return ['res' => $res . $case2, 'res2' => $res . $case2, 'message_control_id' => $messageControlID];
        //return $res;
    }

    private function text_file_content_billing($data)
	{
        $constArr = $data->constant;
       

	//MSH|^~\&|PATHHUB 0.1|fnqhpath|fnqhcair|FNQHCAIR|20221111135802+1000|PKI|ORU^R01|98765444|P|2.3.1|987654363||NE|AL|AUS



        /* Patient Data */
        $pId = $data->id;
        $pFirstName = $data->first_name;
        $pLastName = $data->last_name;
        $pGender = ($data->gender == 'Male') ? 'M' : 'F';
        $pDob = (!empty($data->dob) && $data->dob != '0000-00-00') ? date('Ymd', strtotime($data->dob)) : '';
        $address = "$data->address_1^$data->city^$data->state^$data->post_code^^$data->country_code";
        $pId1 = $data->p_id_1;
        $pId2 = $data->p_id_2;
        $patientSSN = $data->medicare_card_no;
        $patientState = ''; //$data->state
        $doctorData = $data->doctor;

        /* Doctor Data */
        $referDoctorId = $doctorData->id;
        $referDoctorFirstName = $doctorData->first_name;
        $referDoctorLastName = $doctorData->last_name;
        $referDoctorState = $doctorData->state;

        $dId = $doctorData->id;
        $dFirstName = $doctorData->first_name;
        $dLastName = $doctorData->last_name;
        $dSentDate = date('YmdHis', strtotime($doctorData->date_sent_touralensis)) . '+1000';

        $serialNumber = $doctorData->serial_number;
        $pciNumber = $doctorData->pci_number;
        $labNumber = $doctorData->lab_number;
        $labName = $doctorData->lab_name;
        $labNata = $doctorData->lab_nata;
        $doctor_mdr_number = $doctorData->doctor_mdr_number;

        $requestInsertDateTime = date('YmdHis', strtotime($doctorData->request_datetime)) . '+1000';
        $requestDateTime = date('YmdHis', strtotime($doctorData->date_taken)) . '+1000';
        $observationDateTime = date('YmdHis', strtotime($doctorData->publish_datetime)) . '+1000';
        $doctorRecordDateTime = date('YmdHis', strtotime($doctorData->date_rec_by_doctor)) . '+1000';

        /* Patient related extra data */
        //$senderName = $data->details->sender_name;
        //$senderCompany = $data->details->sender_company;
        //$receiverName = $data->details->receiver_name;
        //$receiverCompany = $data->details->receiver_company;

        $dateTime = date('YmdHis') . '+1000';
        $messageControlID = date('YmdHis');
        //$messageStructure = 'ORU_R01';
        //$unique_identifies = $this->unique_identifies_number($data->id);

        $res = '';
        //$res .= "$const_Field_Separator|$const_Encoding_Characters|$const_Sending_Application|$const_Sending_Facility|$const_Receiving_Application|$const_Receiving_Facility|$dateTime|$const_Security|$const_Message_Type^$const_Trigger_Event^$const_Message_Structure|$messageControlID|$const_Processing_ID|$const_Version_ID|$const_Sequence_Number|$const_Continuation_Pointer|$const_Accept_Acknowledgment_Type|$const_Application_Acknowledgment_Type|$const_Country_Code\n";
		$res .= "MSH|^~\&|Pathhub 1.0|FAR NORTH QUEENSLAND HISTOPATHOLOGY|MDR|pms3medd|$dateTime|PKI|ORU^R01|$messageControlID|P|2.3.1|$const_Sequence_Number||NE|AL|AUS";
        $res .= "PID|$pId||$pId1^^^$const_Assigning_Authority|$pId2|$pLastName^$pFirstName^^^||$pDob|$pGender|||$address||||||||$patientSSN\n";
        $res .= "PV1||$const_Patient_Class|$patientState^^|||||$referDoctorId^$referDoctorFirstName^$referDoctorLastName^^^^^^$const_Doctor_Assigning_Authority|||OP|||||||||2|||||||||||||||||||||||||$doctorRecordDateTime|\n";
        $res .= "ORC|RE||$serialNumber^ACME Pathology^7654^AUSNATA||CM||^^^$dSentDate||$dSentDate|||$dId^$dFirstName^$dLastName^^^DR^^^AUSHICPR^L^^^PRN\n";
        $res .= "OBR|1|$pciNumber|$labNumber^$labName^7654^AUSNATA|CBC^MASTER FULL BLOOD COUNT^7654||$requestInsertDateTime|$observationDateTime|$doctorRecordDateTime||||||$doctorRecordDateTime||$dId^$dFirstName^$dLastName^^^DR^^^PMS3MEDD^L^^^PRN||||DR=$patientSSN,LN=$doctor_mdr_number,RC=Y||$doctorRecordDateTime||HM|F||^^^$doctorRecordDateTime|1234567X ^^^^^DR^^^PMSBESTP^L^^^UPIN~0191324T^SPECIALIST^ANDREW^^^DR^^^AUSHICPR^L^^^UPIN||||\n";

        $case1 = '';
        $obx = 0;
        foreach ($data->test as $test) 
		{
            $obx++;
            $testId = $test->id;
            $testName = $test->name;
            $testDescription = $test->description;
            $observationDate = date('YmdHis', strtotime($test->date_entered)) . '+1000';
            $case1 .= "OBX|$obx|$const_Value_Type|$testId^$testDescription^$testName||$testDescription||||||F|||$observationDate\n";
        }

        foreach ($data->billing_code as $billing) 
		{
            $obx++;
            $case1 .= "OBX|$obx|XCN|^Billing Provider||$billing->bill_code^$billing->bill_code_text^$dFirstName^$dLastName^^^DR^^^AUSHICPR^L^^^UPIN||||||F\n";
        }
        /*$obx++;
        $case1 .= "OBX|$obx|XCN|^Billing Provider||^000000AA^Roy^Jason^^^DR^^^AUSHICPR^L^^^UPIN||||||F\n";
        $obx++;
        $case1 .= "OBX|$obx|CE|^Patient Episode Initiation||^43234||||||F\n";
        $obx++;
        $case1 .= "OBX|$obx|CE|^Histology Complexity Billing Code||^88342||||||F\n";*/

//ORC|RE||07-1234567-FNQH-0^2203.AUSNATA^2203^L||CM
//OBR|1||07-1234567-FNQH-0^2203.AUSNATA^2203^L|Histology|||20221110134528+1000|||L|L||SHAVE BIOPSY RIGHT CHEEK - ?SCC|||279535EF^Rajeswaran^Vinodh^^^Dr^^^AUSHICPR~8003615008279387^Rajeswaran^Vinodh^^^Dr^^^AUSHIC^^^^NPI|||||||||||^^^20221110134528+1000


        $case2 = '';
        $reportType = 'Histopathology Report';
        $pdfData = $data->pdfData;
       // $case2 .= "OBX|1|FT|$reportType^^AUSLAB||$pdfData||||||F|||$dateTime|^^AUSLAB \n";

        return ['res' => $res . $case1, 'res2' => $res . $case2, 'message_control_id' => $messageControlID];
        //return $res;
    }


}

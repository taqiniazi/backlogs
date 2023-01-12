<?php
defined('BASEPATH') or exit('No direct script access allowed');
class PatientModel extends CI_Model
{
    public function fetch_patients($patient_type = NULL)
    {
        $user_id = $this->ion_auth->user()->row()->id;
        $group_row = $this->ion_auth->get_users_main_groups()->row();
        $group_type = $group_row->group_type;
        $group_id = $group_row->id;

        $res = array();
        if ($group_type == 'A') {
            if($patient_type == NULL || $patient_type == 'view_all'){
                $res = $this->db
                    ->select("patients.id as patient_id, patients.*, `groups`.*", FALSE)
                    ->join('groups', 'groups.id = patients.hospital_id')
                    ->get('patients')->result_array();
            }
            elseif ($patient_type == 'public') {
                $res = $this->db
                    ->select("patients.id as patient_id, patients.*, `groups`.*", FALSE)
                    ->join('groups', 'groups.id = patients.hospital_id')
                    ->where("patients.medicare_card_no", "<>", "" )
                    ->get('patients')->result_array();
            }
            elseif ($patient_type == 'private') {
                $res = $this->db
                    ->select("patients.id as patient_id, patients.*, `groups`.*", FALSE)
                    ->join('groups', 'groups.id = patients.hospital_id')
                    ->where("patients.medicare_card_no", "=", "" )
                    ->get('patients')->result_array();
            }
            else {
                $res = $this->db
                    ->select("patients.id as patient_id, patients.*, `groups`.*", FALSE)
                    ->join('groups', 'groups.id = patients.hospital_id')
                    ->get('patients')->result_array();
            }
        }
        if ($group_type == 'D') {
            $distinct_patients = $this->db
                ->distinct()
                ->select("patient_id")
                ->join("users_request", "users_request.request_id = request.uralensis_request_id")
                ->where('doctor_id', $user_id)
                ->get('request')->result_array();
            $patient_id_set = "(";
            foreach ($distinct_patients as $pid) {
                $patient_id_set .= $pid['patient_id'] . ", ";
            }
            $patient_id_set = rtrim($patient_id_set, ", ");
            $patient_id_set .= ")";


            if($patient_type == NULL || $patient_type == 'view_all'){
                $sql = "SELECT patients.id as patient_id, patients.*, `groups`.* FROM `patients` JOIN `groups` ON `groups`.`id` = `patients`.`hospital_id` WHERE patients.id in $patient_id_set";
            }
            elseif ($patient_type == 'public') {
                $sql = "SELECT patients.id as patient_id, patients.*, `groups`.* FROM `patients` JOIN `groups` ON `groups`.`id` = `patients`.`hospital_id` WHERE patients.id in $patient_id_set and patients.medicare_card_no <>''";
            }
             elseif ($patient_type == 'private') {
                $sql = "SELECT patients.id as patient_id, patients.*, `groups`.* FROM `patients` JOIN `groups` ON `groups`.`id` = `patients`.`hospital_id` WHERE patients.id in $patient_id_set and patients.medicare_card_no =' '";
             }
            

            $query = $this->db->query($sql);
            $res = $query->result_array();
        }
        if (in_array($group_type, HOSPITAL_GROUP)) {
            if($patient_type == NULL || $patient_type == 'view_all'){
                $res = $this->db
                    ->select("patients.id as patient_id, patients.*, `groups`.*", FALSE)
                    ->join("groups", "groups.id = patients.hospital_id")
                    ->where("hospital_id", $group_id)
                    ->get("patients")->result_array();
            }
            elseif ($patient_type == 'public') {
                $res = $this->db
                    ->select("patients.id as patient_id, patients.*, `groups`.*", FALSE)
                    ->join("groups", "groups.id = patients.hospital_id")
                    ->where("hospital_id", $group_id)
                    ->where("patients.medicare_card_no", "<>", "" )
                    ->get("patients")->result_array();
            }
            elseif ($patient_type == 'private') {
                $res = $this->db
                    ->select("patients.id as patient_id, patients.*, `groups`.*", FALSE)
                    ->join("groups", "groups.id = patients.hospital_id")
                    ->where("hospital_id", $group_id)
                    ->where("patients.medicare_card_no", "=", " " )
                    ->get("patients")->result_array();
            }
        }
        if (in_array($group_type, LAB_GROUP)) {

            $res_q = $this->db
                ->join('groups', 'groups.id = hospital_group.hospital_id')
                ->where('hospital_group.group_id', $group_id)
                ->get('hospital_group')->result_array();

            //print $group_id;
            //print_r($res_q);

            $patient_id_set = "(";
            foreach ($res_q as $pid) {
                $patient_id_set .= $pid['id'] . ", ";
            }
            $patient_id_set = rtrim($patient_id_set, ", ");
            $patient_id_set .= ")";

            if($patient_type == NULL || $patient_type == 'view_all') {
                $sql = "SELECT patients.id as patient_id,patients.first_name as first_name,patients.last_name as last_name, patients.*, `groups`.* FROM `patients` JOIN `groups` ON `groups`.`id` = `patients`.`hospital_id` WHERE hospital_id in $patient_id_set";
            }
            elseif ($patient_type == 'public') {
                $sql = "SELECT patients.id as patient_id,patients.first_name as first_name,patients.last_name as last_name, patients.*, `groups`.* FROM `patients` JOIN `groups` ON `groups`.`id` = `patients`.`hospital_id` WHERE hospital_id in $patient_id_set and patients.medicare_card_no <>'' ";
            }
            elseif ($patient_type == 'private') {
                $sql = "SELECT patients.id as patient_id,patients.first_name as first_name,patients.last_name as last_name, patients.*, `groups`.* FROM `patients` JOIN `groups` ON `groups`.`id` = `patients`.`hospital_id` WHERE hospital_id in $patient_id_set and patients.medicare_card_no =' ' ";
            }
            $query = $this->db->query($sql);
            $res = $query->result_array();
        }
        //echo $this->db->last_query(); exit; 
        return $res;
    }

    public function fetch_hospitals()
    {
        //print $go_id = $this->ion_auth->group()->row()->id;
        $user_id = $this->ion_auth->user()->row()->id;
        $group_row = $this->ion_auth->get_users_main_groups()->row();
        $group_type = $group_row->group_type;
        $group_id = $group_row->id;
        $res = array();
        if ($group_type == 'A') {
            // Get all hospitals
            $res = $this->db->get_where('groups', array('group_type' => 'H'))->result_array();
        }
        if (in_array($group_type, HOSPITAL_GROUP)) {
            $res = $this->db->get_where('groups', array('id' => $group_id))->result_array();
        }
        if (in_array($group_type, LAB_GROUP)) {
            $res = $this->db
                ->join('groups', 'groups.id = hospital_group.hospital_id')
                ->where('hospital_group.group_id', $group_id)
                ->where('groups.group_type', 'H')
                ->get('hospital_group')->result_array();
            // echo $this->db->last_query(); exit; 


        }
        if ($group_type == 'D') {
            $res = $this->db
                ->join('groups', 'groups.id = users_groups.institute_id')
                ->where('user_id', $user_id)
                ->where('institute_id !=', 'null')
                ->get('users_groups')->result_array();
        }
        return $res;
    }

    public function get_patient_data($id)
    {
        $res = $this->db
            ->select("patients.*, patient_other_details.id as otherdetailId,patient_other_details.mrn_number,
        patient_other_details.title,
        patient_other_details.other_name,
        patient_other_details.nick_name,
        patient_other_details.home_contact,
        patient_other_details.mobile,
        patient_other_details.business_contact,
        patient_other_details.other_contact,
        patient_other_details.fax,
        patient_other_details.health_fund_code,
        patient_other_details.issue_date,
        patient_other_details.policy_number,
        patient_other_details.upi,
        patient_other_details.expiry_date,
        patient_other_details.health_fund_name,
        patient_other_details.alias_surname,
        patient_other_details.alias_name,
        patient_other_details.pensioner_card_number,
        patient_other_details.health_care_card_number,
        patient_other_details.safety_net_entitlement_card_number_number,
        patient_other_details.repat_health_care_card_number,
        patient_other_details.repat_pharmacy_benefits_card,
        patient_other_details.seniors_health_care_card_number,
        patient_other_details.safety_net_concession_card_number,
        patient_other_details.service_number,
        patient_other_details.religion,
        patient_other_details.my_health_record_number,
        patient_other_details.my_health_record_consent_withdrawn,
        patient_other_details.health_data_respository,
        patient_other_details.deceased,
        patient_other_details.in_active,
        patient_other_details.enter_by", FALSE)
            // ->join("groups", "groups.id = patients.hospital_id")
            ->where("patients.id", $id)
            ->join('patient_other_details', 'patient_other_details.patient_id = patients.id', 'left')
            ->get("patients")->result_array();
        if (empty($res)) {
            throw new Exception("Patient not found");
        }
        return $res[0];
    }

    public function get_patient_id($id)
    {
        $res = $this->db
            ->select("patients.*, groups.*, patients.id as patient_id")
            ->join("groups", "groups.id = patients.hospital_id")
            ->where("patients.id", $id)->get("patients")->result_array();
        if (count($res) == 0) {
            throw new Exception("Patient not found", 404);
        }
        $patient = $res[0];
        $created_at = $patient["created_at"];
        $year = date("y", strtotime($created_at));
        $p_id = $patient['first_initial'] . $patient['last_initial'] . $year . str_pad($patient['patient_id'], 5, '0', STR_PAD_LEFT);
        return $p_id;
    }

    public function get_patient_records($id)
    {
        return $this->db
            ->select(
                "
                users_request.*, groups.*, request.*, speciality_group.*,
                AES_DECRYPT(users.first_name, '" . DATA_KEY . "') AS doctor_first_name, 
                AES_DECRYPT(users.last_name, '" . DATA_KEY . "') AS doctor_last_name,
                profile_picture_path as doctor_profile_picture
            "
            )
            ->join("users_request", "users_request.request_id = request.uralensis_request_id")
            ->join("speciality_group", "request.speciality_group_id = speciality_group.spec_grp_id ")
            ->join("groups", "users_request.group_id = groups.id")
            ->join("users", "users.id = users_request.doctor_id", 'left')
            ->where("request.patient_id", $id)
            ->group_by("request.uralensis_request_id")
            ->get("request")->result_array();
    }


    public function get_profile_picture($patient_id)
    {
        $res = $this->db->get_where('patient_meta', array('patient_id' => $patient_id, 'meta_key' => 'profile_picture_path'))->result_array();
        if (count($res) !== 0) {
            $profile_picture_path = $res[0]['value'];
            if (!empty($profile_picture_path) && $profile_picture_path != DEFAULT_PROFILE_PIC && file_exists(APPPATH . '../' . $profile_picture_path)) {
                return base_url($profile_picture_path);
            }
        }
        $patient = $this->db->get_where('patients', array('id' => $patient_id))->result_array()[0];
        return UI_AVATAR . urlencode($patient['first_name'] . ' ' . $patient['last_name']);
    }

    public function set_profile_picture($patient_id, $profile_picture_path)
    {
        $rows = $this->db->get_where('patients', array('id' => $patient_id))->num_rows();
        if ($rows == 0) {
            throw new Exception("Patient does not exists", 404);
        }
        if (empty($profile_picture_path) || !file_exists(APPPATH . '../' . $profile_picture_path)) {
            throw new Exception("Profile picture does not exists", 400);
        }
        $rows = $this->db->get_where("patient_meta", array("patient_id" => $patient_id, "meta_key" => "profile_picture_path"))->num_rows();
        if ($rows == 0) {
            // insert
            $this->db->insert("patient_meta", array("patient_id" => $patient_id, "meta_key" => "profile_picture_path", "value" => $profile_picture_path));
        } else {
            // set
            $this->db
                ->set("value", $profile_picture_path)
                ->where("patient_id", $patient_id)
                ->where("meta_key", "profile_picture_path")
                ->update("patient_meta");
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Admin Model
 *
 * @package    CI
 * @subpackage Model
 * @author     Uralensis <info@oxbridgemedica.com>
 * @version    1.0.0
 */

class Tracking_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Fetch all the history entry of a record
     */
    public function fetch_record_history($lab_number) {
        // Get record id from lab number
        $this->db->select('uralensis_request_id');
        $this->db->from('request');
        $this->db->where('lab_number', $lab_number);
        $query = $this->db->get();
        $result = $query->result_array();
        if (count($result) == 0) {
            return NULL;
        }
        $request_id = $result[0]['uralensis_request_id'];
        $this->db->select('*');
        $this->db->from('uralensis_record_history');
        $this->db->where('rec_history_record_id', $request_id);
        $this->db->order_by('ura_rec_history_id', 'DESC');
        $query = $this->db->get();
        $result = $query->result_array();
        $final_result  = array();
        foreach($result as $key => $res) {
            $final_result[$key] = $res;
            $final_result[$key]['timestamp'] = date('d/m/y H:i A', $final_result[$key]['timestamp']);
         }
        return $final_result;
    }

    public function fetch_track_status($lab_number) {
        // Get record id from lab number
        $this->db->select('uralensis_request_id');
        $this->db->from('request');
        $this->db->where('lab_number', $lab_number);
        $query = $this->db->get();
        $result = $query->result_array();
        if (count($result) == 0) {
            return '';
        }
        $request_id = $result[0]['uralensis_request_id'];
        $this->db->select('ura_rec_track_status');
        $this->db->where('ura_rec_track_record_id', $request_id);
        $res = $this->db->get('uralensis_record_track_status')->result_array();
        if (count($res) == 0)
            return '';
        return $res[0]['ura_rec_track_status'];
    }

    

    public function update_track_status($lab_number, $status)
    {
        // Get record id from lab number
        $this->db->select('uralensis_request_id');
        $this->db->from('request');
        $this->db->where('lab_number', $lab_number);
        $query = $this->db->get();
        $result = $query->result_array();
        if (count($result) == 0) {
            return NULL;
        }
        $request_id = $result[0]['uralensis_request_id'];

        // Check if record exists
        $this->db->select('ura_rec_track_record_id');
        $this->db->where('ura_rec_track_record_id', $request_id);
        $res = $this->db->get('uralensis_record_track_status')->result_array();
        if (count($res) == 0) {
            // Insert record
            $data = array(
                'ura_rec_track_record_id' => $request_id,
                'ura_rec_track_status' => $status,
                'timestamp' => strtotime('now')
            );
            $this->db->insert('uralensis_record_track_status', $data);
        } else {
            $this->db->set('ura_rec_track_status', $status);
            $this->db->set('timestamp', time());
            $this->db->where('ura_rec_track_record_id', $request_id);
            $this->db->update('uralensis_record_track_status');
        }
        
        $user =  $this->ion_auth->user()->row()->id;
        $timestamp = strtotime('now');
        $record_data = array(
            'rec_history_user_id' => $user,
            'rec_history_record_id' => $request_id,
            'rec_history_data' => $status,
            'rec_history_status' => 'track_status',
            'timestamp' => $timestamp
        );
        $this->db->insert('uralensis_record_history', $record_data);
        return True;
    }
}

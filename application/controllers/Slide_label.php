<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Slide Label Controller
 *
 * @package    CI
 * @subpackage Controller
 * @author     Uralensis <info@oxbridgemedica.com>
 * @version    1.0.0
 */
Class Slide_label extends CI_Controller
{
    /**
     * Constructor to load models and helpers
     */
    public function __construct()
    {
        parent::__construct();        
        $this->load->model('Slide_label_model', 'sl');
        $this->load->model('Barcode_model', 'barcode');
        $this->load->helper(array('url', 'activity_helper', 'dashboard_functions_helper', 'datasets_helper', 'ec_helper'));
        
    }
    public function index(){        
        if (!$this->ion_auth->logged_in()) 
		{
            redirect('auth/login', 'refresh');
        }   
        $lab_id = $this->ion_auth->get_users_main_groups()->row()->id;
        $data['users'] = $this->sl->get_user_list($lab_id);
        $data['br_template'] = $this->load->view('barcode_template_view', NULL, TRUE);
        $this->load->view('lab/inc/header-new');
        $this->load->view('lab/slide_label_view', $data);
        $this->load->view('lab/inc/footer-new');
    }
    Public function get_unpublished_data()
	{
        $lab_id = $this->ion_auth->user()->row()->id;
		$start = $this->input->post('start');		
        //$select = "rq.uralensis_request_id as rq_id, rq.lab_number as lab_no, rq.pci_number as lims_no, concat(rq.f_name,' ',rq.sur_name) as patient, rq.speciman_no, CONCAT(AES_DECRYPT(patho.first_name, '" . DATA_KEY . "'),' ' ,AES_DECRYPT(patho.last_name, '" . DATA_KEY . "')) AS pathologist, group_concat(lab_test.name) as test, rq.lab_id, rq.patient_id, group_concat(lab_test.id) as test_id, br.id as br_id, barcode_image as barcode_img";
        $select = "rq.uralensis_request_id as rq_id, rq.lab_number as lab_no, rq.pci_number as lims_no, concat(rq.f_name,' ',rq.sur_name) as patient, count(DISTINCT rs.req_spec_id) as speciman_no, CONCAT(AES_DECRYPT(patho.first_name, '" . DATA_KEY . "'),' ' ,AES_DECRYPT(patho.last_name, '" . DATA_KEY . "')) AS pathologist, group_concat(DISTINCT(IF(sp_block.name='', null, sp_block.name))) as test, group_concat(sp_block.block_no) as block_no_list, group_concat(sp_block.name) as testids, rq.sur_name as pSurname, group_concat(DISTINCT(sp_block.id)) as all_test_id, rq.lab_id, rq.patient_id, br.id as br_id, barcode_image as barcode_img, pt.hospital_id, group_concat(DISTINCT(sp.specimen_id)) as sp_id";
		$final['recordsTotal'] = $this->sl->get_unpublished_data("request rq", $select, 'count', $lab_id);
		$keyword = $this->input->post('search');
		$final['redraw'] = 1;
		$final['recordsFiltered'] = $final['recordsTotal'];
		$final['data'] = $this->sl->get_unpublished_data("request rq", $select, 'result', $lab_id);
		// echo $this->db->last_query();exit;
		echo json_encode($final);exit;
	}
    public function get_barcode_data(){
        $request_id = intval($this->input->post('request_id'));
        $test_id = $this->input->post('test_id');
        $barcode = $this->sl->get_barcode_data($request_id, $test_id);
        echo json_encode($barcode);exit;
    }
    public function get_request_data(){
        $request_id = intval($this->input->get('request_id'));
        $record =  $this->barcode->get_request_data($request_id);
        $record['lab_no2'] = $this->ion_auth->get_users_main_groups()->row()->name;
        echo json_encode($record);exit;
    }

    public function DownloadBarcodeTextFile(){
        $StoreLocation = $_SERVER['DOCUMENT_ROOT'].'/uploads/HL7/FNQHPathology/';
        if (!file_exists($StoreLocation.'Cassette')) {
            mkdir($StoreLocation.'Cassette', 0777, true);
        }
        if (!file_exists($StoreLocation.'Slide')) {
            mkdir($StoreLocation.'Slide', 0777, true);
        }
        $location  = $StoreLocation.'Slide';
        if($this->input->post('action') == 2){
            $location  = $StoreLocation.'Cassette';
        }
        $content = $this->input->post('fileContent');
        $fp = fopen($location . "/".$this->input->post('file_name'),"wb");
        fwrite($fp,$content);
        fclose($fp);

		$StoreLocation2 = $_SERVER['DOCUMENT_ROOT'].'/uploads';
		$fp = fopen($StoreLocation2 . "/".$this->input->post('file_name'),"wb");
        fwrite($fp,$content);
        fclose($fp);



        $record['status'] = 'success';
        $record['message'] = 'Label file exported to the root directory.';
        echo json_encode($record);
        exit;
    }
}   
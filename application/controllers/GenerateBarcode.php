<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GenerateBarcode extends CI_Controller {

	public function __construct(){

        parent::__construct();
		$this->load->model('Barcode_model', 'barcode');
	}
	public function index()
	{
		$code = trim($this->input->post('code'));
		$save_it = intval($this->input->post('save_it'));
		if($code)
		{
			$this->set_barcode($code, $save_it);
		}else{
			echo 'Invalid request made'; exit;
		}
			
	}
	
	private function set_barcode($code, $save_it)
	{		
		$data = json_decode($this->input->post('br_data'), true);
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		//Zend_Barcode::render('code128', 'image', array('text'=>$code, 'barHeight' => '80'), array());
		$barcode_data = $this->barcode->check_barcode_exist($data['request_id'], $data['test_id']);
		if(empty($barcode_data)){
			//commentd by Vishal - barcode generation - start
			// $t = Zend_Barcode::factory('Code39', 'image', array('text'=>$code, 'drawText' => false, 'barHeight'=> 25,
			// 'factor'=>1), array())->draw();
			// $file_name = trim($code)."_".date('YmdHis').'.png';
			// $barcode_image = FCPATH.'barcodes/'.$file_name;	
			// $barcode_url = base_url().'barcodes/'.$file_name;
			// imagepng($t,$barcode_image, 0, NULL);	
			//commentd by Vishal - barcode generation - end

			//commentd by Vishal - QRCode generation - start
			$file_name = trim($code)."_".date('YmdHis').'.png';
			$this->generate_qrcode($code, $file_name);
			$barcode_url = base_url().'barcodes/'.$file_name;
			//commentd by Vishal - QRCode generation - end

			//echo $save_it;print_r($data); exit;
			if($save_it == 1 && !empty($data)){
				$barcode_data = array(
					'lab_id' => $data['lab_id'],
					'lab_number' => $data['lab_no'],
					'digi_number' => $code,
					'test_id' => $data['test_id'],
					'request_id' => $data['request_id'],
					'patient_id' => intval($this->input->post('patient_id')),
					'barcode_image' => $file_name,
				); 
				//print_r($barcode_data);exit;
				$this->barcode->save_barcode($barcode_data);
			}	
			
			echo $barcode_url;exit;	
		}else{
			echo base_url().'barcodes/'.$barcode_data['barcode_image'];exit;
		}
		
	}
	private function barcode_generate($code){		
		if($code){
			//commentd by Vishal - barcode generation - start
			// $this->load->library('zend');
			// $this->zend->load('Zend/Barcode');
			// $t = Zend_Barcode::factory('Code39', 'image', array('text'=> $code, 'drawText' => false, 'barHeight'=> 25,
			// 'factor'=>1), array())->draw();
			// $file_name = trim($code)."_".date('YmdHis').'.png';
			// $barcode_image = FCPATH.'barcodes/'.$file_name;	
			// $barcode_url = base_url().'barcodes/'.$file_name;
			// imagepng($t,$barcode_image, 0, NULL);
			//commentd by Vishal - barcode generation - end

			//commentd by Vishal - QRCode generation - start
			$file_name = trim($code)."_".date('YmdHis').'.png';
			$this->generate_qrcode($code, $file_name);
			//commentd by Vishal - QRCode generation - end

			return $file_name;
		}else{
			return false;
		}			
	}
	private function specimen_pot_label()
	{		
		$specimen_ids =  $this->input->post('specimen_id');
		$request_ids = $this->input->post('request_id');
		$digi_numbers = $this->input->post('digi_number');
		$sp_id_arr = array();
		$sp_text = array();	
		if(!empty($specimen_ids))
		{
			for($i=0; $i<count($request_ids); $i++)
			{
				if(strpos($specimen_ids[$i], ',') !== false){
					$tmp_sp_id = explode(',', $specimen_ids[$i]);
					for($j=0; $j<count($tmp_sp_id); $j++){
						$sp_id_arr[] = $tmp_sp_id[$j];
						$sp_text[] = 'Specimen '.($j+1);
					}			
				}else{
					$sp_id_arr[] = $specimen_ids[$i];
					$sp_text[] = 'Specimen 1';
				}				
			}
			$records = $this->barcode->specimen_pot_label($sp_id_arr);			
			$save_sp_data= array();
			foreach($records as $sp){
				if($sp['is_exist'] == 0){
					$key = array_search($sp['specimen_id'], $sp_id_arr);
					$file_name = $this->barcode_generate($sp['digi_number']);
					$save_sp_data[]= array(
						'specimen_id' => $sp['specimen_id'],
						'request_id' => $sp['request_id'],
						'lab_id' => $sp['lab_id'],
						'lab_no' => $sp['lab_number'],				
						'patient_id' => $sp['patient_id'],
						'patient_name' => $sp['first_name'].' '.$sp['last_name'],
						'dob' => $sp['dob'],
						'barcode_img' => $file_name,
						'digi_number' => $sp['digi_number'],
						'specimen' => $sp_text[$key]
					); 
				}			
			}			
			if(!empty($save_sp_data)){			
				$this->barcode->save_specimen_pot($save_sp_data);
			}
			return $sp_id_arr;
		}else{
			return false;
		}
		
	}


	public function generate_qrcode($data, $name)
	{
        /* Load QR Code Library */
        $this->load->library('ciqrcode');
        
        /* Data */
        $hex_data   = bin2hex($data);
        $save_name  = $name;

        /* QR Code File Directory Initialize */
        $dir = 'barcodes/';
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        /* QR Configuration  */
        $config['cacheable']    = true;
        $config['imagedir']     = $dir;
        $config['quality']      = true;
        $config['size']         = '1024';
        $config['black']        = array(255,255,255);
        $config['white']        = array(255,255,255);
        $this->ciqrcode->initialize($config);
  
        /* QR Data  */
        $params['data']     = $data;
        $params['level']    = 'L';
        $params['size']     = 10;
        $params['savename'] = FCPATH.$config['imagedir']. $save_name;
        
        $this->ciqrcode->generate($params);

        /* Return Data */
        $return = array(
            'content' => $data,
            'file'    => $dir. $save_name
        );
        return $return;
    }

	public function bulk_barcode_old_with_barcode()
	{		
		// echo "<pre>";
		// print_r($_POST);die;
		if($this->input->post('submit_type') == 'sp_pot')
		{
			$sp_ids = $this->specimen_pot_label();
			$data['sp_data'] = $this->barcode->specimen_pot_label($sp_ids);		
			foreach($data['sp_data'] as $key => $sp){
				if($sp['is_exist'] != 0 && !file_exists("barcodes/".$sp['barcode_img']))
				{
					$file_name = $this->barcode_generate($sp['digi_number']);
					$change_image = array('barcode_img' => $file_name);
					$this->db->where('specimen_id', $sp['specimen_id']);
					$this->db->update('specimen_pot', $change_image);
					$data['sp_data'][$key]['barcode_img'] = $file_name;
				}		
			}
			if($data['sp_data'])
			{
				$this->load->view('print_sp_pot_view', $data);
			}else{
				redirect('Slide_label');
				exit;
			}
		}
		else
		{			
			$this->load->library('zend');
			$this->zend->load('Zend/Barcode');			
			$lab_ids = $this->input->post('lab_id');
			$lab_numbers = $this->input->post('lab_number');
			$digi_numbers = $this->input->post('digi_number');
			$test_ids = $this->input->post('test_id');		
			$patient_names = $this->input->post('patient_name');
			$request_ids = $this->input->post('request_id');
			$patient_ids = $this->input->post('patient_id');
			$ins_id = 0;
			$print_barcode_id = array();
			for($i=0; $i<count($request_ids); $i++)
			{
				if($lab_ids[$i] != '' || $digi_numbers[$i] != '' || $test_ids[$i] != ''){
					$barcode_data = $this->barcode->check_barcode_exist($request_ids[$i], $test_ids[$i]);
					if(empty($barcode_data))
					{
						$code = $lab_numbers[$i];
						$t = Zend_Barcode::factory('Code39', 'image', array('text'=> $code, 'drawText' => false,'barHeight'=> 25,
						'factor'=>1), array())->draw();
						$file_name = trim($code)."_".date('YmdHis').'.png';
						$barcode_image = FCPATH.'barcodes/'.$file_name;	
						$barcode_url = base_url().'barcodes/'.$file_name;
						imagepng($t,$barcode_image, 0, NULL);
						
						//echo $save_it;print_r($data); exit;
						
						$barcode_data = array(
							'lab_id' => $lab_ids[$i],
							'lab_number' => $lab_numbers[$i],
							'digi_number' => $digi_numbers[$i],
							'test_id' => $test_ids[$i],
							'request_id' => $request_ids[$i],
							'patient_id' => $patient_ids[$i],
							'barcode_image' => $file_name,
						); 					
						$ins_id = $this->barcode->save_barcode($barcode_data);															
						array_push($print_barcode_id, $ins_id);
					}else{
						if(!file_exists("barcodes/".$barcode_data['barcode_image'])){
							// echo "If"."==>".$barcode_data['barcode_image'];
							$code = $lab_numbers[$i];
							$rendererOptions = array('imageType'=>'png', 'horizontalPosition' => 'center', 'verticalPosition' => 'middle');
							$t = Zend_Barcode::factory('Code39', 'image', array('text'=> $code, 'drawText' => false), $rendererOptions)->draw();
							$file_name = trim($code)."_".date('YmdHis').'.png';
							$barcode_image = FCPATH.'barcodes/'.$file_name;	
							$barcode_url = base_url().'barcodes/'.$file_name;
							imagepng($t,$barcode_image, 0, NULL);

							$change_image = array('barcode_image' => $file_name);
							$this->db->where('id', $barcode_data['br_id']);
							$this->db->update('barcode', $change_image);
						}else{
							// echo "Else"."==>".$barcode_data['barcode_image'];exit;
						}
						array_push($print_barcode_id, intval(@$barcode_data['br_id']));
					}
				}
			}		
			if(!empty($print_barcode_id))
			{
				
				$data['records'] = $this->barcode->get_bulk_barcode($print_barcode_id);	
						$data['action_type'] = "";
				if($this->input->post('b_img') && $this->input->post('b_img') != '')
				{
					if($this->input->post("action_type")!='')
					{
					$data['action_type'] = $this->input->post("action_type");
					}
					else
					{
						$data['action_type'] = $this->input->post("print_action_type");
					}
					$data['records'] = $this->barcode->get_request_bulk_barcode($print_barcode_id);	
					$data['barcode_image'] = $this->input->post('b_img');	
				}
				if($this->input->post('action_type')== 'sp_pot' || $this->input->post('print_action_type') == 'sp_pot')
				{
					if($this->input->post("action_type")!='')
					{
					$data['action_type'] = $this->input->post("action_type");
					}
					else
					{
						$data['action_type'] = $this->input->post("print_action_type");
					}
					$data['records'] = $this->barcode->get_request_bulk_barcode($print_barcode_id);	
				}
				// foreach ($data['records'] as $key => $row) {
				// 		$barcode_data['row'] = $data['records'][$key];
				// 		$view_arr[$key] = $this->load->view('print_barcode_view', $barcode_data, true);
				// 		//echo $view_arr[$key];exit;
				// 	}	
				// echo "<pre>";
				// print_r($data);die;
				echo json_encode($this->load->view('print_barcode_view', $data, true));
				// echo json_encode($view_arr);exit; 				
			}else{
					$this->session->set_flashdata('error_msg', 'Something went wrong, please try again.');
				redirect(base_url().'Slide_label');exit;
			}
		}				
	}

	public function bulk_barcode()
	{		
		// echo "<pre>";
		// print_r($_POST);die;
		if($this->input->post('submit_type') == 'sp_pot')
		{
			$sp_ids = $this->specimen_pot_label();
			$data['sp_data'] = $this->barcode->specimen_pot_label($sp_ids);		
			foreach($data['sp_data'] as $key => $sp){
				if($sp['is_exist'] != 0 && !file_exists("barcodes/".$sp['barcode_img']))
				{
					$file_name = $this->barcode_generate($sp['digi_number']);
					$change_image = array('barcode_img' => $file_name);
					$this->db->where('specimen_id', $sp['specimen_id']);
					$this->db->update('specimen_pot', $change_image);
					$data['sp_data'][$key]['barcode_img'] = $file_name;
				}		
			}
			if($data['sp_data'])
			{
				$this->load->view('print_sp_pot_view', $data);
			}else{
				redirect('Slide_label');
				exit;
			}
		}
		else
		{			
			$this->load->library('zend');
			$this->zend->load('Zend/Barcode');			
			$lab_ids = $this->input->post('lab_id');
			$lab_numbers = $this->input->post('lab_number');
			$digi_numbers = $this->input->post('digi_number');
			$test_ids = $this->input->post('test_id');		
			$patient_names = $this->input->post('patient_name');
			$request_ids = $this->input->post('request_id');
			$patient_ids = $this->input->post('patient_id');
			$ins_id = 0;
			$print_barcode_id = array();
			for($i=0; $i<count($request_ids); $i++)
			{
				if($lab_ids[$i] != '' || $digi_numbers[$i] != '' || $test_ids[$i] != ''){
					$barcode_data = $this->barcode->check_barcode_exist($request_ids[$i], $test_ids[$i]);
					if(empty($barcode_data))
					{
						//commentd by Vishal - barcode generation - start
						// $code = $lab_numbers[$i];
						// $t = Zend_Barcode::factory('Code39', 'image', array('text'=> $code, 'drawText' => false,'barHeight'=> 25,
						// 'factor'=>1), array())->draw();
						// $file_name = trim($code)."_".date('YmdHis').'.png';
						// $barcode_image = FCPATH.'barcodes/'.$file_name;	
						// $barcode_url = base_url().'barcodes/'.$file_name;
						// imagepng($t,$barcode_image, 0, NULL);
						//commentd by Vishal - barcode generation - end
						
						//echo $save_it;print_r($data); exit;
						
						//commentd by Vishal - QRCode generation - start
						$code = $digi_numbers[$i];
						$file_name = trim($code)."_".date('YmdHis').'.png';
						$this->generate_qrcode($code, $file_name);
						//commentd by Vishal - QRCode generation - end
						
						$barcode_data = array(
							'lab_id' => $lab_ids[$i],
							'lab_number' => $lab_numbers[$i],
							'digi_number' => $digi_numbers[$i],
							'test_id' => $test_ids[$i],
							'request_id' => $request_ids[$i],
							'patient_id' => $patient_ids[$i],
							'barcode_image' => $file_name,
						); 					
						$ins_id = $this->barcode->save_barcode($barcode_data);															
						array_push($print_barcode_id, $ins_id);
					}else{
						if(!file_exists("barcodes/".$barcode_data['barcode_image'])){
							// echo "If"."==>".$barcode_data['barcode_image'];
							//commentd by Vishal - barcode generation - start
							// $code = $lab_numbers[$i];
							// $rendererOptions = array('imageType'=>'png', 'horizontalPosition' => 'center', 'verticalPosition' => 'middle');
							// $t = Zend_Barcode::factory('Code39', 'image', array('text'=> $code, 'drawText' => false), $rendererOptions)->draw();
							// $file_name = trim($code)."_".date('YmdHis').'.png';
							// $barcode_image = FCPATH.'barcodes/'.$file_name;	
							// $barcode_url = base_url().'barcodes/'.$file_name;
							// imagepng($t,$barcode_image, 0, NULL);
							//commentd by Vishal - barcode generation - end

							//commentd by Vishal - QRCode generation - start
							$code = $lab_numbers[$i];
							$file_name = trim($code)."_".date('YmdHis').'.png';
							$this->generate_qrcode($code, $file_name);
							//commentd by Vishal - QRCode generation - end

							$change_image = array('barcode_image' => $file_name);
							$this->db->where('id', $barcode_data['br_id']);
							$this->db->update('barcode', $change_image);
						}else{
							// echo "Else"."==>".$barcode_data['barcode_image'];exit;
						}
						array_push($print_barcode_id, intval(@$barcode_data['br_id']));
					}
				}
			}		
			if(!empty($print_barcode_id))
			{
				
				$data['records'] = $this->barcode->get_bulk_barcode($print_barcode_id);	
						$data['action_type'] = "";
				if($this->input->post('b_img') && $this->input->post('b_img') != '')
				{
					if($this->input->post("action_type")!='')
					{
					$data['action_type'] = $this->input->post("action_type");
					}
					else
					{
						$data['action_type'] = $this->input->post("print_action_type");
					}
					$data['records'] = $this->barcode->get_request_bulk_barcode($print_barcode_id);	
					$data['barcode_image'] = $this->input->post('b_img');	
				}
				if($this->input->post('action_type')== 'sp_pot' || $this->input->post('print_action_type') == 'sp_pot')
				{
					if($this->input->post("action_type")!='')
					{
					$data['action_type'] = $this->input->post("action_type");
					}
					else
					{
						$data['action_type'] = $this->input->post("print_action_type");
					}
					$data['records'] = $this->barcode->get_request_bulk_barcode($print_barcode_id);	
				}
				// foreach ($data['records'] as $key => $row) {
				// 		$barcode_data['row'] = $data['records'][$key];
				// 		$view_arr[$key] = $this->load->view('print_barcode_view', $barcode_data, true);
				// 		//echo $view_arr[$key];exit;
				// 	}	
				// echo "<pre>";
				// print_r($data);die;
				echo json_encode($this->load->view('print_barcode_view', $data, true));
				// echo json_encode($view_arr);exit; 				
			}else{
					$this->session->set_flashdata('error_msg', 'Something went wrong, please try again.');
				redirect(base_url().'Slide_label');exit;
			}
		}				
	}

	public function print_custom_barcode(){
		// ini_set('display_errors', 1);
		// ini_set('display_startup_errors', 1);
		// error_reporting(E_ALL);
		$ex_patient_name = $this->input->get_post('ex_patient_name');		
		$ex_nhs_no = $this->input->get_post('ex_nhs_no');
		$ex_dob = $this->input->get_post('ex_dob');
		$ex_age = $this->input->get_post('ex_age');
		$ex_gender = $this->input->get_post('ex_gender');
		$ex_lab_no = $this->input->get_post('ex_lab_no');
		$ex_contact_no = $this->input->get_post('ex_contact_no');
		$ex_lab_no2 = $this->input->get_post('ex_lab_no2');
		$hospital_id = $this->input->get_post('hospital_id');
		$request_id = intval($this->input->get_post('request_id')[0]);
		$test_id = $this->input->get_post('test_id')[0];
		// get request data 
		$request_data = $this->barcode->get_request_data($request_id);						
		if(!empty($request_data))
		{
			$lab_name = $this->ion_auth->get_users_main_groups()->row()->name;        
			// Check if already barcode generated
			$barcode_record = $this->barcode->check_barcode_exist($request_id, $test_id);
			if(empty($barcode_record))
			{
				$print_data = array();
				$barcode_data['request_id'] = $request_id;
				$barcode_data['lab_id'] = $this->input->get_post('lab_id')[0];
				$barcode_data['lab_number'] = $this->input->get_post('lab_number')[0];
				$barcode_data['digi_number'] = $this->input->get_post('digi_number')[0];
				$barcode_data['test_id'] = $this->input->get_post('test_id')[0];
				
				$print_data['digi_number'] = $this->input->get_post('digi_number')[0];

				if($ex_patient_name == 1){
					$barcode_data['patient_id'] = $this->input->get_post('patient_id')[0];
					$print_data['patient_name'] = $this->input->get_post('patient_name')[0];
				}
				if($ex_nhs_no == 1){
					$print_data['nhs_no'] = $request_data['nhs_number'];
				}
				if($ex_dob == 1){
					$print_data['dob'] = $request_data['dob'];
					if($request_data['dob'] != '' && $request_data['dob'] != '0000-00-00'){
						$print_data['dob'] = date('d M Y', strtotime($request_data['dob']));
					}
				}
				if($ex_age == 1){
					$years = '0 Years';
					if($request_data['dob'] != '' && $request_data['dob'] != '0000-00-00'){
						$years = date_diff(date_create($request_data['dob']), date_create('today'))->y.' Years';
					}				
					$print_data['age'] = $years;
				}
				if($ex_gender == 1){
					$print_data['gender'] = $request_data['gender'];
				}
				if($ex_lab_no == 1){
					$print_data['lab_number'] = $this->input->get_post('lab_number')[0];
				}
				if($ex_contact_no == 1){
					$print_data['contact_no'] = $request_data['phone'];
				}
				if($ex_lab_no2 == 1){					
					$print_data['lab_no2'] = $lab_name;
				}
				$file_name = $this->barcode_generate($print_data['digi_number']);			
				
				if($file_name){					
					$barcode_data['barcode_image'] = $file_name;
					$ins_id = $this->barcode->save_barcode($barcode_data);
					if($ins_id > 0){
						$print_data['status'] = true;
						$print_data['message'] = 'Barcode Generated Successfully';
					}else{					
						unlink(FCPATH.'barcodes/'.$file_name);
						$print_data['status'] = false;
						$print_data['message'] = 'Fail to generate and save barcode data';					
					}
				}else{
					$print_data['status'] = false;
					$print_data['message'] = 'Fail to generate Barcode';
				}
			}
			else{
				// Barcode is already exist and requested to print again				
				$print_data = array();
				// echo "<pre>";
				// print_r($barcode_record);exit;
				$print_data['digi_number'] = $barcode_record['digi_number'];
				if($ex_patient_name == 1){					
					$print_data['patient_name'] = $barcode_record['first_name'].' '.$barcode_record['last_name'];
				}
				if($ex_nhs_no == 1){
					$print_data['nhs_no'] = $barcode_record['nhs_number'];
				}
				if($ex_dob == 1){
					$print_data['dob'] = $barcode_record['dob'];					
					if($request_data['dob'] != '' && $request_data['dob'] != '0000-00-00'){
						$print_data['dob'] = date('d M Y', strtotime($barcode_record['dob']));
					}
				}
				if($ex_age == 1){
					$years = '0 Years';
					if($barcode_record['dob'] != '' && $barcode_record['dob'] != '0000-00-00'){
						$years = date_diff(date_create($barcode_record['dob']), date_create('today'))->y.' Years';
					}				
					$print_data['age'] = $years;
				}
				if($ex_gender == 1){
					$print_data['gender'] = $barcode_record['gender'];
				}
				if($ex_lab_no == 1){
					$print_data['lab_number'] = $barcode_record['lab_number'];
				}
				if($ex_contact_no == 1){
					$print_data['contact_no'] = $barcode_record['phone'];
				}
				if($ex_lab_no2 == 1){
					$print_data['lab_no2'] = $lab_name;
				}
				$print_data['barcode_image'] = base_url().'barcodes/'.$barcode_record['barcode_image'];				
				$print_data['status'] = true;
				$print_data['message'] = 'Barcode Generated Successfully';								
			}
		}
		else{
			$print_data['status'] = false;
			$print_data['message'] = 'Error! request record not found';			
		}
		echo json_encode($print_data);exit;
	}
}
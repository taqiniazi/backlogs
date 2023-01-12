<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Doccument list Controller
 *
 * @package    CI
 * @subpackage Controller
 */
class Document extends CI_Controller
{
 	
	 /**
     * Constructor to load models and helpers
     */
    public function __construct()
    {
        parent::__construct();
		
		
		/*
		error_reporting(E_ALL);
		ini_set('display_errors', 1);*/
		
        $this->load->database();
        // Libs and helper
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language', 'cookie', 'activity_helper', 'dashboard_functions_helper', 'ec_helper','document_helper'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->load->model('Document_List_Model', 'Document_List_Model');
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
	
	 
	public function index($documentId=0)
    {   
		$this->load->model('Userextramodel');	
       
       // $group_type = $this->ion_auth->get_users_groups()->row()->group_type;	
		//$pdf = new  MYPDF();
		global  $serial_number;
		global  $footer_text;
		
		$status =  array(1=>'Live',2=>'Obsolete');
		
		$document = $this->getDocumentInfo($documentId);
		$serial_number = $document['document_number'];
		$title = $document['document_title'];
		$status = $status[$document['status']];
		$version = '1.0';
		$issueDate = date('d.m.Y',strtotime($document['date_of_1_issue']));
		$documentID = $document['document_number'];
		$disclaimer = $document['disclaimer'];
		$content = $document['content'];
		$documents = $document['documents'];
		$DateofVersion = date('d/m/y',strtotime($document['revised_review_date']));
		
		$deDetails = $this->Userextramodel->getUserDecryptedDetailsByid($document['document_owner_id']);
		
		$Createdby = $deDetails->first_name." ".$deDetails->last_name;
		$approvedby = '';
		$ConfidentialityLevel = '';
		
		$footer_text = $document['footer'] ;
		$pdfTitle = $title.'#'.$documentID; 
		
		$revision = $this->document_revision($documentId);
		
		
		
		
		$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor($pdfTitle);
		$pdf->SetTitle($pdfTitle);
		$pdf->SetSubject('Document Information Report');
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetMargins(15, PDF_MARGIN_TOP + 25, 15);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM + 8);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('times', 12);
		$pdf->AddPage();
		$pdf->SetY(50);
		
		
		$html = '<table style="padding:10px" cellpadding="10px">
<tr><td><br/><br/><br/><br/><h2 style="text-align: right;">'.$title.'</h2><br/><br/><br/></td></tr>
<tr><td><br/><br/><h5 style="text-align: right; padding-top:100px; margin-top:40px;">INTERNAL</h5><br/></td></tr>
<tr><td></td></tr>
<tr><td><p style="text-align: right; margin-bottom: 0px;margin-top:0px;">Status:  '.$status.'</p>
<p style="text-align: right; margin-bottom: 0px;margin-top: 0px;">Version:  '.$version.'</p>
<p style="text-align: right; margin-bottom: 0px;margin-top: 0px;">Issue Date: '.$issueDate.' </p>
<p style="text-align: right; margin-bottom: 0px;  margin-top: 0px;">Document ID:  '.$documentID.'</p></td></tr>
<tr><td><br><br><br><br></td></tr>
<tr><td style="border:solid 1px #ccc; padding-top:15px; font-size:12px; ">'.$disclaimer.'</td></tr>
<tr><td><br></td></tr>
<tr><td><br><br><br></td></tr>
</table>';
		
		
		
		$html .='<div style="width: 100%;">
  <h2>About This Document</h2>
<table class="table table-striped" style="width: 80%; height="100%"">
                    <h3 >Document Control</h3>
                    <tbody style="vertical-align:middle;">
                                <tr style="background-color: #f6f6f6;">
                                <td style="height:30px; vertical-align: middle;">Document ID:</td>
                                <td style="height:30px; vertical-align: middle;">'.$documentID.'</td>
                                </tr>
                                <tr>
                                  <td style="height:30px; vertical-align: middle;">Version Number:</td>
                                  <td style="height:30px; vertical-align: middle;">'.$version.'</td>
                                </tr>
                                  <tr style="background-color: #f6f6f6; padding-top:20px;">
                                    <td style="height:30px; vertical-align: middle;">Date of Version:</td>
                                    <td style="height:30px; vertical-align: middle;">'.$DateofVersion.'</td>
                                    </tr>
                                    <tr>
                                      <td style="height:30px; vertical-align: middle;">Created by:</td>
                                      <td style="height:30px; vertical-align: middle;">'.$Createdby.'</td>
                                      </tr>
                                      <tr style="background-color: #f6f6f6;">
                                        <td style="height:30px; vertical-align: middle;">Approved by:</td>
                                        <td style="height:30px; vertical-align: middle;"> </td>
                                        </tr>
                                        <tr>
                                          <td style="height:30px; vertical-align: middle;">Confidentiality Level:</td>
                                          <td style="height:30px; vertical-align: middle;"> </td>
                                          </tr>
                                </tbody>
                </table>
    </div>';

if(count($revision)>0){	

$html .='<h3>Document Control</h3>
      <table style="width: 80%; border: 1px solid #ededed; box-shadow: 0 1px 1px 0 rgb(0 0 0 / 20%); padding-top:0px;">
               <thead>
                     <tr style="text-align: left; padding:20px;">
                        <th style="height:30px; vertical-align: middle;">Date of Edit</th>                               
                        <th style="height:30px; vertical-align: middle;">Version</th>
                        <th style="height:30px; vertical-align: middle;">Edited by</th>
                        <th style="height:30px; vertical-align: middle;">Description of change </th>
                         
                    </tr> 
                    </thead>
                  <tbody>';
					foreach($revision as $row){
						 $html .=' <tr style="background-color: #f6f6f6; padding-top:20px;">
							  <td style="height:30px; vertical-align: middle;">'.date("d/m/y",strtotime($row['vcreated_at'])
							  ).'</td>
							  <td style="height:30px; vertical-align: middle;">'.$row['version'].'</td>
							  <td style="height:30px; vertical-align: middle;">'.$row['edituser'].'</td>
							  <td style="height:30px; vertical-align: middle;">'.$row['description'].'</td>
						  </tr>';
					}
                                                          
                    $html .='</tbody>
						</table>';
						
}						
						


$html .='<table style="width: 100%; padding-top:40px;">
<tbody>
<tr> <td>'.$content.'</td></tr>
  </tbody>
  </table>';


$html .='<table style="width: 100%; padding-top:40px;">
<tbody>
<tr> <td>
		'.$documents.'
    </td>
    </tr>
    </tbody>
  </table>';


		
		$pdf->writeHTML($html, true, false, true, false, '');
		//Close and output PDF document
		//$file_name = 'Report_'. date('dMY') . '.pdf';
		//$pdf->Output($file_name, 'I');
		
		
		$file_name = 'document_'. date('dmYHis') . '.pdf';
		
		$path =str_replace('application','uploads',APPPATH);
		$pdf->Output($path.'/document/'.$file_name, 'F');
		
		echo base_url('uploads/document/'.$file_name); exit;

		
		
    }
	
	
	private function getDocumentInfo($documentId=0){
		
		
		$user_id = $this->ion_auth->user()->row()->id; 
		$formDataV['viewer_user_id']  = $user_id;
		$formDataV['document_id'] = $documentId;
		$formDataV['created_by'] = $user_id;		
		$this->db->insert('document_viewers_history', $formDataV);
		
		
		$res = '';
	     $document_information = $this->db->where('id',$documentId)->get('document')->row_array();
		 
		if(!empty($document_information)){
			$res = $document_information;
		}
		
		return $res; 
			
	}
	
	
	public function document_revision($documentId){
		
		$revision = $this->Document_List_Model->fetch_viwer_revision($documentId);
		$res = array();
		foreach($revision as $row){
			
			
			$sql="SELECT * FROM `document_share` where to_user_id=".$row['updated_by']." AND document_id=".$documentId." ";
			$query = $this->db->query($sql);
			$document_information =  $query->result_array();
			
			$row['description']= $document_information[0]['description'];	
			
			$sql="SELECT * FROM `document_revision` where updated_by=".$row['updated_by']." AND document_id=".$documentId." ";
			$query = $this->db->query($sql);
			$documentinformation =  $query->result_array();
			
			$row['version']= 	$documentinformation[0]['live_revision_number'];
			
			$decryptedDetails = $this->Userextramodel->getUserDecryptedDetailsByid($row['updated_by']);
			$row['edituser'] = $decryptedDetails->first_name.' '.$decryptedDetails->last_name;
			
			$res[] = $row; 
			
		}
		
		return $res;
		
		
	}
	
	
	
	public function viewPdf($documentId=0)
    {   	     
       
       // $group_type = $this->ion_auth->get_users_groups()->row()->group_type;	
		//$pdf = new  MYPDF();
		$user_id = $this->ion_auth->user()->row()->id;
		$formData['viewer_user_id']  = $user_id;
		$formData['document_id']  = $documentId;
		$formData['created_by'] = $user_id ;
		$formData['created_at'] = date("Y-m-d H:i:s");
		$this->db->insert('document_viewers_history', $formData);
		
		$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('FNQHPathology');
		$pdf->SetTitle('FNQHPathology');
		$pdf->SetSubject('Document Information Report');
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetMargins(5, PDF_MARGIN_TOP + 15, 5);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM + 8);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('times', 12);
		$pdf->AddPage();
		$pdf->SetY(20);
		
		$document_information = $this->getDocumentInfo($documentId);
		
		$html = '<div style="border-bottom:1px solid black;"></div>';
		
		$html .='<div>'.$document_information.'</div>';
		
		$pdf->writeHTML($html, true, false, true, false, '');
		//Close and output PDF document
		$file_name = 'document_'. date('dmYHis') . '.pdf';
		
		$path =str_replace('application','uploads',APPPATH);
				
		//$pdf->Output($file_name, 'D');
		//echo $path.'/uploads/document/'.$file_name;
		$pdf->Output($path.'/document/'.$file_name, 'F');
		
		echo base_url('uploads/document/'.$file_name); exit;

		
		
    }
	
	
	

}

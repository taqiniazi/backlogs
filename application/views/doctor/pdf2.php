<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
/**
 * @var $id
 * @var $query
 * @var $time
 * @var $nhs_number
 * @var $lab_number
 * @var $serial_number
 * @var $emis_number
 * @var $hos_number
 * @var $sur_name
 * @var $first_name
 * @var $user_information
 * @var $dob
 * @var $gender
 * @var $clrk
 * @var $date_taken
 * @var $urgent
 * @var $hsc
 * @var $cl_detail
 * @var $specimen_macroscopic_code
 * @var $specimen_macroscopic_description
 * @var $specimen_microscopic_code
 * @var $specimen_microscopic_description
 * @var $specimen_snomed_code
 * @var $specimen_snomed_description
 * @var $specimen_diagnosis_code
 * @var $specimen_diagnosis_description
 * @var $specimen_comment_code
 * @var $specimen_comment_description
 * @var $specimen_information_code
 * @var $specimen_information_description
 * @var $specimen_type
 * @var $specimen_slides
 * @var $specimen_block_type
 * @var $specimen_site
 * @var $specimen_block
 * @var $specimen_right
 * @var $specimen_left
 * @var $specimen_na
 * @var $specimen_urgent
 * @var $specimen_hsc_205
 */
 //print_r($query1);
 
 //."===============";
 $request_id = 0;
 
// print_r($query1);

 
foreach ($query1 as $row1) :

    global $serial_number;
    global $pci_number;
    global $first_name;
    global $sur_name;
    global $emis_number;
    global $lab_number;
    global $nhs_number;
    global $medicare_number;
    global $dob;
    global $age;
    global $gender;
    global $clrk;
    global $dermatological_surgeon;
    global $date_taken;
    global $converted_time;
    global $last_modify_publish;
    global $date_rec_bylab;
    global $date_rec_by_doctor;
    global $lab_release_date;
    global $h_group_id;
    global $p_date;
    global $p_date_time;
	global $city;
    global $post_code;
    global $address_1;
	global $clinician_name;
	global $p_phone;

    $id = $row1->id;
    $time = $row1->publish_datetime;
	$clinician_name=$c_name;
	 $p_phone=$row1->$p_phone;
     $row1->p_phone;

 
    $converted_time = '';
    $request_id = $row1->uralensis_request_id;
    if ($time != '') {
        $converted_time = date('d-m-Y', strtotime($time));
    }
    $last_modify_publish = '';
    if (!empty($row1->publish_datetime_modified)) {
        $last_modify_publish = date('d-m-Y', $row1->publish_datetime_modified);
        $last_modify_publish = '<tr><td>Latest Published Date : </td><td>' . $last_modify_publish . '</td></tr>';
    }
    if (!empty($row1->date_sent_touralensis)) {
        $lab_release_date = date('d-m-Y', strtotime($row1->date_sent_touralensis));
        $lab_release_date = '<tr><td>Lab Released Date : </td><td>' . $lab_release_date . '</td></tr>';
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
	$city=$row1->city;
	$post_code=$row1->post_code;
	$address_1=$row1->address_1;
	$p_phone=$row1->p_phone;

    $dermatological_surgeon = $row1->dermatological_surgeon;
    if (!empty($row1->dermatological_surgeon) && ctype_digit($row1->dermatological_surgeon)) {
        $dermatological_surgeon = uralensisGetUsername($row1->dermatological_surgeon, 'fullname');
    }
    $var = $row1->dob;
    $dob = '';
    if (!empty($var)) 
	{
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
endforeach;
foreach ($query4 as $row4) 
{
    $additional_work = $row4->description;
    $Result_additional = str_replace("\n", '<br />', $additional_work);
    $additional_work_time = $row4->additional_work_time;
}

foreach ($query2 as $row2) :
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
	$specimen_comment_history = $row2->specimen_comment_history;
endforeach;

foreach ($query5 as $row5) :
    global $hospital_information;
   // $hospital_information = $row5->information;
    $hospital_information = "";
endforeach;

if(isset($template))
{
    global $templateVal;
    $templateVal = $template;
}

require_once(APPPATH . 'helpers/tcpdf/tcpdf.php');

class MYPDF extends TCPDF {

    public function Header() 
	{

        global $serial_number;
        global $pci_number;
        global $first_name;
        global $sur_name;
        global $emis_number;
        global $lab_number;
        global $nhs_number;
        global $medicare_number;
        global $h_group_id;
        global $dob;
        global $age;
        global $gender;
		global $phone;
        global $clrk;
        global $dermatological_surgeon;
        global $date_taken;
        global $converted_time;
        global $last_modify_publish;
        global $date_rec_bylab;
        global $date_rec_by_doctor;
        global $lab_release_date;
        global $h_group_id;
        global $templateVal;
        global $p_date;
        global $p_date_time;
		global $city;
    	global $post_code;
    	global $address_1;
		global $clinician_name;
		global $p_phone;

		
        $logoVal = (isset($templateVal['logo_path'])) ? $templateVal['logo_path'] : ''; //https://www.pci.pathhub.uk/application/helpers/tcpdf/live_login_logo.jpg
        $logoVal = base_url().'assets/img/fnqh.png';
        $headerText = (isset($templateVal['header'])) ? $templateVal['header'] : '';

        //pre($templateVal);
        $derm_surgeon = '';
        if (!empty($dermatological_surgeon)) {
            //$derm_surgeon = '<tr><td>Dermatological Surgeon : </td><td>' . $dermatological_surgeon . '</td></tr>';
        }
        
		//$ura_logo = base_url('application/helpers/tcpdf/live_login_logo.jpg');
		
		
		
        if (!empty($h_group_id)) {
            $res = get_institute_logo($h_group_id);
            if (!empty($res)) {
                $ura_logo = base_url($templateVal['logo_path']);
            }
        }
		
		$ura_logo = $logoVal;

		$final_header=@str_replace("[Clinician]","Dr $clinician_name",$templateVal['header']);

        $header_text ='<table><tr><td><img src="https://pathhub.fnqhpathology.com/assets/img/fnqh.png" width="180" height="90"></td><td><br><br><h1>Histopathology Report</h1></td><td></td></tr></table><table id="pdf_download">		
            <tr>
                <td>								
                    <table style="padding-left:25px;">                        
                        <tr ><td align="left">'.$final_header.'</td></tr>
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
									<tr><td>Contact No:</td><td>'.$p_phone.'</td></tr>
									<tr><td>Address:</td><td>'.$address_1.' '.$city.' '.$post_code.'</td></tr>
                                    <tr><td></td><td></td></tr> 
									<tr><td>Date Requested:</td><td>'.$date_rec_bylab.'</td></tr>
                                    <tr><td>Date Reported:</td><td>'.$p_date.'</td></tr>                                                                      
                                </table>
                            </td>
                        </tr>	
                    </table>
                </td>
            </tr>
			<tr><td colspan="2" style="padding-left:25px;"><br>&nbsp;&nbsp;&nbsp;<hr ><br></td></tr>
        </table>';
        //echo $headerText;exit;
        $this->SetY(10);
        //$this->SetFont('times', 10);
        $this->writeHTMLCell(0, 0, 5, 5, $header_text, 0, 0, 0, false, false);
    }

    public function Footer()
	 {
		if($templateVal)
		{
			$footerText = (isset($templateVal['footer'])) ? $templateVal['footer'] : '';
			$footerText = str_replace("<DOCNAME>", "Dr. $user_first_name $user_last_name ", $footerText);
			$footerText = str_replace("<DOCGMC>", "$gmc_code ", $footerText);
			$footerText = str_replace("<DOCEMAIL>", "$user_email ", $footerText);
			$footerText = str_replace("<DOCCONTACT>", "$user_phone ", $footerText);
		}
        global $hospital_information;
		$footer_count='Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages();
        $footer_text_val = "<hr><div style='text-align:center' align='center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reported by: Dr Fiona Makowski, Anatomic Pathologist; fiona.makowski@fnqhpathology.com<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FNQH Pathology Pty Ltd, ABN 12345667<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$footer_count."</div>";
        $this->SetY(-24);
		
		
		
//$this->Cell(0, 15, $txt, 0, false, 'C', 0, '', 0, false, 'T', 'B');
//$this->Cell(0, 25, $txt2, 0, false, 'C', 0, '', 0, false, 'T', 'B');		
        $this->SetFont('helvetica', 10);
       // $this->Cell(0, 15, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'B');
	    //$this->Cell(0, 25, $footer_text_val, 0, true, 'C', 0, '', 0, true, 'T', 'B');
        //$this->writeHTMLCell(0, 0, 0, 25, $footer_text_val, 0, 0, 0, true, true);
		$this->writeHTML($footer_text_val,true, false, true, false, '');
    }

}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('FNQH Pathology Pty Ltd');
$pdf->SetTitle('FNQH Pathology Pty Ltd').' - ' . $serial_number;
$pdf->SetSubject('Histopathology Report');
$pdf->SetHeaderData($ura_logo, PDF_HEADER_LOGO_WIDTH, 'Histopathology Report', 'Histopathology Report');
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', '10.5'));
$pdf->SetDefaultMonospacedFont(PDF_FONT_NAME_MAIN,10);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetFooterFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->SetMargins(15, 120, 15);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM + 18);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->SetFont('helvetica', 'N', 10);
$pdf->AddPage();
$pdf->SetY(90);




$supp_count = 1;
foreach ($query4 as $row4) 
{
	$r_id=$row4->request_id;
    $additional_work = $row4->description;
    $Result_additional = str_replace("\n", '<br />', $additional_work);
    $additional_work_time2 = $row4->additional_work_time;
	
	
	if (isset($Result_additional) && $Result_additional != '') :

$html = '<table>
	<tr>
        <td><br></td>
    </tr>   
    <tr>
        <td>' . $Result_additional . '</td>
    </tr>
	<tr>
        <td><hr></td>
    </tr>
</table>
';
    endif;
    $supp_count++;
}



$html .= '<table>
<tr><td colspan="2"></td></tr>
            <tr><td colspan="2"><strong>Diagnostic Summary</strong><br></td></tr>';
foreach ($query2 as $key => $row2) :
    if($row2->specimen_diagnosis_description !='')
	{
		$new_arr=@explode(":",$row2->specimen_diagnosis_description);
		//$new_dio="<b>".$new_arr[0].": </b>".$new_arr[1];
		
        $html .= '<tr><td width="97%">'.($key + 1).' '.$row2->specimen_diagnosis_description . '</td>
		 <td width="3%"></td> 
           </tr>';            
    }
    
endforeach;
$html .= '</table>';
$html .= '<br><hr><br>';
if (!empty($cl_detail)) {    
$html .= '<table><tr>td  colspan="2">&nbsp;</td></tr><tr>
        <td  colspan="2"><b>Clinical Notes:</b>' . $Result_clinical . '</td>        
    </tr>
</table>';
} else {
    $specimen_count = 1;
	$html .= '<table><tr>
        <td  colspan="2">&nbsp;</td>        
    </tr><tr><td colspan="2"><strong>Clinical Notes: </strong></td></tr>';
	
    foreach ($query2 as $specimen_data) {
       // $specimen_result_clinical = str_replace("\n", '<br />', $specimen_data->specimen_clinical_history);
	    $specimen_result_clinical = $specimen_data->specimen_clinical_history;
        if($specimen_result_clinical != '')
		{
            $html .='<tr><td width="97%">'.$specimen_result_clinical.'</td><td width="3%"></td></tr>';
            $specimen_count++;
			break;
        }
        
    }
}
$count = 1;
$html .= '</table>
    <table><tr><td colspan="2">&nbsp;</td></tr><tr><td colspan="2"><strong>Macroscopic </strong></td></tr> 
       ';
foreach ($query2 as $row3) 
{
	static $s_count=1;
    $Result_macro = str_replace("\n", '<br />', $row3->specimen_macroscopic_description);
    $Result_micro = str_replace("\n", '<br />', $row3->specimen_microscopic_description);
    $diagnosis = !empty($row3->specimen_diagnosis_description) ? $row3->specimen_diagnosis_description : '';
    $Result_diagnosis = str_replace("\n", '<br />', $diagnosis);
    if($Result_macro != '' || $Result_micro != ''){
            $html .= '<tr><td width="3%">'.$s_count.'.</td>
                <td width="92%">'.$Result_macro.'</td><td width="5%"></td>
            </tr><tr><td colspan="3"></td></tr> 
        </table>';
		$s_count++;
    }    
}		
		
$html .= '<br /><br />
    <table><tr><td colspan="2"><strong>Microscopic </strong></td></tr> ';		
foreach ($query2 as $row2) 
{
	static $m_count=1;
    //$Result_macro = str_replace("\n", '<br />', $row2->specimen_macroscopic_description);
    $Result_micro = str_replace("\n", '<br />', $row2->specimen_microscopic_description);
    $diagnosis = !empty($row2->specimen_diagnosis_description) ? $row2->specimen_diagnosis_description : '';
    $Result_diagnosis = str_replace("\n", '<br />', $diagnosis);
    if($Result_macro != '' || $Result_micro != ''){
            $html .= '<tr>
			<td width="3%">'.$m_count.'.</td>
                <td width="92%">'.$Result_micro . '</td>                
                <td width="5%"></td>               
            </tr><tr><td colspan="3"></td></tr></table>';
		$m_count++;
    }
        

    if (!empty($diagnosis)) 
	{
        $html .='<!--<table>
            <br /><br />
        <tr>
            <td width="13%"><b>Diagnosis :</b></td>
            
            <td width="85%">' . $diagnosis . '</td>
			<td width="2%"></td>
        </tr>
    </table>-->';
    }

   
    
    $count++;
}

foreach ($query2 as $row22) 
{
	static $m_count=1;
       if (!empty($row22->specimen_comment_history)) {
            $format_specimen_comments = str_replace("\n", '<br />', $row22->specimen_comment_history);
            $specimen_comments_time = '';
            if ($row22->specimen_comment_section_timestamp != '') {
                //$specimen_comments_time =$row2->specimen_comment_section_timestamp;
            }
            
        }
   
}

if($format_specimen_comments!='')
{
$html .='<table>

    <tr>
        <td><b>Comments</b> ' . $format_specimen_comments . ' </td>
    </tr>
    
    
</table>';
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

if ($query1[0]->mdt_case_status === 'not_for_mdt' && $query1[0]->mdt_case === 'add_to_report') {
    $html .='
<div style="border-bottom:1px solid black;"></div>
<table>
    <tr>
        <td style="font-size:14px;"><b>This case is NOT required for the Local Skin MDT</b></td>
    </tr>
</table>
';
}
if ($query1[0]->mdt_case_status === 'for_mdt' && !empty($query1[0]->mdt_case)) {
    $html .='
<div style="border-bottom:1px solid black;"></div>
<table>
    <tr>
        <td style="font-size:14px;"><b>This case should be listed for the Local Skin MDT</b></td>
    </tr>
</table>
';
}

if ($query1[0]->mdt_case_status === 'for_mdt') {
    if (!empty($query1[0]->mdt_specimen_status)) {
        $specimen_data = unserialize($query1[0]->mdt_specimen_status);
        $html .='
<table>
<tr>
        <td style="font-size:14px; width:120px;"><b>MDT Specimens.</b></td>
';
        foreach ($specimen_data as $specimen_mdt) {
            $html .='
        <td style="font-size:14px; width:100px;"><b>' . $specimen_mdt . '</b></td>
    ';
        }
        $html .='</tr></table>
';
    }
}

if($templateVal){
    $footerText = (isset($templateVal['footer'])) ? $templateVal['footer'] : '';
    $footerText = str_replace("<DOCNAME>", "Dr. $user_first_name $user_last_name ", $footerText);
    $footerText = str_replace("<DOCGMC>", "$gmc_code ", $footerText);
    $footerText = str_replace("<DOCEMAIL>", "$user_email ", $footerText);
    $footerText = str_replace("<DOCCONTACT>", "$user_phone ", $footerText);
}

$html .='<table width="100%" style="margin-top:100px">
    <tr><td></td><td ><br><br><center>-- End Report --<center></td><td></td></tr>
</table>

';
$pdf->writeHTML($html, true, false, true, false, '');


$file_name1 =  $_SERVER['DOCUMENT_ROOT']."/uploads/reports_pdf/".$request_id."_".date('Y').'.pdf';
$pdf->Output($file_name1, 'F');
redirect('/doctor/published_reports/2022/all');



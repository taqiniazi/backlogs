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
foreach ($query1 as $row1) :

    global $serial_number;
    global $pci_number;
    global $first_name;
    global $sur_name;
    global $emis_number;
    global $lab_number;
    global $nhs_number;
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
    $id = $row1->id;
    $time = $row1->publish_datetime;

    $converted_time = '';
    if ($time != '') {
        $converted_time = date('d-m-Y', strtotime($time));
    }
    $last_modify_publish = '';
    if (!empty($row1->publish_datetime_modified)) {
        $last_modify_publish = date('d-m-Y', $row1->publish_datetime_modified);
        $last_modify_publish = '<tr><td>Latest Published Date : </td><td>'.$last_modify_publish.'</td></tr>';
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
        $age = '<tr><td>Age : </td><td>' . $row1->age . '</td></tr>';
    }
    
    if (!empty($row1->gender)) {
        $gender = '<tr><td>Gender : </td><td>' . $row1->gender . '</td></tr>';
    }
    
    $serial_number = $row1->serial_number;
    $pci_number = $row1->pci_number;
    $emis_number = $row1->emis_number;
    $nhs_number = $row1->nhs_number;
    $lab_number = $row1->lab_number;
    $hos_number = $row1->hos_number;
    $sur_name = $row1->sur_name;
    $first_name = $row1->f_name;
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

    $dermatological_surgeon = $row1->dermatological_surgeon;
    if (!empty($row1->dermatological_surgeon) && ctype_digit($row1->dermatological_surgeon)) {
        $dermatological_surgeon = uralensisGetUsername($row1->dermatological_surgeon, 'fullname');
    }
    
    $date_taken = !empty($row1->date_taken) ? date('d-m-Y', strtotime($row1->date_taken)) : '';
    $urgent = $row1->urgent;
    $hsc = $row1->hsc;
    $cl_detail = $row1->cl_detail;
    $date_rec_bylab = !empty($row1->date_received_bylab) ? date('d-m-Y', strtotime($row1->date_received_bylab)) : '';
    $Result_clinical = str_replace("\n", '<br />', $cl_detail);
    $comment_section = $row1->comment_section;
    $comment_section_date = $row1->comment_section_date;
    $h_group_id = $row1->hospital_group_id;
endforeach;
foreach ($query4 as $row4) {
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
endforeach;
foreach ($query5 as $row5) :
    global $hospital_information;
    $hospital_information = $row5->information;
endforeach;

$logo = base_url('/application/helpers/tcpdf/uralensis_latest.png');

require_once(APPPATH . 'helpers/tcpdf/tcpdf.php');

class MYPDF extends TCPDF {

    public function Header() {

        global $serial_number;
        global $pci_number;
        global $first_name;
        global $sur_name;
        global $emis_number;
        global $lab_number;
        global $nhs_number;
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

        $derm_surgeon = '';
        if (!empty($dermatological_surgeon)) {
            $derm_surgeon = '<tr><td>Dermatological Surgeon : </td><td>' . $dermatological_surgeon . '</td></tr>';
        }

        if (!empty($h_group_id) && $h_group_id == 18) {
            $ura_logo = base_url('/application/helpers/tcpdf/shs_partner.jpg');
        } else {
            $ura_logo = base_url('/application/helpers/tcpdf/uralensis_latest.jpg');
        }
        $header_text = <<<EOD
                
<table width="100%">
    <tr>
        <td width="25%" align="left">
            <img width="180px" src="$ura_logo" />
        </td>
        <td width="32%" align="center" style="font-size:20px;"><b>Histopathology Report</b></td>
        <td width="50%" align="right">
            <table style="font-size:12.5px;text-align:left;">
                <tr><td width="45%">Serial Number : </td><td><b>$serial_number</b></td></tr>
                <tr><td>PCI Number : </td><td><b>$pci_number</b></td></tr>
                <tr><td>Patient Name : </td><td><b>$first_name $sur_name</b></td></tr>
		<tr><td>EMIS Number : </td><td><b>$emis_number</b></td></tr>
		<tr><td>LAB Ref : </td><td>$lab_number</td></tr>
		<tr><td>NHS Ref : </td><td>$nhs_number</td></tr>
                <tr><td>Date of Birth : </td><td>$dob</td></tr>
                $age
                $gender
                <tr><td>Clinician : </td><td>$clrk</td></tr>
                $derm_surgeon
                <tr><td>Clinic Date : </td><td>$date_taken</td></tr>
                <tr><td>Date Received By Lab : </td><td>$date_rec_bylab</td></tr>
                <tr><td>Date Published : </td><td>$converted_time</td></tr>
                $last_modify_publish
                $lab_release_date
                $date_rec_by_doctor
            </table>
        </td>
    </tr>
</table>
EOD;
        //<tr><td>Report Date : </td><td>$converted_time</td></tr>
        $this->SetY(0);
        $this->SetFont('times', 10);
        $this->writeHTMLCell(0, 0, 5, 5, $header_text, 0, 0, 0, false, false);
    }

    public function Footer() {
        global $hospital_information;
        $footer_text = $hospital_information;
        $this->SetY(-30);
        $this->SetFont('times', 16);

        $this->Cell(0, 25, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'B');
        $this->writeHTMLCell(0, 0, 0, 25, $footer_text, 0, 0, 0, true, true);
    }

}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('OxbridgeMedica');
$pdf->SetTitle('Uralensis') . ' - ' . $serial_number;
$pdf->SetSubject('Uralensis Resport');
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetMargins(5, PDF_MARGIN_TOP + 55, 5);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM + 12);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// ---------------------------------------------------------
// set font
$pdf->SetFont('times', 12);

// add a page
$pdf->AddPage();
$pdf->SetY(80);
if (!empty($cl_detail)) {
    $html = '
<div style="border-bottom:1px solid black;"></div>
<br />
<table>
    <tr>
        <td width="15%"><b>Clinical Detail : </b></td>
        <td width="85%">' . $Result_clinical . '</td>
    </tr>
    <br />
</table>
';
} else {
    $specimen_count = 1;
    foreach ($query2 as $specimen_data) {
        $specimen_result_clinical = str_replace("\n", '<br />', $specimen_data->specimen_clinical_history);

        $html .= '
<div style="border-bottom:1px solid black;"></div>
<br />
<table>
    <tr>
        <td width="15%"><b>Clinical Detail (Specimen '.$specimen_count.'): </b></td>
        <td width="85%">' . $specimen_result_clinical . '</td>
    </tr>
    <br />
</table>
';
        $specimen_count++;
    }
}
$count = 1;
foreach ($query2 as $row2) :
    $Result_macro = str_replace("\n", '<br />', $row2->specimen_macroscopic_description);
    $Result_micro = str_replace("\n", '<br />', $row2->specimen_microscopic_description);
    $diagnosis = !empty($row2->specimen_diagnosis_description) ? $row2->specimen_diagnosis_description : '';
    $Result_diagnosis = str_replace("\n", '<br />', $diagnosis);
    $html .= '<div style="border-bottom:1px solid black;"></div><br />
    <table>
        <tr>
            <td width="30%" style="font-size:18px;"><b>Specimen ' . $count . '</b></td>
            <td></td>
        </tr>
        <br />
        <tr>
            <td width="13%"><b>Specimen : </b></td>
            <td width="2%"></td>
            <td width="85%">' . ucfirst($row2->specimen_type) . '&nbsp;' . $row2->specimen_right . '&nbsp;' . $row2->specimen_left . '&nbsp;' . $row2->specimen_na . '&nbsp;' . $row2->specimen_site . '
            </td>
        </tr>
        <br />
        <tr>
            <td width="13%"><b>Macroscopic Description : </b></td>
            <td width="2%"></td>
            <td width="85%">' . $Result_macro . '</td>
        </tr>
        <br />
        <tr>
            <td width="13%"><b>Microscopic Description : </b></td>
            <td width="2%"></td>
            <td width="85%">' . $Result_micro . '</td>
        </tr>
    </table>';

    if (!empty($diagnosis)) {
        $html .='<table>
            <br /><br />
        <tr>
            <td width="13%"><b>Diagnosis :</b></td>
            <td width="2%"></td>
            <td width="85%">' . $diagnosis . '</td>
        </tr>
    </table>';
    }
    
            if (empty($comment_section)) {
        if (!empty($row2->specimen_comment_section)) {
            $format_specimen_comments = str_replace("\n", '<br />', $row2->specimen_comment_section);
            $specimen_comments_time = '';
            if ($row2->specimen_comment_section_timestamp != '') {
                $specimen_comments_time = date('M j Y', $row2->specimen_comment_section_timestamp);
            }
            $html .='
<br /><br />
<div style="border-bottom:1px solid black;"></div>
<table>
    <tr>
        <td><b>Additional Comments (Specimen ' . $count . ')  &nbsp; | &nbsp; Comment Date: ' . $specimen_comments_time . ' </b></td>
    </tr>
    <br />
    <tr>
        <td>' . $format_specimen_comments . '</td>
    </tr>
</table>

';
        }
    }
    $count++;
endforeach;

$supp_count = 1;
foreach ($query4 as $row4) {
    $additional_work = $row4->description;
    $Result_additional = str_replace("\n", '<br />', $additional_work);
    $additional_work_time = $row4->additional_work_time;
    if (isset($Result_additional) && $Result_additional != '') :

        $html .= '
<br /><br />
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
<br /><br />
<div style="border-bottom:1px solid black;"></div>
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
$html .='
<br /><br />
<div style="border-bottom:1px solid black;"></div>
<table>
    <tr>
        <td style="font-size:14px;"><b>Reported by: Dr. ' . $user_first_name . ' ' . $user_last_name . '. </b><b>GMC: ' . $gmc_code . '. </b><b>Email: ' . $user_email . '. </b><b>Mobile: ' . $user_phone . '</b></td>
    </tr>
</table>

';
$pdf->writeHTML($html, true, false, true, false, '');
$file_name = $serial_number . '_Report_' . $first_name . '_' . $sur_name . '_' . date('dMY') . '.pdf';
ob_end_clean();
$pdf->Output($file_name, 'I');
?>
<?php 
require_once('tcpdf/tcpdf.php');


class MYPDF extends TCPDF {
	
	public function __construct()
    {
		parent::__construct();
	}

    public function Header() {

        global $serial_number;
        global $footer_text;
		$serialnumber = $serial_number;
        
        //$logoVal = base_url().'assets/img/logo.jpeg';
		
		$logoVal = base_url().'assets/img/document_pdf.png';
      	

        $header_text = <<<EOD
		
		
		 <div class="navbar-light1" style="display: block; text-align: right; width: 100%; margin: auto;">
			<a href="#"><img src="$logoVal" style="width: 100px;"></a>  
			<h5 style="margin-top: 20px;font-size: 16px; border-bottom: 2px solid #666; padding-bottom: 10px;"> $serialnumber</h5>
		</div>
 	
		             
EOD;
        //echo $headerText;exit;
        $this->SetY(0);
        $this->SetFont('times', 10);
        $this->writeHTMLCell(0, 0, 5, 5, $header_text, 0, 0, 0, false, false);
    }

    public function Footer() {
        global $footer_text;
        $footertext = $footer_text;
       // $this->SetY(-30);
        $this->SetFont('times', 16);
		
		$footer = '<div class="container-fluid" style="text-align: center; width:100%; background-color:#192e5a; color:#fff;">
        <div>'.$footertext.'</div></div>';
	
		$this->writeHTMLCell(220, 0, 0, 287, $footer, 0, 0, 0, false, false);

       // $this->Cell(0, 25, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'B');
        //$this->writeHTMLCell(0, 0, 0, 25, $footertext, 0, 0, 0, true, true);
    }

}

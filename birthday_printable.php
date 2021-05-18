<?php
//voorbereiding om bestand te printen
// composer require composer require tecnickcom/tcpdf
// Include the main TCPDF library (search for installation path).
require_once('vendor/tecnickcom/tcpdf/tcpdf.php');
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('H. Kool');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//// set some language-dependent strings (optional)
//if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
//    require_once(dirname(__FILE__).'/lang/eng.php');
//    $pdf->setLanguageArray($l);
//}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
//<!---------einde TCPDF--------------------------------------------/-->


$kittens=array("kitten1.jpg", "kitten2.jpg", "kitten3.png");
$k=0; // teller kittens
//de maanden
$months=array('januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus', 'september', 'oktober', 'november', 'december');
$daynames = array('M','D','W','D','V','Z','Z');
$start = '2021-1-1'; // gewenste datum
$start = strtotime($start); // integer:  timestamp
$startY = date('Y',$start); // format naar jaartal

// aantal dagen in het jaar uitrekenen.
$start_date = date_create("$startY-01-01"); // date_time object
$end_date   = date_create("$startY-12-31");


//difference between two dates
$verschil = (date_diff($start_date,$end_date));
$aantal = intval($verschil->format("%a"));
$aantaldagen = $aantal + 1;

$pdf_file = "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Birthday calender as file</title>
    <style>
        body{
            background-color: antiquewhite;
                font-family: 'Trebuchet MS', sans-serif;
                color:sienna;
        }

        .calender{
            width: 800px;
           
        }
        img{
            width:400px;
        }
        .p-2, .maand, .image
        {
            border-bottom: .5px solid sienna;
        }

    </style>
</head>
<body>
<div>
    <div class=\"d-flex flex-column calender\" >
        <div class=\"p-2 \">
            verjaarskalender
        </div>
    </div>";


    // forlus voor alle dagen van het jaar
    for($i =0;$i<$aantaldagen;$i++){// aantal dagen van het jaar als alternatief
        $pdf_file = $pdf_file ."<tr >";
        $datum = strtotime('+'.$i.' days', $start);
        $maand = intval(date('m', $datum))-1;
        $dezemaand = $maand;

        if($k >= 3){ $k=0;}
        // image of kitten, three pictures, used more then once.
        $pdf_file = $pdf_file . "<div class='d-flex calender'><div class='container-fluid maand ' >$months[$dezemaand]</div><div class='image'><img src='images/$kittens[$k]'/></div>
        </div>";
        $k++;
        // eind melding maand
        // begin dagen
        $pdf_file = $pdf_file . "<div class='d-flex flex-wrap bg-sienna calender'>";


        $dagnummer = date('N', $datum); // maandag - zondag

        do
        {
            $dag = date('j', $datum);
            $pdf_file = $pdf_file . "<div class='p-2  container-fluid '>$dag</div>";
            $i++;
            $datum = strtotime('+'.$i.' days', $start);
            $maand = intval(date('m', $datum))-1;
        }
        while($maand== $dezemaand);
        $i--; // uit lus als er een nieuwe maand is, teller staat op 1 en wordt gelijk 1 opgehoogd.
        $pdf_file = $pdf_file . "</div></div></div>";
    }
//    echo $pdf_file;
ob_end_clean();
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $pdf_file, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
    ?>
</div>
</body>
</html>
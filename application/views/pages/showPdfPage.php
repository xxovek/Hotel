<?php
/* include autoloader */
require_once  'dompdf/autoload.inc.php';
/* reference the Dompdf namespace */
use Dompdf\Dompdf;

/* instantiate and use the dompdf class */
$dompdf = new Dompdf();
$output = '';
// print_r($bookings);

 foreach($bookings as $row)
{
  $output .='<tr>
  <td>'.$row['FromDate'].'-'.$row['UptoDate'].'</td>
  <td>
  Room Detail:'.$row['roomNumber'].'-'.$row['roomType'].'</td>
  <td>'.$row['Nights'].'</td>
  <td>'.$row['pricePerNight'].'</td>
    <td>'.$row['pricePerNight']*$row['Nights'].'</td>
  </tr>';
 }
 foreach($orders as $row)
{
  $output .='<tr>
  <td>'.$row['orderDate'].'</td>
  <td>
  '.$row['productName'].'- Room No  '.$row['roomId'].'</td>
  <td>'.$row['Quantity'].'</td>
  <td>'.$row['productPrice'].'</td>
    <td>'.$row['Quantity']*$row['productPrice'].'</td>
  </tr>';
 }

$html ='<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <style>
    		*
    		{

            font-size: 12px;
            font-family: SourceSansPro;
    				  color: #555555;
    		}
    		body
    		{
    				width:100%;
            font-size: 14px;
            font-family: SourceSansPro;
            color: #555555;
    				margin:0;
    				padding:0;
    		}

    		p
    		{
    				margin:0;
    				padding:0;
    		}

    		#wrapper
    		{
    				width:180mm;
    				margin:0 3mm;
    		}

    		.page
    		{
    				height:297mm;
    				width:210mm;
    				page-break-after:always;
    		}

    		table
    		{


    				border-spacing:0;
    				border-collapse: collapse;

    		}

    		table td
    		{

    				padding: 2mm;
    		}

    		table.heading
    		{
    				height:20mm;
    		}

    		h1.heading
    		{
    				font-size:16pt;
    				color:#000;
    				font-weight:normal;
    		}

    		h2.heading
    		{
    				font-size:9pt;
    				color:#000;
    				font-weight:normal;
    		}
        table td h3{
          color: #000000;
          font-size: 1.2em;
          font-weight: normal;
          margin: 0 0 0.2em 0;
        }
    		hr
    		{
    				color:#ccc;
    				background:#ccc;
    		}

    		#invoice_body
    		{
    				height: 149mm;
    		}

    		#invoice_body , #invoice_total
    		{
    				width:100%;
    		}
    		#invoice_body table , #invoice_total table
    		{
    				width:100%;
    				border-top: 1px solid #ccc; */

    				border-spacing:0;
    				border-collapse: collapse;

    		}

    		#invoice_body table td , #invoice_total table td
    		{
    				text-align:center;
    				font-size:9pt;

    		}

    		#invoice_body table td.mono  , #invoice_total table td.mono
    		{
    				font-family:monospace;
    				text-align:right;
    				padding-right:3mm;
    				font-size:10pt;
    		}

    		#footer
    		{
    				width:180mm;
    				margin:0 15mm;
    				padding-bottom:3mm;
    		}
    		#footer table
    		{
    				width:100%;
    				border-left: 1px solid #ccc;
    				border-top: 1px solid #ccc;

    				background:#eee;

    				border-spacing:0;
    				border-collapse: collapse;
    		}
    		#footer table td
    		{
    				width:25%;
    				text-align:center;
    				font-size:9pt;
    				border-right: 1px solid #ccc;
    				border-bottom: 1px solid #ccc;
    		}
        #logo {
          float: left;
          margin-top: 8px;
        }

        #logo img {
          height: 40px;
        }

    </style>
    </head>
    <div id="wrapper">
    		<table class="heading" style="width:100%;">
    				<tr>
                <td style="width:40mm">
									  <div style="color: #555555;font-family: Arial, sans-serif;font-size: 18px;font-family: SourceSansPro;text-align:left;">
									  <div class="row"><strong>Guest Name</strong>   '.$customer['FirstName'].'-'.$customer['lastName'].'</div>
                    <div class="row"><strong>Guest Address</strong>   '.$customer['address'].'</div>
                    <div class="row"><strong>Mobile No</strong>  '.$customer['contactNumber'].'</div>
                    <div class="row"><strong>Email</strong>   '.$customer['email'].'</div>
									  <div class="row"><strong>Arr Date</strong>   '.$customer['FromDate'].'</div>
                    <div class="row"><strong>Arr Time</strong>     '.$customer['UptoDate'].'</div>
										</div>

                </td>
    						<td style="width:40mm;">

								<div style="color: #555555;font-family: Arial, sans-serif;font-size: 18px;font-family: SourceSansPro;text-align:right;">
								  <div class="row"><strong>Invoice No</strong>  '.$customer['paymentId'].'</div>
                  <div class="row"><strong>Date</strong>    '.$customer['created_at'].'</div>
								</div>

                </td>
    				</tr>
            <hr>
        </table>
				<table  style="width:100%;">

    				<tr>
    						<td style="width:50mm;">
    						</td>
                <td style="width:35mm;">
                <h1>Payment Receipt</h1>
    						</td>
								<td style="width:40mm;">
								</td>

    				</tr>
            <hr>
    		</table>



    		<div id="content">
    				<div id="invoice_body">
    						<table border="1">
    						<tr style="background:#fff;">

    								<td style="width:20%;"><strong>Date</strong></td>
    								<td><strong>Description</strong></td>
    								<td style="width:10%;"><strong>Quantity/Days</strong></td>
                    <td style="width:10%;"><strong>Rate
                    </strong></td>
    								<td style="width:10%;"><strong>Amount
                    </strong></td>
    						</tr>
                '.$output.'


    						</table>

                <table border="1" style="width:100%;padding-top:10px;">

            				<tr>
            						<td style="width:50mm;">
                        Your Sign / Date
            						</td>

        								<td style="width:40mm;">
                          Reciever Sign / Date
        								</td>

            				</tr>
                    <tr>
                    <td style="width:50mm;padding:15;">

                                						</td>

                            								<td style="width:40mm;padding:15;">

                            								</td>

                                				</tr>

            		</table>
    		    </div>

    		</div>
       <footer style="text-align:center;"><font size="15px">'.$companyinformation['HotelName'].'</font></footer>
       <footer style="text-align:center;"><font size="12px">'.$companyinformation['address'].'</font></footer>
        <footer style="text-align:center;padding-top:5px;"><font size="10px" color="red">This is an electronically generated receipt, no signature is required</font></footer>
  </body>
</html>

';
// <footer style="text-align:center;padding-left:400px;">Sign</footer>
// <br/><br/>
// <footer style="text-align:center;"> This receipt is generated by computer device</footer>

$dompdf->setPaper('A4', 'portrait');
// $dompdf->loadHtml(file_get_contents('newpdf.html'));
 // $dompdf->loadHtml(file_get_contents('a2.html'));
$dompdf->loadHtml($html);
/* Render the HTML as PDF */
$dompdf->render();

/* Output the generated PDF to Browser */
// $dompdf->stream();
$dompdf->stream("dompdf_out.pdf", array("Attachment" => false));

exit(0);
?>

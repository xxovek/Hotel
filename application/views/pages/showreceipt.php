<?php
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
<html lang="ar">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Modern Receipt</title>
    <style>
        @media print {
            @page {
                margin: 0 auto; /* imprtant to logo margin */
                sheet-size: 300px 250mm; /* imprtant to set paper size */
            }
            html {
                direction: rtl;
            }
            html,body{margin:0;padding:0}
            #printContainer {
                width: 250px;
                margin: auto;
                /*padding: 10px;*/
                /*border: 2px dotted #000;*/
                text-align: justify;
            }

           .text-center{text-align: center;}
        }
    </style>
</head>
<body onload="window.print();">


<div id="printContainer">
    <h2 id="slogan" style="margin-top:0" class="text-center">Bill Receipt</h2>

    <table>
        <tr>
            <td>Invoice Num</td>
            <td><b>'.$customer['paymentId'].'</b></td>
        </tr>

        <tr>
            <td>Created At</td>
            <td><b>'.$customer['created_at'].'</b></td>
        </tr>

        <tr>
            <td>Client Name</td>
            <td><b>'.$customer['FirstName'].'-'.$customer['lastName'].'</b></td>
        </tr>
    </table>

    <hr>

    <table >
        <tr>
            <td width="20%"><b>Date</b></td>
            <td ><b>Description</b></td>
            <td width="10%"><b>Quantity/Days</b></td>
            <td width="10%"><b>Rate</b></td>
            <td width="10%"><b>Amount</b></td>
        </tr>


        '.$output.'
    </table>
    <hr>


    <hr>

</div>
</body>
</html>';

include("mpdf-master/MPDF60/mpdf.php");

$mpdf=new mPDF('c','A4','','' , 0 , 0 , 0 , 0 , 0 , 0);

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list

$mpdf->WriteHTML($html);
$mpdf->Output();
?>

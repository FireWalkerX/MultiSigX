<?php
use app\extensions\action\Functions;
$function = new Functions();

ini_set('memory_limit', '-1');

$pdf =& $this->Pdf;
$this->Pdf->setCustomLayout(array(
    'header'=>function() use($pdf){
        list($r, $g, $b) = array(200,200,200);
        $pdf->SetFillColor($r, $g, $b); 
        $pdf->SetTextColor(0 , 0, 0);
        $pdf->Cell(0,15, 'MultiSigX.com ', 0,1,'C', 1);
        $pdf->Ln();
    },
    'footer'=>function() use($pdf){
        $footertext = sprintf('Copyright � %d https://MultiSigX.com. All rights reserved. support@multisigx.com', date('Y')); 
        $pdf->SetY(-10); 
        $pdf->SetTextColor(0, 0, 0); 
        $pdf->SetFont(PDF_FONT_NAME_MAIN,'', 8); 
        $pdf->Cell(0,8, $footertext,'T',1,'C');
    }

));

$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);
$pdf->SetAuthor('https://MultiSigX.com');
$pdf->SetCreator('support@MultiSigX.com');
$pdf->SetSubject('MultiSigx for '.$printdata['email'].' generated by '.$printdata['username']);
$pdf->SetKeywords('MutiSigx, '.$printdata['currency'].', '.$printdata['currencyName']);
$pdf->SetTitle('MultiSigX: Sign '.$printdata['security'].' of 3 generated by '.$printdata['username']." ".$printdata['currencyName'].' '.$printdata['currency'].' address: '.$printdata['address']);


$pdf->SetAutoPageBreak(true);
$pdf->AddPage();

$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(10,20,false);
$html = '
<h3>DocumentID: '.$printdata['name'].' <small>Date: '.gmdate('Y-M-d H:i:s',$printdata['DateTime']->sec).'</small></h3>
<p>This document is created online on <a href="https://MultiSigx.com" target="_blank">https://MultiSigx.com</a>. It contains private and confidential information for multi signature for <strong>'.$printdata['currencyName'].'</strong> <strong>'.$printdata['currency'].'</strong> created by <strong>'.$printdata['username'].', '.$printdata['createEmail'].'</strong></p>';
$html = $html . '<p><strong>Users:</strong>
<ul>
	<li>'.$printdata['createEmail'].': '.$printdata['relation0'].'</li>
	<li>'.$printdata['user1'].': '.$printdata['relation1'].'</li>
	<li>'.$printdata['user2'].': '.$printdata['relation2'].'</li>	
</ul>
';
$html = $html . '<p><strong>'.$printdata['currency'].'</strong> address: <strong>'.$printdata['address'].'</strong> security for signin  <strong>'.$printdata['security'].'</strong> of 3 users.</p>';
$html = $html . '
<table cellpadding="5" cellspacing="5" width="100%" style="border:1px solid gray">
	<tr>
		<td colspan="2"><img src="'.LITHIUM_APP_PATH.'\\webroot\\qrcode\\out\\x-'.$printdata['username'].'-'.$printdata['address'].'-address.png'.'"  alt="'.$printdata['currency'].' address" title="'.$printdata['currency'].' address" border="1" width="300"><br>
'.$printdata['currencyName'].' '.$printdata['currency'].':<br>'.$printdata["address"].'</td>	
	</tr>
	<tr>
		<td colspan="2">You can deposit and withdraw coins to the above address with your favorite client. You and also check the balance on <a href="https://MultiSigx.com" target="_blank">https://MultiSigx.com</a> by signin in with your username.</td>
	</tr>
	<tr><td colspan="2">
	Note: We have generated this PDF file online from memory, we did not store any data on our server. Please keep this document safe. If you loose this document you may loose the coins.
	</td></tr>
	<tr><td colspan="2"><code>
	redeemScript{"address":"'.$printdata["address"].'","redeemScript" :"'.$printdata["redeemScript"].'"}
	</code></td></tr>
</table>';
$pdf->writeHTML($html, true, 0, true, 0);
$pdf->AddPage();

$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(10,20,false);
$html = '	
<table cellpadding="5" cellspacing="5" width="100%" style="border:1px solid gray">
	<tr><td colspan="2">
	The private key is used when you make a withdrawal / payment. The passphrase and poetry can be used in case if you loose your private key.
	</td></tr>
	<tr>
		<td><img src="'.LITHIUM_APP_PATH.'\\webroot\\qrcode\\out\\'.$printdata['i'].'-'.$printdata['username'].'-private.png'.'"  alt="Privatekey" title="Privatekey" border="1" width="300"><br>
Privkey: <br><small>'.$printdata["private"].'</small> </td>
		<td><img src="'.LITHIUM_APP_PATH.'\\webroot\\qrcode\\out\\'.$printdata['i'].'-'.$printdata['username'].'-passphrase.png'.'"  alt="Passphrase" title="Passphrase" border="1" width="300"><br>
Passphrase:<br><small>'.$printdata["passphrase"].'</small> </td>
	</tr>
	<tr>
		<td colspan="2"><img src="'.LITHIUM_APP_PATH.'\\webroot\\qrcode\\out\\'.$printdata['i'].'-'.$printdata['username'].'-dest.png'.'"  alt="Poetry" title="Poetry" border="1" width="300"><br>
Poetry to recover privkey:<br><small>'.$printdata["dest"].'</small> </td>	
	</tr>
</table>

';
$pdf->writeHTML($html, true, 0, true, 0);

?>
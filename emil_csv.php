<?php
$row    = 1;
$file   = @$argv[1];
$institution = 'INTERNATIONAL SOS';// name the institution
if (empty($file)) {
    
    exit ("Please provide a csv file. \n");
}
$mail = <<<EOD
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<div style="width:500px; margin:10px auto; overflow:hidden;"><!-- Header start -->
<div style="float:left; width:480px; background:#fff; padding:5px 10px; border-bottom:5px solid #e9e9e7;"><img alt="RCNi Learning" src="https://rcnilearning.com/images/logo.jpg" title="RCNi Learning" /></div>
<!-- Header end --><!-- Article start -->

<div style="float:left; width:480px; background:#fff; padding:20px 10px;  border-bottom:5px solid #e9e9e7; min-height:300px;">
<p style="margin:0px; padding:0px; font-size:12px; padding-bottom:10px;">Hi {NAME},</p>

<p style="margin:0px; padding:0px; font-size:12px; padding-bottom:10px;">Congratulations..!</p>
<p style="margin:0px; padding:0px; font-size:12px; padding-bottom:10px;">Your institutional sub account for {INSTITUTION} has been set up, on http://rcnilearning.com.
Please access the site through the referral URL or the IP ranges of your institution and log in to your sub account.
</p>
<p style="margin:0px; padding:0px; font-size:12px; padding-bottom:10px;"> Username: {USERNAME}</p>
<p style="margin:0px; padding:0px; font-size:12px; padding-bottom:10px;"> Password: {PASSWORD}</p>
</div>
<br />
<p>Best Regards,</p>
<p>RCNi Support team</p>
<!-- Article end --><!-- Footer start -->

<div style="float:left; width:480px; background:#00a590; padding:10px;">
<div style="float:left; width:300px;">
<div style="font-size:12px; color:#fff; line-height:18px;">RCNi Learning<br />
The Heights, 59-65 Lowlands Road,<br />
Harrow, Middlesex, HA1 3AW, UK<br />
www.rcni.com</div>
</div>

<div style="float:right; width:106px; padding-top:15px;"><img alt="rcni logo" src="https://rcnilearning.com/images/rcni-footerlogo.jpg" /></div>
</div>
<!-- Footer end --></div>

EOD;
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From:<no-reply@rcnilearning.com>' . "\r\n";
$replace = array('{USERNAME}', '{INSTITUTION}', '{NAME}', '{PASSWORD}');
if (($handle = fopen($file, "r")) !== FALSE) {
    while (($data = fgetcsv($handle,0, ",")) !== FALSE) {
        if ($row <= 2) { $row++; continue; }       
            $row++;
            echo "name = ".$name = $data[4] ." ". $data[5]."\n";
            echo "username = ". $username  = $data[0] . "\n";
            echo "email = ". $email  = $data[2] . "\n";
            echo "password = ". $password  = $data[1] . "\n";
            $message    = str_replace($replace, array($username,$institution,$name, $password), $mail);
            mail($email, "RCNi Learning Account Confirmation.", $message,$headers);
            
            
        
    }
    fclose($handle);
}
?>

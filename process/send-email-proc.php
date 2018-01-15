<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './src/Exception.php';
require './src/PHPMailer.php';
require './src/SMTP.php';

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['cellphone'];
$message=$_POST['message'];

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'gator4185.hostgator.com';                // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'sys@techiknowledge.com';                 // SMTP username
    $mail->Password = 'techimail1234';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                   // TCP port to connect to

    //Recipients
    $mail->setFrom('sys@techiknowledge.com', 'System Mailer');
    $mail->addAddress('minglun77127@gmail.com', 'Ming');     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Message From Customer '.$name;
    $mail->Body    = '<b>Customer Information:</b>
                      <p>Name: '.$name.'</p>
                      <p>Email: '.$email.'</p>
                      <p>Phone: '.($phone?:'Not Provided').'</p>
                      <p>Message:<br>'.str_replace('.','.<br>',$message).'</p>';
    $mail->AltBody = 'Customer Information:
                      Name: '.$name.'
                      Email:'.$email.'
                      Phone:'.($phone?:'Not Provided').'
                      Message:'.$message;

    echo $mail->send()?
            json_encode(array('status'=>'success', 'data'=>array('name'=>$name))):
            json_encode(array('status'=>'error'));

} catch (Exception $e) {
    echo json_encode(array("status"=>"error", "message"=>$e));
}
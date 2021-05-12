<?php
use \Firebase\JWT\JWT;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function getUserMac(){
    $cmd = "arp -a " . $_SERVER['REMOTE_ADDR'];
    $status = 0;
    $return = [];
    exec($cmd, $return, $status);
    if(isset($return[3])){
        return strtoupper(str_replace("-",":",substr($return[3],24,17))); 
    }else{
        $MAC = exec('getmac'); 
        $MAC = strtok($MAC, ' ');    
        return $MAC;
    }
}

// get & decript token
function fetchToken($token){
    return JWT::decode($token, TOKEN_SECRET, array('HS256'));;
}
// set token
function generateToken($id){
    // get client MAC adress
    $MAC = getUserMac();
    $token = Array(
        "id" => $id,
        "mac" => $MAC
    );
    return JWT::encode($token, TOKEN_SECRET);    
}

// get time stamp
function getCurrentTimestamp(){
    return date("Y-m-d h:i:s");
}
function generateId(){
    $min = pow(10,6);
    $max = pow(10,10);
    $timeStampHex = dechex(time());
    $firstRandomHex = dechex(rand($min,$max));
    $secondRandomHex = dechex(rand($min,$max));
    return $timeStampHex."-".$firstRandomHex."-".$secondRandomHex;
}

function sendEmail($data){
    //Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'user@example.com';                     //SMTP username
    $mail->Password   = 'secret';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
    $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $data->subject;
    $mail->Body    = $data->body;
    $mail->AltBody = $data->altBody;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
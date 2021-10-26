<?php
    define('CHAR_SET', 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');
    define('TOKEN_SIZE', 10);
    define('MAIL_USER', 'freeman404.test@gmail.com');
    define('MAIL_PASS', '******');
    
    if (!isset($_POST['sbtReset'])) {
        header("Location: reset-password.php");
    }    
    
    $email = $_POST['txtEmail'];
    
    // Load Database Connection
    require 'database.php';

    // Check whether the email is registered or not
    if ($CONN->query("SELECT id FROM users WHERE email='$email'")->num_rows == 0) {
        header("Location: reset-password.php");
    }; 

    // Generate Token
    $token = substr(str_shuffle(CHAR_SET), 0, TOKEN_SIZE);
    $CONN->query("UPDATE users SET token='$token',
                tokenExpire=DATE_ADD(NOW(), INTERVAL 5 MINUTE) WHERE email='$email'");
    
    // Import PHPMailer Library
    use PHPMailer\PHPMailer\PHPMailer;
    require 'lib/PHPMailer/PHPMailer.php';
    require 'lib/PHPMailer/Exception.php';
    require 'lib/PHPMailer/SMTP.php';
    
    $mail = new PHPMailer(true);

    //Server settings
    $mail->isSMTP();
    $mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 
                            'verify_peer_name' => false, 'allow_self_signed' => true ) );
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = MAIL_USER;
    $mail->Password   = MAIL_PASS;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;

    //Recipients
    $mail->setFrom('freeman404.test@gmail.com', 'Mailer');
    $mail->addAddress($email);

    //Content
    $mail->Subject = "Password Reset ";
    $mail->Body = "Plrease click on the link below.
        http://localhost:8080/PHPBasic/tutorial10/resetPassword.php?email=$email&token=$token";

    if($mail->send()) {
        echo 'Message has been sent. Please Check Your Email';
    } else {
        echo "Message could not be sent.";
    }
?>
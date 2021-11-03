<?php

namespace App\Services\Mail;

use App\Contracts\Services\Mail\MailServiceInterface;
use PHPMailer\PHPMailer\PHPMailer;

class MailService implements MailServiceInterface
{

    protected $mailer;

    public function __construct(){
        $this->mailer = new PHPMailer(true);
        $this->mailer->isSMTP();
        $this->mailer->SMTPOptions = array( 
            'ssl' => array( 'verify_peer' => false, 
                'verify_peer_name' => false, 
                'allow_self_signed' => true ) 
        );
        $this->mailer->SMTPAuth = true;
        $this->mailer->SMTPSecure = 'tls';
        $this->mailer->Host = 'smtp.gmail.com';
        $this->mailer->Port = 587;
        $this->mailer->isHTML(true);
        
        $this->mailer->Username = '******';
        $this->mailer->Password = '******';
        $this->mailer->setFrom('******', 'Laravel Mailer');
    }

    /**
     * To send email to employee
     * @param string $email email to be sent
     * @return void
     */
    public function sendMail($validated)
    {

        $email = $validated['email'];
        $subject = $validated['subject'];
        $body = $validated['body'];

        $this->mailer->addAddress($email);
        
        switch($subject) {
            case "appointment":
                $this->mailer->Subject = "Appointment";
                $this->mailer->Body = "We wll mee you again";
                break;
            case "interview":
                $this->mailer->Subject = "Interview";
                $this->mailer->Body = "You have an interview";
                break;
            default:
                $this->mailer->Subject = $subject;
                $this->mailer->Body = $body;
                break;
        }

        $this->mailer->send();
    }
}
<?php
function sendemail($email_address, $subjectemail, $contentemail)
{
    $CI = &get_instance();
    // PHPMailer object
    $CI->load->library("phpmailer_library");
    $mail = $CI->phpmailer_library->load();
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'email-smtp.us-east-1.amazonaws.com';   //Sets the SMTP hosts of your Email hosting, this for Godaddy
    $mail->Port = '587';                //Sets the default SMTP server port
    $mail->SMTPAuth = true;             //Sets SMTP authentication. Utilizes the Username and Password variables
    $mail->Username = 'AKIAZT7MVW4ZMS5BFDOT';          //Sets SMTP username
    $mail->Password = 'BL0LvsgBxo9Eg+/4B9C0Gq+Z1oLKChCH2M0UMuWttmS9';         //Sets SMTP password
    $mail->SMTPSecure = 'tls';             //Sets connection prefix. Options are "", "ssl" or "tls"
    $mail->From = 'agen@dropshipaja.com';      //Sets the From email address for the message
    $mail->FromName = 'agen@dropshipaja.com';          //Sets the From name of the message

    // Add a recipient
    $mail->addAddress($email_address);

    // Email subject
    $mail->Subject = $subjectemail;

    // Set email format to HTML
    $mail->isHTML(true);

    // Email body content
    $mailContent = $contentemail;
    $mail->Body = $mailContent;

    // Send email
    if (!$mail->send()) {
        return false;
    } else {
        return true;
    }
}

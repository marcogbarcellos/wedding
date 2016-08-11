<?php

    if($_REQUEST['name'] == '' || $_REQUEST['numberOfGuest'] == '' || $_REQUEST['eventAttending'] == '' || $_REQUEST['message'] == ''):
      return "error";
    endif;
    
    // RSVP Sender Form email address
    $sender_email = 'info@heloisagabriel.com';

    // receiver email address
    $to = 'marcogbarcellos@gmail.com, heloisaamancio@hotmail.com, heloisaamancio100@gmail.com';
    
    
    // prepare header
    $header = 'From: '. $_REQUEST['name'] . ' <'. $sender_email .'>'. "\r\n";
    $header .= 'Reply-To:  '. $_REQUEST['name'] . ' <'. $sender_email .'>'. "\r\n";
    // $header .= 'Cc:  ' . 'example@domain.com' . "\r\n";
    // $header .= 'Bcc:  ' . 'example@domain.com' . "\r\n";
    $header .= 'X-Mailer: PHP/' . phpversion();
    
    // Contact Subject
    $subject = "Confirmação de presença/Mensagem aos noivos";
    
    // Contact Message
        //$message = $_REQUEST['message'];
        $message = "Nome: ".$_REQUEST['name']. "\n\n"."Número de convidados: ".$_REQUEST['numberOfGuest']."\n\nPresença: ".$_REQUEST['eventAttending']. "\n\n". "Mensagem: \n".$_REQUEST['message'];
    
    
    // Send contact information
    $mail = mail( $to, $subject , $message, $header, "-r".$sender_email );
    
    return $mail ? "success" : "error";
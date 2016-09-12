<?php
/**
 * User: alex
 * Date: 6/26/13
 * Time: 1:00 AM
 */

define('ZEND_LIB_PATH', realpath(dirname(__FILE__)) . '/lib');
define("EMAIL","floristea@yandex.ru");
//define("EMAIL","charmer1@yandex.ua");


set_include_path(implode(PATH_SEPARATOR, array(
    ZEND_LIB_PATH,
    get_include_path(),
)));

require "Zend/Mail.php";
require "Zend/File/Transfer/Adapter/Http.php";
require "Zend/Mail/Transport/Smtp.php";

$requireFields = array("name","phone");

$fieldLabels = array(
    "name" => "Имя",
    "phone" => "Контактный телефон",
    "email" => "Email"
);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $messageBody = "";
    $subject = array_key_exists("subject",$_POST) ? $_POST["subject"] : null;
    if(empty($subject)){
        throw new Exception("Invalid request");
    }
    try{
        foreach($requireFields as $field){
            if(!array_key_exists($field,$_POST)){
                throw new Exception("Missing Required Field: " . $field);
            }
        }
        $mail = new Zend_Mail("UTF-8");
        $mail->setSubject($subject);
        $mail->setFrom("site@floristea.com");
        $mail->addTo(EMAIL);

        foreach($fieldLabels as $key => $label){
            if(array_key_exists($key,$_POST) && !empty($_POST[$key])){
                $messageBody .= $label . ": " . $_POST[$key] . "\n";
            }
        }
        $mail->setBodyText($messageBody);
        $mailTransport = new Zend_Mail_Transport_Smtp("cgi18.hqhost.net");
        Zend_Mail::setDefaultTransport($mailTransport);
        $mail->send();
        print "Success";

    } catch(Exception $e){
        print "Error: " . $e->getMessage();
    }

}
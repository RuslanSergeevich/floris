<?php
/**
 * User: alex
 * Date: 6/26/13
 * Time: 1:00 AM
 */

define('ZEND_LIB_PATH', realpath(dirname(__FILE__)) . '/lib');
define("FLORIS_EMAIL","floristea@yandex.ru");



set_include_path(implode(PATH_SEPARATOR, array(
    ZEND_LIB_PATH,
    get_include_path(),
)));

require "Zend/Mail.php";
require "Zend/Mail/Transport/Smtp.php";

$requireFields = array("phone","name");

$fieldLabels = array(
    "phone" => "Телефон",
    "name" => "Имя",
    "utm_source" => "Источник",
    "utm_term" => "Ключевое слово"
);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $messageBody = "";
    $successRequest = true;
    foreach($requireFields as $field){
        if(!array_key_exists($field,$_POST)){
            $successRequest = false;
            break;
        }
    }
    if($successRequest){
        $mailTransport = new Zend_Mail_Transport_Smtp("cgi18.hqhost.net");
        Zend_Mail::setDefaultTransport($mailTransport);
        $mail = new Zend_Mail("UTF-8");
        $mail->setSubject("Заказ обратного звонка");
        $mail->setFrom("noreply@floris.com");
        $mail->addTo(FLORIS_EMAIL);
        foreach($fieldLabels as $key => $label){
            if(array_key_exists($key,$_POST)){
                $messageBody .= $label . ": " . $_POST[$key] . "\n";
            }
        }
        $mail->setBodyText($messageBody);
        try{
            $mail->send();
        } catch(Exception $e){
            print_r($e->getMessage());
        }
    }
}
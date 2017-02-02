<?php
	$from = "Floris | Крымский чай и сладости floristea.com <info@floristea.com>";
    $to = 'rustikjan@gmail.com';
    $subject = 'Подтвердите свой e-mail на сайте floristea.com';
    $html .= '<tr>Здравствуйте!<br/><br/></tr>';
    $html .= '<tr>Вы ввели свои данные на сайте <a href="//floristea.com">floristea.com</a><br/><br/></tr>';
    $html .= '<tr>Для получения доступа к оптовым ценам подтвердите свой адрес электронной почты, 
    			  перейдя по ссылке <a href="#" style="color:red">тут ссылка</a><br/><br/></tr>';
    $html .= '<tr>Если вы не совершали никаких действий на сайте просто проигнорируйте это письмо.<br/><br/></tr>';
    $html .= '<tr>Всегда рады ответить на ваши вопросы<br/><br/></tr>';
    $html .= '<tr><a href="tel:+73652583577">+73652583577</a> Команда Флорис.<br/><br/></tr>';
    $headers  = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= 'From: '.$from."\r\n"; 
    mail($to, $subject, $html, $headers);
    header('Location: /price');
?>
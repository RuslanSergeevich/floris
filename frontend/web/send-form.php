<?php
if(isset($_POST) && count($_POST) && isset($_POST['data'])){
    $all_count = 0;
    $all_sum = 0;
    $html = '<table>';
    $html .= '<tr><td>Наименование</td><td>Масса гр.</td><td>В упаковке</td><td>Кол-во</td><td>Цена ₽</td><td>Сумма ₽</td></tr>';
    foreach($_POST['data'] as $item){
        $html .= '<tr>';
        $html .= '<td>'.$item['name'].'</td>';
        $html .= '<td>'.$item['weight'].'</td>';
        $html .= '<td>'.$item['count_box'].'</td>';
        $html .= '<td>'.$item['count'].'</td>';
        $html .= '<td>'.$item['price'].'</td>';
        $html .= '<td>'.$item['sum'].'</td>';
        $html .= '</tr>';

        $all_count += (int)$item['count'];
        $all_sum   += (int)$item['sum'];
    }

    $html .= '<tr><td colspan="5">Общее количество: '.$all_count.'</td><td>'.$all_sum.'</td></tr>';
    $html .= '</table>';
    if($_POST['reklama'] == 'true'){
        $html .= '<p>Выслать рекламные материалы: ДА</p>';
    }
    if($_POST['obrazci'] == 'true'){
        $html .= '<p>Выслать образцы: ДА</p>';
    }
    $to = 'vregis@mail.ru';
    $subject = "Заявка";
    $headers  = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: Birthday Reminder floristea.com\r\n";
    mail($to, $subject, $html, $headers);
}
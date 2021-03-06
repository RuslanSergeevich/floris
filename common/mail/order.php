<?php

/* @var $this \yii\web\View view component instance */
/* @var $model common\models\CatalogItems */

?>
<h1>Оформление заявки</h1>
<p>ФИО: <?= $model['name']?></p>
<p>Телефон: <?= $model['phone']?></p>
<p>Комментарий: <?= $model['comment']?></p>

<p></p>
<table border="1">
    <tbody>
        <tr>
            <td>
                Наименование
            </td>
            <td>
                Масса гр.
            </td>
            <td>
                В упаковке
            </td>
            <td>
                Кол-во
            </td>
            <td>
                Цена
            </td>
            <td>
                Сумма
            </td>
        </tr>
        <?php if ($model['data']): ?>
            <?php foreach ($model['data'] as $item): ?>
                <tr>
                    <td>
                        <?= $item['name']?>
                    </td>
                    <td>
                        <?= $item['weight']?>
                    </td>
                    <td>
                        <?= $item['count_box']?>
                    </td>
                    <td>
                        <?= $item['count']?>
                    </td>
                    <td>
                        <?= $item['price']?>
                    </td>
                    <td>
                        <?= $item['sum']?>
                    </td>
                </tr>
            <?php endforeach; ?>
                <tr>
                    <td colspan="6"><p>Итого: <?= $model['itogo']?></p></td>
                </tr>
        <?php endif; ?>
        <?php if($model['reklama'] == 'true'):?>
            <tr>
                <td colspan="6"><p>Выслать рекламные материалы: ДА</p></td>
            </tr>
        <?php endif;?>
        <?php if($model['obrazci'] == 'true'):?>
            <tr>
                <td colspan="6"><p>Выслать образцы: ДА</p></td>
            </tr>
        <?php endif;?>
    </tbody>
</table>
<?php

/* @var $this \yii\web\View view component instance */
/* @var $model common\models\CatalogItems */

?>
<h1>Оформление заявки</h1>
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
        <?php if ($model): ?>
            <?php foreach ($model as $item): ?>
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
        <?php endif; ?>
    </tbody>
</table>
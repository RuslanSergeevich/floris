<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pages */
$this->title = Html::encode($model->title);
$this->registerMetaTag([
    'name' => 'description',
    'content' => Html::encode($model->description),
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => Html::encode($model->keywords)
]);
?>
<main class="privat">
    <section class="top b-top-section top-section">
        <div class="title">
            МЫ ПРОИЗВОДИМ И ФАСУЕМ ЧАЙ<br>ПОД ВАШЕЙ ТОРГОВОЙ МАРКОЙ<br>С ДОСТАВКОЙ ПО ВСЕМУ СНГ
            <div class="sub-title">
                Дизайн упаковок и рекламных материалов в подарок
            </div>
        </div>
    </section>
    <section class="type-of-tea">
        <div class="inner">
            <div class="title">
                Разновидности чая
            </div>
            <ul>
                <li>
                    <div class="img">
                        <img src="/images/privat/tea-1.png" alt="">
                    </div>
                    <p>
                        Черный чай
                    </p>
                </li>
                <li>
                    <div class="img">
                        <img src="/images/privat/tea-2.png" alt="">
                    </div>
                    <p>
                        Зелёный чай
                    </p>
                </li>
                <li>
                    <div class="img">
                        <img src="/images/privat/tea-3.png" alt="">
                    </div>
                    <p>
                        Ягодные смеси
                    </p>
                </li>
                <li>
                    <div class="img">
                        <img src="/images/privat/tea-4.png" alt="">
                    </div>
                    <p>
                        Травяные смеси
                    </p>
                </li>
                <li>
                    <div class="img">
                        <img src="/images/privat/tea-5.png" alt="">
                    </div>
                    <p>
                        Черный и зеленый чай с травами
                    </p>
                </li>
            </ul>
        </div>
    </section>
    <section class="components">
        <div class="inner">
            <div class="count">
                65
            </div>
            <div class="text">
                различных компонентов<br>на выбор
                <p>
                    Также можете воспользоваться нашими<br>готовыми рецептурами
                </p>
            </div>
            <div class="center">
                <a class="btn" href="#">ПОДРОБНЕЕ</a>
            </div>
        </div>
    </section>
    <section class="type-of-product">
        <div class="inner">
            <div class="title">
                Разновидности продукции
            </div>
            <ul>
                <li>
                    <div class="img">
                        <img src="/images/privat/prod-1.png" alt="">
                    </div>
                    <p>
                        Насыпные пачки
                    </p>
                </li>
                <li>
                    <div class="img">
                        <img src="/images/privat/prod-2.png" alt="">
                    </div>
                    <p>
                        Фильтр-пакеты
                    </p>
                </li>
                <li>
                    <div class="img">
                        <img src="/images/privat/prod-3.png" alt="">
                    </div>
                    <p>
                        Фильтр-пакеты с нитью
                    </p>
                </li>
                <li>
                    <div class="img">
                        <img src="/images/privat/prod-4.png" alt="">
                    </div>
                    <p>
                        Фильтр-пакеты в конвертах
                    </p>
                </li>
                <li>
                    <div class="img">
                        <img src="/images/privat/prod-5.png" alt="">
                    </div>
                    <p>
                        Прозрачные пакеты<br>(от 100 шт.)
                    </p>
                </li>
                <li>
                    <div class="img">
                        <img src="/images/privat/prod-6.png" alt="">
                    </div>
                    <p>
                        Чайные наборы
                    </p>
                </li>
            </ul>
        </div>
    </section>
    <section class="privat-label">
        <div class="inner">
            <div class="title">
                Что дает Private Label
            </div>
            <ul class="slider">
                <li>
                    <div class="count">
                        1
                    </div>
                    <div class="text">
                        Отличный способ<br>протестировать <br>нишу
                        <p>
                            Не требует вложений<br>в оборудование и производство
                        </p>
                    </div>
                </li>
                <li>
                    <div class="count">
                        2
                    </div>
                    <div class="text">
                        Отличный способ<br>протестировать <br>нишу
                        <p>
                            Не требует вложений<br>в оборудование и производство
                        </p>
                    </div>
                </li>
                <li>
                    <div class="count">
                        3
                    </div>
                    <div class="text">
                        Отличный способ<br>протестировать <br>нишу
                        <p>
                            Не требует вложений<br>в оборудование и производство
                        </p>
                    </div>
                </li>
            </ul>
            <div class="bottom-text">
                <div class="title">
                    Почему стоит заказать производство у нас?
                </div>
                <ul>
                    <li>
                        <div class="sub-title">
                            ПОЛНЫЙ ЦИКЛ
                        </div>
                        <p>
                            Мы осуществляем все этапы производства, а самое главное: контролируем качество сырья!
                        </p>
                    </li>
                    <li>
                        <div class="sub-title">
                            БЕСПЛАТНОЕ ХРАНЕНИЕ
                        </div>
                        <p>
                            Мы Мы осуществляем все этапы производства. Наши площади позволяют хранить ваш товар у себя до востребования (2000 кв. м). Вы экономите на хранении.
                        </p>
                    </li>
                    <li>
                        <div class="sub-title">
                            БЕСПЛАТНОЕ ХРАНЕНИЕ
                        </div>
                        <p>
                            Мы Мы осуществляем все этапы производства. Наши площади позволяют хранить ваш товар у себя до востребования (2000 кв. м). Вы экономите на хранении.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="tasks">
        <div class="inner">
            <div class="title">
                Задачи которые мы решаем
            </div>
            <ul>
                <li>
                    <p>
                        Мы Мы осуществляем все этапы производства. Наши площади позволяют хранить ваш товар у себя до востребования (2000 кв. м). Вы экономите на хранении.
                    </p>
                </li>
                <li>
                    <p>
                        Мы Мы осуществляем все этапы производства. Наши площади позволяют хранить ваш товар у себя до востребования (2000 кв. м). Вы экономите на хранении.
                    </p>
                </li>
                <li>
                    <p>
                        Мы Мы осуществляем все этапы производства. Наши площади позволяют хранить ваш товар у себя до востребования (2000 кв. м). Вы экономите на хранении.
                    </p>
                </li>
            </ul>
        </div>
    </section>
    <section class="geography-sale">
        <div class="inner center">
            <div class="text">
                УЗНАТЬ БОЛЬШЕ
            </div>
            <a class="btn green" href="#">ПОДРОБНЕЕ</a>
        </div>
    </section>
    <section class="cases">
        <div class="inner">
            <div class="title">
                Наши кейсы
            </div>
            <ul>
                <li>
                    <div class="img">
                        <img src="/images/privat/case-1.png" alt="">
                    </div>
                    <div class="desc">
                        <h3>
                            ПАО «ЗАВОД ФИОЛЕНТ»
                        </h3>
                        <p>
                            Завод «Фиолент» изготовил партию чая к 100-летию для подарков рабочим и партнерам завода.
                        </p>
                    </div>
                </li>
                <li>
                    <div class="img">
                        <img src="/images/privat/case-2.png" alt="">
                    </div>
                    <div class="desc">
                        <h3>
                            ПАО «ЗАВОД ФИОЛЕНТ»
                        </h3>
                        <p>
                            Завод «Фиолент» изготовил партию чая к 100-летию для подарков рабочим и партнерам завода.
                        </p>
                    </div>
                </li>
                <li>
                    <div class="img">
                        <img src="/images/privat/case-3.png" alt="">
                    </div>
                    <div class="desc">
                        <h3>
                            ПАО «ЗАВОД ФИОЛЕНТ»
                        </h3>
                        <p>
                            Завод «Фиолент» изготовил партию чая к 100-летию для подарков рабочим и партнерам завода.
                        </p>
                    </div>
                </li>
                <li>
                    <div class="img">
                        <img src="/images/privat/case-4.png" alt="">
                    </div>
                    <div class="desc">
                        <h3>
                            ПАО «ЗАВОД ФИОЛЕНТ»
                        </h3>
                        <p>
                            Завод «Фиолент» изготовил партию чая к 100-летию для подарков рабочим и партнерам завода.
                        </p>
                    </div>
                </li>
                <li>
                    <div class="img">
                        <img src="/images/privat/case-5.png" alt="">
                    </div>
                    <div class="desc">
                        <h3>
                            ПАО «ЗАВОД ФИОЛЕНТ»
                        </h3>
                        <p>
                            Завод «Фиолент» изготовил партию чая к 100-летию для подарков рабочим и партнерам завода.
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </section>
</main>
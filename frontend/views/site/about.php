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
<section class="about">
    <div class="top-block b-top-section">
        <div class="title">
            ФЛОРИС — ЧАЙНАЯ КОМПАНИЯ<br>С ПОЛНЫМ ПРОИЗВОДСТВЕННЫМ<br>ЦИКЛОМ
        </div>
    </div>
    <div class="b-content">
        <div class="inner">
            <p>
                В феврале 2011 года мы начали с 6 видов травяных и ягодных смесей,  продавали в родном Крыму. За 4 года мы немного выросли: сегодня выпускаем 60 наименований чая, освоили контрактное производство под марками наших клиентов. Появились сладости и торговая марка Легенды Крыма — наш сувенирный бренд.
            </p>
            <div class="b-local">
                <div class="title">
                    Ингредиенты
                </div>
                <p>
                    Мы выращиваем, сушим и перерабатываем все травы сами, а затем смешиваем и получаем купажи. Готовые смеси упаковываются в фильтр-пакеты (после измельчения) , картонные коробки или прозрачные банки. В чаи идут только цветки, листья и плоды растений.
                </p>
            </div>
            <div class="b-local">
                <div class="title">
                    Рецептуры
                </div>
                <p>
                    Создавая рецептуры мы добиваемся нужного вкуса за счет натуральных компонентов. Самый сильный ароматизатор — лаванда, краситель — каркаде. Сложно описать вкус словами, скажем так: за 4 дня фестиваля Джаз Коктебель мы продали 3 000 полулитровых стаканов чая Флорис.
                </p>
            </div>
            <div class="b-local">
                <div class="title">
                    Производство
                </div>
                <p>
                    Подход к производству рационален: самая популярная картонная коробка идеально раскладывается на лист А4, полностью заполняя его, а прозрачное окошко дает возможность рассмотреть все ингредиенты.
                </p>
                <p>
                    В 2015 мы научились работать с черным и зеленым чаем, смешивая его с редкими крымскими травами.
                </p>
            </div>
        </div>
    </div>
    <div class="b-content-promo screen">
        <div class="inner">
            <ul>
                <li>
                    Партнёры более
                    <div class="circle">
                        1000
                    </div>
                    магазинов
                </li>
                <li>
                    Используем
                    <div class="circle">
                        500<span>тонн</span>
                    </div>
                    сырья в год
                </li>
                <li>
                    Ассортимент
                    <div class="circle">
                        60
                    </div>
                    видов чая
                </li>
            </ul>
        </div>
    </div>
    <div class="b-content-promo mobile">
        <div class="inner">
            <ul class="list-promo">
                <li>
                    Партнёры более
                    <div class="circle">
                        1000
                    </div>
                    магазинов
                </li>
                <li>
                    Используем
                    <div class="circle">
                        500<span>тонн</span>
                    </div>
                    сырья в год
                </li>
                <li>
                    Ассортимент
                    <div class="circle">
                        60
                    </div>
                    видов чая
                </li>
            </ul>
        </div>
    </div>
    <div class="b-content clients">
        <div class="inner">
            <div class="b-local">
                <div class="title">
                    Наши клиенты
                </div>
                <p>
                    Наши клиенты — розничные сети, магазины и кафе здоровой пищи, сувенирные лавки и супермаркеты.
                </p>
            </div>
            <div class="logos">
                <ul>
                    <li>
                        <img src="/images/about/logo.png" alt="">
                    </li>
                    <li>
                        <img src="/images/about/logo.png" alt="">
                    </li>
                    <li>
                        <img src="/images/about/logo.png" alt="">
                    </li>
                    <li>
                        <img src="/images/about/logo.png" alt="">
                    </li>
                    <li>
                        <img src="/images/about/logo.png" alt="">
                    </li>
                    <li>
                        <img src="/images/about/logo.png" alt="">
                    </li>
                    <li>
                        <img src="/images/about/logo.png" alt="">
                    </li>
                    <li>
                        <img src="/images/about/logo.png" alt="">
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="geography-sale">
        <div class="inner center">
            <div class="text">
                ГЕОГРАФИЯ ТОЧЕК ПРОДАЖ
            </div>
            <a class="btn border" href="#">НАЙТИ</a>
        </div>
    </div>
    <div class="b-content employees">
        <div class="inner">
            <div class="b-local">
                <div class="title">
                    Сотрудники компании
                </div>
            </div>
            <ul>
                <li>
                    <div class="img">
                        <img src="/images/about/men.png" alt="">
                    </div>
                    <p>
                        Вениамин Константинопольский<span>Должность</span>
                    </p>
                </li>
                <li>
                    <div class="img">
                        <img src="/images/about/men.png" alt="">
                    </div>
                    <p>
                        Вениамин Константинопольский<span>Должность</span>
                    </p>
                </li>
                <li>
                    <div class="img">
                        <img src="/images/about/men.png" alt="">
                    </div>
                    <p>
                        Вениамин Константинопольский<span>Должность</span>
                    </p>
                </li>
                <li>
                    <div class="img">
                        <img src="/images/about/men.png" alt="">
                    </div>
                    <p>
                        Вениамин Константинопольский<span>Должность</span>
                    </p>
                </li>
            </ul>
            <div class="b-local vacations">
                <div class="title fleft">
                    Вакансии
                </div>
                <p>
                    Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo.
                </p>
                <p>
                    Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo.
                </p>
                <a class="btn border" href="#">ВАКАНСИИ</a>
            </div>
        </div>
    </div>
</section>
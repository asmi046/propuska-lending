@extends('layouts.all')

@php
    $title = "";
    $description = "";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

<header class="header" id="header">
        <div class="container header__container">
            <div class="header__logo logo">
                <img src="{{ asset('img/logo.svg') }}" alt="Логотип компании" class="logo__image">
            </div>
            <div class="header__actions actions">
                <a href="#consult" type="button" class="actions__button button">Заказать звонок</a>
            </div>

            <div class="header__actions actions_mobile">
                <a href="#consult" type="button" class="actions__button button">
                    <svg class="sprite_icon">
                        <use xlink:href="#call_icon"></use>
                    </svg>
                </a>
            </div>
        </div>
    </header>


<section class="check-section" id="check-section">
    <div class="container check-section__container">
            <div class="content__left left-block">
                <div class="left-block__image-wrapper">
                    <img src="{{ asset('img/top_bg.webp') }}" alt="Фоновое изображение" class="left-block__bg-image">
                    <div class="left-block__overlay"></div>
                </div>
                <div class="left-block__inner">
                    <h1 class="left-block__title">Проверка пропуска на МКАД (Москва) по номеру машины</h1>
                    <p class="left-block__subtitle">Введите гос номер транспортного средства без пробелов</p>

                    <form class="left-block__form check-form">
                        <input type="text" placeholder="A000AA000" class="check-form__input" />
                        <button type="submit" class="check-form__button button">Проверить номер</button>
                    </form>

                    <p class="left-block__description">Проверка пропуска займет не более 15 сек. Вся информация подгружается с официального сайта Департамента транспорта.</p>
                    <a href="#coll" class="left-block__link text_icon">
                        <svg class="sprite_icon">
                            <use xlink:href="#info_icon"></use>
                        </svg>
                        <span class="text">Как это работает</span>
                    </a>
                </div>
            </div>

            <div class="content__right right-block">
                <h2 class="right-block__title">Получать уведомление</h2>
                <p class="right-block__text">Получайте уведомления опо пропускам на вашу почту и телефон</p>

                <form class="right-block__form subscribe-form">
                    <input type="text" placeholder="Имя" class="subscribe-form__input">
                    <input type="email" placeholder="E-mail" class="subscribe-form__input">
                    <input type="tel" placeholder="Телефон" class="subscribe-form__input">

                    <label class="checbox_label" for="policy_ch">
                        <input v-model="policy_ch" type="checkbox" id="policy_ch">
                        <span>Я соглашаюсь с <a href="/page/politika-v-oblasti-obrabotki-personalnyx-dannyx"> политикой в области обработки персональных данных</a></span>
                    </label>

                    <label class="checbox_label" for="accept_ch">
                        <input v-model="accept_ch" type="checkbox" id="accept_ch">
                        <span>Я даю <a href="/page/soglasie-na-obrabotku-personalnyx-dannyx">согласие на обработку моих персональных данных</a></span>
                    </label>
                    <button type="submit" class="subscribe-form__button button">Отправить</button>
                </form>
            </div>
    </div>
</section>

<section class="table-section" id="table-section">
    <div class="container table-section__container">
        <table class="table">
            <thead>
                <tr class="table__header">
                    <th scope="col">Госномер</th>
                    <th scope="col">Тип пропуска</th>
                    <th scope="col">БА номер</th>
                    <th scope="col">Дата начала действия</th>
                    <th scope="col">Дата окончания действия</th>
                    <th scope="col">Статус</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table__row ">
                    <td>M986EY198</td>
                    <td>СК (Дневной)</td>
                    <td>БА 1953218</td>
                    <td>05.06.2025</td>
                    <td>03.06.2026</td>
                    <td>Аннулирован</td>
                </tr>
                <tr class="table__row table__row--annulled">
                    <td>M986EY198</td>
                    <td>СК (Дневной)</td>
                    <td>БА 1953218</td>
                    <td>05.06.2025</td>
                    <td>03.06.2026</td>
                    <td>Аннулирован</td>
                </tr>
                <tr class="table__row ">
                    <td>M986EY198</td>
                    <td>СК (Дневной)</td>
                    <td>БА 1953218</td>
                    <td>05.06.2025</td>
                    <td>03.06.2026</td>
                    <td>365</td>
                </tr>
                <tr class="table__row table__row--active">
                    <td>M986EY198</td>
                    <td>СК (Дневной)</td>
                    <td>БА 1953218</td>
                    <td>05.06.2025</td>
                    <td>03.06.2026</td>
                    <td>365</td>
                </tr>
                <tr class="table__row ">
                    <td>M986EY198</td>
                    <td>СК (Дневной)</td>
                    <td>БА 1953218</td>
                    <td>05.06.2025</td>
                    <td>03.06.2026</td>
                    <td>365</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

@endsection


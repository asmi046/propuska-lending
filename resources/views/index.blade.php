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

<!-- resources/views/sections/grid-table-section.blade.php -->

<section class="grid-table" id="grid-table">
  <div class="container grid-table__container">
    <div class="grid-table__header">
      <div class="grid-table__cell" data-label="Госномер">Госномер</div>
      <div class="grid-table__cell" data-label="Тип пропуска">Тип пропуска</div>
      <div class="grid-table__cell" data-label="БА номер">БА номер</div>
      <div class="grid-table__cell" data-label="Дата начала действия">Дата начала действия</div>
      <div class="grid-table__cell" data-label="Дата окончания действия">Дата окончания действия</div>
      <div class="grid-table__cell" data-label="Статус">Статус</div>
    </div>

    <div class="grid-table__row">
      <div class="grid-table__cell" data-label="Госномер">M986EY198</div>
      <div class="grid-table__cell" data-label="Тип пропуска">СК (Дневной)</div>
      <div class="grid-table__cell" data-label="БА номер">БА 1953218</div>
      <div class="grid-table__cell" data-label="Дата начала действия">05.06.2025</div>
      <div class="grid-table__cell" data-label="Дата окончания действия">03.06.2026</div>
      <div class="grid-table__cell" data-label="Статус">Аннулирован</div>
    </div>

    <div class="grid-table__row grid-table__row--annulled">
      <div class="grid-table__cell" data-label="Госномер">M986EY198</div>
      <div class="grid-table__cell" data-label="Тип пропуска">СК (Дневной)</div>
      <div class="grid-table__cell" data-label="БА номер">БА 1953218</div>
      <div class="grid-table__cell" data-label="Дата начала действия">05.06.2025</div>
      <div class="grid-table__cell" data-label="Дата окончания действия">03.06.2026</div>
      <div class="grid-table__cell" data-label="Статус">Аннулирован</div>
    </div>

    <div class="grid-table__row grid-table__row--active">
      <div class="grid-table__cell" data-label="Госномер">M986EY198</div>
      <div class="grid-table__cell" data-label="Тип пропуска">СК (Дневной)</div>
      <div class="grid-table__cell" data-label="БА номер">БА 1953218</div>
      <div class="grid-table__cell" data-label="Дата начала действия">05.06.2025</div>
      <div class="grid-table__cell" data-label="Дата окончания действия">03.06.2026</div>
      <div class="grid-table__cell" data-label="Статус">365</div>
    </div>
  </div>
</section>

<!-- resources/views/sections/banner-section.blade.php -->

<section class="banner-section" id="banner-section">
    <div class="container banner-section__container">
        <div class="banner-section__content">
            <div class="banner-section__overlay"></div>
            <div class="banner-section__left left-content">
                <h2 class="left-content__title">Помощь в оформлении пропуска</h2>
                <div class="left-content__permits">
                    <img src="{{ asset('img/propuska/propusk-1.webp') }}" alt="МКАД" class="left-content__permit">
                    <img src="{{ asset('img/propuska/propusk-2.webp') }}" alt="ТТК" class="left-content__permit">
                    <img src="{{ asset('img/propuska/propusk-3.webp') }}" alt="СК" class="left-content__permit">
                </div>
            </div>
            <div class="banner-section__right right-content">
                <div class="right-content__price">
                    <span class="right-content__price-text">от 8000 ₽</span>
                    <span class="right-content__price-subtext">годовой пропуск</span>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection


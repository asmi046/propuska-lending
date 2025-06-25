@extends('layouts.all')

@php
    $title = "";
    $description = "";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

<div id="pass_app">

    <pass-check>
        <template #title>
            <h1 class="left-block__title">Проверка пропуска на МКАД (Москва) по номеру машины</h1>
        </template>
        <template #subtitle>
            <p class="left-block__subtitle">Введите гос номер транспортного средства без пробелов</p>
        </template>
        <template #description>
            <p class="left-block__description">Проверка пропуска займет не более 15 сек. Вся информация подгружается с официального сайта Департамента транспорта.</p>
        </template>
    </pass-check>


    {{-- <section class="grid-table" id="grid-table">
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
    </section> --}}

</div>


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


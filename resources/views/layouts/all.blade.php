<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @header_seo

    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon256.png')}}" sizes="256x256">
    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon128.png')}}" sizes="128x128">
    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon64.png')}}" sizes="64x64">
    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon32.png')}}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon16.png')}}" sizes="16x16">
    <link rel="icon" type="image/svg" href="{{asset('/img/favicons/fav.svg')}}" sizes="any">

    <meta name="_token" content="{{ csrf_token() }}">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
        'public/scss/main.scss'
    ])
</head>
<body>
    @include("allicon")
    <main id="main">
        @yield('main')
    </main>

    <div class="modal_win" id="global_app">
        <modal-window rout="/send_consult" redirect="/thencs" hesh="consult" title="Помощь специалиста" subtitle="Мы свяжемся с Вами в течении 15 минут"></modal-window>
        <empty-modal hesh="cityselect" title="Выбор города" subtitle="Выберите город в котором вы проживаете">
            // нужное в слот
        </empty-modal>
    </div>
</body>
</html>

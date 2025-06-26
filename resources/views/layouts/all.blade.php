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

    <script src="https://www.google.com/recaptcha/api.js?render=6Ld9iewpAAAAAO66gDOa5ovCsrhc2PkZDo09qkiR"></script>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
        'public/scss/main.scss'
    ])

    <script>
        window.Laravel = {
            assetUrl: '{{ asset('') }}',
            storageUrl: '{{ Storage::url('') }}'
        };
    </script>

    <!-- Yandex.Metrika counter -->
        <script type="text/javascript" >
            (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

            ym(102425021, "init", {
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
            });
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/102425021" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body>
    @include("allicon")
    <header class="header" id="header">
        <div class="container header__container">
            <a href="{{ route('home') }}" class="header__logo logo">
                <img src="{{ asset('img/logo.svg') }}" alt="Логотип компании" class="logo__image">
            </a>
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

    <main id="main">
        @yield('main')
    </main>


    <footer class="footer" id="footer">
        <div class="container footer__container">
            <div class="footer__top">
            <div class="footer__left copyright">
                <p class="copyright__text">© 2025 Проверка пропусков на МКАД. Все права защищены.</p>
            </div>
            <div class="footer__right policy-links">
                <a href="/page/politika-v-oblasti-obrabotki-personalnyx-dannyx" class="policy-links__link">Политика конфиденциальности</a>
                <a href="/page/soglasie-na-obrabotku-personalnyx-dannyx" class="policy-links__link">Согласие на обработку персональных данных</a>
            </div>
            </div>
            <div class="footer__bottom info-block">
            <p class="info-block__text">
                Информация, предоставленная на данном сайте не является публичной офертой или коммерческим предложением.
                Вся информация размещена с ознакомительной целью. Мы используем cookie-файлы для удобства использования данного сайта.
                Оставаясь на сайте, вы соглашаетесь с использованием файлов cookie.
            </p>
            </div>
        </div>
    </footer>
    <div class="modal_win" id="global_app">
        <modal-window rout="/send_consult" redirect="/thencs" hesh="consult" title="Помощь специалиста" subtitle="Мы свяжемся с Вами в течении 15 минут"></modal-window>
        <empty-modal hesh="cityselect" title="Как работает сервис" subtitle="Проверяй пропуска просто с нашим сервисом">
            <div class="text_styles">
            <h2>Проверить пропуск на МКАД по номеру машины легко и удобно с помощью нашего сервиса</h2>

            <p>На нашем сайте вы можете проверить пропуск на автомобили, состоящие на российком и иностранном учёте.</p>
            <p>Так же вы можете подключить отслеживание пропусков на ежедневной основе и в случае аннуляции будете получать информацию в СМС или WhatsApp.</p>
            </div>

        </empty-modal>
    </div>
</body>
</html>

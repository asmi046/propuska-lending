<template>
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
</template>

<script setup>
import { ref } from 'vue';

const policy_ch = ref(false);
const accept_ch = ref(false);
</script>

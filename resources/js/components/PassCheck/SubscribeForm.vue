<template>
    <div class="content__right right-block">
        <h2 class="right-block__title">Получать уведомление</h2>
        <p class="right-block__text">Получайте уведомления опо пропускам на вашу почту и телефон</p>

        <form  v-show="!showAccept" class="right-block__form subscribe-form">
            <input
                v-model="name"
                type="text"
                placeholder="Имя"
                class="subscribe-form__input"
            >
            <input
                v-model="email"
                type="email"
                placeholder="E-mail"
                class="subscribe-form__input"
            >
            <input

                type="text"
                v-mask="{mask: '+N (NNN) NNN-NN-NN', model: 'cpf' }"
                v-model="phone"
                placeholder="Телефон"
                :class="['subscribe-form__input', { empty: phoneError }]"
            >

            <label
            :class="['checbox_label', { empty: policyError }]"
            for="policy_ch"
            @click="policyError = false"
            >
                <input v-model="policy_ch" type="checkbox" id="policy_ch">
                <span>Я соглашаюсь с <a href="/page/politika-v-oblasti-obrabotki-personalnyx-dannyx"> политикой в области обработки персональных данных</a></span>
            </label>

            <label
            :class="['checbox_label', { empty: acceptError }]"
            for="accept_ch"
            @click="acceptError = false"
            >
                <input v-model="accept_ch" type="checkbox" id="accept_ch">
                <span>Я даю <a href="/page/soglasie-na-obrabotku-personalnyx-dannyx">согласие на обработку моих персональных данных</a></span>
            </label>
            <div class="control_wrap">
                <button
                    type="button"
                    class="subscribe-form__button button"
                    @click.prevent="sendSubscribe"
                >Отправить</button>

                <div v-show="showLoader" class="loader">
                    <svg class="sprite_icon">
                        <use xlink:href="#loader_icon"></use>
                    </svg>
                </div>
            </div>



        </form>

        <div v-show="showAccept" class="accept_message">
                <p class="emoji">📢🤝✅</p>
                <h2>Ваша заявка получена мы свяжемся с Вами</h2>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';

const name = ref('');
const email = ref('');
const phone = ref('');
const policy_ch = ref(false);
const accept_ch = ref(false);
const phoneError = ref(false);
const policyError = ref(false);
const acceptError = ref(false);
const showLoader = ref(false);
const showAccept = ref(false);

async function sendSubscribe() {
    phoneError.value = false;

    if (!phone.value) {
        phoneError.value = true;
        return;
    }

    if (!policy_ch.value) {
        policyError.value = true
    }

    if (!accept_ch.value) {
        acceptError.value = true
    }

    showLoader.value = true
    try {
        await axios.post('/send_subscribe', {
            name: name.value,
            email: email.value,
            phone: phone.value,
            policy_ch: policy_ch.value,
            accept_ch: accept_ch.value,
        });
        showLoader.value = false
        showAccept.value = true
    } catch (e) {
        console.log(e)
        showLoader.value = false
    }
}
</script>

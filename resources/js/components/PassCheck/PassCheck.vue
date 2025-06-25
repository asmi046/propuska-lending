<template>

    <section class="check-section" id="check-section">
        <div class="container check-section__container">
                <div class="content__left left-block">
                    <div class="left-block__image-wrapper">
                        <img :src="assetUrl + 'img/top_bg.webp'" alt="Фоновое изображение" class="left-block__bg-image">
                        <div class="left-block__overlay"></div>
                    </div>
                    <div class="left-block__inner">
                        <slot name="title"></slot>
                        <slot name="subtitle"></slot>

                        <form class="left-block__form check-form">
                            <input v-model="passNumber" type="text" placeholder="A000AA000" class="check-form__input" />
                            <button @click="checkPass" type="submit" class="check-form__button button">Проверить номер</button>
                        </form>

                        <slot name="description"></slot>

                        <a href="#coll" class="left-block__link text_icon">
                            <svg class="sprite_icon">
                                <use xlink:href="#info_icon"></use>
                            </svg>
                            <span class="text">Как это работает</span>
                        </a>
                    </div>
                </div>

                <SubscribeForm />
        </div>
    </section>

</template>

<script setup>
import { ref } from 'vue';
import SubscribeForm from './SubscribeForm.vue';

// State Layer
const passNumber = ref('');
const result = ref(null);

const assetUrl = window.Laravel?.assetUrl || '/';
const storageUrl = window.Laravel?.storageUrl || '/storage/';


// Data Layer (имитация запроса)
async function checkPass(number) {

}
</script>

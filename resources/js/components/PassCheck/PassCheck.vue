<template>

    <section class="check-section pt_0" id="check-section">
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
                            <input
                                v-model="passNumber"
                                type="text"
                                placeholder="A000AA000"
                                :class="['check-form__input', { empty: passNumberEmpty }]"
                                @focus="passNumberEmpty = false"
                            />
                            <button @click.prevent="checkPass" type="submit" class="check-form__button button">Проверить номер</button>
                        </form>

                        <slot name="description"></slot>

                        <a href="#cityselect" class="left-block__link text_icon">
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

    <section class="grid-table" id="grid-table">

        <div v-show="showLoader"  class="loader_wrapper">
            <svg class="sprite_icon pass_table_loader">
                <use xlink:href="#loader_icon_2"></use>
            </svg>
            <p>Производим поиск пропусков...</p>
        </div>

        <div v-show="showChError" class="ch_error_message">
            К сожалению во время проверки произошла ошибка! <br> Попробуйте позднее!
        </div>

        <div v-show="showLoader == false && result" class="container grid-table__container">
            <div class="grid-table__header">
                <div class="grid-table__cell" data-label="Госномер">Госномер</div>
                <div class="grid-table__cell" data-label="Тип пропуска">Тип пропуска</div>
                <div class="grid-table__cell" data-label="Номер пропуска">Номер пропуска</div>
                <div class="grid-table__cell" data-label="Дата начала действия">Дата начала действия</div>
                <div class="grid-table__cell" data-label="Дата окончания действия">Дата окончания действия</div>
                <div class="grid-table__cell" data-label="Осталось дней">Осталось дней</div>
            </div>

            <div

                :class="['grid-table__row', { 'grid-table__row--annulled': item.status == 'Аннулирован',
                'grid-table__row--active': item.sys_status == 'Действует',
                'grid-table__row--active': (item.status == 'Выдан' && item.deycount > 0),

                }]"
                v-for="(item, idx) in result"
                :key="idx"
            >
                <div class="grid-table__cell" data-label="Госномер">{{ item.truck_num }}</div>
                <div class="grid-table__cell" data-label="Тип пропуска">{{ item.pass_zone }} {{ item.type_pass?("("+item.type_pass+")"):"" }}</div>
                <div class="grid-table__cell" data-label="Номер пропуска">{{ item.series }} {{ item.pass_number }}</div>
                <div class="grid-table__cell" data-label="Дата начала действия">{{ item.valid_from.substr(0, 10) }}</div>
                <div class="grid-table__cell" data-label="Дата окончания действия">{{ item.valid_to.substr(0, 10) }}</div>
                <div class="grid-table__cell" data-label="Осталось дней">{{ (item.status == 'Аннулирован')?"Аннулирован":item.deycount }}</div>
            </div>
        </div>
    </section>

</template>

<script setup>
import { ref } from 'vue';
import SubscribeForm from './SubscribeForm.vue';

// State Layer
const showChError = ref(false);
const showLoader = ref(false);
const passNumberEmpty = ref(false);
const passNumber = ref('');
import { nextTick } from 'vue';

var result = ref(null);

const assetUrl = window.Laravel?.assetUrl || '/';
const storageUrl = window.Laravel?.storageUrl || '/storage/';


// Data Layer (имитация запроса)
async function checkPass(number) {
    if (! passNumber.value) {
        passNumberEmpty.value = true;
        return;
    }

    if (!window.grecaptcha) {
        alert('reCAPTCHA не загружена');
        return;
    }

    // Переход к якорю с id grid-table во Vue компоненте




    window.grecaptcha.execute('6Ld9iewpAAAAAO66gDOa5ovCsrhc2PkZDo09qkiR', { action: 'submit' }).then(async (token) => {
        showLoader.value = true
        showChError.value = false
        result.value = null

        await nextTick();
        const anchor = document.getElementById('grid-table');
        if (anchor) {
            anchor.scrollIntoView({ behavior: 'smooth' });
        }

        try {
            const response = await axios.get('/pass_check', {
                params: {
                    pass: passNumber.value,
                    token: token
                }
            });
            console.log(response.data);
            result.value = response.data;
        } catch (e) {
            showChError.value = true;
            console.log('Ошибка запроса')
            console.log(e.response?.data || e.message )
        }
        showLoader.value = false;
    }).catch((e) => {
        showChError.value = true;
        console.log( 'Ошибка reCAPTCHA' );
    });

}
</script>

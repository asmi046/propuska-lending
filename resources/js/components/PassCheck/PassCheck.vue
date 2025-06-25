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

    <section class="grid-table" id="grid-table">

        <svg v-show="showLoader" class="sprite_icon pass_table_loader">
            <use xlink:href="#loader_icon"></use>
        </svg>

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

                :class="['grid-table__row', { 'grid-table__row--annulled': item.status == 'Аннулирован', 'grid-table__row--active': item.sys_status == 'Действует', }]"
                v-for="(item, idx) in result"
                :key="idx"
            >
                <div class="grid-table__cell" data-label="Госномер">{{ item.truck_num }}</div>
                <div class="grid-table__cell" data-label="Тип пропуска">{{ item.pass_zone }} {{ item.pass_zone?("("+item.pass_zone+")"):"" }}</div>
                <div class="grid-table__cell" data-label="Номер пропуска">{{ item.series }} {{ item.pass_number }}</div>
                <div class="grid-table__cell" data-label="Дата начала действия">{{ item.valid_from.substr(0, 10) }}</div>
                <div class="grid-table__cell" data-label="Дата окончания действия">{{ item.valid_to.substr(0, 10) }}</div>
                <div class="grid-table__cell" data-label="Осталось дней">{{ item.deycount }}</div>
            </div>
        </div>
    </section>

</template>

<script setup>
import { ref } from 'vue';
import SubscribeForm from './SubscribeForm.vue';

// State Layer
const showLoader = ref(false);
const passNumberEmpty = ref(false);
const passNumber = ref('А273ОЕ37');
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


    await nextTick();
    const anchor = document.getElementById('grid-table');
    if (anchor) {
        anchor.scrollIntoView({ behavior: 'smooth' });
    }

    window.grecaptcha.execute('6Ld9iewpAAAAAO66gDOa5ovCsrhc2PkZDo09qkiR', { action: 'submit' }).then(async (token) => {
        showLoader.value = true;
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
            console.log('Ошибка запроса')
            console.log(e.response?.data || e.message )
        }
        showLoader.value = false;
    }).catch((e) => {
        console.log( 'Ошибка reCAPTCHA' );
    });

}
</script>

import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler'
import ModalWindow from "./components/ModalWindow.vue"
import EmptyModal from "./components/EmptyModal.vue"
import PassCheck from "./components/PassCheck/PassCheck.vue"
    import { VMaskDirective } from 'v-slim-mask'

    import axios from 'axios'
    import VueAxios from 'vue-axios'

    const global_app = createApp({
        components:{
            ModalWindow,
            EmptyModal,
        },
        setup() {}
    })

    global_app.use(VueAxios, axios)
    global_app.directive('mask', VMaskDirective)
    global_app.mount("#global_app");

    const pass_app = createApp({
        components:{
            PassCheck,
        },
        setup() {}
    })

    pass_app.use(VueAxios, axios)
    pass_app.directive('mask', VMaskDirective)
    pass_app.mount("#pass_app");

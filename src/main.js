import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import vuetify from "./plugins/vuetify";

// fresh date
import axios from "axios";
import VueAxios from "vue-axios";

Vue.use(VueAxios, axios);

Vue.use(require("vue-moment"));
// goto top
import VmBackTop from "vue-multiple-back-top";
Vue.component(VmBackTop.name, VmBackTop);

Vue.config.productionTip = false;

new Vue({
    router,
    vuetify,
    render: (h) => h(App),
}).$mount("#app");
import Vue from "vue";
import App from "./SearchApp.vue";
import router from "./routes";
import store from "./store";

import vSelect from "vue-select";
Vue.component("v-select", vSelect);
import "vue-select/dist/vue-select.css";

import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
Vue.use(Toast);

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: (h) => h(App),
}).$mount("#app");

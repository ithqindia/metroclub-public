import Vue from "vue";
import App from "./SearchApp.vue";
import router from "./routes";
import store from "./store";

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: (h) => h(App),
}).$mount("#app");

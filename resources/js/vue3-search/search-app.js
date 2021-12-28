import { createApp } from "vue";
import vSelect from "vue-select";
import "vue-select/src/scss/vue-select.scss";

import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";

import router from "./router";
import store from "./store";

import App from "./App";

const app = createApp(App);

app.component("v-select", vSelect);
// app.use(ElementPlus);
app.use(router);
app.use(store);
app.use(Toast);
app.mount("#app");

import Vue from "vue";
import VueRouter from "vue-router";
import Search from "../views/Search.vue";
import Universities from "../views/Universities.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "search",
    component: Search,
  },
  {
    path: "/universities",
    name: "Universities",
    component: Universities,
  },
];

const router = new VueRouter({
  routes,
});

export default router;

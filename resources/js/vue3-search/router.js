import { createWebHashHistory, createRouter } from "vue-router";
import Search from "./SearchHome";
import Universities from "./Universities";

const routes = [
  {
    path: "/search",
    name: "search",
    component: Search,
  },
  {
    path: "/universities",
    name: "universities",
    component: Universities,
  },
  {
    path: "/",
    redirect: "/search",
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  // mode: "history",
  // base: "/search",
  routes,
  scrollBehavior() {
    return { x: 0, y: 0 };
  },
});

export default router;

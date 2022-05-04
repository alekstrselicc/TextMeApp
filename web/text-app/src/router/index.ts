import Vue from "vue";
import VueRouter, { RouteConfig } from "vue-router";
import HomeView from "../views/HomeView.vue";
import MainView from "../views/MainView.vue";
import Chat from "../components/Chat/chat.vue";
import Settings from "../components/Settings/settings.vue";
import Profile from "../components/Profile/profile.vue";
Vue.use(VueRouter);

const routes: Array<RouteConfig> = [
  {
    path: "/home",
    name: "home",
    component: HomeView,
  },
  {
    path: "/about",
    name: "about",
    component: () => import("../views/AboutView.vue"),
  },
  {
    path: "/login",
    name: "login",
    component: () => import("../views/LoginView.vue"),
  },
  {
    path: "/register",
    name: "register",
    component: () => import("../views/RegisterView.vue"),
  },
  {
    path: "/",
    name: "main",
    component: MainView, //this is the default
    children: [
      {
        name: "profile",
        path: "profile",
        component: Profile,
      },
      {
        name: "settings",
        path: "settings",
        component: Settings,
      },
      {
        name: "chat",
        path: "chat",
        component: Chat,
      },
    ],
  },

  { path: "*", redirect: "/" },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router;

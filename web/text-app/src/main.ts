import Vue from "vue";
import App from "./App.vue";
import "./registerServiceWorker";
import router from "./router";
import store from "./store";
import vuetify from "./plugins/vuetify";

import VueAxios from "vue-axios";
import axios from "axios";

const authBearer = $cookies.get("auth_bearer");

if (authBearer) {
  document.cookie = authBearer;
}

Vue.use(VueAxios, axios);

Vue.config.productionTip = false;

Vue.prototype.$clientSecret = "s8fFcGCsOHGmLiG9TxjJaGjEuBKURInCqeVU9965";

Vue.prototype.$clientId = "9";

axios.interceptors.response.use(
  (response) => {
    // intercept the global error

    return response;
  },
  function (error) {
    if (window.location.href == "/#/login") return;
    const originalRequest = error.config;
    if (error.response.status === 401 && !originalRequest._retry) {
      originalRequest._retry = true; // now it can be retried

      const value = "; " + document.cookie;
      const parts = value.split("; " + "Authorization" + "=");
      if (parts.length == 2) {
        const authHeader = parts.pop().split(";").shift();
        originalRequest.headers["Authorization"] = authHeader;
        axios.defaults.headers.common.Authorization = authHeader;
      }
      return axios(originalRequest); // retry the request that errored out
    }

    if (
      window.location.href != "/#/login" &&
      error.response.status === 401 &&
      !originalRequest._retry2
    ) {
      originalRequest._retry2 = true;
      window.location.href = "/#/login";
      // console.log("Retry secod time");
      return;
    }

    // Do something with response error
    return Promise.reject(error);
  }
);

new Vue({
  router,
  store,
  vuetify,
  render: (h) => h(App),
}).$mount("#app");

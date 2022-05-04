import Vue from "vue";
import App from "./App.vue";
import "./registerServiceWorker";
import router from "./router";
import store from "./store";
import vuetify from "./plugins/vuetify";

import VueAxios from "vue-axios";
import axios from "axios";
import VueCookies from "vue-cookies";

Vue.use(VueAxios, axios);

Vue.use(VueCookies, { expire: "7d" });

//axios.defaults.baseURL = "http://localhost:8000/api/";

Vue.config.productionTip = false;

Vue.prototype.$clientSecret = "s8fFcGCsOHGmLiG9TxjJaGjEuBKURInCqeVU9965";

Vue.prototype.$clientId = "9";

let ref = false;

axios.interceptors.response.use(
  (res) => res,
  (error) => {
    if (error.response.status === 401 && !ref) {
      ref = true;
      const formDataD = new URLSearchParams();
      formDataD.append("client_secret", Vue.prototype.$clientSecret);
      formDataD.append("client_id", Vue.prototype.$clientId);
      formDataD.append("grant_type", "refresh_token");
      formDataD.append("refresh_token", localStorage.getItem("refreshToken"));
      formDataD.append("scope", "*");

      axios
        .post("http://127.0.0.1:8000/api/oauth/token", formDataD)
        .then((res) => {
          localStorage.setItem("authTokenAccess", res.data.access_token);
          localStorage.setItem("refreshToken", res.data.refresh_token);

          axios.defaults.headers.common["Authorization"] =
            "Bearer " + localStorage.getItem("authTokenAccess");
        })
        .catch((error) => {
          console.log(error);
        });
    }
    return error;
  }
);

new Vue({
  router,
  store,
  vuetify,
  render: (h) => h(App),
}).$mount("#app");

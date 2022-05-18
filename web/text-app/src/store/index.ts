import Vue from "vue";
import Vuex from "vuex";
import playgrounds from "./modules/playgrounds";

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    playgrounds,
  },
});

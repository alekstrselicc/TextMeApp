import axios from "axios";
import Vue from "vue";

const state = {
  playgrounds: [],
  channels: [],
  playground_name: "",
  playground_avatar: "",
};

const getters = {
  allPlaygrounds: (state) => state.playgrounds,
  playgroundChannels: (state) => state.channels,
  name: (state) => state.playground_name,
  avatar: (state) => state.playground_avatar,
};

const actions = {
  async fetchPlaygrounds({ commit }) {
    const res = await axios.get(
      "http://127.0.0.1:8000/api/getPlaygroundsWithChannels"
    );
    console.log(res.data);
    commit("setPlaygrounds", res.data);
  },

  async addPlayground({ commit }, title) {
    const res = await axios.post("http://127.0.0.1:8000/api/playgrounds", {
      title: title,
      img: "https://picsum.photos/350/165?random",
    });
    commit("newPlayground", res.data);
  },

  async findPlayground({ commit }, title) {
    const response = await axios
      .get("http://127.0.0.1:8000/api/findByName/" + title)
      .then(async (res) => {
        await axios.post("http://127.0.0.1:8000/api/playground_request", {
          sender: Vue.prototype.$userId,
          playground_id: res.data[0].id,
        });
      });
  },

  async fetchPlaygroundData({ commit }) {
    const res = await axios.get(
      "http://127.0.0.1:8000/api/findByChannel/" + this.$route.params.id
    );
    const response = await axios.get(
      "http://127.0.0.1:8000/api/playgrounds/" + res.data[0].playground_id
    );
    const responses = await axios.get(
      "http://127.0.0.1:8000/api/AllChannelsOfPlayground/" +
        response.data[0].playground_id
    );
    console.log("tuki je treba neki izpitsa");
    //console.log(responses.data[0].channels);
    commit("setPlaygroundName", response.data.title);
    commit("setPlaygroundAvatar", response.data.img);
    commit("setChannels", responses.data[0].channels);
  },

  async saveName({ commit }) {
    const res = await axios.get(
      "http://127.0.0.1:8000/api/findByChannel/" + this.$route.params.id
    );
    await axios.put(
      "http://127.0.0.1:8000/api/playgrounds/" + res.data[0].playground_id
    );
  },
};

const mutations = {
  setPlaygrounds: (state, playgrounds) => (state.playgrounds = playgrounds),
  newPlayground: (state, playground) => state.playgrounds.push(playground),
  setPlaygroundName: (state, name) => (state.playground_name = name),
  setPlaygroundAvatar: (state, avatar) => (state.playground_avatar = avatar),
  setChannels: (state, channels) => (state.channels = channels),
};

export default {
  state,
  getters,
  actions,
  mutations,
};

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
      "http://127.0.0.1:8000/api/AllChannelsOfPlayground/" +
        Vue.prototype.$channelId
    );
    commit("setPlaygroundName", res.data.title);
    commit("setPlaygroundAvatar", res.data.img);
    commit("setChannels", res.data.channels);
  },

  async saveName({ commit }) {
    axios
      .get(
        "http://127.0.0.1:8000/api/findByChannel/" + Vue.prototype.$channelId
      )
      .then(async (res) => {
        await axios.put(
          "http://127.0.0.1:8000/api/playgrounds/" + res.data[0].playground_id,
          {
            title: this.playground_name,
          }
        );
      });
  },

  async addingChannel({ commit }, title) {
    axios
      .get(
        "http://127.0.0.1:8000/api/findByChannel/" + Vue.prototype.$channelId
      )
      .then(async (res) => {
        await axios
          .post("http://127.0.0.1:8000/api/channels", {
            title: title,
            accessibility: "public",
            playground_id: res.data[0].playground_id,
            created_at: "2000-02-02",
          })
          .then((ress) => {
            commit("addChannel", ress.data);
          });
      });
  },
};

const mutations = {
  setPlaygrounds: (state, playgrounds) => (state.playgrounds = playgrounds),
  newPlayground: (state, playground) => state.playgrounds.push(playground),
  setPlaygroundName: (state, name) => (state.playground_name = name),
  setPlaygroundAvatar: (state, avatar) => (state.playground_avatar = avatar),
  setChannels: (state, channels) => (state.channels = channels),
  addChannel: (state, channel) => state.channels.push(channel),
};

export default {
  state,
  getters,
  actions,
  mutations,
};

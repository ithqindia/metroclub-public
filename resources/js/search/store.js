import Vue from "vue";
import Vuex from "vuex";
import createPersistedState from "vuex-persistedstate";

import _ from "lodash";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    levelOfStudy: null,
    courseTags: null,
    country: null,
    universities: null,
    errors: null,
  },
  getters: {
    levelOfStudy(state) {
      return state.levelOfStudy;
    },

    courseTags(state) {
      return state.courseTags;
    },

    country(state) {
      return state.country;
    },
  },
  mutations: {
    setCountry(state, item) {
      state.country = item;
    },

    setLevelOfStudy(state, item) {
      state.levelOfStudy = item;
    },

    setCourseTag(state, tags) {
      state.courseTags = _.values(tags).join("|");
    },
  },
  actions: {},
  plugins: [createPersistedState()],
});

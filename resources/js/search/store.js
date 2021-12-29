import Vue from "vue";
import Vuex from "vuex";
import createPersistedState from "vuex-persistedstate";
import _ from "lodash";
import Axios from "axios";

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

    universities(state) {
      if (state.universities) {
        return state.universities;
      }
      return null;
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

    setUniversities(state, universities) {
      console.log(
        "ng-aw ~ file: store.js ~ line 51 ~ setUniversities ~ universities",
        universities
      );
      state.universities = universities;
    },

    setErrors(state, err) {
      state.errors = err;
    },
  },
  actions: {
    async fetchUniversities({ commit }) {
      try {
        Axios.get(
          `/web/v1/universities/${this.state.country}/${this.state.levelOfStudy}/${this.state.courseTags}/all`
        ).then((res) => {
          commit("setUniversities", res.data);
        });
      } catch (err) {
        console.log(
          "ng-aw ~ file: store.js ~ line 67 ~ fetchUniversities ~ err",
          err
        );
        commit("setErrors", err);
      }

      // //make some kind of ajax request
      // try {
      //   await doAjaxRequest(payload);
      //   // can commit multiple mutations in an action
      //   commit("setUniversities", payload);
      //   commit("INCREMENT_USER_POSTS_COUNT");
      // } catch (err) {
      //   console.log("ng-aw ~ file: store.js ~ line 62 ~ fetchUniversities ~ err", err);
      //   // commit("INSERT_ERROR", error);
      // }
    },
  },
  plugins: [createPersistedState()],
});

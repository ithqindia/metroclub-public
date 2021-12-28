import { createStore } from "vuex";
import createPersistedState from "vuex-persistedstate";
import Axios from "axios";
import _ from "lodash";

const state = () => ({
  items: [],
  checkoutStatus: null,
  country: null,
  levelOfStudy: null,
  courseTag: null,
  universities: null,
  errors: [],
});

// getters
const getters = {
  cartProducts: (state, getters, rootState) => {
    return state.items.map(({ id, quantity }) => {
      const product = rootState.products.all.find(
        (product) => product.id === id
      );
      return {
        id: product.id,
        title: product.title,
        price: product.price,
        quantity,
      };
    });
  },

  cartTotalPrice: (state, getters) => {
    return getters.cartProducts.reduce((total, product) => {
      return total + product.price * product.quantity;
    }, 0);
  },

  getCountry(state) {
    return state.country;
  },

  getLevelOfStudy(state) {
    return state.levelOfStudy;
  },

  getCourseTag(state) {
    return state.courseTag;
  },

  // getUniversities(state) {
  //   if (!state.universities) {
  //     Axios.get(
  //       `/api/v1/universities/${state.country}/${state.levelOfStudy}/${state.courseTag}/all`
  //     ).then((res) => {
  //       // commit("setUniversities", res.data);
  //       return state.universities;
  //     });
  //   }
  //   return state.universities;
  // },

  getErrors(state) {
    return state.errors;
  },
};

// actions
const actions = {
  async checkout({ commit, state }, products) {
    const savedCartItems = [...state.items];
    commit("setCheckoutStatus", null);
    // empty cart
    commit("setCartItems", { items: [] });
    try {
      commit("setErrors", []);
      await shop.buyProducts(products);
      commit("setCheckoutStatus", "successful");
    } catch (e) {
      console.error(e);
      commit("setCheckoutStatus", "failed");
      // rollback to the cart saved before sending the request
      commit("setCartItems", { items: savedCartItems });
    }
  },

  addProductToCart({ state, commit }, product) {
    commit("setCheckoutStatus", null);
    if (product.inventory > 0) {
      const cartItem = state.items.find((item) => item.id === product.id);
      if (!cartItem) {
        commit("pushProductToCart", { id: product.id });
      } else {
        commit("incrementItemQuantity", cartItem);
      }
      // remove 1 item from stock
      commit(
        "products/decrementProductInventory",
        { id: product.id },
        { root: true }
      );
    }
  },

  async fetchUniversities({ commit, state }) {
    // If all the selections are present then fetch universities
    commit("setErrors", []);
    Axios.get(
      `/api/v1/universities/${state.country}/${state.levelOfStudy}/${state.courseTag}/all`
    ).then((res) => {
      commit("setUniversities", res.data);
    });
    // console.log(
    //   "http://localhost:3000/api/v1/universities/" +
    //     this.$store.state.country +
    //     "/" +
    //     this.$store.state.levelOfStudy +
    //     "/" +
    //     this.$store.state.courseTag +
    //     "/all"
    // );
  },
};

// mutations
const mutations = {
  pushProductToCart(state, { id }) {
    state.items.push({
      id,
      quantity: 1,
    });
  },

  incrementItemQuantity(state, { id }) {
    const cartItem = state.items.find((item) => item.id === id);
    cartItem.quantity++;
  },

  setCartItems(state, { items }) {
    state.items = items;
  },

  setCheckoutStatus(state, status) {
    state.checkoutStatus = status;
  },

  setCountry(state, item) {
    state.country = item;
  },

  setLevelOfStudy(state, item) {
    state.levelOfStudy = item;
  },

  setCourseTag(state, tags) {
    state.courseTag = _.values(tags).join("|");
  },

  setUniversities(state, item) {
    state.universities = item;
  },

  setErrors(state, error) {
    state.errors = [error];
  },
};

export default createStore({
  state,
  getters,
  actions,
  mutations,
  plugins: [createPersistedState()],
});

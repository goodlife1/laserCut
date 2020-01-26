import Vue from 'vue';
import Vuex from 'vuex';
import shopPage from "./modules/shopPage/shopPage";
import cart from "./modules/cart/cart";
import order from "./modules/order/order";

Vue.use(Vuex);
export default new Vuex.Store({
    actions: {},
    modules: {
        shopPage,
        cart,
        order
    }
});

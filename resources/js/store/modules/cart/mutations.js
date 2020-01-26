export default {
    editProducts(state,data){
        state.products = data.cart.items;
        state.totalPrice = data.cart.totalPrice;
        state.totalQty = data.cart.totalQty;

    }
};

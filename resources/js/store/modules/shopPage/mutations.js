export default {
    setCurrentCategoryId(state, payload) {
        state.currentCategoryId = payload;
    },
    setPage(state, payload) {
        state.page = payload;
    },
    setMinAndMaxPrice(state, payload) {
        state.minPrice = payload[0];
        state.maxPrice = payload[1];
    },
    setInitProps(state, payload) {
        state.products = payload.data.product.data;
        state.totalPages = payload.data.product.last_page;
        state.minProductPrice = payload.data.price.minPrice;
        state.maxProductPrice = payload.data.price.maxPrice;
        state.productsCount = payload.data.product.total;
        state.minPrice = state.minProductPrice;
        state.maxPrice = state.maxProductPrice;

    },

    getProductsByFilter(state, payload) {
        let data = payload.data.product;
        state.products = data.data;
        state.totalPages = data.last_page;
        state.productsCount = data.total;


    },

};

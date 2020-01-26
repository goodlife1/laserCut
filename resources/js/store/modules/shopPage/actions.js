export function initialize({commit, state}, data) {
    return new Promise((resolve, reject) => {
        axios({
                url: 'shop/filter?page=' + state.page + '&category_id=' + state.currentCategoryId,
                method: 'get',
            }
        ).then(response => {
            commit('setInitProps', response);
            resolve([state.minProductPrice, state.maxProductPrice]);
        });
    });


}

export function getProducts({commit, state}, data) {
    axios({
            url: 'shop/filter' +
            '?page=' + state.page +
            '&category_id=' + state.currentCategoryId +
            '&minPrice=' + state.minPrice +
            '&maxPrice=' + state.maxPrice+
            '&sortBy='+state.sortBy,
            method: 'get',
        }
    ).then(response => {
        commit('getProductsByFilter', response);
    })
}


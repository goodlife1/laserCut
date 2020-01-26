export function getUserCart({commit, state}) {

    axios({
        url: 'cart/get',
        method: 'get'
    }).then((response) => {
        commit('editProducts', response.data);
    }).catch((e) => {
        console.error(e);
    });
}
export function add({commit}, data) {
    axios({
        method: 'post',
        url: 'cart/add/' + data.id,
        data: {qty: data.qty}
    }).then((response) => {
        commit('editProducts', response.data)
    }).catch((e) => {
        console.error(e);
    });
}
export function edit({commit}, data) {

    axios({
        method: 'put',
        url: 'cart/edit/' + data.id,
        data: {qty: data.qty}
    }).then((response) => {
        commit('editProducts', response.data)
    }).catch((e) => {
        console.error(e);
    });
}

export function unset({commit}, id) {
    axios({
        method: 'delete',
        url: 'cart/unset/' + id
    }).then((response) => {
        commit('editProducts',response.data)
    }).catch((e) => {
        console.error(e);
    })
}


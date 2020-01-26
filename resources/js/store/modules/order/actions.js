export function getDeliveryCities({commit},firstChar = '') {
    axios({
        method: 'POST',
        url: '/delivery/getCities',
        data:{'string':firstChar}
    }).then(response => {
        commit('setDeliveryCities',response.data.cities[0].data);
    })
}

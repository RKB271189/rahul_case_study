function initialstate() {
    return {
        loading: false,
        product: {
            current_page:1,
            last_page_url:'',
            first_page_url:'',
            next_page_url:'',
            total:0,
            per_page:0,
            to:0,
            last_page:0,
            products:[],
        },
        singleproduct: {}
    }
}
const getters = {
    loading: state => state.loading,
    product: state => state.product,
    singleproduct: state => state.singleproduct
}
const actions = {
    resetstate({ commit }) {
        commit('resetstate');
    },
    fetchproduct({ commit }) {
        commit('setloading', true);
        return new Promise((resolve, reject) => {            
            axios.get('/packt/get-product')
                .then((response) => {
                    commit('setproduct', response.data);
                    console.log(response.data);
                    resolve(true);
                }).catch(error => {
                    reject(error.response.data);
                }).finally(() => {
                    commit('setloading', false);
                });
        });
    },
    fetchsingleproduct({ commit }, value) {
        commit('setloading', true);
        return new Promise((resolve, reject) => {
            let id = value;            
            axios.get('/packt/get-single-product/' + id)
                .then((response) => {
                    commit('setsingleproduct', response.data);
                    resolve(true);
                }).catch(error => {
                    reject(error.response.data);
                }).finally(() => {
                    commit('setloading', false);
                });
        });
    },
}
const mutations = {
    resetstate(state) {
        state = Object.assign(state, initialstate());
    },
    setloading(state, status) {
        state.loading = status;
    },
    setproduct(state, value) {
        state.product = value;
    },
    setsingleproduct(state, value) {
        state.singleproduct = value;
    }
}
export default {
    namespaced: true,
    state: initialstate,
    getters,
    actions,
    mutations
}
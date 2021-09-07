import axios from "axios";

axios.defaults.baseURL = 'http://127.0.0.1:8000/api/';

export default {
    actions: {
        async addContact({ commit }) {
            let res = await axios.post('contact');
            commit('updateTable', res.data);
        },
        async addContract({ commit }) {
            let res = await axios.post('contract');
            commit('updateTable', res.data);
        },
        async addCompany({ commit }) {
            let res = await axios.post('company');
            commit('updateTable', res.data);
        },

    },
    mutations: {
        updateTable(state, data) {
            state.table_data.unshift(data[0], data[1]);
            state.deactivate_loader = true;
        },
        deactivateChange(state) {
            state.deactivate_loader = false;
        }

    },
    getters: {
        table_data(state) {
            return state.table_data;
        },
        deactivate_loader(state) {
            return state.deactivate_loader;
        }
    },
    state: {
        table_data: [],
        deactivate_loader: false
    },

}


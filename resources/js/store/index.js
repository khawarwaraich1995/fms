import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex)

axios.defaults.baseURL = 'https://vue.khawarr.com/api'

export default new Vuex.Store({
    state: {
        user: null
    },

    mutations: {
        setUserData(state, userData) {
            state.user = userData
            localStorage.setItem('user', JSON.stringify(userData))
            axios.defaults.headers.common.Authorization = `Bearer ${userData.token}`
        },

        clearUserData(state) {
            localStorage.removeItem('user')
            state.user.token = null
            location.reload()
        }
    },

    actions: {
        login({
            commit
        }, credentials) {
            return new Promise((resolve, reject) => {
                axios
                    .post('/login', credentials)
                    .then(({
                        data
                    }) => {
                        if (data.status == true) {
                            commit('setUserData', data)
                        }
                        resolve(data)
                    }).catch(error => {
                        console.log(error)
                        reject(error)
                    })
            })
        },

        register({
            commit
        }, registerData) {
            return new Promise((resolve, reject) => {
                axios
                    .post('/register', registerData)
                    .then(async resp => {
                        resolve(resp.data)
                    }).catch(error => {
                        reject(error)
                    })
            })
        },

        logout({
            commit
        }) {
            commit('clearUserData')
        }
    },

    getters: {
        isLogged: state => !!state.user,
    },

    plugins: [createPersistedState({
        key: 'vuex',
        reducer(val) {
            if (!val.user.token) {
                return {}
            } else {
                return val
            }
        }
    })]
})

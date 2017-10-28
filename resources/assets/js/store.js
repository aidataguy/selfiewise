import Vuex from 'vuex'

import Vue from 'vue'


Vue.use(Vuex)

export const store = new Vuex.Store({
	state: {
		nots: []

	},
	getters: {
		all_nots(state) {
			return state.nots
		},
		// get notification counts
		all_nots_count(state) {
			return state.nots.length
		}
	},

	mutations: {
		add_not(state, not) {
			state.nots.push(not)
		}
	},
	actions: {

	}
})
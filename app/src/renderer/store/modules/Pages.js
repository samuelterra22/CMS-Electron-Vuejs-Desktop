const state = {
  all: []
}

const mutations = {
  updatePagesList (state, res) {
    state.all = res.data
  }
}

const actions = {
  listPages (context) {
    window.axios.get('http://localhost:8000/api/v1/pages').then(
      (res) => {
        context.commit('updatePagesList', res)
      }
    )
  }
}

export default {
  state,
  mutations,
  actions
}

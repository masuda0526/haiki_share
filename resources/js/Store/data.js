

const state = {
    BASE_URL:'http://localhost:8000/'
}

const getters ={
    getContextPath:state => {
        return state.BASE_URL;
    }
}

const mutations = {

}

const actions = {

}

export default{
    namespaced:true,
    state,
    getters,
    mutations,
    actions,
}

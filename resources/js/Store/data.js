

const state = {
    BASE_URL:'http://localhost:8000/',
    searchText: '',
}

const getters ={
    getContextPath:state => {
        return state.BASE_URL;
    }
}

const mutations = {
    setSearchText(state, text){
        console.log('mutations');
        console.log(text);
        state.searchText = text;
        console.log('state.search_text');
        console.log(state.searchText);
    }

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



const state = {
    BASE_URL:'http://localhost:8000/',
    searchText: '',
    minPrice:null,
    maxPrice:null,
    prefId:0,
    isOnlySale:false,
    isOnlyExDt:false,
}

const getters ={
    getContextPath:state => {
        return state.BASE_URL;
    }
}

const mutations = {
    setSearchText(state, text){
        state.searchText = text;
    },
    setMinPrice(state, num){
        state.minPrice = num
    },
    setMaxPrice(state, num){
        state.maxPrice = num
    },
    setPrefId(state, num){
        state.prefId = num
    },
    setIsOnlySale(state, bool){
        state.isOnlySale = bool
    },
    setIsOnlyExDt(state, bool){
        state.isOnlyExDt = bool;
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

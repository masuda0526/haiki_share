<template>
    <div class="c-search">
        <h4>商品を検索</h4>
        <div class="c-search-box">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" name="searchText" id="searchText" @keyup="changeText" v-model="search_text">
        </div>
    </div>
</template>

<script>
import { mapMutations, mapState } from 'vuex';

export default{
    name:'search-box-component',
    props:['product'],
    data(){
        return{
            search_text:''
        }
    },
    methods:{
        ...mapMutations('data',['setSearchText']),
        changeText(){
            this.setSearchText(this.search_text);
        }

    },
    computed:{
        ...mapState('data',['searchText']),
    },
    watch:{
        searchText(newVal){
            console.log('change')
            console.log(newVal);
            console.log(this.$store.state.data.searchText)
        }
    }
}
</script>

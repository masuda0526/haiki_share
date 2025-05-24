<template>
    <div>
        <div v-if="isMobile" @click="clickIcon">
            <div  class="c-search-icon">
                <i class="fa-solid fa-xmark" v-if="onSearch"></i>
                <i class="fa-solid fa-magnifying-glass" v-else></i>
            </div>
        </div>
        <div class="c-search" :class="{mobile:isMobile}" v-if="(isMobile && onSearch) || !isMobile">
            <div class="c-search-section">
                <h4>商品を検索</h4>
                <div class="c-search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" name="searchText" id="searchText" @keyup="changeText" v-model="search_text">
                </div>
            </div>
            <div class="c-search-section">
                <h4>価格</h4>
                <input type="number" name="" @keyup="changeMinPrice" v-model="min_price">
                 -
                <input type="number" name="" @keyup="changeMaxPrice" v-model="max_price">
            </div>
            <div class="c-search-section" v-if="isPrefBox">
                <h4>都道府県</h4>
                <select name="" @change="changePrefId" v-model="pref_id">
                    <option value="0">未選択</option>
                    <option :value="pref.pref_id" v-for="pref in prefs" :key="pref.pref_id">{{ pref.pref_name }}</option>
                </select>
            </div>
            <div class="c-search-section">
                <div v-if="issalebox">
                    <input type="checkbox" name="" id="" @change="changeIsOnlySale" v-model="isSale">販売中
                </div>
                <div>
                    <input type="checkbox" name="" id="" @change="changeIsOnlyExDt" v-model="isExDt">賞味期限以内
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapMutations, mapState } from 'vuex';

export default{
    name:'search-box-component',
    props:{
        prefs:{
            default:null
        },
        issalebox:{
            default:true
        }
    },
    data(){
        return{
            isPrefBox:false,
            search_text:'',
            min_price:null,
            max_price:null,
            pref_id:0,
            isSale:false,
            isExDt:false,
            isMobile:window.innerWidth <= 576,
            onSearch:false
        }
    },
    methods:{
        ...mapMutations('data',[
            'setSearchText',
            'setMinPrice',
            'setMaxPrice',
            'setPrefId',
            'setIsOnlySale',
            'setIsOnlyExDt'
        ]),
        changeText(){
            this.setSearchText(this.search_text);
        },
        changeMinPrice(){
            this.setMinPrice(this.min_price);
        },
        changeMaxPrice(){
            this.setMaxPrice(this.max_price);
        },
        changePrefId(){
            this.setPrefId(this.pref_id);
        },
        changeIsOnlySale(){
            this.setIsOnlySale(this.isSale);
        },
        changeIsOnlyExDt(){
            this.setIsOnlyExDt(this.isExDt);
        },
        resizeSearchBox(){
            this.isMobile = window.innerWidth <= 576;
        },
        clickIcon(){
            this.onSearch = !this.onSearch;
        }
    },
    computed:{
        ...mapState('data',[
            'searchText',
            'minPrice',
            'maxPrice',
            'prefId',
            'isOnlySale',
            'isOnlyExDt',
        ]),
    },
    mounted(){
        if(this.prefs){
            this.isPrefBox = true;
        }
        window.addEventListener('resize', this.resizeSearchBox);
    },
    beforeUnmount(){
        window.removeEventListener('resize', this.resizeSearchBox);
    }
}
</script>

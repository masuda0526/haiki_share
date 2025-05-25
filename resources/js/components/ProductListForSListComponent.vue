<template>
    <div v-if="products">
        <product-item-land
        v-for="item in productList"
        :product="item"
        :key="item.p_id">
        </product-item-land>
        <div class="o-next__btn-box">
            <button @click="click" class="o-next__btn"><i class="fa-solid fa-rotate-right"></i>さらに表示する</button>
        </div>
    </div>
    <div v-else>
        <p>購入した商品はありません。</p>
    </div>
</template>

<script>
import { mapState } from 'vuex';
import ProductItemLandscapeComponent from './ProductItemLandscapeComponent.vue';

export default{
    props:['products'],
    name:'productSList',
    components:{
        'product-item-land':ProductItemLandscapeComponent
    },
    data(){
        return{
            showList:[],
            page:1,
            initialProductCnt:10,
        }
    },
    methods:{
        click(){
            this.page++;
        },
        isCheck(p){
            return this.checkText(p) && this.checkPrice(p) && this.checkPref(p) && this.checkNowSale(p) && this.checkExDt(p);
        },
        checkText(p){
            let st = this.searchText;
            if(st){
                let regexp = new RegExp(st, 'ig');
                if(regexp.test(p.p_name)){
                    return true;
                }
                return false;
            }
            return true;
        },
        checkPrice(p){
            let min = this.minPrice;
            let max = this.maxPrice;
            if(min && max){
                if(this.checkMin(p) && this.checkMax(p)){
                    return true;
                }
                return false;
            }else if(min){
                return this.checkMin(p);
            }else if(max){
                return this.checkMax(p);
            }
            return true;
        },
        checkMin(p){
            let min = this.minPrice;
            if(min){
                if(p.dis_price >= min){
                    return true;
                }
                return false;
            }
            return true;
        },
        checkMax(p){
            let max = this.maxPrice;
            if(max){
                if(p.dis_price <= max){
                    return true;
                }
                return false;
            }
            return true;
        },
        checkPref(p){
            let pref_id = this.prefId;
            if(pref_id){
                if(p.p_pref_id == pref_id){
                    return true;
                }
                return false;
            }
            return true;
        },
        checkNowSale(p){
            let isSale = this.isOnlySale;
            if(isSale){
                return p.p_status == 0;
            }
            return true;
        },
        checkExDt(p){
            let isExDt = this.isExDt;
            let exdt = new Date(p.ex_dt);
            let now = new Date();
            if(isExDt){
                return now < exdt;
            }
            return true;
        }
    },
    computed:{
        ...mapState(
            'data',[
            'searchText',
            'minPrice',
            'maxPrice',
            'prefId',
            'isOnlySale',
            'isOnlyExDt',
        ]),
        productList(){
            if (!this.products) return [];

            const filtered = this.products.filter(p => this.isCheck(p));
            const limit = this.initialProductCnt * this.page;

            return filtered.slice(0, limit);
        }
    },
}
</script>

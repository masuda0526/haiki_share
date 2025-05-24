<template>
    <div v-if="products">
        <product-item-land
        v-for="product in products"
        :product="product"
        :key="product.p_id">
    </product-item-land>
    </div>
    <div v-else>
        <p>購入した商品はありません。</p>
    </div>
</template>

<script>
import ProductItemLandscapeComponent from './ProductItemLandscapeComponent.vue';

export default{
    props:['products'],
    name:'ProductList',
    components:{
        'product-item-land':ProductItemLandscapeComponent
    },
    data(){
        return{

        }
    },
}
</script>

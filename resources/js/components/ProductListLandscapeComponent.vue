<template>
    <div>
        <product-item-land
        v-for="product in products"
        :product="product"
        :key="product.p_id">
    </product-item-land>
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
}
</script>

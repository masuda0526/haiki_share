<template>
    <div :class="['c-container__card', containerUseClass]">
        <product-card v-for="product in products"
        :product="product"
        :key="product.p_id"
        :foruse="containeruse"
        ></product-card>
    </div>
</template>

<script>
import ProductCardItemComponent from './ProductCardItemComponent.vue';

export default{
    components:{
        'product-card':ProductCardItemComponent
    },
    props:{
        products:{
            type:Array,
            required:true
        },
        containeruse:{
            type:String,
            default:'default',
        }
    },
    computed:{
        containerUseClass(){
            return{
                'default':'c-container__card--list',
                'list':'c-container__card--list',
                'smypage':'c-container__card--smypage',
            }[this.containeruse] || 'c-container__card--list';
        }
    }
}
</script>

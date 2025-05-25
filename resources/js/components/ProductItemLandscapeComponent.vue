<template>
    <div :class="['c-product__land', isBuy, isCancel]">
        <div class="c-product__imgBox">
            <img :src="product.p_img_url" alt="商品画像">
        </div>
        <div class="c-product__content">
            <div class="">
                <h4 class="c-product__name">{{ product.p_name }}</h4>
                <p class="c-product__text">¥{{product.dis_price}} ← ¥{{product.price}}</p>
                <p class="c-product__text">賞味期限：{{ product.ex_dt }}</p>
            </div>
            <div class="c-form__btnBox--right">
                <a :href="product.p_detail_page_url" class="o-btn__rad u-btn__mainColor">詳細を見る</a>
            </div>
        </div>
    </div>
</template>

<script>
export default{
    name:'ProductItemLand',
    props:['product'],
    data(){
        return{

        }
    },
    computed:{
        isBuy(){
            return (this.product.p_status == 1)?'isbuy':'';
        },
        isCancel(){
            return (this.product.p_status == 2)?'iscancel':'';
        }

    }
}
</script>

<template>
    <div class="c-product__land">
        <div class="c-product__imgBox">
            <img :src="getImgUrl" alt="商品画像">
        </div>
        <div class="c-product__content">
            <div class="">
                <h4 class="c-product__name">{{ this.product.p_name }}</h4>
                <p class="c-product__text">¥{{this.product.price}} <- ¥{{this.product.dis_price}}</p>
                <p class="c-product__text">賞味期限：{{ this.product.ex_dt }}</p>
            </div>
            <div class="c-form__btnBox--right">
                <button class="o-btn__rad u-btn__mainColor">詳細を見る</button>
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
        getImgUrl(){
            if(this.product.p_img){
                return this.product.p_img;
            }
            return 'http://localhost:8000/img/noimg.png';
        }
    }
}
</script>

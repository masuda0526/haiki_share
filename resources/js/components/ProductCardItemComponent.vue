<template>
    <div :class="['c-card', forUseClass, isBuy, isCancel]">
        <div class="c-card-img">
            <img :src="product.p_img_url">
        </div>
        <div class="c-card-content">
            <h4 class="c-card-title">{{this.product.p_name}}</h4>
            <p class="c-card-p">賞味期限：{{ this.product.ex_dt }}</p>
            <p class="c-card-p">定価：{{ this.product.price }}円</p>
            <p class="c-card-p">価格：{{ this.product.dis_price }}円</p>
            <div class="o-btnArea-right__pb0">
                <a :href="product.p_detail_page_url" class="o-btn__rad--s u-btn__mainColor">詳細を見る</a>
            </div>
        </div>
    </div>
</template>

<script>
export default{
    props:{
        product:{
            type:Object,
            required:true
        },
        foruse:{
            type:String,
            default:'default'
        }
    },
    computed:{
        forUseClass(){
            return{
                'default':'c-card__col4',
                'list':'c-card__col4',
                'smypage':'c-card__smypage',
            }[this.foruse] ||'c-card__col4';
        },
        isBuy(){
            return (this.product.p_status == 1)?'isbuy':'';
        },
        isCancel(){
            return (this.product.p_status == 2)?'iscancel':'';
        }
    },
}
</script>

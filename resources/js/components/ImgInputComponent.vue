<template>
    <div :class="pageClass">
        <input type="file" name="file" id="inputFile" accept="image/*" @change="changeInputImg">
        <img :src="imgurl" alt="" v-if="isFile || imgurl">
        <div :class="pageClass + '__dummy'" v-else="!isFile || !imgurl">
            <p>ファイルをドラッグ＆ドロップ<br>または<br>クリック</p>
        </div>
    </div>
</template>

<script>
    export default{
        props:{
            pagename:{
                type: String,
                default:'default'
            },
            dburl:{
                type: String,
            }
        },
        data(){
            return{
                imgurl:null,
                isFile: false,
                isDrag: false,
            }

        },
        methods:{
            changeInputImg(e){
                let file = e.target.files[0];
                if(file){
                    this.isFile = true;
                    this.preview(file);
                }else{
                    this.isFile = false;
                };
            },
            preview(file){
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.imgurl = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        },
        computed:{
            pageClass(){
                return{
                    'default':'c-inputImg--default',
                    'ssignup':'c-inputImg--ssignup',
                }[this.pagename] || 'c-inputImg--default'
            }
        },
        mounted(){
            if(this.dburl){
                this.imgurl = this.dburl;
                console.log(this.dburl);
                console.log(this.imgurl);
            }
        }

    }
</script>

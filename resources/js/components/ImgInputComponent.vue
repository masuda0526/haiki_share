<template>
    <div :class="pageClass">
        <input type="file" name="file" id="inputFile" accept="image/*" @change="changeInputImg">
        <img :src="imgurl" alt="" v-if="isFile">
        <div :class="pageClass + '__dummy'" v-else="isFile">
            <p>ファイルをドラッグ＆ドロップ　または　クリック</p>
        </div>
    </div>
</template>

<script>
import { drop } from 'lodash';

    export default{
        props:{
            pagename:{
                type: String,
                default:'default'
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
        }

    }
</script>

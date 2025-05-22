<template>
    <div class="c-hum" v-if="isMobile">
        <div class="c-hum__inner" @click="click">
            <div class="line line_top"></div>
            <div class="line line_middle"></div>
            <div class="line line_bottom"></div>
        </div>
    </div>

</template>

<script>
import axios from 'axios';

export default{
    data(){
        return{
            url:'/api/header',
            nav:[],
        }
    },
    computed:{
        isMobile(){
            return window.innerWidth <= 576;
        }
    },
    methods:{
        click(){
            console.log('click');
            console.log(window.innerWidth);
            console.log(this.isMobile);
        },
        showMenu(){

        }
    },
    async created(){
        let res = await axios.get(this.url);
        this.nav = res.data;
        console.log(this.nav);
    }

}
</script>

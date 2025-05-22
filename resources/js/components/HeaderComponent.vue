<template>
    <header class="l-header">
    <h1 class="l-header__logo">haiki<br>share</h1>
    <nav :class="{'l-header__nav': true, onHum: isShow}">
        <ul>
            <li v-for="item, index in nav" :key="index"><a :href="item.url">{{ item.name }}</a></li>
        </ul>
    </nav>
    <div class="c-hum__pos">
        <div class="c-hum" v-if="isMobile" @click="click">
                <div :class="{line: true, line_top:true, onHum:isShow}"></div>
                <div :class="{line: true, line_middle:true, onHum:isShow}"></div>
                <div :class="{line: true, line_bottom:true, onHum:isShow}"></div>
        </div>
    </div>
</header>
</template>

<script>
import axios from 'axios';

export default{
    data(){
        return{
            url:'/api/header',
            nav:[],
            isShow:false,
            isMobile:window.innerWidth <= 576,
        }
    },
    mounted(){
        window.addEventListener('resize', this.resize);
    },
    beforeUnmount(){
        window.removeEventListener('resize', this.resize)
    },
    methods:{
        click(){
            console.log('click');
            console.log(window.innerWidth);
            console.log(this.isMobile);
            this.isShow = !this.isShow;
        },
        showMenu(){

        },
        resize(){
            this.isMobile = window.innerWidth <= 576;
        }
    },
    async created(){
        let res = await axios.get(this.url);
        this.nav = res.data;
        console.log(this.nav);
    }

}
</script>

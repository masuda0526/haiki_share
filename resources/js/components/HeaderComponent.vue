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
                <div :class="{line: true, line_top:true, onHum:isShow, isscroll:isScroll}"></div>
                <div :class="{line: true, line_middle:true, onHum:isShow, isscroll:isScroll}"></div>
                <div :class="{line: true, line_bottom:true, onHum:isShow, isscroll:isScroll}"></div>
        </div>
    </div>
</header>
</template>

<script>
import axios from 'axios';

export default{
    data(){
        return{
            nav:[],
            isShow:false,
            isMobile:window.innerWidth <= 576,
            isScroll:false,
        }
    },
    mounted(){
        window.addEventListener('resize', this.resize);
        window.addEventListener('scroll', this.scroll);
    },
    beforeUnmount(){
        window.removeEventListener('resize', this.resize)
        window.removeEventListener('scroll', this.scroll);
    },
    methods:{
        click(){
            this.isShow = !this.isShow;
        },
        scroll(){
            let border = 55;
            this.isScroll = window.scrollY > border;
        },
        resize(){
            this.isMobile = window.innerWidth <= 576;
        }
    },
    async created(){
        let res = await axios.get(window.Laravel.headerUrl);
        this.nav = res.data;
    }

}
</script>

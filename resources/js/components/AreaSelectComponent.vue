<template>
    <div class="c-form__formBox">
            <div class="c-form__formBox--half">
                <label for="region">地域
                    <select class="" name="region" id="" v-if="regions" v-model="region_id" @change="getAreas">
                        <option value="0">選択してください</option>
                        <option v-for="region in regions" :value='region.id' >{{ region.r_name }}</option>
                    </select>
                </label>
            </div>
            <div class="c-form__formBox--half">
                <label for="pref">都道府県
                    <select class="" name="pref" id="" v-if="prefs" v-model="user_pref">
                        <option value="00">選択してください</option>
                        <option v-for="pref in prefs" :value="String(pref.pref_id)">{{ pref.pref_name }}</option>
                    </select>
                    <select class="" name="pref" id="" v-else>
                    </select>
                </label>
            </div>
        </div>
</template>
<script>
import axios from 'axios';


export default{
    props:['regions', 'apiurl', 'u_pref', 'r_id'],
    data(){
        return{
            region_id:0,
            user_pref:"",
            prefs:[]
        }
    },
    methods:{
        getAreas(){
            axios.get(this.apiurl,{
                params:{
                    region_id:this.region_id
                }
            }
            ).then(res=>{
                this.prefs = res.data;
            }).catch(err => {
            })
        },

    },
    mounted(){
        if(!this.r_id){
            this.region_id = 0;
        }else{
            this.region_id = this.r_id;
            this.getAreas();
        }
        if(this.u_pref){
            this.user_pref = String(this.u_pref);
        }else{
            this.user_pref = '';
        }

    }
}
</script>

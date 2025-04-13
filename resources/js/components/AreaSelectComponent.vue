<template>
    <div class="c-form__formBox">
            <div class="c-form__formBox--half">
                <label for="region">地域
                    <select class="" name="region" id="" v-if="this.regions" v-model="r_id" @change="this.getAreas">
                        <option value="0">選択してください</option>
                        <option v-for="region in this.regions" :value='region.id' >{{ region.r_name }}</option>
                    </select>
                    <select class="" name="region" id="" v-else>
                    </select>
                </label>
            </div>
            <div class="c-form__formBox--half">
                <label for="pref">都道府県
                    <select class="" name="pref" id="" v-if="this.prefs">
                        <option v-for="pref in this.prefs" :value="pref.pref_id">{{ pref.pref_name }}</option>
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
    props:['regions', 'apiurl'],
    data(){
        return{
            r_id:0,
            prefs:{}
        }
    },
    methods:{
        getAreas(){
            axios.get(this.apiurl,{
                params:{
                    region_id:this.r_id
                }
            }
            ).then(res=>{
                this.prefs = res.data;
            }).catch(err => {
                console.log(err);
            })
        },
        showRegion:function(){
            console.log(this.r_id);
        }
    }
}
</script>

<template>
    <div class="c-form__formBox">
        <div class="c-form__formBox--half">
            <label for="group">分類
                <select name="group" @change="changeGroup">
                    <option value="0">選択してください</option>
                    <option
                    v-for="group in groups"
                    :value='group.g_id'
                    :key="group.g_id">
                        {{ group.g_name }}
                </option>
                </select>
            </label>
        </div>
        <div class="c-form__formBox--half">
            <label for="category">カテゴリ
                <select name="category" v-if="categories.length == 0">
                    <option value="0" selected>分類を選択してください</option>
                </select>
                <select name="category" v-else>
                    <option
                    v-for="category in categories"
                    :value="category.c_id"
                    :key="category.c_id">{{ category.c_name }}</option>
                </select>
            </label>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default{
    props:{
        dbGroupNum:{
            type:Number,
            default:0
        },
        dbCategoryNum:{
            type:Number,
            default:0
        },
        groups:{
            type:Array,
        },
        apiurl:{
            type:String,
            required:true
        }
    },
    data(){
        return{
            categoryNum:0,
            groupNum:0,
            categories:[]
        }
    },
    methods:{
        changeGroup(e){
            this.groupNum = e.target.value;
            if(this.groupNum != 0){
                this.getCategories(this.groupNum);
            }
        },
        getCategories(_group_id){
            axios.get(this.apiurl, {
                params:{
                    group_id:_group_id
                }
            }).then(res => {
                this.categories = res.data;
            })
        }
    },
}
</script>

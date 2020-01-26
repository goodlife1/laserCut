<template>
    <div class="widget  mb-50">
        <!-- Widget Title -->
        <h6 class="widget-title mb-30">{{$t('main_page.categories')}}</h6>

        <!--  Catagories  -->
        <div class="catagories-menu">

            <ul class="menu-content collapse show" v-for="category in categories ">
                <!-- Single Item -->
                <li data-toggle="collapse" data-target="#clothing">
                    <a href="#" v-on:click="categoryChanged(category)">{{category.name}}</a>
                </li>
                <!-- Single Item -->
            </ul>

        </div>
    </div>
</template>
<script>
    import {eventEmiter} from "../app";
    export default {
        props:['categories'],
        mounted(){
            $('#categoryName').html(this.categories[0].name)
        },
        methods:{
            categoryChanged(category){
                this.currentCategoryId = category.id;
                this.$store.commit('shopPage/setCurrentCategoryId',this.currentCategoryId);
                this.$store.dispatch('shopPage/initialize').then(()=>{

                    eventEmiter.$emit('max_min_price',[
                        this.$store.state.shopPage.minProductPrice,
                        this.$store.state.shopPage.maxProductPrice
                    ]);
                    $('#categoryName').html(category.name)
                });
            }
        },
        data(){
            return{
                currentCategoryId:this.categories[0].id
            }
        },
        created(){
          this.$store.commit('shopPage/setCurrentCategoryId',this.currentCategoryId);
        }
    }
</script>

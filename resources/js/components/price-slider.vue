<template>
    <div class="widget price mb-50">
        <!-- Widget Title -->
        <h6 class="widget-title mb-30">{{$t('main_page.filter by')}}</h6>
        <!-- Widget Title 2 -->
        <p class="widget-title2 mb-30">{{$t('main_page.price')}}</p>

        <div class="widget-desc">
            <div class="slider-range">
                <vue-slider ref="slider" @drag-end="filter" :min="minimum" :max="maximum" v-model="value"></vue-slider>
                <div class="range-price">{{$t('main_page.range')}}: {{value[0]}} - {{value[1]}}</div>
            </div>

        </div>
    </div>

</template>a

<script>
    import VueSlider from 'vue-slider-component'
    import 'vue-slider-component/theme/default.css'
    import {eventEmiter} from "../app";

    export default {

        components: {
            VueSlider
        },
        mounted() {
            eventEmiter.$on('max_min_price',(data)=>{
                this.value = data;
            })

        },
        methods: {
            filter: function () {
                this.$store.commit('shopPage/setMinAndMaxPrice', this.value);
                this.$store.dispatch('shopPage/getProducts');
            }
        },

        data() {
            return {
                value: [

        ]
        }
        },
        computed: {
            maximum() {
                return this.$store.state.shopPage.maxProductPrice;
            },
            minimum() {
                return this.$store.state.shopPage.minProductPrice;
            }
        },

        watch: {}
    }
</script>

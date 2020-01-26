<template>
    <div class="col-12 col-md-8 col-lg-9">
        <div class="shop_grid_product_area">
            <div class="row">
                <div class="col-12">
                    <div class="product-topbar d-flex align-items-center justify-content-between">
                        <!-- Total Products -->
                        <div class="product-sorting d-flex">
                            <p>{{$t('main_page.filter by')}}: </p>

                            <select ref="sortBy" name="select" id="sortByselect">
                                <!--<option value="value">Highest Rated</option>-->
                                <option value="created_at asc">{{$t('main_page.newest')}}</option>
                                <option value="price desc">{{$t('main_page.price down')}}</option>
                                <option value="price asc">{{$t('main_page.price up')}}</option>
                            </select>

                        </div>
                        <div class="total-products">
                            <p><span>{{productsCount}}</span> {{$t('main_page.products found')}}</p>
                        </div>
                        <!-- Sorting -->

                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 col-sm-4 col-lg-4" v-for="item in products">
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img class="image-1" :src="item.images[0].src" alt="">
                            <!-- Hover Thumb -->
                            <img class="image-2 hover-img" :src="item.images[1].src" alt="">

                            <!-- Product Badge -->
                            <div class="product-badge offer-badge">
                            </div>
                            <!-- Favourite -->
                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>

                        <!-- Product Description -->
                        <div class="product-description">
                            <span>{{item.name}}</span>
                            <a href="single-product-details.html">
                                <h6></h6>
                            </a>
                            <p class="product-price"><span class="old-price">15</span>
                                ${{item.price}}
                            </p>

                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                    <a href="#" class="btn essence-btn" v-on:click="addToCart(item)">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- Pagination -->
        <pagination></pagination>


    </div>

</template>
<style>
</style>
<script>

    import {eventEmiter} from "../app";

    export default {

        mounted() {
            eventEmiter.$emit('max_min_price', [
                this.$store.state.shopPage.minProductPrice,
                this.$store.state.shopPage.maxProductPrice
            ]);
            this.$refs.sortBy.change = function () {
                eventEmiter.$emit('sortValueChanged');
            };

        },
        computed: {
            products() {
                return this.$store.state.shopPage.products;

            },
            productsCount() {
                return this.$store.state.shopPage.productsCount;
            },
            sortBy() {
                return this.$refs.sortBy.value;
            }

        },
        methods: {
            addToCart(product) {
           this.$store.dispatch('cart/add',product).then(()=>{
               $('#essenceCartBtn').trigger('click');
           });
            }
        },


        created() {
            this.$store.dispatch('shopPage/initialize').then((data) => {
                eventEmiter.$emit('max_min_price', data);

            });
            eventEmiter.$on('sortValueChanged', () => {
                this.$store.state.shopPage.sortBy = this.$refs.sortBy.value;
                this.$store.dispatch('shopPage/getProducts');
            });


        },

        data: () => {
            return {
                pageInform: Object,
                currentCategoryId: 1,
                sortType: ['newest', 'priceFromMin', 'priceMax']
            }
        }
    }
</script>

<template>
    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="img/core-img/bag.svg" alt=""> <span>3</span></a>
        </div>

        <div   class="cart-content">

            <!-- Cart List Area -->
            <div  class="cart-list">
                <cartProduct v-if="products"  v-for="(item, key) in products" :product="item"  v-bind:key="key" ></cartProduct>
            </div>

            <!-- Cart Summary -->
            <div class="cart-amount-summary d-flex align-items-center">
                <div class="w-100 amount-summary">
                <h2>Summary</h2>
                <ul class="summary-table">
                    <li><span>discount:</span> <span>{{totalQty}}</span></li>
                    <li><span>total:</span> <span>{{totalPrice}}</span></li>
                </ul>
                <div class="checkout-btn mt-30 align-center" >
                    <a href="checkout.html" class="btn essence-btn">check out</a>
                </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        mounted() {
            this.$store.dispatch('cart/getUserCart');
        },
        data() {
            return {

            }
        },
        methods: {},
        computed: {
            products(){
                return this.$store.state.cart.products;
            },
            totalPrice(){
                return this.$store.state.cart.totalPrice;
            },
            totalQty(){
                return this.$store.state.cart.totalQty;
            }
        },
        created(){

        },

    }
</script>

<template>
    <div class="single-cart-item">

        <a href="#" class="product-image">
            <img src="storage/product/image1.jpg" class="cart-thumb" alt="">
            <!-- Cart Item Desc -->
        </a>
        <div class="cart-item-desc d-flex w-100">

            <div class="desc">
                <a><h6>{{productInf.name}}</h6></a>
                <div class="counter">
                    <table>
                        <tr>
                            <th>{{$t('common.qty')}}</th>
                            <th>{{$t('common.price')}}</th>
                            <th>{{$t('common.sum')}}</th>
                        </tr>
                        <tr>
                            <td class="d-flex">
                                <span class="d-block decr" v-on:click="subtractOne()">
                                    <i class="fas fa-minus h-100"></i>
                                </span>
                                <input v-on:edite="editCount()" :value="product.qty"/>
                                <span v-on:click="addOne()" class="d-block inc">
                                    <i class="fas fa-plus  h-100"></i>
                                </span>
                            </td>
                            <td>
                                <div class="price">{{productInf.price}}</div>
                            </td>
                            <td>
                                <div>{{product.price}}</div>
                            </td>
                        </tr>
                    </table>

                </div>

            </div>
            <div class=" justify-content-end w-0">
                    <span class="product-remove" v-on:click="unsetItem()">
                        <i class="fa fa-close" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        props: ['product'],
        mounted() {

        },
        data() {
            return {
                value: 1,
                qty: this.product.qty

            }
        },
        methods: {
            unsetItem() {
                console.log(this.productInf.id);
                this.$store.dispatch('cart/unset', this.productInf.id);
            },
            subtractOne() {
                this.qty--;
                this.editCart();
            },
            editCount() {
                this.editCart();
            },
            addOne() {
                this.qty++;
                this.editCart();
            },
            editCart() {
                let data = {id: this.product.item.id, qty: this.qty};
                this.$store.dispatch('cart/edit', data);
            }
        },

        computed: {
            productInf() {
                return this.product.item;
            }
        }

    }
</script>


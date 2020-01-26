<template>
    <div class="col-12 col-md-6 deliveryAddress">
        <div class="checkout_details_area mt-50 clearfix">

            <div class="cart-page-heading mb-30">
                <h5>Billing Address</h5>
            </div>

            <form action="#" method="post">
                <div class="row">

                    <div class="col-12 mb-3">
                        <label for="street_address">Address <span>*</span></label>
                        <input type="text" class="form-control mb-3" value="name">

                    </div>
                    <div class="col-12 mb-3">
                        <label for="street_address">City <span>*</span></label>
                        <input list="brow" v-model="cityName" class="form-control mb-3">
                        <datalist id="brow">
                            <option  v-for="city in deliveryCities">{{city.Description }}</option>

                        </datalist>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="country">Country <span>*</span></label>
                        <select class="w-100" id="country">
                            <option value="usa">United States</option>
                            <option value="uk">United Kingdom</option>
                            <option value="ger">Germany</option>
                            <option value="fra">France</option>
                            <option value="ind">India</option>
                            <option value="aus">Australia</option>
                            <option value="bra">Brazil</option>
                            <option value="cana">Canada</option>
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="street_address">Address <span>*</span></label>
                        <input type="text" class="form-control mb-3" id="street_address" value="">
                        <input type="text" class="form-control" id="street_address2" value="">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="postcode">Postcode <span>*</span></label>
                        <input type="text" class="form-control" id="postcode" value="">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="city">Town/City <span>*</span></label>
                        <input type="text" class="form-control" id="city" value="">
                    </div>

                    <div class="col-12">
                        <div class="custom-control custom-checkbox d-block mb-2">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Terms and conitions</label>
                        </div>
                        <div class="custom-control custom-checkbox d-block mb-2">
                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                            <label class="custom-control-label" for="customCheck2">Create an accout</label>
                        </div>
                        <div class="custom-control custom-checkbox d-block">
                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                            <label class="custom-control-label" for="customCheck3">Subscribe to our newsletter</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        props: {},
        mounted() {
                this.$store.dispatch('order/getDeliveryCities')

        },
        data() {
            return {
                cityName: '',
                foolName: String,
                phoneNumber: String,
                email: String,
                deliveryWarehousesRef: String,
                comment: String

            }
        },
        computed: {
            deliveryCities() {
                return this.$store.state.order.deliveryCities;
            },
            deliveryWarehouses() {
                return this.$store.state.order.deliveryWarehouses;
            }
        },
        watch: {
            cityName(value) {
                // if (value.length == 1) {
                //     this.$store.dispatch('order/getDeliveryCities',value)
                // } else if (value.length == 0) {
                //     this.deliveryWarehouses = [];
                // }
            }
        }
    };
</script>

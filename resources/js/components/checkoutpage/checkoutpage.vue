<template>
    <div>

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <billing-address></billing-address>

                <order-details></order-details>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
    </div>
</template>

<script>

    import BillingAddress from "./deliveryAddress/billingAddress";
    export default{
        components: {BillingAddress}
    }

</script>

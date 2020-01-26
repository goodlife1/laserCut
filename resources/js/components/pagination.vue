<template>
    <nav aria-label="navigation">
        <paginate
            :page-count="totalPages"
            :container-class="'pagination mt-50 mb-70'"
            :click-handler="pageChanged"
            :prev-text="'<'"
            :next-text="'>'"
            :page-class="'page-item'"
            :page-link-class="'page-link'"
            :next-class="'page-item'"
            :next-link-class="'page-link'"
            :prev-class="'page-item'"
            :prev-link-class="'page-link'"
        >

        </paginate>

    </nav>

</template>
<script>
    import {eventEmiter} from "../app";

    export default {

        mounted() {
            this.showPaginationPages();
        },

        methods:
            {
                pageChanged(page) {

                    this.$store.commit('shopPage/setPage',page);
                    this.$store.dispatch('shopPage/getProducts');
                    $('#scrollUp').trigger('click')

                },
                showPaginationPages() {

                }
                ,

                previous() {
                }
                ,
                next() {
                }
                ,
                changePage() {
                    eventEmiter.$emit('name', this.current_page);
                }
            }
        ,
        computed:{
            totalPages(){
                return this.$store.state.shopPage.totalPages;
            }
        },
        created() {
            eventEmiter.$on('productsLoaded', (data) => {
                this.pages = data.total_pages;
            })
        },
        data: () => {
            return {
                items: null,


            }
        }
    }
</script>

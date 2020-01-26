@extends('layouts.app')
@section('content')
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2 id="categoryName"></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    {{--todo make left sidebar component and respons for mobile--}}
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3 left-sidebar left-sidebar-off">
                    <div class="shop_sidebar_area">
                        <!-- ##### Category ##### -->
                        <shop-category-list :categories='{{$categories}}'></shop-category-list>

                        <!-- ##### Single Widget ##### -->

                        <price-slider></price-slider>


                    </div>
                </div>

                <products></products>
            </div>
        </div>

    </section>
    <!-- ##### Shop Grid Area End ##### -->


@endsection
<script>

</script>


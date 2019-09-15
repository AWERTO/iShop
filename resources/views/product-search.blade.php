@extends('layouts.layout')
@section('content')

    <!-- Title Page -->
    <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url({{'images/heading-pages-02.jpg'}});">
        <h2 class="l-text2 t-center">
            Women
        </h2>
        <p class="m-text13 t-center">
            New Arrivals Women Collection 2018
        </p>
    </section>


    <!-- Content page -->
    <section class="bgwhite p-t-55 p-b-65">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                    <div class="leftbar p-r-20 p-r-0-sm">
                        <!--  -->
                        <h4 class="m-text14 p-b-7">
                            Categories
                        </h4>

                        <ul class="p-b-54">
                            <li class="p-t-4">
                                <a href="/product" class="s-text13 active1">
                                    All
                                </a>
                            </li>

                            @foreach ($products as $product )

                                <li class="p-t-4">
                                    <a href="/product-categories?categories={{$product->categories}}" class="s-text13">
                                        {{$product->categories}}
                                    </a>
                                </li>
                            @endforeach

                        </ul>

                        <!--Filters  -->

                        <div class="search-product pos-relative bo4 of-hidden">
                            {!! Form::open (['url' => '/product']) !!}
                            {!! Form::input('text', 'search-product', null, ['placeholder' => 'Search Products...', 'class' => 's-text7 size6 p-l-23 p-r-50']) !!}
                            <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                                <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                            </button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                    <!--  -->
                    <div class="flex-sb-m flex-w p-b-35">
                        <div class="flex-w">
                            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                {!! Form::open(['url' => '/product-sort']) !!}
                                {!! Form::select('sorting' , ['Default' => 'Default',
                                                              'low_to_high' => 'Low_to_high',
                                                              'high to low' => 'High to low'], 'Default' , ['class' => 'selection-2']) !!}
                                {!! Form::button('Sort',  ['type' => 'submit']) !!}

                                {!! Form::close() !!}
                            </div>

                            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                <select class="selection-2" name="sorting">
                                    <option>Price</option>
                                    <option>$0.00 - $50.00</option>
                                    <option>$50.00 - $100.00</option>
                                    <option>$100.00 - $150.00</option>
                                    <option>$150.00 - $200.00</option>
                                    <option>$200.00+</option>

                                </select>
                            </div>
                        </div>

                        <span class="s-text8 p-t-5 p-b-5">
							Showing {{count($products)}} of 16 results
						</span>
                    </div>

                    <!-- Product -->
                    <div class="row">
                        @foreach ($products as $product)
                            @if( $_POST['search-product'] == $product->name || $_POST['search-product'] == $product->categories || $_POST['search-product'] == $product->type || $_POST['search-product'] == $product->model || $_POST['search-product'] == $product->color)
                            <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                                <!-- Block2 -->
                                <div class="block2">
                                    @if ($product->status == 'sale')
                                    <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale ">
                                    @elseif ($product->status == 'new' )
                                    <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                    @else
                                    <div class="block2-img wrap-pic-w of-hidden pos-relative block2-label">
                                    @endif
                                        <img src="{{'images/item-02.jpg'}}" alt="IMG-PRODUCT">
                                            <div class="block2-overlay trans-0-4">
                                                <a href="/wishlist?product_id={{$product->products_id}}" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                   <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                                    <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                                </a>

                                            <div class="block2-btn-addcart w-size1 trans-0-4">
                                            <!-- Button -->
                                            <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                Add to Cart
                                            </button>
                                            </div>
                                            </div>
                                            </div>
                                                <div class="block2-txt p-t-20">
                                                    <a href="product-detail.blade.php" class="block2-name dis-block s-text3 p-b-5">
                                                        {{$product->name}}
                                                    </a>

                                                    @if($product->status == 'sale')
                                                    <span class="block2-oldprice m-text7 p-r-5">
									                    {{$product->old_price}}$
								                    </span>

                                                    <span class="block2-newprice m-text8 p-r-5">
									{{$product->price}}$
								</span>
                                                            @else
                                                                <span class="block2-price m-text6 p-r-5">
									{{$product->price}}$
								</span>
                                                            @endif
                                                        </div>
                                                </div>
                                        </div>
                                    @endif
                                        @endforeach
                                </div>

                                <!-- Pagination -->
                                <div class="pagination flex-m flex-w p-t-26">
                                    <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
                                    <a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
                                </div>
                            </div>
                    </div>
                </div>
    </section>

    <!-- Back to top -->
    <div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
    </div>

    <!-- Container Selection -->
    <div id="dropDownSelect1"></div>
    <div id="dropDownSelect2"></div>

@stop

<!--===============================================================================================-->
<script type="text/javascript" src="{{'vendor/jquery/jquery-3.2.1.min.js'}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{'vendor/animsition/js/animsition.min.js'}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{'vendor/bootstrap/js/popper.js'}}"></script>
<script type="text/javascript" src="{{'vendor/bootstrap/js/bootstrap.min.js'}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{'vendor/select2/select2.min.js'}}"></script>
<script type="text/javascript">
    $(".selection-1").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });

    $(".selection-2").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect2')
    });
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{'vendor/daterangepicker/moment.min.js'}}"></script>
<script type="text/javascript" src="{{'vendor/daterangepicker/daterangepicker.js'}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{'vendor/slick/slick.min.js'}}"></script>
<script type="text/javascript" src="{{'js/slick-custom.js'}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{'vendor/sweetalert/sweetalert.min.js'}}"></script>
<script type="text/javascript">
    $('.block2-btn-addcart').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to cart !", "success");
        });
    });

    $('.block2-btn-addwishlist').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to wishlist !", "success");
        });
    });
</script>

<!--===============================================================================================-->
<script type="text/javascript" src="{{'vendor/noui/nouislider.min.js'}}"></script>

<script type="text/javascript">
    /*[ No ui ]
    ===========================================================*/
    var filterBar = document.getElementById('filter-bar');

    noUiSlider.create(filterBar, {
        start: [ 50, 200 ],
        connect: true,
        range: {
            'min': 50,
            'max': 200
        }
    });

    var skipValues = [
        document.getElementById('value-lower'),
        document.getElementById('value-upper')
    ];

    filterBar.noUiSlider.on('update', function( values, handle ) {
        skipValues[handle].innerHTML = Math.round(values[handle]) ;
    });
</script>
<!--===============================================================================================-->
<script src="{{'js/main.js'}}"></script>


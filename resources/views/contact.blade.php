@extends('layouts.layout')
@section('content')

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{'images/heading-pages-06.jpg'}});">
		<h2 class="l-text2 t-center">
			Contact
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<div class="p-r-20 p-r-0-lg">
						<div class="contact-map size21" id="google_map" data-map-x="40.614439" data-map-y="-73.926781" data-pin="images/icons/icon-position-map.png" data-scrollwhell="0" data-draggable="1"></div>
					</div>
				</div>

				<div class="col-md-6 p-b-30">
					<h4 class="m-text26 p-b-36 p-t-15">
					Send us your message
					</h4>
					{!! Form::open(['url' => '/contact']) !!}
					<div class="bo4 of-hidden size15 m-b-20">
						{!! Form::input('text','name', null, ['placeholder' => 'Full Name', 'class' => 'sizefull s-text7 p-l-22 p-r-22']) !!}
					</div>
					<div class="bo4 of-hidden size15 m-b-20">
						{!! Form::input('text','phone-number', null, ['placeholder' => 'Phone Number', 'class' => 'sizefull s-text7 p-l-22 p-r-22']) !!}
					</div>
					<div class="bo4 of-hidden size15 m-b-20">
						{!! Form::input('text','email', null, ['placeholder' => 'Email Address', 'class' => 'sizefull s-text7 p-l-22 p-r-22']) !!}
					</div>
						{!! Form::textarea('message',null, ['class' => 'dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20','placeholder' => 'Message']) !!}
					<div class="w-size25">
					<!-- Button -->
						{!! Form::button('Send', [ 'type' => 'submit', 'class' => 'flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4']) !!}
					</div>

					{!! Form::close() !!}
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
<script type="text/javascript">
    $('.block2-btn-addcart').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4').blade.php();
        $(this).on('click', function(){
            swal(nameProduct, "Your review was send !", "success");
        });
    });

    $('.block2-btn-addwishlist').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4').blade.php();
        $(this).on('click', function(){
            swal(nameProduct, "Your review was send !", "success");
        });
    });
</script>

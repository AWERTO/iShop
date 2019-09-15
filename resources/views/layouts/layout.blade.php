<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}" />
    @include('layouts.styles')
</head>
<body class="animsition">
<!-- Header -->
@include('layouts/header')
@yield('content')
<!-- Footer -->
@include('layouts/footer')

<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
</div>

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>

<!-- Scripts -->
<!--===============================================================================================-->
@include('layouts/scripts')

</body>
</html>

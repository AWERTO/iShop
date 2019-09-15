@extends('layouts.layout')
@section('content')
	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{'images/heading-pages-05.jpg'}});">
		<h2 class="l-text2 t-center">
			Blog
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-60">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-75">
					<div class="p-r-50 p-r-0-lg">
						@foreach($posts as $post)

						<!-- item blog -->
						<div class="item-blog p-b-80">
							<a href="/blog-detail?id={{$post->post_id}}" class="item-blog-img pos-relative dis-block hov-img-zoom">
								<img src="images/{{$post->photo}}" alt="IMG-BLOG">

								<span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
									{{$post->updated_at}}
								</span>
							</a>

							<div class="item-blog-txt p-t-33">
								<h4 class="p-b-11">
									<a href="blog-detail?id={{$post->post_id}}" class="m-text24">
										{{$post->title}}
									</a>
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										By {{$post->author}}
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										{{$post->type_categories}}
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										{{$post->count_comments}} Comments
									</span>
								</div>

								<p class="p-b-12">
									{{$post->body}}
								</p>

								<a href="/blog-detail?id={{$post->post_id}}" class="s-text20">
									Continue Reading
									<i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
								</a>
							</div>
						</div>
						@endforeach

					</div>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-r-50">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-75">
					<div class="rightbar">
						<!-- Search -->
						<div class="pos-relative bo11 of-hidden">
							<input class="s-text7 size16 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search">

							<button class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4">
								<i class="fs-13 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>

						<!-- Categories -->
						<h4 class="m-text23 p-t-56 p-b-34">
							Categories
						</h4>

						<ul>
							<!-- Making unique array of categories -->

							@foreach($categories as $category)
							<li class="p-t-6 p-b-8 bo6">
								<a href="/blog?categories={{$category->category_name}}" class="s-text13 p-t-5 p-b-5">
									{{$category->category_name}}
								</a>
							</li>
							@endforeach
						</ul>

						<!-- Featured Products -->
						<h4 class="m-text23 p-t-65 p-b-34">
							Featured Products
						</h4>

						<ul class="bgwhite">
							@foreach ($products as $product)
							<li class="flex-w p-b-20">
								<a href="product-detail?categories={{$product->categories}}" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
									<img src="images/{{$product->photo}}" alt="IMG-PRODUCT">
								</a>

								<div class="w-size23 p-t-5">
									<a href="/product-detail" class="s-text20">
										{{$product->name}}
									</a>

									<span class="dis-block s-text17 p-t-6">
										{{$product->price}}$
									</span>
								</div>
							</li>
							@endforeach
						</ul>

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



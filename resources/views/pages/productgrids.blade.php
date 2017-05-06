@extends('layouts.default')
@section('content')
<section>
	<div class="second-page-container">
		<div class="container">
			<div class="row">

				<div class="col-md-9">
					<div class="block-breadcrumb">
						<ul class="breadcrumb">
							<li><a href="/">Home</a></li>
							<li class="active">Products grid</li>
						</ul>
					</div>

					<div class="header-for-light">
						<h1 class="wow fadeInRight animated" data-wow-duration="1s"><span>{{ $title }}</span></h1>

					</div>
					<div class="block-products-modes color-scheme-2">
						<div class="row">
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<div class="product-view-mode">
									<a href="{{ url('/productgrids',[$type, $typeid]) }}" class="active"><i class="fa fa-th-large"></i></a>
									<a href="{{ url('/productlists',[$type, $typeid]) }}"><i class="fa fa-th-list"></i></a>
								</div>
							</div>
							<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
								<div class="row">
									<div class="col-md-3 col-md-offset-1">
										<label class="pull-right">Sort by</label>
									</div>
									<div class="col-md-5">
										<select name="sort-type" class="form-control">
											<option value="position:asc">--</option>
											<option value="price:asc"  selected="selected">Price: Lowest first</option>
											<option value="price:desc">Price: Highest first</option>
											<option value="name:asc">Product Name: A to Z</option>
											<option value="name:desc">Product Name: Z to A</option>
											<option value="quantity:desc">In stock</option>
										</select>
									</div>
									<div class="col-md-3">
										<select name="products-per-page" class="form-control">
											<option value="10" selected="selected">10</option>
											<option value="20">20</option>
											<option value="30">30</option>
											<option value="100">100</option>
											<option value="all">All</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						@foreach($productlists as $product)
						<div class="col-xs-12 col-sm-6 col-md-4 text-center mb-25">

							
							<article class="product light">
								<figure class="figure-hover-overlay">                                                                        
									<a href="#"  class="figure-href"></a>
									@if($product->new==1)
									<div class="product-new">new</div>
									@endif

									@if($product->discount>0)
									<div class="product-sale">{{ $product->discount }}% <br> off</div>
									@endif
									<a href="#" class="product-compare"><i class="fa fa-random"></i></a>
									<a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
									@if($product->photourl1!="")
									<img src="{{ $product->photourl1 }}" width="400" height="500" class="img-overlay img-responsive" alt="">
									<img src="{{ $product->photourl1 }}" width="400" height="500" class="img-responsive" alt="">
									@else
									<img src="http://placehold.it/400x500" class="img-overlay img-responsive" alt="">
									<img src="http://placehold.it/400x500" class="img-responsive" alt="">
									@endif


								</figure>
								<div class="product-caption">
									<div class="block-name">
										<a href="#" class="product-name">{{ substr($product->name,0, 12) }}</a>
										@if($product->omprice>0)
										<p class="product-price"><span>{{ $product->omprice }}</span> {{ $product->mprice }} ks</p>
										@else
										<p class="product-price"><span>{{ $product->mprice }}</span> {{ $product->mprice }} ks</p>
										@endif

									</div>
									<div class="product-cart">
										<a href="#"><i class="fa fa-shopping-cart"></i> </a>
									</div>
									<div class="product-rating">
										<div class="stars">
											<span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
										</div>
										<a href="" class="review">8 Reviews</a>
									</div>
									@if($product->description=="")
									<p class="description"><br><br></p>
									@else
									<p class="description">{{ substr($product->description,0, 70) }}..</p>
									@endif
								</div>

							</article> 


						</div>

						@endforeach
						
						
						
					</div>
					<div class="block-pagination">
							{!! $productlists->render() !!}
					</div>  
				</div>
				@include('includes.rightsidebar')

			</div>
		</div>  
	</div>

</section>


@stop

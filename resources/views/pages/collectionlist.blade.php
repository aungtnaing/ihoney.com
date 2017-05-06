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
							
							<li class="active">Collections list</li>
						</ul>
					</div>

					<div class="header-for-light">
						<h1 class="wow fadeInRight animated" data-wow-duration="1s"><span>Collection</span> </h1>

					</div>
					
					 @foreach($collections as $collection)
					<article class="product list">
						<div class="row">
							<div class="col-xs-12 col-sm-4 col-md-4 text-center">
								<figure class="figure-hover-overlay text-center">                                                                        
									<a href="{{ url('/productlists',['collection', $collection->id]) }}"  class="figure-href"></a>
									

									 @if($collection->photourl1!="")
		                            <img src="{{ $collection->photourl1 }}" width="400" height="500" class="img-overlay img-responsive" alt="">
		                            <img src="{{ $collection->photourl1 }}" width="400" height="500" class="img-responsive" alt="">
		                            @else
		                            <img src="http://placehold.it/400x500" class="img-overlay img-responsive" alt="">
		                            <img src="http://placehold.it/400x500" class="img-responsive" alt="">
		                            @endif

								</figure>
							</div>
							<div class="col-xs-12 col-sm-8 col-md-8">
								<div class="product-caption">
									<div class="block-name">
										<a href="{{ url('/productlists',['collection', $collection->id]) }}" class="product-name">{{ substr($collection->name,0, 30) }}</a>
		                               

									</div>

									<div class="product-rating">
		                                <div class="stars">
		                                    <span class="star"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span>
		                                </div>
		                                <a href="" class="review">8 Reviews</a>
		                            </div>
			                            @if($collection->description=="")
			                            <p class="description"><br><br></p>
			                            @else
			                            <p class="description">{{ substr($collection->description,0, 500) }}..</p>
			                            @endif
									
								</div>
							</div>
						</div>
					</article>
					@endforeach
				
					<div class="block-pagination">
							{!! $collections->render() !!}
					</div>  

				</div>
				

				@include('includes.rightsidebar')

			</div>
		</div>  
	</div>

</section>

@stop



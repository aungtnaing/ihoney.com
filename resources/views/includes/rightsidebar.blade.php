<aside class="col-md-3">
	<div class="main-category-block ">
		<div class="main-category-title">
			<i class="fa fa-list"></i> Category

		</div>
	</div>
	
	<div class="widget-block">
		<ul class="list-unstyled ul-side-category">

			@if(!is_null($maincategorys))
			@foreach($maincategorys as $maincategory)
			<li><a href=""><i class="fa fa-angle-right"></i> {{ $maincategory->name }}</a>
				<ul class="sub-category">	
					@foreach ($maincategory->categorys as $category)
					<li><a href="{{ url('/productlists',['category', $category->id]) }}"><i class="fa fa-check"></i>{{ $category->name }}</a></li>
					@endforeach


				</ul>

			</li>
			@endforeach
			@endif
		</ul>
	</div>
	<div class="product light last-sale">
		
			<figure class="figure-hover-overlay">                                                                        
				<a href="#"  class="figure-href"></a>
				@if($lastproduct->discount>0)
				<div class="product-sale"> Save <br> {{ $lastproduct->discount }}%</div>
				@endif
				<div class="product-sale-time"><p class="time"></p></div>
				<a href="#" class="product-compare"><i class="fa fa-random"></i></a>
				<a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
				@if($lastproduct->photourl1!="")
				<img src="{{ $lastproduct->photourl1 }}" width="400" height="500" class="img-overlay img-responsive" alt="">
				<img src="{{ $lastproduct->photourl1 }}" width="400" height="500" class="img-responsive" alt="">
				@else
				<img src="http://placehold.it/400x500" class="img-overlay img-responsive" alt="">
				<img src="http://placehold.it/400x500" class="img-responsive" alt="">
				@endif						


			</figure>
			<div class="product-caption">
				<div class="block-name">
					<a href="#" class="product-name">{{ substr($lastproduct->name,0, 12) }}</a>
					@if($lastproduct->omprice>0)
					<p class="product-price"><span>{{ $lastproduct->omprice }}</span> {{ $lastproduct->mprice }} ks</p>
					@else
					<p class="product-price"><span>{{ $lastproduct->mprice }}</span> {{ $lastproduct->mprice }} ks</p>
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
				@if($lastproduct->description=="")
				<p class="description"></p>
				@else
				<p class="description">{{ substr($lastproduct->description,0, 70) }}..</p>
				@endif
			</div>

		

	</div>
	<div class="widget-title">
		<i class="fa fa-money"></i> Price range

	</div>
	<div class="widget-block">
		<div class="row">
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon">ks</span>
					<input type="text" id="price-from" class="form-control" value="0">
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon">ks</span>
					<input type="text" id="price-to" class="form-control" value="15000">
				</div>
			</div>
		</div> 
	</div>
	
	<div class="widget-title">
		<i class="fa fa-thumbs-up"></i> Bestseller
	</div>
		@for($i = 0; $i < 2; $i++)
            <div class="widget-block">
                <div class="row">
                    @if($bestsellerproducts[$i]->photourl1!="")
                    <div class="col-md-4 col-sm-2 col-xs-3">
                        <img class="img-responsive" src="{{ $bestsellerproducts[$i]->photourl1 }}" alt="" title="">   
                    </div>
                    @else
                    <div class="col-md-4 col-sm-2 col-xs-3">
                        <img class="img-responsive" src="http://placehold.it/400x500.jpg" alt="" title="">   
                    </div>
                    @endif
                    
                    <div class="col-md-8  col-sm-10 col-xs-9">
                        <div class="block-name">
                            <a href="#" class="product-name">{{ substr($bestsellerproducts[$i]->name,0, 12) }}</a>
                            @if($bestsellerproducts[$i]->omprice>0)
                            <p class="product-price"><span>{{ $bestsellerproducts[$i]->omprice }}</span> {{ $bestsellerproducts[$i]->mprice }} ks</p>
                            @else
                            <p class="product-price"><span>{{ $bestsellerproducts[$i]->mprice }}</span> {{ $bestsellerproducts[$i]->mprice }} ks</p>
                            @endif

                        </div>
                        <div class="product-rating">
                            <div class="stars">
                                <span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span>
                            </div>
                            <a href="" class="review">8 Reviews</a>
                        </div>
                        <p class="description">{{ substr($bestsellerproducts[$i]->description,0, 50) }}..</p>
                    </div>
                </div>
            </div>
        @endfor
                    

</aside>
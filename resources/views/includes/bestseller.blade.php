




<section>


    <div class="block color-scheme-2">
        <div class="container">
            <div class="header-for-light">
                <h1 class="wow fadeInRight animated" data-wow-duration="1s">OUR  <span>Bestseller</span></h1>
                <div class="toolbar-for-light" id="nav-bestseller">
                    <a href="javascript:;" data-role="prev" class="prev"><i class="fa fa-angle-left"></i></a>
                    <a href="javascript:;" data-role="next" class="next"><i class="fa fa-angle-right"></i></a>
                </div>
            </div>
            <div id="owl-bestseller"  class="owl-carousel">
                @foreach($bestsellerproducts as $product)
                <div class="text-center">
                    <article class="product light">
                       <div id="{{ $product->id }}best" style="display:none;" class="alert alert-success alert-dismissable">
                        <button type="button" class="close" onclick="wishlistcancel({{ $product->id }},'best')">&times;</button>
                        <strong>Thank!</strong> for your wish.
                        </div> 
                    <figure class="figure-hover-overlay">                                                                        
                        <a href="#"  class="figure-href"></a>
                        @if($product->new==1)
                        <div class="product-new">new</div>
                        @endif
                        @if($product->discount>0)
                        <div class="product-sale">{{ $product->discount }}% <br> off</div>
                        @endif
                        <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                        <a href="javascript:wishliststore({{ $product->id }},'best')" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                        @if($product->photourl1!="")
                        <img src="{{ $product->photourl1 }}" class="img-overlay img-responsive" alt="">
                        <img src="{{ $product->photourl1 }}" class="img-responsive" alt="">
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
                                <span class="star"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span>
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
    </div>
</div>


</section>

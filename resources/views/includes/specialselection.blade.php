<section id="sale-section" style="background-image: url({{ $bgphoto->specialselection }})">
    <div class="block color-scheme-white-90">
        <div class="container">
            <div class="header-for-light  hidden-xs hidden-sm">
                <h1 class="wow fadeInRight animated" data-wow-duration="1s">OUR <span>SPECIAL SELECTION</span></h1>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="title-block light wow fadeInLeft">

                        <h2>Summer sale collection</h2>
                        <h1>Effect</h1>
                        <p>Sed posuere consectetur est at lobortis. Donec ullamcorper nulla non metus auctor fringilla auctor fringilla. </p>
                        <div class="text-center">
                            <div class="toolbar-for-light" id="nav-summer-sale">
                                <a href="javascript:;" data-role="prev" class="prev"><i class="fa fa-angle-left"></i></a>
                                <a href="javascript:;" data-role="next" class="next"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div id="owl-summer-sale"  class="owl-carousel">
                        @foreach($specialselectionproducts as $product)
                <div class="text-center">
                    <article class="product light">
                     <div id="{{ $product->id }}select" style="display:none;" class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
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
                            <a href="javascript:wishliststore({{ $product->id }},'select')" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
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
                                    <span class="star"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span>
                                </div>
                                <a href="" class="review">8 Reviews</a>
                            </div>
                           
                        </div>

                    </article>
                </div>
                @endforeach
                         
                    
                    </div>  
                </div>
            </div>

        </div>
    </div>
</section>

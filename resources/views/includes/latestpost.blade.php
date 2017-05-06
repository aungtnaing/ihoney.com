<section>
    <div class="block ">
        <div class="container">
            <div class="row">
                <article class="col-md-4">
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
                    

                </article>
                <article class="col-md-4">
                    <div class="widget-title">
                        <i class="fa fa-user"></i> Our Store
                    </div> 
                    <p>
                        <span class="dropcap">L</span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <blockquote>
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </blockquote>
                </article>
               
                <article class="col-md-4">
                    <div class="widget-title">
                        <i class="fa fa-comments"></i> Latest Posts
                    </div>
                    @foreach($posts as $post)
                    <div class="widget-block">
                        <div class="row">
                            <div class="col-md-4  col-sm-2 col-xs-4">
                                <!-- <img class="img-responsive" src="http://placehold.it/400x300" alt="" title="">    -->
                                <img class="img-responsive" src="{{ $post->photourl1 }}" alt="" title="">   
                            </div>
                            <div class="col-md-8  col-sm-10 col-xs-8">
                                <div class="block-name">
                                    <a href="#" class="product-name">{{ substr($post->name,0, 12) }}</a>

                                </div>
                                <p class="description">{{ substr($post->content,0, 50) }}..</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </article>
            </div>

        </div>
    </div>
</section>
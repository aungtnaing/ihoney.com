

<section class="block-chess-banners" style="background-image: url({{ $bgphoto->newcollection }})">
    <div class="block">
        <div class="container">
            <div class="header-for-dark">
                <h1 class="wow fadeInRight animated" data-wow-duration="2s">New <span>Collections</span></h1>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <article class="block-chess wow fadeInLeft" data-wow-duration="2s">
                        <div class="row">
                         @if($newcollections[0]->photourl1!="")
                             <div class="col-md-4">
                              <a href="{{ url('/productlists',['collection', $newcollections[0]->id]) }}"><img class="img-responsive" src="{{ $newcollections[0]->photourl1 }}" alt=""></a>
                            </div>
                            <div class="col-md-8">
                            <div class="chess-caption-right">
                                <a href="{{ url('/productlists',['collection', $newcollections[0]->id]) }}" class="col-name">{{ $newcollections[0]->name }}</a>
                                <p>
                                    {{ $newcollections[0]->description }}
                                </p>
                            </div>
                             </div>
                        @else
                        <div class="col-md-4">
                            <a href="#"><img class="img-responsive" src="http://placehold.it/900x677" alt=""></a>

                        </div>
                        <div class="col-md-8">
                            <div class="chess-caption-right">
                                <a href="#" class="col-name">Modern collection</a>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>
                        </div>
                        @endif
                    </div>
                </article>
            </div>
            <div class="col-md-3">
                <article class="block-chess wow fadeInRight" data-wow-duration="2s">
                    @if($newcollections[1]->photourl1!="")
                        <a href="{{ url('/productlists',['collection', $newcollections[1]->id]) }}"><img class="img-responsive" src="{{ $newcollections[1]->photourl1 }}" alt=""></a>
                    @else
                        <a href="#"><img class="img-responsive" src="http://placehold.it/900x677" alt=""></a>
                    @endif
                </article>
            </div>
        </div> 
        <div class="row">

            <div class="col-md-3">
                <article class="block-chess wow fadeInLeft" data-wow-duration="2s">
                    @if($newcollections[2]->photourl1!="")
                        <a href="{{ url('/productlists',['collection', $newcollections[2]->id]) }}"><img class="img-responsive" src="{{ $newcollections[2]->photourl1 }}" alt=""></a>
                    @else
                         <a href="#"><img class="img-responsive" src="http://placehold.it/900x677" alt=""></a>
                    @endif
                </article>
            </div>
            <div class="col-md-9">
                <article class="block-chess wow fadeInRight" data-wow-duration="2s">
                    <div class="row">
                        @if($newcollections[3]->photourl1!="")
                        <div class="col-md-8">
                            <div class="chess-caption-left">
                                
                                <a href="{{ url('/productlists',['collection', $newcollections[3]->id]) }}" class="col-name">{{ $newcollections[3]->name }}</a>
                                <p>
                                    {{ $newcollections[3]->description }}
                                </p>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ url('/productlists',['collection', $newcollections[3]->id]) }}"><img class="img-responsive" src="{{ $newcollections[3]->photourl1 }}" alt=""></a> 
                        </div>
                        @else
                        <div class="col-md-8">
                            <div class="chess-caption-left">
                                
                                <a href="#" class="col-name">Classic collection</a>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <a href="#"><img class="img-responsive" src="http://placehold.it/900x677" alt=""></a> 
                        </div>
                        @endif
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
</section>
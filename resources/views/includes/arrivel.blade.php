<section>
    <div class="color-scheme-2">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <article class="banner">
                        <a href="{{ url('/productlists',['newarrivel', 1]) }}">     
                        @if($bgphoto->newarrivels!="")
                            <img src="{{ $bgphoto->newarrivels }}" class="img-responsive" alt="">
                        @else
                            <img src="http://placehold.it/900x677" class="img-responsive" alt="">
                        @endif
                        </a> 
                    </article>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <article class="banner">
                        <a href="{{ url('/collectionlists') }}">
                        @if($bgphoto->collections!="")
                            <img src="{{ $bgphoto->collections }}" class="img-responsive" alt="">
                        @else
                            <img src="http://placehold.it/900x677" class="img-responsive" alt="">
                        @endif
                        </a> 
                    </article>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <article class="banner">
                        <a href="{{ url('/productlists',['lovely', 1]) }}">
                        @if($bgphoto->lovelys!="")
                            <img src="{{ $bgphoto->lovelys }}" class="img-responsive" alt="">
                        @else
                            <img src="http://placehold.it/900x677" class="img-responsive" alt="">
                        @endif
                        </a> 
                    </article>
                </div>
            </div>
        </div>  
    </div>
</section>

 <section>
    <div class="home-category color-scheme-2">
        <div class="container">
            <div class="row">

              @if(!is_null($maincategorys))
                @for ($i = 0; $i < 3; $i++)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <article class="home-category-block">
                        <div class="home-category-title">
                            @if($i == 0)
                            <i class="fa fa-male"></i> <a href="{{ url('/productlists',['maincategory', $maincategorys[$i]->id]) }}">{{ $maincategorys[$i]->name }}</a> 
                            @elseif($i == 1)
                            <i class="fa fa-female"></i> <a href="{{ url('/productlists',['maincategory', $maincategorys[$i]->id]) }}">{{ $maincategorys[$i]->name }}</a> 
                            @else
                            <i class="fa fa-child"></i> <a href="{{ url('/productlists',['maincategory', $maincategorys[$i]->id]) }}">{{ $maincategorys[$i]->name }}</a> 
                            @endif
                        </div>
                           <div class="home-category-option">
                            <ul class="list-unstyled home-category-list">

                               @foreach ($maincategorys[$i]->categorys as $category)
                               <li><a href="{{ url('/productlists',['category', $category->id]) }}"><i class="fa fa-check"></i>{{ $category->name }}</a></li>
                               @endforeach

                           </ul>
                           <!-- <img src="http://placehold.it/800x800" class="img-responsive" alt=""> -->
                           <img src="{{ $maincategorys[$i]->photourl1 }}" class="img-responsive" alt="">
                       </div>
                   </article>

               </div>
               @endfor
               @endif
           </div>
       </div>
   </div>
</section>

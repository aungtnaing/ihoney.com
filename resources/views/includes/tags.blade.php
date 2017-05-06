<section>
  <div class="block">
    <div class="container">
      <div class="row">
        <article class="col-md-4">
          <div class="widget-title">
            <i class="fa fa-tags"></i> Tags
          </div>
          <div class="widget-block">
            <ul class="list-unstyled tags">
             @if(count($maincategorys)>1)
                <li><a href="{{ url('/productlists',['maincategory', $maincategorys[1]->id]) }}">{{ $maincategorys[1]->name }}</a></li>   
                @if(count($maincategorys[1]->categorys)>0)
                  <li><a href="{{ url('/productlists',['category', $maincategorys[1]->categorys[0]->id]) }}">{{ $maincategorys[1]->categorys[0]->name }}</a></li>
                @endif
                @if(count($maincategorys[1]->categorys)>1)
                  <li><a href="{{ url('/productlists',['category', $maincategorys[1]->categorys[1]->id]) }}">{{ $maincategorys[1]->categorys[1]->name }}</a></li>
                @endif
                @if(count($maincategorys[1]->categorys)>2)
                  <li><a href="{{ url('/productlists',['category', $maincategorys[1]->categorys[2]->id]) }}">{{ $maincategorys[1]->categorys[2]->name }}</a></li>
                @endif

             @endif


            @if(count($maincategorys)>0)
             <li><a href="{{ url('/productlists',['maincategory', $maincategorys[0]->id]) }}">{{ $maincategorys[0]->name }}</a></li>   
             
                @if(count($maincategorys[0]->categorys)>0)
                  <li><a href="{{ url('/productlists',['category', $maincategorys[0]->categorys[0]->id]) }}">{{ $maincategorys[0]->categorys[0]->name }}</a></li>
                @endif
                @if(count($maincategorys[0]->categorys)>1)
                  <li><a href="{{ url('/productlists',['category', $maincategorys[0]->categorys[1]->id]) }}">{{ $maincategorys[0]->categorys[1]->name }}</a></li>
                @endif
                @if(count($maincategorys[0]->categorys)>2)
                  <li><a href="{{ url('/productlists',['category', $maincategorys[0]->categorys[2]->id]) }}">{{ $maincategorys[0]->categorys[2]->name }}</a></li>
                @endif
            @endif

              @if(count($maincategorys)>2)
             <li><a href="{{ url('/productlists',['maincategory', $maincategorys[2]->id]) }}">{{ $maincategorys[2]->name }}</a></li>   
             
                @if(count($maincategorys[2]->categorys)>0)
                  <li><a href="{{ url('/productlists',['category', $maincategorys[2]->categorys[0]->id]) }}">{{ $maincategorys[2]->categorys[0]->name }}</a></li>
                @endif
                @if(count($maincategorys[2]->categorys)>1)
                  <li><a href="{{ url('/productlists',['category', $maincategorys[2]->categorys[1]->id]) }}">{{ $maincategorys[2]->categorys[1]->name }}</a></li>
                @endif
                @if(count($maincategorys[2]->categorys)>2)
                  <li><a href="{{ url('/productlists',['category', $maincategorys[2]->categorys[2]->id]) }}">{{ $maincategorys[2]->categorys[2]->name }}</a></li>
                @endif
            @endif


            @if(count($newcollections)>0)
              <li><a href="{{ url('/productlists',['collection', $newcollections[0]->id]) }}">{{ $newcollections[0]->name }}</a></li>
            @endif

            @if(count($newcollections)>1)
              <li><a href="{{ url('/productlists',['collection', $newcollections[1]->id]) }}">{{ $newcollections[1]->name }}</a></li>
            @endif


            @if(count($newcollections)>2)
              <li><a href="{{ url('/productlists',['collection', $newcollections[2]->id]) }}">{{ $newcollections[2]->name }}</a></li>
            @endif   

              
             <li><a href="{{ url('/productlists',['bestseller', 1]) }}">bestseller</a></li> 
             <li><a href="{{ url('/productlists',['specialselection', 1]) }}">specialselection</a></li>   

           </ul>
         </div>
       </article>
       <article class="col-md-4">
        <div class="widget-title">
          <i class="fa fa-book"></i> Blogs
        </div>
        <div class="widget-block">
          <ul class="list-unstyled catalog">
            @if(!is_null($blogs))
            @for($i = 0; $i < 3; $i++)
            @if(!empty($blogs[$i]))
            <li><a href="#"><i class="fa fa-file"></i>{{ $blogs[$i]->name }}</a></li>
            @endif
            @endfor
            @endif


          </ul>
        </div>
      </article>
      <article class="col-md-4">
        <div class="widget-title">
          <i class="fa fa-thumbs-up"></i> Services
        </div>
        <div class="panel-group" id="accordion">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
                  Money exchange
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
              <div class="panel-body">
                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed">
                  Packing your request
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
              <div class="panel-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed">
                  Send as Gift
                </a>
              </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
              <div class="panel-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolort. 
              </div>
            </div>
          </div>
        </div>
      </article>
    </div>
  </div>
</div>
</section>
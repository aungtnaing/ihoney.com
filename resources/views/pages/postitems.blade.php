@extends('layouts.default')
@section('content')

<section>
	<div class="second-page-container">
		<div class="container">
			<div class="row">

				 <div class="col-md-9">
                            <div class="block-breadcrumb">
                                <ul class="breadcrumb">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Base Pages</a></li>
                                    <li class="active">Post items</li>
                                </ul>
                            </div>
                            <div class="block">
                                <div class="header-for-light">
                                    <h1 class="wow fadeInRight animated" data-wow-duration="1s"><span>post</span>s</h1>

                                </div>

                                <div class="row">
                                    @if(count($posts)>0)
                                    <article class="col-md-6 text-center">
                                        <div class="blog">
                                            <figure class="figure-hover-overlay">                                                                        
                                                <a href="#"  class="figure-href"></a>

                                                <i class="fa fa-comment"></i><a href="" class="blog-link"> 4 </a>
                                                <img class="img-responsive" src="{{ $posts[0]->photourl1 }}" alt="" title="">

                                                <span class="bar"></span>
                                            </figure>
                                            <div class="blog-caption">
                                                <h3><a href="#" class="blog-name">{{ $posts[0]->name }}</a></h3>
                                                <p class="post-information">
                                                    <span><i class="fa fa-user"></i> By {{ $posts[0]->user->name }}</span>
                                                    <span><i class="fa fa-clock-o"></i> {{ $posts[0]->created_at }}</span>
                                                </p>
                                                <p>
                                                   {{ substr($posts[0]->content, 0, 200) }}
                                                </p>
                                                <a href="#" class="btn-read">Read more</a>
                                            </div>
                                        </div>
                                    </article>
                                    @endif
                                    @if(count($posts)>1)
                                    <article class="col-md-6 text-center">
                                        <div class="blog">
                                            <figure class="figure-hover-overlay">                                                                        
                                                <a href="#"  class="figure-href"></a>

                                                <i class="fa fa-comment"></i><a href="" class="blog-link"> 7 </a>
                                                <img class="img-responsive" src="{{ $posts[1]->photourl1 }}" alt="" title="">

                                                <span class="bar"></span>
                                            </figure>
                                            <div class="blog-caption">
                                                <h3><a href="#" class="blog-name">{{ $posts[1]->name }}</a></h3>
                                                <p class="post-information">
                                                    <span><i class="fa fa-user"></i> By {{ $posts[1]->user->name }}</span>
                                                    <span><i class="fa fa-clock-o"></i> {{ $posts[1]->created_at }}</span>
                                                </p>
                                                <p>
                                                   {{ substr($posts[1]->content, 0, 200) }}
                                                </p>
                                                <a href="#" class="btn-read">Read more</a>
                                            </div>
                                        </div>
                                    </article>
                                    @endif


                                </div>
                            </div>
                            <div class="banner">
                                <a href="#">
                                    <img src="http://placehold.it/1200x230" class="img-responsive" alt="">
                                </a> 
                            </div>
                            <div class="block">
                                <div class="header-for-light">
                                    <h1 class="wow fadeInRight animated" data-wow-duration="1s">  <span>post</span>s</h1>

                                </div>
                                <div class="row">
                                  
                                	@for($i = 2; $i < count($posts); $i++)
                                        <article class="col-md-4 text-center">
                                        <div class="blog">
                                            <figure class="figure-hover-overlay">                                                                        
                                                <a href="#"  class="figure-href"></a>

                                                <i class="fa fa-comment"></i><a href="" class="blog-link"> 7 </a>
                                                <img class="img-responsive" src="{{ $posts[$i]->photourl1 }}" alt="" title="">

                                                <span class="bar"></span>
                                            </figure>
                                            <div class="blog-caption">
                                                <h3><a href="#" class="blog-name">{{ $posts[$i]->name }}</a></h3>
                                                <p class="post-information">
                                                    <span><i class="fa fa-user"></i> By {{ $posts[$i]->user->name }}</span>
                                                    <span><i class="fa fa-clock-o"></i> {{ $posts[$i]->created_at }}</span>
                                                </p>
                                                <p>
                                                   {{ substr($posts[$i]->content, 0, 150) }}
                                                </p>
                                                <a href="#" class="btn-read">Read more</a>
                                            </div>
                                        </div>
                                    </article>
                                 
                                    @endfor
                                
                                  
                                </div>
                            </div>
                        </div>
				

				@include('includes.rightsidebar')

			</div>
		</div>  
	</div>

</section>

@stop



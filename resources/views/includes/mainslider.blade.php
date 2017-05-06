<section>
            <div class="revolution-container">
                <div class="revolution">
                    <ul class="list-unstyled">  <!-- SLIDE  -->
                        @foreach($mainslides as $mainslide)
                        <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                            <!-- MAIN IMAGE -->
                            <!-- <img src="http://placehold.it/1920x1200"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat"> -->
                            <img src="{{ $mainslide->photourl1 }}"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                            
                            <!-- LAYERS -->
                            <div class="tp-caption skewfromrightshort customout"
                                 data-x="20"
                                 data-y="160"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="300"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 4">
                                <!-- <img src="img/preview/slider/1.png" alt=""> -->
                                <!-- <h1 class="ih1">i am aung</h1> -->
                              
                                   <div class="plate">
                                      <p class="script"><span>"{{ $mainslide->name }}"</span></p>
                                      <p class="shadow text2">{{ $mainslide->title }}</p>
                                      <p class="shadow text1">{{ $mainslide->special }}</p>
                                      
                                      
                                      <!-- <p class="script"><span>by Ibrahim</span></p> -->
                                    </div>
                              
                             </div>
                           
                            <div class="tp-caption customin customout hidden-xs"
                                 data-x="20"
                                 data-y="430"
                                 data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="1000"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 2">
                                <a href="#" class="btn-home">Shop All</a>
                            </div>
                            <div class="tp-caption customin customout hidden-xs"
                                 data-x="145"
                                 data-y="430"
                                 data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="500"
                                 data-start="1200"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="500"
                                 data-endeasing="Power4.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 2">
                                <a href="#" class="btn-home">Read more</a>
                            </div>
                        </li>
                        @endforeach
                        
                    </ul>
                    <div class="revolutiontimer"></div>
                </div>
            </div>
        </section>
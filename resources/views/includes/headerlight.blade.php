   <!-- Header-->

 
    <!-- Header-->
   <header id="header" class="light-header">
    <div class="header-top-row">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="top-welcome hidden-xs hidden-sm">
                        <p>iHoney &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-phone"></i> 095 09-25-626-8077 &nbsp; <i class="fa fa-envelope"></i> iHoney@outlook.com</p> 
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pull-right">
                        <!-- header - currency -->
                               <!--  <div id="currency" class="pull-right">
                                    <a href="" class="currency-title">$ USD <i class="fa fa-angle-down"></i> </a>
                                    <ul class="list-unstyled currency-item">
                                        <li><a href="">€ EURO</a></li>
                                        <li><a href="">£ POUND</a></li>
                                    </ul>
                                </div> -->
                                <!-- /header - currency -->

                                <!-- header-account menu -->
                              
                                <div id="account-menu" class="pull-right">
                                    @if (Auth::guest())
                                    <a href="" class="account-menu-title"><i class="fa fa-user"></i>&nbsp; Account <i class="fa fa-angle-down"></i> </a>
                                    <ul class="list-unstyled account-menu-item">
                                        <li><a href=""><i class="fa fa-heart"></i>&nbsp; Wishlist</a></li>
                                        <li><a href="{{ url('/auth/register') }}"><i class="glyphicon glyphicon-registration-mark"></i>&nbsp; Register</a></li>
                                        <li><a href="{{ url('/auth/login') }}"><i class="fa fa-lock"></i>&nbsp; Login</a></li>
                                    </ul>
                                    @else
                                    @if(Auth::user()->photourl!="")
                                    <a href="" class="account-menu-title"><img src="{{ Auth::user()->photourl }}" width="25" height="25" class="img-circle"> <span>{{ substr(Auth::user()->name,0, 5) }}</span> <i class="fa fa-angle-down"></i></a>
                                    @else
                                    <a href="" class="account-menu-title"><i class="fa fa-user"></i><span>{{ substr(Auth::user()->name,0, 5) }}</span><i class="fa fa-angle-down"></i></a>    
                                    @endif
                                    <ul class="list-unstyled account-menu-item">
                                        <li><a href="{{ route("profiles.edit", Auth::user()->id) }}"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                                        <li><a href=""><i class="fa fa-heart"></i>&nbsp; Wishlist</a></li>
                                        <li><a href=""><i class="fa fa-check"></i>&nbsp; Checkout</a></li>
                                        <li><a href=""><i class="fa fa-shopping-cart"></i>&nbsp; Cart</a></li>
                                        <li><a href="{{ url('/auth/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                                    </ul>
                                    @endif

                                </div>
                                <!-- /header-account menu -->
                                <!-- header - language -->
                                <div id="lang" class="pull-right">
                                    <a href="#" class="lang-title"><img src="<?php echo url(); ?>/img/f-gb.png" alt="English" title="English"> English <i class="fa fa-angle-down"></i> </a>
                                    <ul class="list-unstyled lang-item">
                                        <li class="active"><a href=""><img src="<?php echo url(); ?>/img/f-gb.png" alt="English" title="English"> English</a></li>
                                        <li><a href=""><img src="<?php echo url(); ?>/img/f-fr.png" alt="Myanmar" title="Myanmar"> Myanmar</a></li>
                                    </ul>
                                </div>
                                <!-- /header - language -->
                                <!-- header - currency -->
                                <div class="socials-block pull-right">
                                    <ul class="list-unstyled list-inline">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /header - currency -->
                            </div>

                        </div>
                    </div>




                </div>
            </div>
            <!-- /header-top-row -->
            <div class="header-bg">
                <div class="header-main" id="header-main-fixed">
                    <div class="header-main-block1">
                        <div class="container">
                            <div id="container-fixed">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="/" class="header-logo"> <img src="<?php echo url(); ?>/images/home/logo2.png" alt=""></a>        
                                    </div>
                                    <div class="col-md-5">
                                        <div class="top-search-form pull-left">
                                            <form action="#" method="post">
                                                <input type="text" placeholder="Search ..." class="form-control">
                                                <button type="submit"><i class="fa fa-search"></i></button>
                                            </form>  
                                        </div>        
                                    </div>
                                    <div class="col-md-4">
                                        <div class="header-mini-cart  pull-right">
                                            <a href="#"  data-toggle="dropdown">
                                                Shopping cart
                                                <span>0 item(s)-0.00</span>
                                            </a>
                                            <div class="dropdown-menu shopping-cart-content pull-right">
                                                <div class="shopping-cart-items">
                                                    <div class="item pull-left">
                                                        <img src="http://placehold.it/56x70" alt="Product Name" class="pull-left">
                                                        <div class="pull-left">
                                                            <p>Product Name</p>
                                                            <p>$251.00&nbsp;<strong>x 3</strong></p>
                                                        </div>
                                                        <a href="" class="trash"><i class="fa fa-trash-o pull-left"></i></a>
                                                    </div>
                                                    <div class="item pull-left">
                                                        <img src="http://placehold.it/56x70" alt="Product Name" class="pull-left">
                                                        <div class="pull-left">
                                                            <p>Product Name</p>
                                                            <p>$77.05&nbsp;<strong>x 1</strong></p>
                                                        </div>
                                                        <a href="" class="trash"><i class="fa fa-trash-o pull-left"></i></a>
                                                    </div>
                                                    <div class="item pull-left">
                                                        <img src="http://placehold.it/56x70" alt="Product Name" class="pull-left">
                                                        <div class="pull-left">
                                                            <p>Product Name</p>
                                                            <p>$50.10&nbsp;<strong>x 8</strong></p>
                                                        </div>
                                                        <a href="" class="trash"><i class="fa fa-trash-o pull-left"></i></a>
                                                    </div>
                                                    <div class="total pull-left">
                                                        <table>
                                                            <tbody class="pull-right">
                                                                <tr>
                                                                    <td><b>Sub-Total:</b></td>
                                                                    <td>$500.99</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Eco Tax (-1.00):</b></td>
                                                                    <td>$7.00</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>VAT (7.4%):</b></td>
                                                                    <td>$80.00</td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr class="color-active">
                                                                    <td><b>Total:</b></td>
                                                                    <td><b>$575.99</b></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <a href="#" class="btn-read pull-right">Checkout</a>
                                                        <a href="#" class="btn-read pull-right">View Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /header-mini-cart -->
                                        <div class="top-icons">
                                            <div class="top-icon"><a href="" title="Wishlist"><i class="fa fa-heart"></i></a></div>
                                            <div class="top-icon"><a href="" title="Notification"><i class="fa fa-bell"></i></a><span>12</span></div>
                                            <div class="top-icon"><a href="{{ url('/auth/login') }}" title="Login"><i class="fa fa-lock"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="header-main-block2">
                        <nav class="navbar yamm  navbar-main" role="navigation">

                            <div class="container">
                                <div class="navbar-header">
                                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                                    <a href="home" class="navbar-brand"><i class="fa fa-home"></i></a>
                                </div>
                                <div id="navbar-collapse-1" class="navbar-collapse collapse ">
                                    <ul class="nav navbar-nav">
                                        <!-- Classic list -->
                                        <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Home <i class="fa fa-caret-right fa-rotate-45"></i></a>
                                            <ul class="dropdown-menu list-unstyled fadeInUp animated">
                                                <li>
                                                    <a  href="/"> Home </a>
                                                </li>
                                                <li>
                                                    <a  href="index2.htmlhome"> Home Header Light</a>
                                                </li>
                                                <li>
                                                    <a  href="index3.html"> Home Vertical Menu</a>
                                                </li>
                                                <li>
                                                    <a  href="index-dark.html"> Home Dark Version</a>
                                                </li>
                                                <li>
                                                    <a  href="index-with-side.html"> Home With Side <span>Added</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown  yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Pages <i class="fa fa-caret-right fa-rotate-45"></i> <span>new</span></a>
                                            <ul class="dropdown-menu list-unstyled  fadeInUp animated">
                                                <li>
                                                    <div class="yamm-content">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="header-menu">
                                                                    <h4>Base pages</h4>
                                                                </div> 
                                                                <ul class="list-unstyled">
                                                                    <li>
                                                                        <a  href="blog-items.html"> Blog items </a>
                                                                    </li>
                                                                    <li>
                                                                        <a  href="blog-content.html"> Blog Content </a>
                                                                    </li>
                                                                    <li>
                                                                        <a  href="register.html"> Register </a>
                                                                    </li>
                                                                    <li>
                                                                        <a  href="login.html"> Login </a>
                                                                    </li>

                                                                    <li>
                                                                        <a  href="change-pas.html"> Change Password </a>
                                                                    </li>
                                                                    <li>
                                                                        <a  href="contact.html"> Contact </a>
                                                                    </li>
                                                                    <li>
                                                                        <a  href="shortcode.html"> Shortcode </a>
                                                                    </li>
                                                                    <li>
                                                                        <a  href="404.html"> 404 </a>
                                                                    </li>
                                                                </ul>
                                                            </div>


                                                            <div class="col-md-3">
                                                                <div class="header-menu">
                                                                    <h4>Product pages<span>Additional</span></h4>
                                                                </div>
                                                                <ul class="list-unstyled">
                                                                    <li>
                                                                        <a href="products-grid.html"><i class="fa fa-angle-right"></i> Product grid </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="products-list.html"><i class="fa fa-angle-right"></i> Product list </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="product-detail.html"><i class="fa fa-angle-right"></i> Product detail </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="product-detail2.html"><i class="fa fa-angle-right"></i> Detail with Lightbox<span>New</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="header-menu">
                                                                    <h4>Cart pages</h4>
                                                                </div>
                                                                <ul class="list-unstyled">
                                                                    <li>
                                                                        <a  href="cart.html"><i class="fa fa-shopping-cart"></i> Cart </a>
                                                                    </li>
                                                                    <li>
                                                                        <a  href="checkout.html"><i class="fa fa-check"></i> Checkout </a>
                                                                    </li>
                                                                    <li>
                                                                        <a  href="history.html"><i class="fa fa-tasks"></i> Order History </a>
                                                                    </li>
                                                                    <li>
                                                                        <a  href="compare.html"><i class="fa fa-random"></i> Compare </a>
                                                                    </li>
                                                                    <li>
                                                                        <a  href="wishlist.html"><i class="fa fa-heart"></i>  Wishlist </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="banner">
                                                                    <a href="#">
                                                                        <img src="http://placehold.it/900x1200" class="img-responsive" alt="">
                                                                    </a> 
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </li>
                                            </ul>
                                        </li>

                                        <!-- With content -->
                                        <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Fashion <i class="fa fa-caret-right fa-rotate-45"></i></a>
                                            <ul class="dropdown-menu list-unstyled  fadeInUp animated">
                                                <li>
                                                    <div class="yamm-content">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="header-menu">
                                                                    <h4>Women</h4>
                                                                </div> 
                                                                <ul class="list-unstyled">
                                                                    <li><a href="#">Dresses</a></li>
                                                                    <li><a href="#">Bags</a></li>
                                                                    <li><a href="#">Jeans</a></li>
                                                                    <li><a href="#">Shirts</a></li>
                                                                    <li><a href="#">T-shirts</a></li>
                                                                    <li><a href="#">Wallets</a></li>
                                                                    <li><a href="#">Hair Accessories</a></li>
                                                                    <li><a href="#">Short dresses</a></li>

                                                                </ul>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="header-menu">
                                                                    <h4>Men</h4>
                                                                </div>
                                                                <ul class="list-unstyled">
                                                                    <li><a href="#">Jeans</a></li>
                                                                    <li><a href="#">Shirts</a></li>
                                                                    <li><a href="#">T-shirts</a></li>
                                                                    <li><a href="#">Blazers</a></li>
                                                                    <li><a href="#">Sport Bags</a></li>
                                                                    <li><a href="#">Jacekts</a></li>
                                                                    <li><a href="#">Coats</a></li>
                                                                    <li><a href="#">Sandals</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <article class="banner">
                                                                    <a href="#">
                                                                        <img src="http://placehold.it/900x677" class="img-responsive" alt="">
                                                                    </a> 
                                                                </article>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </li>
                                            </ul>
                                        </li>

                                     

                                       
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>

                <!-- /header-main-menu -->
            </div>
        </header>
        <!-- End header -->
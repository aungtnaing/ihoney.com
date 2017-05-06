@extends('layouts.default')
@section('content')

    <section class="body-bg">
        <div class="second-page-container">
            <div class="block">
                <div class="container">
                    <div class="header-for-light">
                        <h1 class="wow fadeInRight animated" data-wow-duration="1s">Create new <span>Account</span></h1>
                    </div>
                    <div class="row">
                        <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="block-form box-border wow fadeInLeft animated" data-wow-duration="1s">
                                <h3><i class="fa fa-user"></i>Personal Information</h3>

                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <hr>
                                <form class="form-horizontal" role="form" method="POST" action="{{ route("profiles.store") }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">    
                                    <div class="form-group">
                                        <label for="inputFirstName" class="col-sm-3 control-label">Name:<span class="text-error">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                        </div>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="inputEMail" class="col-sm-3 control-label">E-Mail:<span class="text-error">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="inputPhone" class="col-sm-3 control-label">Phone:<span class="text-error">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="ph1" value="{{ old('phone') }}" placeholder="Enter Your phone" type="text" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="address" class="col-sm-3 control-label">Address:</label>
                                        <div class="col-sm-9">
                                             <textarea name="address" placeholder="Enter your address" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <h3><i class="fa fa-lock"></i>Password</h3>
                                    <hr>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Password:<span class="text-error">*</span></label>
                                        <div class="col-md-9">
                                            <input id="password1" type="password" class="form-control" name="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Confirm Password:<span class="text-error">*</span></label>
                                        <div class="col-md-9">
                                            <input id="password2" type="password" class="form-control" name="password_confirmation">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox">  I'v read and agreed on <a href="#">Condations</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="submit" class="btn-default-1">Register</button>

                                        </div>
                                    </div>
                                </form>

                            </div>
                        </article>
                        <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                            <div class="block-form box-border wow fadeInRight animated" data-wow-duration="1s">
                                <h3><i class="fa fa-check"></i>Conditions</h3>
                                <hr>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>
                                <blockquote>
                                    <p>
                                        <abbr title="HyperText Markup Language Curabitur pretium tincidunt lacus. Nulla gravida orci a odio." class="initialism">HTML</abbr>
                                        Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.
                                    </p>
                                </blockquote>
                                <p>
                                    Fusce convallis, mauris imperdiet gravida bibendum, nisl turpis suscipit mauris, sed placerat ipsum urna sed risus. In convallis tellus a mauris. Curabitur non elit ut libero tristique sodales. Mauris a lacus. Donec mattis semper leo. In hac habitasse platea dictumst. Vivamus facilisis diam at odio. Mauris dictum, nisi eget consequat elementum, lacus ligula molestie metus, non feugiat orci magna ac sem. Donec turpis. Donec vitae metus. Morbi tristique neque eu mauris. Quisque gravida ipsum non sapien. Proin turpis lacus, scelerisque vitae, elementum at, lobortis ac, quam. Aliquam dictum eleifend risus. In hac habitasse platea dictumst. Etiam sit amet diam. Suspendisse odio. Suspendisse nunc. In semper bibendum libero.
                                </p>
                                <p>
                                    Proin nonummy, lacus eget pulvinar lacinia, pede felis dignissim leo, vitae tristique magna lacus sit amet eros. Nullam ornare. Praesent odio ligula, dapibus sed, tincidunt eget, dictum ac, nibh. Nam quis lacus. Nunc eleifend molestie velit. Morbi lobortis quam eu velit. Donec euismod vestibulum massa. Donec non lectus. Aliquam commodo lacus sit amet nulla. Cras dignissim elit et augue. Nullam non diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In hac habitasse platea dictumst. Aenean vestibulum. Sed lobortis elit quis lectus. Nunc sed lacus at augue bibendum dapibus.
                                </p>


                                <a href="#" class="btn-default-1">Read more</a>
                            </div>
                            <div class="block-form box-border wow fadeInRight animated" data-wow-duration="1s">
                                <h3><i class="fa fa-bookmark-o"></i>Checkout as Guest</h3>
                                <hr>
                                <p>Checkout as a guest instead!</p>

                                <a href="#" class="btn-default-1">As Guest</a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div> 
    </section>

    <section>
        <div class="block color-scheme-white-90">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <article class="payment-service">
                            <a href="#"></a>
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <i class="fa fa-thumbs-up"></i>
                                </div>
                                <div class="col-md-8">
                                    <h3 class="color-active">Safe Payments</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="payment-service">
                            <a href="#"></a>
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <i class="fa fa-truck"></i>
                                </div>
                                <div class="col-md-8">
                                    <h3 class="color-active">Free shipping</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="payment-service">
                            <a href="#"></a>
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <i class="fa fa-fax"></i>
                                </div>
                                <div class="col-md-8">
                                    <h3 class="color-active">24/7 Support</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>



            </div>
        </div>
    </section>

@stop

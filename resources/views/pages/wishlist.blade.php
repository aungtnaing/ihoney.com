@extends('layouts.default')
@section('content')
  <section>
            <div class="second-page-container">
                <div class="block">
                    <div class="container">
                        <div class="header-for-light">
                            <h1 class="wow fadeInRight animated" data-wow-duration="1s">My <span>Wishlist</span></h1>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="cart-table table wow fadeInLeft" data-wow-duration="1s">
                                    <thead>
                                        <tr>
                                            <th class="card_product_image">Image</th>
                                            <th class="card_product_name">Product Name</th>
                                            <th class="card_product_model">Note</th>
                                            <th class="card_product_quantity">Quantity</th>
                                            <th class="card_product_price">Price</th>
                                            <th class="card_product_total">Add to Cart</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if(count($wishlists)>0)
                                            @foreach($wishlists as $wishlist)
                                            <tr>
                                                <td class="card_product_image" data-th="Image"><a href="#"><img title="Product Name" alt="Product Name" src="{{  $wishlist->product->photourl1 }}"></a></td>
                                                <td class="card_product_namwishliste" data-th="Product Name"><a href="#">{{ $wishlist->product->name }}</a><br>
                                                    <small>{{ substr($wishlist->product->description,0, 20) }}</small>
                                                </td>
                                                <td class="card_product_model" data-th="Model">
                                                    <textarea></textarea>
                                                </td>
                                             
                                                <td class="card_product_quantity" data-th="Quantity">
                                                    <input  name="someid" class="styler" type="number" min="0" value="1" onkeypress="return isNumberKey(event)"/>
                                                     &nbsp;
                                                    &nbsp;<a href="#"><i class="icon-trash icon-large"></i> </a>
                                                </td>
                                                
                                                <td class="card_product_price" data-th="Unit Price">{{ $wishlist->product->mprice }} ks</td>
                                                <td class="card_product_total" data-th="Add to Cart"><input type="submit" value="Add to Cart" class="btn-default-1"></td>
                                            </tr>
                                            @endforeach
                                        @endif
                                     

                                 
                                </tbody>
                            </table>
                        </div>
                    </div>

                    </div>
                </div>
            </div> 
        </section>
 @include('includes.paymentservice')



@stop



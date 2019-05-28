<?php session_start();

if(isset($_SESSION['products']) == false){
    $_SESSION['products'] = [];
}

?>
@extends('master')
@section('banner')
    <div class="mobiles">
        <div class="container">
            <div class="w3ls_mobiles_grids">

                <div class="col-md-12 w3ls_mobiles_grid_right">


                    <div class="clearfix"> </div>

                    <div class="w3ls_mobiles_grid_right_grid2">
                        <div class="w3ls_mobiles_grid_right_grid2_left">
                            <h2 style="text-align: center;">Your Cart</h2>
                        </div>
                        <div class="w3ls_mobiles_grid_right_grid2_right">

                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="w3ls_mobiles_grid_right_grid3">
                        @foreach($_SESSION['products'] as $product)
                            <div class="col-md-4 agile_ecommerce_tab_left">
                                <div class="hs-wrapper">
                                    <img src="{{ asset( '/public/images/'.$product['img'])  }}" alt=" " class="img-responsive" />
                                    <img src="{{ asset( '/public/images/'.$product['img'])  }}" alt=" " class="img-responsive" />
                                    <img src="{{ asset( '/public/images/'.$product['img'])  }}" alt=" " class="img-responsive" />
                                    <img src="{{ asset( '/public/images/'.$product['img'])  }}" alt=" " class="img-responsive" />
                                    <img src="{{ asset( '/public/images/'.$product['img'])  }}" alt=" " class="img-responsive" />
                                    <img src="{{ asset( '/public/images/'.$product['img'])  }}" alt=" " class="img-responsive" />
                                    <div class="w3_hs_bottom">
                                        <ul>
                                            <li>
                                                <a href="{!! route('chi-tiet',['id'=>$product['id']]) !!}" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h5><a href="{!! route('chi-tiet',['id'=>$product['id']]) !!}">{{ $product['name'] }}</a></h5>
                                <div class="simpleCart_shelfItem">
                                    <span style="text-decoration: none">Số lượng: {!! $product['quantity'] !!}</span>
                                    <p><i class="item_price">{{ '$'.$product['price'] }}</i></p>
                                    <form action="{!! route('removeCart') !!}" method="post">
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                        <input type="hidden" name="id" value="{!! $product['id'] !!}" />
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="submit" class="w3ls-cart">Remove Cart</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                        <div class="clearfix"> </div>
                    </div>

                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
@stop
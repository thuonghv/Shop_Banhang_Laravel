@extends('layout')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chu</a></li>
				  <li class="active">Gio hang</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
                <?php
                $content = Cart::content();
                ?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hinh anh</td>
							<td class="description">Ten san pham</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                  @foreach($content as $cont) 
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('public/uploads/product/'.$cont->options->image)}}" width="100" alt="" ></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$cont->name}}</a></h4>
								<p>ID: {{$cont->id}}</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($cont->price)." "."₫"}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{URL::to('/update-cart-qty')}}" method="POST">
									{{csrf_field()}}
									<input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$cont->qty}}" autocomplete="off" size="2">
									<input type="hidden" value="{{$cont->rowId}}" name="rowId_cart" class="form-control" class="btn btn-default btn-sm">
									<input type="submit" value="Cap nhat" name="update_qty" class="btn btn-default btn-sm">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
								<?php
								$subtotal = $cont->price*$cont->qty;
								echo number_format($subtotal)." "."₫";
								?>
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart',$cont->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>

				 @endforeach
					
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container">
			<div class="row">			
					<div class="total_area">
						<ul>
							<li>Tổng tiền sản phẩm <span>{{Cart::subtotal()." "."₫"}}</span></li>
							<li>Thuế <span>{{Cart::tax()." "."₫"}}</span></li>
							<li>Phí vận chuyển <span>Free</span></li>
							<li>Tỏng cộng <span>{{Cart::subtotal()." "."₫"}}</span></li>
						</ul>
						<?php
								$customer_id = Session::get('customer_id');
								if($customer_id != NULL){
								?>	
								<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toan</a>
								<?php
								}else{	
									?>
								<a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toan</a>
								<?php
								}
								?>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection 
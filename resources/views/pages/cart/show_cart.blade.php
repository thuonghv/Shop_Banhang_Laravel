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
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng tiền sản phẩm <span>{{Cart::subtotal()." "."₫"}}</span></li>
							<li>Thuế <span>{{Cart::tax()." "."₫"}}</span></li>
							<li>Phí vận chuyển <span>Free</span></li>
							<li>Tỏng cộng <span>{{Cart::subtotal()." "."₫"}}</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection 
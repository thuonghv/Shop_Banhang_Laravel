@extends('layout')
@section('content')
<section id="cart_items">
		<div class="container">
		<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chu</a></li>
				  <li class="active">Thanh toan Gio hang</li>
				</ol>
			</div>

			

			<div class="register-req">
				<p>Ban can dang ky hoac dang nhap de thanh toan gio hang</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-15 clearfix">
						<div class="bill-to">
							<p>Thong tin nguoi nhan</p>
							<div class="form-one">
								<form action="{{URL::to('/save-checkout-customer')}}" method="POST">
								{{csrf_field()}}

									<input type="text" name="shipping_name" placeholder="HO va ten *">
									<input type="text" name="shipping_email" placeholder="dia chi email">
									<input type="text" name="shipping_address" placeholder="Dia chi*">
									<input type="text" name="shipping_phone" placeholder="So dt">
									<textarea name="shipping_note"  placeholder="Ghi chu cua ban cho don hang" rows="16"></textarea>
									<input type="submit" value="Gui" name="send_order" class="btn btn-primary btn-sm">
								</form>
							</div>
							<div class="form-two">
								
							</div>
						</div>
					</div>
									
				</div>
			</div>
			<div class="review-payment">
				<h2>Gio hang cua ban</h2>
			</div>

			
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->

@endsection 
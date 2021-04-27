@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sua sản phẩm
                        </header>
                        <?php
                        $message = Session::get('message');
                        if($message){
                            echo '<span class="text-alert">'.$message.'</span>';
                            Session::put('message', null);
                        }
                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                                  @foreach($edit_product as $pro)
                                <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{$pro->product_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                     <img src="{{URL::to('public/uploads/product/',$pro->product_image)}}" height="100" width="100"> 
                                   
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá bán sản phẩm</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" value="{{$pro->product_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea style="resize:none" rows="6" name="product_desc" class="form-control" id="exampleInputPassword1">{{$pro->product_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thông tin chi tiết</label>
                                    <textarea style="resize:none" rows="6" name="product_content" class="form-control" id="exampleInputPassword1">{{$pro->product_content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Danh mục</label>
                                    <select name="product_category" class="form-control input-sm m-bot15">
                                    @foreach($cate_product as $key => $cate)
                                        @if($cate->category_id==$pro->category_id)
                                        <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @else
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endif
                                    @endforeach
        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thương hiệu</label>
                                    <select name="product_brand" class="form-control input-sm m-bot15">
                                    @foreach($brand_product as $key => $brand)
                                        @if($cate->category_id==$pro->category_id)
                                        <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @else
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @endif
                                    @endforeach
        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hiển thị</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
        
                                    </select>
                                </div>
                                
                                <button type="submit" name="update_product" class="btn btn-info">Cap nhat</button>
                            </form>
                                @endforeach
                            </div>

                        </div>
                    </section>

            </div>
            
        </div>
@endsection
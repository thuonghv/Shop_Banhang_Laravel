@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm
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
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1"> 
                                    <!-- <input id="image" type="file" class="@error('img') is-invalid @enderror" name="product_image" onchange="return fileValidation()" style="margin-left: 5%;" /> -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá bán sản phẩm</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea style="resize:none" rows="6" name="product_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thông tin chi tiết</label>
                                    <textarea style="resize:none" rows="6" name="product_content" class="form-control" id="exampleInputPassword1" placeholder="Mô tả"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Danh mục</label>
                                    <select name="product_category" class="form-control input-sm m-bot15">
                                    @foreach($cate_product as $key => $cate)
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endforeach
        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thương hiệu</label>
                                    <select name="product_brand" class="form-control input-sm m-bot15">
                                    @foreach($brand_product as $key => $brand)
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
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
                                
                                <button type="submit" name="add_product" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            
        </div>
@endsection
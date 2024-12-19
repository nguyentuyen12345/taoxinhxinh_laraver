@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
				<section class="content-header">
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Chỉnh Sửa Sản Phẩm Mới</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{ route('products.index') }}" class="btn btn-primary">Trở về</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
                    <form action="{{ route('products.update', $product->id) }}" method="post" name="productForm" id="productForm">
                           @csrf
                              @method('PUT')
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="title">Tên sản phẩm</label>
                                                        <input type="text" name="title" id="title" class="form-control" placeholder="Tên sản phẩm" value="{{ $product->title }}">
                                                        <p class="error"></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="title">Slug</label>
                                                     <input type="text"  name="slug" id="slug" class="form-control"
                                                     placeholder="Slug" value="{{ $product->slug }}">
                                                         <p class="error"></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="description">Mô tả</label>
                                                        <textarea name="description" id="description" cols="30" rows="10"
                                                         class="summernote" placeholder="Description">{{$product->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   <div class="card mb-3">
                                        <div class="card-body">
                                            <h2 class="h4 mb-3">Hình ảnh sản phẩm</h2>
                                            <div id="image" class="dropzone dz-clickable">
                                                <div class="dz-message needsclick">
                                                    <br>Tải tập tin lên...<br><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" id="product-gallery">
                                        @if ($productImages->isNotEmpty())
                                          @foreach ($productImages as $image )
                                                <div class="col-md-3" id="image-row-{{ $image->id }}}">
                                                    <div class="card">
                                                        <input type="hienden" name="image_array" value="{{$image->id }}">
                                                        <img src ="{{  asset('uploads/product'.$image->image)}}" class="card-img-top" alt="">
                                                        <div class="card-body">
                                                        <a href="javascript:void(0)" onclick="deleteImage({{ $image->id }})" class="btn btn-danger">Delete</a>
                                                        </div>
                                            </div>
                                        </div>;
                                          @endforeach

                                        @endif
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h2 class="h4 mb-3">Giá</h2>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="price">Giá bán</label>
                                                        <input type="text" name="price" id="price" class="form-control"
                                                        placeholder="Giá gốc" value="{{ $product->price }}">
                                                         <p class="error"></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="compare_price">Giá khuyến mãi (nếu có)</label>
                                                        <input type="text" name="compare_price" id="compare_price"
                                                        class="form-control" placeholder="Giá khuyến mãi" value="{{ $product->compare_price}}">
                                                        <p class="text-muted mt-3">
                                                            Nhập giá trị thấp hơn giá gốc
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h2 class="h4 mb-3">Hàng tồn kho</h2>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="sku">Số lượng tồn kho</label>
                                                        <input type="text" name="sku" id="sku" class="form-control" placeholder="Nhập số lượng"
                                                         value="{{$product->sku }}">
                                                        <p class="error"></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="barcode">Mã vạch sản phẩm</label>
                                                        <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Nhập mã vạch"
                                                        value="{{ $product->barcode }}">
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h2 class="h4 mb-3">Trạng thái sản phẩm</h2>
                                            <div class="mb-3">
                                                <select name="status" id="status" class="form-control">
                                                    <option{{ ($product->status == 1)? 'selected':'' }}
                                                        value="1">Hoạt động</option>
                                                    <option{{ ($product->status == 0)? 'selected':'' }}
                                                        value="0">Khóa</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="h4  mb-3">Danh mục sản phẩm</h2>
                                            <div class="mb-3">
                                                <label for="category">Danh mục</label>
                                                <select name="category" id="category" class="form-control">
                                                    <option value="">Chọn danh mục</option>

                                                    @if ($categories->isNotEmpty())
                                                        @foreach ($categories as $category)
                                                        <option {{ ($product->category_id ==$category->id) ?'selected':'' }}
                                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                 <p class="error"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h2 class="h4 mb-3">Sản phẩm nổi bật</h2>
                                            <div class="mb-3">
                                                <select name="is_featured" id="is_featured" class="form-control">
                                                    <option {{ ($product->is_featured == 'No')? 'selected':'' }} value="No">Không</option>
                                                    <option {{ ($product->is_featured == 'No')? 'selected':'' }}  value="Yes">Có</option>
                                                </select>
                                                 <p class="error"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pb-5 pt-3">
                                <button type="submit"  class="btn btn-primary">Thêm sản phẩm</button>
                                <a href="{{ route('products.index') }}" class="btn btn-outline-dark ml-3">Hủy</a>
                            </div>
                        </div>
                    </form>
					<!-- /.card -->
				</section>
				<!-- /.content -->
@endsection
@section('customJs')
<script>
    $("#title").change(function(){
           let element = $(this);
            $("button[type=submit]").prop('disabled',true);
            $.ajax({
                url: '{{ route("getSlug") }}',
                type: 'POST',
                data:{title: element.val()} ,
                dataType: 'json',
                success: function(response) {
                    $("button[type=submit]").prop('disabled',false);
                    if(response["status"] ==true){
                        $("#slug").val(response["slug"]);
                    }
                }
          });
    });

    $("#productForm").submit(function(event){
        event.preventDefault();
        var formArray = $(this).serializeArray();  // Sử dụng FormData để gửi dữ liệu tệp (nếu có)
        // Vô hiệu hóa nút submit để tránh gửi nhiều lần
        $("button[type='submit']").prop('disabled', true);

    $.ajax({
       url: '{{ route("products.update", $product->id) }}',
        type: 'put',
        data: formArray,
        dataType: 'json',
        success: function(response){
            $("button[type='submit']").prop('disabled', false);
            $.ajax({
                url: '{{ route("products.update",$product->id) }}',
                type: 'put',
                data: formArray,
                dataType: 'json',
                success: function(response) {
                    $("button[type=submit]").prop('disabled',false);

                        if(response["status"] ==true)if(response.status === true){
                            $(".error").removeClass('invalid-feedback').html('');
                            $("input[type='text'], select, input[type='number']").removeClass('is-invalid');
                            window.location.href="{{ route('products.index') }}";
                            // Xử lý thành công ở đây (ví dụ: hiển thị thông báo)
                     }
                }
          });
             else {
                var errors = response.errors;
                // Xóa lỗi cũ
                $(".error").removeClass('invalid-feedback').html('');
                $("input[type='text'], select, input[type='number']").removeClass('is-invalid');

                // Hiển thị lỗi mới
                $.each(errors, function(key, value){
                    $(`#${key}`).addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(value);
                });
            }
        },
        error: function(){
            console.log("Có lỗi xảy ra");
            $("button[type='submit']").prop('disabled', false);  // Kích hoạt lại nút submit nếu có lỗi
        }
    });
});


Dropzone.autoDiscover = false;
$("#image").dropzone({
   url: "{{ route('product-images.update', ['id' => $product->id]) }}",
    maxFiles: 10,
    paramName:'image',
    params: {'product_id': '{{ $product->id }}'},
    addRemoveLinks: true,
    autoProcessQueue: true,
    acceptedFiles: "image/jpeg,image/png,image/gif",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(file, response) {
        var html = `<div class="col-md-3" id="image-row-${response.image_id}"><div class="card">
            <input type="hienden" name="image_array" value="${response.image_id}">
            <img src ="${response.ImagePath}" class="card-img-top" alt="">
            <div class="card-body">
            <a href="javascript:void(0)" onclick="deleteImage(${response.image_id})" class="btn btn-danger">Delete</a>
             </div>
                </div> </div>`;
          $("#product-gallery").append(html);
    },
    complete:function(file){
        this.removeFile(file);

    }
});

function deleteImage(id){
    if(confirm("bạn có muốn xóa ảnh không")){
        $.ajax({
            url:'{{ route("product-image.destroy") }}',
            type:'delete',
            data:{id:id},
            success:function(reponse){
                if (reponse.status == true){
                    alert(reponse.message);
                }else{
                    alert(reponse.message);
                }

            }
        });

    }

}
</script>
@endsection

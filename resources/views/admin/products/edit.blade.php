@extends('admin.layouts.parentlayout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Edit Product</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
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
                                                    <label for="title">Title</label>
                                                    <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ $product->title }}">
                                                    <p class="error"></p>	
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="title">Slug</label>
                                                    <input readonly type="text" name="slug" id="slug" class="form-control" placeholder="Slug" value="{{ $product->slug }}">
                                                    <p class="error"></p>	
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="district">District</label>
                                                    <input type="text" name="district" id="district" class="form-control" placeholder="District" value="{{ $product->district }}">
                                                    <p class="error"></p>	
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="description">Description</label>
                                                    <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description" value="{{ $product->description }}"></textarea>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>	                                                                      
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Media</h2>								
                                        <div id="image" class="dropzone dz-clickable">
                                            <div class="dz-message needsclick">    
                                                <br>Drop files here or click to upload.<br><br>                                            
                                            </div>
                                        </div>
                                    </div>
                                    @if($productImages->isNotEmpty())
                                    @foreach($productImages as $productimg)
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top img-thumbnail" src="{{ asset('uploads/product/'.$productimg->image) }}"/>
                                        <div class="card-body">
                                        <a href="{{ route('products.delete-product-image', $productimg->id) }}" class="btn btn-primary" >Delete</a>
                                        </div>
                                    </div>	
                                    @endforeach
                                    @endif                                                                      
                                </div>
                                <div class="row" id="hidden-input">
                                    
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Pricing</h2>								
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="price">Price</label>
                                                    <input type="text" name="price" id="price" class="form-control" placeholder="Price" value="{{ $product->price }}">
                                                    <p class="error"></p>	
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="compare_price">Compare at Price</label>
                                                    <input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price" value="{{ $product->compare_price }}">
                                                    <p class="text-muted mt-3">
                                                        To show a reduced price, move the product’s original price into Compare at price. Enter a lower value into Price.
                                                    </p>	
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>	                                                                      
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Inventory</h2>								
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="sku">SKU (Stock Keeping Unit)</label>
                                                    <input readonly type="text" name="sku" id="sku" class="form-control" placeholder="sku" value="{{ $product->sku }}">
                                                    <p class="error"></p>	
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="barcode">Barcode</label>
                                                    <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode" value="{{ $product->barcode }}">	
                                                </div>
                                            </div>   
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="quantity">Quantity</label>
                                                    <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Qty" value="{{ $product->qty }}">
                                                    <p class="error"></p>	
                                                </div>
                                            </div>                                         
                                        </div>
                                    </div>	                                                                      
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    <div class="card-body">	
                                        <h2 class="h4 mb-3">Product status</h2>
                                        <div class="mb-3">
                                            <select name="status" id="status" class="form-control">
                                                <option {{ ($product->status == 1)? 'selected': '' }} value="1">Active</option>
                                                <option {{ ($product->status == 0)? 'selected': '' }} value="0">Block</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> 
                                <div class="card">
                                    <div class="card-body">	
                                        <h2 class="h4  mb-3">Product category</h2>
                                        <div class="mb-3">
                                            <label for="category">Category</label>
                                            <select name="category" id="category" class="form-control">
                                                <option value="">Select a category</option>
                                                @if($categories->isNotEmpty())
                                                  @foreach($categories as $category)
                                                  <option {{ ($product->category_id == $category->id)? 'selected': '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                                  @endforeach
                                                @endif
                                            </select>
                                            <p class="error"></p>
                                        </div>
                                    </div>
                                </div> 
                                <div class="card mb-3">
                                    <div class="card-body">	
                                        <h2 class="h4 mb-3">Featured product</h2>
                                        <div class="mb-3">
                                            <select name="is_featured" id="is_featured" class="form-control">
                                                <option {{ ($product->is_featured == 'No')? 'selected': '' }} value="No">No</option>
                                                <option {{ ($product->is_featured == 'Yes')? 'selected': '' }} value="Yes">Yes</option>                                                
                                            </select>
                                            <p class="error"></p>
                                        </div>
                                    </div>
                                </div>                                 
                            </div>
                        </div>
						
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">Update</button>
							<a href="{{ route('products.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
					</div>
                    </form>
					<!-- /.card -->
				</section>
				<!-- /.content -->
                
@endsection

@section('customJs')
   <script>
    Dropzone.autoDiscover = false;
    let image_array = [];

    const dropzone = new Dropzone("#image", {
    url: "{{ route('temp-images.create') }}",
    maxFiles: 10,
    paramName: 'image',
    addRemoveLinks: true,
    acceptedFiles: "image/jpeg,image/png,image/gif",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    init: function() {
        this.on("addedfile", (file) => {
            file.previewElement.addEventListener("click", () => {
                this.removeFile(file);
            });
        });

        this.on("success", (file, response) => {
            file.upload.uuid = response.image_id;
            file.upload.path = response.ImagePath;
            image_array.push(file);
            $("#hidden-input").append(`<input type="hidden" name="image_array[]" value='${JSON.stringify(file)}'>`);
        });

        this.on("removedfile", (file) => {
            image_array = image_array.filter(f => f.upload.uuid !== file.upload.uuid);
            $("#hidden-input").find(`input[value='${JSON.stringify(file)}']`).remove();
        });
    }
});
   </script>
@endsection

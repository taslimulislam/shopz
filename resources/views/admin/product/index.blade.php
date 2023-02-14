@extends('admin.admin_layout.admin_main')
@section('admin_content')

<div class="content-header">
    <div class="align-items-center d-flex flex-wrap justify-content-between">
        <div class="page-header m-0">
            <h4 class="page-title">Product List</h4>
            <ul class="breadcrumbs">
                <li class="nav-item">
                    <a href="#">{{Request::segment(2) != ''? Request::segment(2):''}}</a>
                </li>
                <li class="separator">
                    {{ Request::segment(3) != ''? '>>':'' }}

                </li>
                <li class="nav-item">
                    <a href="#">{{Request::segment(3) != ''? Request::segment(3):''}}</a>
                </li>
            </ul>
        </div>
        <div class="d-flex flex-wrap">
            <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                class="btn btn-black btn-sm my-2 px-3 py-2">Add Product</button>
        </div>
    </div>

</div>
<div class="body-content">

    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table  class="table table-bordered table-striped table-hover text-center">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Product Name</th>
                            <th>Product Category</th>
                            <th>Product Unit</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $key=> $prod)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$prod->product_name}}</td>
                            <td>{{$prod->productCatrgory->category_name}}</td>
                            <td>{{$prod->productUnit->unit_name}}</td>
                            <td>{{$prod->status == 1?'active':'inactive'}}</td>
                            
                            <td>
                                <div class="d-flex justify-content-center">

                                    <button  class="btn btn-success btn-sm py-2" onClick="editcatFunc('{{ $prod->id }}')" ><i class="fa fa-edit" aria-hidden="true"></i>
                                    
                                    </button>
                                    <input type="hidden" id="url_{{ $prod->id }}" value="{{route('admin.product.edit',$prod->id)}}">
                                    <input type="hidden" id="up_url_{{ $prod->id }}" value="{{route('admin.product.update',$prod->id)}}">
                                    <form action="{{ route('admin.product.destroy',$prod->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"onclick="return confirm(' You want to delete?');" class="btn btn-danger btn-sm py-2 ms-1"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $product->links() }}
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12 row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="category_name" class="col-form-label">Product Name:</label>
                                <input type="text" class="form-control" name="product_name"placeholder="Product Name">
                            </div>
                            <div class="mb-3">
                                <label for="menu_url" class="col-form-label">Category:</label>
                                <select class="form-control form-select" name="category_id">
                                    @foreach($producCategory as $key => $cat)
                                    <option value="{{ $cat->id }}">{{$cat->category_name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="menu_url" class="col-form-label">Unit:</label>
                                <select class="form-control form-select" name="unit_id">
                                    @foreach($productUnit as $key => $un)
                                    <option value="{{ $un->id }}">{{$un->unit_name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="category_name" class="col-form-label">Product Model:</label>
                                <input type="text" class="form-control" name="product_model" placeholder="Product Model">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="category_name" class="col-form-label">Price:</label>
                                <input type="number" class="form-control" name="price" placeholder="Price">
                            </div>
                            
                            <div class="mb-3">
                                <label for="menu_url" class="col-form-label">Status:</label>
                                <select class="form-control form-select" name="status" id="status">
                                    <option value="1">active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="category_name" class="col-form-label">Product Details:</label>
                                <textarea name="product_detail" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="float-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="service_up" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12 row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="category_name" class="col-form-label">Product Name:</label>
                                <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name">
                            </div>
                            <div class="mb-3">
                                <label for="menu_url" class="col-form-label">Category:</label>
                                <select class="form-control form-select" name="category_id" id="category_id">
                                    @foreach($producCategory as $key => $cat)
                                    <option value="{{ $cat->id }}">{{$cat->category_name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="menu_url" class="col-form-label">Unit:</label>
                                <select class="form-control form-select" name="unit_id" id="unit_id">
                                    @foreach($productUnit as $key => $un)
                                    <option value="{{ $un->id }}">{{$un->unit_name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="category_name" class="col-form-label">Product Model:</label>
                                <input type="text" class="form-control" name="product_model" id="product_model" placeholder="Product Model">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="category_name" class="col-form-label">Price:</label>
                                <input type="number" class="form-control" name="price" id="price" placeholder="Price">
                            </div>
                            
                            <div class="mb-3">
                                <label for="menu_url" class="col-form-label">Status:</label>
                                <select class="form-control form-select" name="status" id="status">
                                    <option value="1">active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="category_name" class="col-form-label">Product Details:</label>
                                <textarea name="product_detail" id="product_detail" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="float-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/.body content-->
<script>
function editcatFunc(id) {

    var url = $('#url_'+id).val();
    var up_url = $('#up_url_'+id).val();

    $.ajax({
        type: "GET",
        dataType: 'json',
        url: url,
        
        success: function(res) {
            
            $('#product_name').val(res.product_name);
            $('#category_id').val(res.category_id);
            $('#price').val(res.price);
            $('#unit_id').val(res.unit_id);
            $('#product_model').val(res.product_model);
            $('#product_detail').text(res.product_detail);
            $('#status').val(res.status);
           
           
            $('#service_up').attr('action',up_url);
            $('#exampleModaledit').modal('show');
            
        }
    });
}



</script>

@endsection
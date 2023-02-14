@extends('admin.admin_layout.admin_main')
@section('admin_content')

<div class="content-header">
    <div class="align-items-center d-flex flex-wrap justify-content-between">
        <div class="page-header m-0">
            <h4 class="page-title">Unit List</h4>
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
                class="btn btn-black btn-sm my-2 px-3 py-2">Add Unit</button>
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
                            <th>Unit Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($unit as $key=> $un)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$un->unit_name}}</td>                           
                            <td>
                                <div class="d-flex justify-content-center">

                                    <button  class="btn btn-success btn-sm py-2" onClick="editunFunc('{{ $un->id }}')" ><i class="fa fa-edit" aria-hidden="true"></i>
                                    
                                    </button>
                                    <input type="hidden" id="url_{{ $un->id }}" value="{{route('admin.product-unit.edit',$un->id)}}">
                                    <input type="hidden" id="up_url_{{ $un->id }}" value="{{route('admin.product-unit.update',$un->id)}}">
                                    <form action="{{ route('admin.product-unit.destroy',$un->id) }}" method="POST">
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
                {{ $unit->links() }}
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Unit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.product-unit.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="unit_name" class="col-form-label">Unit:</label>
                        <input type="text" class="form-control" name="unit_name" id="unit_name" placeholder="Unit">
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
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Unit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="service_up" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="unit_name" class="col-form-label">Unit:</label>
                        <input type="text" class="form-control" name="unit_name" id="unit_namee" placeholder="Unit">
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
function editunFunc(id) {

    var url = $('#url_'+id).val();
    var up_url = $('#up_url_'+id).val();

    $.ajax({
        type: "GET",
        dataType: 'json',
        url: url,
        
        success: function(res) {
            
            $('#unit_namee').val(res.unit_name);
            $('#statuse').val(res.status);
           
           
            $('#service_up').attr('action',up_url);
            $('#exampleModaledit').modal('show');
            
        }
    });
}



</script>

@endsection


@extends('admin.admin_layout.admin_main')
@section('admin_content')
<div class="content-header">
    <div class="align-items-center d-flex flex-wrap justify-content-between">
        <div class="page-header m-0">
            <h4 class="page-title">Users List</h4>
            <ul class="breadcrumbs">
                <li class="nav-item">
                    <a href="#">{{Request::segment(2) != ''? Request::segment(2):''}}</a>
                </li>
                <li class="separator">
                    {{ Request::segment(2) != ''? '>>':'' }}

                </li>
                <li class="nav-item">
                    <a href="#">{{Request::segment(3) != ''? Request::segment(3):''}}</a>
                </li>
            </ul>
        </div>
        <div class="d-flex flex-wrap">
            <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                class="btn btn-black btn-sm my-2 px-3 py-2">Add User</button>
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
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <!-- <th>Image</th> -->
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key=> $user)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <!-- <td><img src="/storage/{{$user->photo}}" height="75" width="75" alt="" /></td> -->
                            <td>
                                <div class="d-flex justify-content-center">
                                    <button  class="btn btn-success btn-sm py-2" onClick="edituserFunc('{{ $user->id }}')" ><i class="fa fa-edit" aria-hidden="true"></i></button>
                                    <input type="hidden" id="url_{{ $user->id }}" value="{{route('admin.adduser.edit',$user->id)}}">
                                    <input type="hidden" id="up_url_{{ $user->id }}" value="{{route('admin.adduser.update',$user->id)}}">
                                    @if($user->id != auth()->user()->id)
                                    <form action="{{ route('admin.adduser.destroy',$user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"onclick="return confirm(' You want to delete?');" class="btn btn-danger btn-sm py-2 ms-1"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.adduser.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        
                    </div>
                    <div class="mb-3">
                        <label for="password" class="col-form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        
                    </div>
                    <div class="mb-3">
                        <label for="password" class="col-form-label">Confirm Password:</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                        
                    </div>
                    <div class="mb-3">
                        <label for="image" class="col-form-label">Image:</label>
                        <input type="file" name="image" id="image" class="form-control" placeholder="image">
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="user_up" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="namee" placeholder="Name">
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" name="email" id="emaile" placeholder="Email">
                        
                    </div>
                    <div class="mb-3">
                        <label for="password" class="col-form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        
                    </div>
                    <div class="mb-3">
                        <label for="password" class="col-form-label">Confirm Password:</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                        
                    </div>
                    <div class="mb-3">
                        <label for="image" class="col-form-label">Image:</label>
                        <input type="file" name="image" id="image" class="form-control" placeholder="image">
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
function edituserFunc(id) {

    var url = $('#url_'+id).val();
    var up_url = $('#up_url_'+id).val();

    $.ajax({
        type: "GET",
        dataType: 'json',
        url: url,
        
        success: function(res) {
            console.log(res.serv_title);
            
            $('#namee').val(res.name);
            $('#emaile').val(res.email);
            
           
            $('#user_up').attr('action',up_url);
            $('#exampleModaledit').modal('show');
            
        }
    });
}



</script>

@endsection
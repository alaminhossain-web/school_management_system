@extends('admin.master')

@section('title','Manage user')

@section('body')
<div class="row py-5">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header bg-light">
                <h3>Manage Teacher</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive export-table">
                    <table class="table"id="file-datatable" >
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Image</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Designation</td>
                                <td>Action</td>
                            </tr>
                            <tbody>
                                @if($users->isNotEmpty())
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>                                    <img src="{{ isset($user->profile_img) ? (asset( $user->profile_img)) : (asset('admin/assets/images/teacher.jpg'))}}" alt="" style="height: 70px">
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->designation }}
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('teacher.edit',$user->id)}}" class="btn btn-sm btn-secondary ms-2"><i class="fa fa-edit"></i></a>

                                            <form action="{{ route('teacher.destroy',$user->id)}}" method="post" >
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger ms-2 delete-item"><i class="fa fa-trash"></i> </button>
    
                                            </form>
                                        </td>
    
    
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </thead>
                    </table>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
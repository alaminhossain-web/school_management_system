@extends('admin.master')

@section('title','Manage role')

@section('body')
<div class="row py-5">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header bg-light">
                <h3>Manage role</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive export-table">
                    <table class="table"id="file-datatable" >
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Permissions</td>
                                <td>Created</td>
                                <td>Action</td>
                            </tr>
                            <tbody>
                                @if($roles->isNotEmpty())
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                    
                                        <td>{{ $role->name }}</td>
                                        <td>                                    {{ $role->permissions->pluck('name')->implode(', ') }}
                                        </td>
                                        <td>{{ $role->created_at->format('d M, Y') }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('role.edit',$role->id)}}" class="btn btn-sm btn-secondary ms-2"><i class="fa fa-edit"></i></a>

                                            <form action="{{ route('role.destroy',$role->id)}}" method="post" >
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
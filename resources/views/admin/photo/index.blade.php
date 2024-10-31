@extends('admin.master')

@section('title','Manage photo')

@section('body')
<div class="row py-5">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header bg-light">
                <h3>Manage photo</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive export-table">
                    <table class="table"id="file-datatable" >
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Permissions</td>
                                <td>Created By</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            <tbody>
                                @if($photos->isNotEmpty())
                                @foreach ($photos as $photo)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                    
                                        <td>{{ $photo->title }}</td>
                                        <td>                                    <img src="{{ asset( $photo->image)}}" alt="" style="height: 70px">
                                        </td>
                                       
                                        <td>{{ $photo->user->name }}</td>
                                        <td>{{ $photo->status == 1 ? 'Published':'Unpublished' }}</td>
                                        <td class="d-flex mt-4">
                                            <a href="{{ route('photo-gallery.edit',$photo->id)}}" class="btn btn-sm btn-secondary ms-2"><i class="fa fa-edit"></i></a>

                                            <form action="{{ route('photo-gallery.destroy',$photo->id)}}" method="post" >
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
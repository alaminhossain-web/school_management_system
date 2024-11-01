@extends('admin.master')

@section('title','Manage Blog')

@section('body')
<div class="row py-5">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header bg-light">
                <h3>Manage Blog</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive export-table">
                    <table class="table"id="responsive-datatable" >
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Image</td>
                                <td>Description</td>
                                <td>Created By</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            <tbody>
                                @if($blogs->isNotEmpty())
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                    
                                        <td>{{ $blog->title }}</td>
                                        <td>                                    <img src="{{ asset( $blog->image)}}" alt="" style="height: 70px">
                                        </td>
                                        <td>{!! $blog->description !!}</td>
                                        <td>{{ $blog->user->name }}</td>
                                        <td>{{ $blog->status == 1 ? 'Published':'Unpublished' }}</td>
                                        <td class="d-flex mt-5">
                                            <a href="{{ route('blog.edit',$blog->id)}}" class="btn btn-sm btn-secondary ms-2"><i class="fa fa-edit"></i></a>

                                            <form action="{{ route('blog.destroy',$blog->id)}}" method="post" >
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
@extends('admin.master')

@section('title','Manage Course Category')

@section('body')
<div class="row py-5">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header bg-light">
                <h3>Manage Course Category</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive export-table">
                    <table class="table"id="file-datatable" >
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Category Name </td>
                                <td>Title</td>
                                <td>Image</td>
                                <td>Description</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            <tbody>
                                @foreach ($classContents as $classContent)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $classContent->classCategory->name }}</td>
                                        <td>{{ $classContent->title }}</td>
                                        <td>
                                            <img src="{{ asset( $classContent->image)}}" alt="" style="height: 70px">
                                        </td>
                                        <td>{!! $classContent->description !!}</td>

                                        <td>{{ $classContent->status == 1 ? 'Published':'Unpublished' }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('class.edit',$classContent->id)}}" class="btn btn-sm btn-secondary ms-2"><i class="fa fa-edit"></i></a>

                                            <form action="{{ route('class.destroy',$classContent->id)}}" method="post" id="deleteItem">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger ms-2 delete-item"><i class="fa fa-trash"></i> </button>
    
                                            </form>
                                        </td>
    
    
                                    </tr>
                                @endforeach
                            </tbody>
                        </thead>
                    </table>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
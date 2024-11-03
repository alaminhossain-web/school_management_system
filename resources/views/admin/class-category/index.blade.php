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
                <button onclick="history.back()" class="btn btn-primary mb-3 float-end">Back</button>

                <div class="table-responsive export-table">
                    <table class="table"id="file-datatable" >
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Category of </td>
                                <td>Name</td>
                                <td>Image</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            <tbody>
                                @foreach ($classCategories as $classCategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $classCategory->class_category_id != 0 ? $classCategory->classCategory->name : 'Parent' }}</td>
                                        <td><a href="{{ route('class-category.index',['category-id' =>$classCategory->id])}}">{{ $classCategory->name }}</a></td>
                                        <td>
                                            <img src="{{ asset( $classCategory->image)}}" alt="" style="height: 70px">
                                        </td>
                                        <td>{{ $classCategory->status == 1 ? 'Published':'Unpublished' }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('class-category.create',['category-id' =>$classCategory->id])}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a>

                                            <a href="{{ route('class-category.edit',$classCategory->id)}}" class="btn btn-sm btn-secondary ms-2"><i class="fa fa-edit"></i></a>

                                            <form action="{{ route('class-category.destroy',$classCategory->id)}}" method="post" id="deleteItem">
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
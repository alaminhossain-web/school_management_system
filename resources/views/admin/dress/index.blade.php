@extends('admin.master')

@section('title','Manage dress')

@section('body')
<div class="row py-5">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header bg-light">
                <h3>Manage dress</h3>
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
                                <td>Action</td>
                            </tr>
                            <tbody>
                                @if($dresses->isNotEmpty())
                                @foreach ($dresses as $dress)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                    
                                        <td>{{ $dress->title }}</td>
                                        <td>                                    <img src="{{ asset( $dress->image)}}" alt="" style="height: 70px">
                                        </td>
                                       
                                        <td>{{ $dress->user->name }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('dress.edit',$dress->id)}}" class="btn btn-sm btn-secondary ms-2"><i class="fa fa-edit"></i></a>

                                            <form action="{{ route('dress.destroy',$dress->id)}}" method="post" >
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
@extends('admin.master')

@section('title','Manage activity')

@section('body')
<div class="row py-5">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header bg-light">
                <h3>Manage Activity</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive export-table">
                    <table class="table"id="file-datatable" >
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Title</td>
                                <td>Image</td>
                                <td>Description</td>
                                <td>Created By</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            <tbody>
                                @if($activities->isNotEmpty())
                                @foreach ($activities as $activity)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                    
                                        <td>{{ $activity->title }}</td>
                                        <td>                                    <img src="{{ asset( $activity->image)}}" alt="" style="height: 70px">
                                        </td>
                                        <td>{!! $activity->description !!}</td>
                                       
                                        <td>{{ $activity->user->name }}</td>
                                        <td>{{ $activity->status == 1 ? 'Published':'Unpublished' }}</td>
                                        <td class="d-flex mt-4">
                                            <a href="{{ route('activity.edit',$activity->id)}}" class="btn btn-sm btn-secondary ms-2"><i class="fa fa-edit"></i></a>

                                            <form action="{{ route('activity.destroy',$activity->id)}}" method="post" >
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
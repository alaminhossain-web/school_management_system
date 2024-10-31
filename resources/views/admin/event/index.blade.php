@extends('admin.master')

@section('title','Manage Event')

@section('body')
<div class="row py-5">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header bg-light">
                <h3>Manage Event</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive export-table">
                    <table class="table"id="file-datatable" >
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
                                @if($events->isNotEmpty())
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                    
                                        <td>{{ $event->title }}</td>
                                        <td>                                    <img src="{{ asset( $event->image)}}" alt="" style="height: 70px">
                                        </td>
                                        <td>{!! $event->description !!}</td>
                                        <td>{{ $event->user->name }}</td>
                                        <td>{{ $event->status == 1 ? 'Published':'Unpublished' }}</td>
                                        <td class="d-flex mt-5">
                                            <a href="{{ route('event.edit',$event->id)}}" class="btn btn-sm btn-secondary ms-2"><i class="fa fa-edit"></i></a>

                                            <form action="{{ route('event.destroy',$event->id)}}" method="post" >
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
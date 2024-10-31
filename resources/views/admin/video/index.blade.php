@extends('admin.master')

@section('title','Manage video')

@section('body')
<div class="row py-5">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header bg-light">
                <h3>Manage video</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive export-table">
                    <table class="table"id="file-datatable" >
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Videos</td>
                                <td>Created By</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            <tbody>
                                @if($videos->isNotEmpty())
                                @foreach ($videos as $video)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                    
                                        <td>{{ $video->title }}</td>
                                        <td>                                    
                                            {!! $video->video !!}

                                        </td>
                                       
                                        <td>{{ $video->user->name }}</td>
                                        <td>{{ $video->status == 1 ? 'Published':'Unpublished' }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('video-gallery.edit',$video->id)}}" class="btn btn-sm btn-secondary ms-2"><i class="fa fa-edit"></i></a>

                                            <form action="{{ route('video-gallery.destroy',$video->id)}}" method="post" >
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
@extends('admin.master')

@section('title',(isset($photo) ? 'Edit' :'Create') . ' Photo')

@section('body')
    <div class="row py-5">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{isset($photo) ? 'Edit' :'Create'}} Photo</h3>
                </div>
                <div class="card-body">
                    <form action="{{ isset($photo) ? route('photo-gallery.update',$photo) : route('photo-gallery.store') }}" method="post" enctype="multipart/form-data">
                    @if(isset($photo))
                        @method('put')
                    @endif
                    @csrf
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Title</label>
                        <div class="col-md-8">
                            <input type="text" name="title" class="form-control" value="{{ isset($photo) ? $photo->title :''}}" placeholder="Title">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Image</label>
                        <div class="col-md-8">
                            <input type="file" name="image" class="form-control" placeholder="Image" accept="image/*" />
                            @if (isset($photo))
                            <div class="mt-2">
                                <img src="{{ asset( $photo->image)}}" alt="" style="height: 80px">
                            </div>
                                
                            @endif
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Status</label>
                        <div class="col-md-8">
                            <div class="material-switch">
                                <input id="someSwitchOptionInfo" name="status" type="checkbox" {{ isset($photo) && $photo->status == 0 ? '' : 'checked' }}>
                                <label for="someSwitchOptionInfo" class="label-info"></label>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-info" value="{{isset($photo) ? 'Update' :'Create'}} photo">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
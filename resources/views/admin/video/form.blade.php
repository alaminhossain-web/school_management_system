@extends('admin.master')

@section('title', (isset($video) ? 'Edit' : 'Create') . ' Video')

@section('body')
    <div class="row py-5">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{isset($video) ? 'Edit' :'Create'}} Video</h3>
                </div>
                <div class="card-body">
                    <form action="{{ isset($video) ? route('video-gallery.update',$video) : route('video-gallery.store') }}" method="post" >
                    @if(isset($video))
                        @method('put')
                    @endif
                    @csrf
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Title</label>
                        <div class="col-md-8">
                            <input type="text" name="title" class="form-control" value="{{ isset($video) ? $video->title :''}}" placeholder="Title">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="video" class="col-md-4">Video Iframe</label>
                        <div class="col-md-8">
                            <textarea name="video" class="form-control" id="video" cols="30" rows="10">
                                {{ isset($video) ? $video->video :''}}
                            </textarea>
                            
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Status</label>
                        <div class="col-md-8">
                            <div class="material-switch">
                                <input id="someSwitchOptionInfo" name="status" type="checkbox" {{ isset($video) && $video->status == 0 ? '' : 'checked' }}>
                                <label for="someSwitchOptionInfo" class="label-info"></label>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-info" value="{{isset($video) ? 'Update' :'Create'}} video">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
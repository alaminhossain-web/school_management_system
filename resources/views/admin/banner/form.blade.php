@extends('admin.master')

@section('title',(isset($banner) ? 'Edit' :'Create') . ' Banner')

@section('body')
    <div class="row py-5">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{isset($banner) ? 'Edit' :'Create'}} Banner</h3>
                </div>
                <div class="card-body">
                    <form action="{{ isset($banner) ? route('banner.update',$banner) : route('banner.store') }}" method="post" enctype="multipart/form-data">
                    @if(isset($banner))
                        @method('put')
                    @endif
                    @csrf
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Title</label>
                        <div class="col-md-8">
                            <input type="text" name="title" class="form-control" value="{{ isset($banner) ? $banner->title :''}}" placeholder="Title">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Image</label>
                        <div class="col-md-8">
                            <input type="file" name="image" class="form-control" placeholder="Image" accept="image/*" />
                            @if (isset($banner))
                            <div class="mt-2">
                                <img src="{{ asset( $banner->image)}}" alt="" style="height: 80px">
                            </div>
                                
                            @endif
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Status</label>
                        <div class="col-md-8">
                            <div class="material-switch">
                                <input id="someSwitchOptionInfo" name="status" type="checkbox" {{ isset($banner) && $banner->status == 0 ? '' : 'checked' }}>
                                <label for="someSwitchOptionInfo" class="label-info"></label>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-info" value="{{isset($banner) ? 'Update' :'Create'}} banner">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
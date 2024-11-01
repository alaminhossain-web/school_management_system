@extends('admin.master')

@section('title',(isset($blog) ? 'Edit' :'Create') . ' Blog')

@section('body')
    <div class="row py-5">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{isset($blog) ? 'Edit' :'Create'}} Blog</h3>
                </div>
                <div class="card-body">
                    <form action="{{ isset($blog) ? route('blog.update',$blog) : route('blog.store') }}" method="post" enctype="multipart/form-data">
                    @if(isset($blog))
                        @method('put')
                    @endif
                    @csrf
                   
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Title</label>
                        <div class="col-md-8">
                            <input type="text" name="title" class="form-control" value="{{ isset($blog) ? $blog->title :''}}" placeholder="Title">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Image</label>
                        <div class="col-md-8">
                            <input type="file" name="image" class="form-control" placeholder="Image" accept="image/*" />
                            @if (isset($blog))
                            <div class="mt-2">
                                <img src="{{ asset( $blog->image)}}" alt="" style="height: 80px">
                            </div>
                                
                            @endif
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Description</label>
                        <div class="col-md-8">
                            <textarea name="description" id="summernote" cols="30" rows="10">
                                @if (isset($blog))
                                {{ $blog->description }}
                                @endif
                            </textarea>
                            
                           
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Status</label>
                        <div class="col-md-8">
                            <div class="material-switch">
                                <input id="someSwitchOptionInfo" name="status" type="checkbox" {{ isset($blog) && $blog->status == 0 ? '' : 'checked' }}>
                                <label for="someSwitchOptionInfo" class="label-info"></label>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-info" value="{{isset($blog) ? 'Update' :'Create'}} blog">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
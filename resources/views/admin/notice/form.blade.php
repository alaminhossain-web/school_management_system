@extends('admin.master')

@section('title',(isset($notice) ? 'Edit' :'Create') . ' Notice')

@section('body')
    <div class="row py-5">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{isset($notice) ? 'Edit' :'Create'}} Notice</h3>
                </div>
                <div class="card-body">
                    <form action="{{ isset($notice) ? route('notice.update',$notice) : route('notice.store') }}" method="post" >
                    @if(isset($notice))
                        @method('put')
                    @endif
                    @csrf
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Title</label>
                        <div class="col-md-8">
                            <input type="text" name="title" class="form-control" value="{{ isset($notice) ? $notice->title :''}}" placeholder="Title">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="description" class="col-md-4">Description</label>
                        <div class="col-md-8">
                            <textarea id="summernote" name="description" class="form-control" id="description" cols="30" rows="10">
                                @if (isset($notice))
                                    {{ $notice->description }}
                                @endif
                            </textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Status</label>
                        <div class="col-md-8">
                            <div class="material-switch">
                                <input id="someSwitchOptionInfo" name="status" type="checkbox" {{ isset($notice) && $notice->status == 0 ? '' : 'checked' }}>
                                <label for="someSwitchOptionInfo" class="label-info"></label>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-info" value="{{isset($notice) ? 'Update' :'Create'}} notice">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
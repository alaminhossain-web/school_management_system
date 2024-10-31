@extends('admin.master')

@section('title',(isset($event) ? 'Edit' :'Create') . ' Event')

@section('body')
    <div class="row py-5">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{isset($event) ? 'Edit' :'Create'}} Event</h3>
                </div>
                <div class="card-body">
                    <form action="{{ isset($event) ? route('event.update',$event) : route('event.store') }}" method="post" enctype="multipart/form-data">
                    @if(isset($event))
                        @method('put')
                    @endif
                    @csrf
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Title</label>
                        <div class="col-md-8">
                            <input type="text" name="title" class="form-control" value="{{ isset($event) ? $event->title :''}}" placeholder="Title">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Image</label>
                        <div class="col-md-8">
                            <input type="file" name="image" class="form-control" placeholder="Image" accept="image/*" />
                            @if (isset($event))
                            <div class="mt-2">
                                <img src="{{ asset( $event->image)}}" alt="" style="height: 80px">
                            </div>
                                
                            @endif
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Description</label>
                        <div class="col-md-8">
                            <textarea name="description" id="summernote" >
                                @if (isset($event))
                            {{ $event->description }}   
                            @endif
                            </textarea>
                            
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Start Date</label>
                        <div class="col-md-8">
                            <input type="date" name="start_date" class="form-control" value="{{ isset($event) ? $event->start_date :''}}" placeholder="Title">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">End Date</label>
                        <div class="col-md-8">
                            <input type="date" name="end_date" class="form-control" value="{{ isset($event) ? $event->end_date :''}}" placeholder="Title">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Status</label>
                        <div class="col-md-8">
                            <div class="material-switch">
                                <input id="someSwitchOptionInfo" name="status" type="checkbox" {{ isset($event) && $event->status == 0 ? '' : 'checked' }}>
                                <label for="someSwitchOptionInfo" class="label-info"></label>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-info" value="{{isset($event) ? 'Update' :'Create'}} event">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('admin.master')

@section('title',isset($dress) ? 'Edit' :'Create' . 'Dress')

@section('body')
    <div class="row py-5">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{isset($dress) ? 'Edit' :'Create'}} Dress</h3>
                </div>
                <div class="card-body">
                    <form action="{{ isset($dress) ? route('dress.update',$dress) : route('dress.store') }}" method="post" enctype="multipart/form-data">
                    @if(isset($dress))
                        @method('put')
                    @endif
                    @csrf
                    <input type="hidden" name="course_category_id" class="form-control" value="{{ $_GET['category-id'] ?? 0 }}">
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Title</label>
                        <div class="col-md-8">
                            <input type="text" name="title" class="form-control" value="{{ isset($dress) ? $dress->title :''}}" placeholder="Title">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Image</label>
                        <div class="col-md-8">
                            <input type="file" name="image" class="form-control" placeholder="Image" accept="image/*" />
                            @if (isset($dress))
                            <div class="mt-2">
                                <img src="{{ asset( $dress->image)}}" alt="" style="height: 80px">
                            </div>
                                
                            @endif
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Status</label>
                        <div class="col-md-8">
                            <div class="material-switch">
                                <input id="someSwitchOptionInfo" name="status" type="checkbox" {{ isset($dress) && $dress->status == 0 ? '' : 'checked' }}>
                                <label for="someSwitchOptionInfo" class="label-info"></label>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-info" value="{{isset($dress) ? 'Update' :'Create'}} Dress">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
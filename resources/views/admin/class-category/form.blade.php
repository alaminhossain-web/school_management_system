@extends('admin.master')

@section('title',(isset($classCategory) ? 'Edit' :'Create') . ' Class Category')

@section('body')
    <div class="row py-5">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{isset($classCategory) ? 'Edit' :'Create'}} Class Category</h3>
                </div>
                <div class="card-body">
                    <form action="{{ isset($classCategory) ? route('class-category.update',$classCategory) : route('class-category.store') }}" method="post" enctype="multipart/form-data">
                    @if(isset($classCategory))
                        @method('put')
                    @endif
                    @csrf
                    <input type="hidden" name="class_category_id" class="form-control" 
                    value="{{ isset($classCategory) ? $classCategory->class_category_id : (request()->get('category-id') ?? 0) }}">

                    <div class="row mt-3">
                        <label for="" class="col-md-4">Category Name</label>
                        <div class="col-md-8">
                            <input type="text" name="name" class="form-control" value="{{ isset($classCategory) ? $classCategory->name :''}}" placeholder="Category Name">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Category Image</label>
                        <div class="col-md-8">
                            <input type="file" name="image" class="form-control" placeholder="Category Image" accept="image/*" />
                            @if (isset($classCategory))
                            <div class="mt-2">
                                <img src="{{ asset( $classCategory->image)}}" alt="" style="height: 80px">
                            </div>
                                
                            @endif
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Category Status</label>
                        <div class="col-md-8">
                            <div class="material-switch">
                                <input id="someSwitchOptionInfo" name="status" type="checkbox" {{ isset($classCategory) && $classCategory->status == 0 ? '' : 'checked' }}>
                                <label for="someSwitchOptionInfo" class="label-info"></label>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-info" value="{{isset($classCategory) ? 'Update' :'Create'}} class Category">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('admin.master')

@section('title',(isset($classContent) ? 'Edit' :'Create') . ' Class Content')

@section('body')
    <div class="row py-5">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{isset($classContent) ? 'Edit' :'Create'}} Class Content</h3>
                </div>
                <div class="card-body">
                    <form action="{{ isset($classContent) ? route('class.update',$classContent) : route('class.store') }}" method="post" enctype="multipart/form-data">
                    @if(isset($classContent))
                        @method('put')
                    @endif
                    @csrf
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Select Category</label>
                        <div class="col-md-8">
                            <select name="class_category_id" class="form-control" id="">
                                <option >--Select Category--</option>
                                @foreach ($classCategories as $category)
                                <option value="{{ $category->id }}" {{ (isset($classContent) && $category->id == $classContent->class_category_id) ? 'selected' : ''}} >{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Title</label>
                        <div class="col-md-8">
                            <input type="text" name="title" class="form-control" value="{{ isset($classContent) ? $classContent->title :''}}" placeholder="Title">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Image</label>
                        <div class="col-md-8">
                            <input type="file" name="image" class="form-control" placeholder="Image" accept="image/*" />
                            @if (isset($classContent))
                            <div class="mt-2">
                                <img src="{{ asset( $classContent->image)}}" alt="" style="height: 80px">
                            </div>
                                
                            @endif
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Description</label>
                        <div class="col-md-8">
                            <textarea name="description" id="summernote" cols="30" rows="10">
                                @if (isset($classContent))
                                {{ $classContent->description }}
                                @endif
                            </textarea>
                            
                           
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Status</label>
                        <div class="col-md-8">
                            <div class="material-switch">
                                <input id="someSwitchOptionInfo" name="status" type="checkbox" {{ isset($classContent) && $classContent->status == 0 ? '' : 'checked' }}>
                                <label for="someSwitchOptionInfo" class="label-info"></label>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-info" value="{{isset($classContent) ? 'Update' :'Create'}} Class Content">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('admin.master')

@section('title',isset($permission) ? 'Edit' :'Create' . 'Permission')

@section('body')
    <div class="row py-5">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{isset($permission) ? 'Edit' :'Create'}} Permission</h3>
                </div>
                <div class="card-body">
                    <form action="{{ isset($permission) ? route('permission.update',$permission) : route('permission.store') }}" method="post" enctype="multipart/form-data">
                    @if(isset($permission))
                        @method('put')
                    @endif
                    @csrf
                    {{-- <input type="hidden" name="course_category_id" class="form-control" value="{{ $_GET['category-id'] ?? 0 }}"> --}}
                    <div class="row mt-3 ">
                        <label for="permissionName" class="col-md-4">Permission Name</label>
                        <div class="col-md-8">
                            <input type="text" name="name" id="permissionName" class="form-control" value="{{ isset($permission) ? $permission->name :''}}" placeholder="Permission Name">
                            @error('name')
                            <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mt-5">
                        <label for="" class="col-md-4"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-info" value="{{isset($permission) ? 'Update' :'Create'}} Permission">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
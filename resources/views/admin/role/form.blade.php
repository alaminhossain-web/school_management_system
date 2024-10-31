@extends('admin.master')

@section('title',isset($role) ? 'Edit' :'Create' . 'Role')

@section('body')
    <div class="row py-5">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{isset($role) ? 'Edit' :'Create'}} Role</h3>
                </div>
                <div class="card-body">
                    <form action="{{ isset($role) ? route('role.update',$role) : route('role.store') }}" method="post" enctype="multipart/form-data">
                    @if(isset($role))
                        @method('put')
                    @endif
                    @csrf
                    <div class="row mt-3 ">
                        <label for="roleName" class="col-md-4">Role Name</label>
                        <div class="col-md-8">
                            <input type="text" name="name" id="roleName" class="form-control" value="{{ isset($role) ? $role->name :''}}" placeholder="Role Name">
                            @error('name')
                            <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="roleName" class="col-md-4">Available Permissions</label>
                        <div class="col-md-8">
                            <div class="d-flex flex-wrap">
                        @if ($permissions->isNotEmpty())
                        @foreach ($permissions as $data)
                        <div class="ms-3">
                            
                                <input {{ isset($role) ?(($hasPermissions->contains($data->name)) ? 'checked' : '') : '' }} type="checkbox" class="rounded" id="permission-{{ $data->id }}" name="permission[]" value="{{ $data->name }}"> 
                                <label for="permission-{{ $data->id }}">{{ $data->name }}</label>
                            
                        </div>
                        @endforeach
                        @endif
                       
                            </div>
                            @error('permission')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>
                    <div class="row mt-5">
                        <label for="" class="col-md-4"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-info" value="{{isset($role) ? 'Update' :'Create'}} role">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
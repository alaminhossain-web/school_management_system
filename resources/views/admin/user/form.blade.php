@extends('admin.master')

@section('title',isset($user) ? 'Edit' :'Create' . 'User')

@section('body')
    <div class="row py-5">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{isset($user) ? 'Edit' :'Create'}} User</h3>
                </div>
                <div class="card-body">
                    <form action="{{ isset($user) ? route('user.update',$user) : route('user.store') }}" method="post" enctype="multipart/form-data">
                    @if(isset($user))
                        @method('put')
                    @endif
                    @csrf
                    <div class="row mt-3 ">
                        <label for="userName" class="col-md-4">Name</label>
                        <div class="col-md-8">
                            <input type="text" name="name" id="userName" class="form-control" value="{{ isset($user) ? $user->name :''}}" placeholder="Enter Your Name">
                            @error('name')
                            <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3 ">
                        <label for="userEmail" class="col-md-4">Email</label>
                        <div class="col-md-8">
                            <input type="email" name="email" id="userEmail" class="form-control" value="{{ isset($user) ? $user->email :''}}" placeholder="Enter Email Address">
                            @error('email')
                            <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="userPassword" class="col-md-4">Password</label>
                        <div class="col-md-8">
                            <input type="password" name="password" id="userPassword" class="form-control" placeholder="Enter New Password">
                            <small class="form-text text-muted">Leave blank to keep the current password.</small>
                            @error('password')
                                <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <label for="userName" class="col-md-4">Available users</label>
                        <div class="col-md-8">
                            <div class="d-flex flex-wrap">
                        @if ($roles->isNotEmpty())
                        @foreach ($roles as $data)
                        <div class="ms-3">
                            
                                <input {{ isset($user) ?(($hasRoles->contains($data->id)) ? 'checked' : '') : '' }} type="checkbox" class="rounded" id="role-{{ $data->id }}" name="role[]" value="{{ $data->name }}"> 
                                <label for="role-{{ $data->id }}">{{ $data->name }}</label>
                            
                        </div>
                        @endforeach
                        @endif
                       
                            </div>
                            @error('role')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>
                    <div class="row mt-5">
                        <label for="" class="col-md-4"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-info" value="{{isset($user) ? 'Update' :'Create'}} user">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('admin.master')

@section('title',(isset($user) ? 'Edit' :'Create') . ' Teacher')

@section('body')
    <div class="row py-5">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{isset($user) ? 'Edit' :'Create'}} Teacher</h3>
                </div>
                <div class="card-body">
                    <form action="{{ isset($user) ? route('teacher.update',$user) : route('teacher.store') }}" method="post" enctype="multipart/form-data">
                    @if(isset($user))
                        @method('put')
                    @endif
                    @csrf
                    <div class="row mt-3 ">
                        <label for="userName" class="col-md-4">Profile Image</label>
                        <div class="col-md-8">
                            <input type="file" name="profile_img" id="userName" class="form-control" placeholder="Image" accept="image/*">
                            @if (isset($user))
                            <div class="mt-2">
                                <img src="{{ asset( $user->profile_img)}}" alt="" style="height: 80px">
                            </div>
                                
                            @endif
                            @error('profile_img')
                            <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
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
                    
                    <div class="row mt-3 ">
                        <label for="userEmail" class="col-md-4">Designation</label>
                        <div class="col-md-8">
                            <textarea name="designation" class="form-control" cols="30" rows="5">{{ isset($user) ? $user->designation :''}}</textarea>
                            @error('designation')
                            <p class="mt-1 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mt-5">
                        <label for="" class="col-md-4"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-info" value="{{isset($user) ? 'Update' :'Create'}} Teacher">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
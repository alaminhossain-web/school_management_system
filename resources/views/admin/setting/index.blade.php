@extends('admin.master')

@section('title','Manage Setting')

@section('body')
<!-- ROW-3 OPEN -->
<div class="row py-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header  bg-light">
                <h3 class="card-title">Manage Settings</h3>
            </div>
            <div class="card-body p-6">
                <div class="example">
                    <div class="d-sm-flex">
                        <div class="panel panel-primary tabs-style-4">
                            <div class="tab-menu-heading border br-5 me-3 my-2">
                                <div class="tabs-menu">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs flex-column">
                                        <li><a href="#logo" class="active text-default vertical-tabs mb-2" data-bs-toggle="tab"> Logo</a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tabs-style-4 flex-2 border br-5">
                            <div class="panel-body tabs-menu-body border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="logo">
                                        <div class="row ">
                                            <div class="col-lg-8 col-xl-8 col-md-12 col-sm-12">
									<div class="card box-shadow-0">
										<div class="card-header border-bottom">
											<h4 class="card-title">Logo Setting</h4>
										</div>
										<div class="card-body">
											<form action="{{ route('logo.setting')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
													<label for="exampleInputEmail2">Favicon Image</label>
													<input type="file" name="favicon_image" class="form-control" placeholder="Image" accept="image/*" />
                                                @if (isset($setting))
                                                <div class="mt-2">
                                                    <img src="{{ asset( $setting->favicon_image)}}" alt="" style="height: 80px">
                                                </div>
                                                    
                                                @endif

												</div>
												<div class="form-group">
													<label for="exampleInputEmail2">Logo Image</label>
													<input type="file" name="logo_image" class="form-control" placeholder="Image" accept="image/*" />
                                                @if (isset($setting))
                                                <div class="mt-2">
                                                    <img src="{{ asset( $setting->logo_image)}}" alt="" style="height: 80px">
                                                </div>
                                                    
                                                @endif
												</div>
												<button type="submit" class="btn btn-primary mt-3">Submit</button>
											</form>
										</div>
									</div>
								</div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ROW-3 CLOSED -->

@endsection
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
                                        <li><a href="#general" class="active text-default vertical-tabs mb-2" data-bs-toggle="tab"> General </a></li>
                                        <li><a href="#logo" class=" text-default vertical-tabs mb-2" data-bs-toggle="tab"> Logo & Icon </a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tabs-style-4 flex-2 border br-5">
                            <div class="panel-body tabs-menu-body border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="general">
                                        <div class="row ">
                                            <div class="col-lg-8 col-xl-12 col-md-12 col-sm-12">
									<div class="card box-shadow-0">
										<div class="card-header border-bottom">
											<h4 class="card-title">General Setting</h4>
										</div>
										<div class="card-body">
											<form action="{{ route('general.setting')}}" method="post">
                                                @csrf
                                                <div class="form-group">
													<label for="data1">Site Title</label>
													<input type="text" name="site_title" class="form-control" placeholder="Site Title" value="{{ isset($setting) ? $setting->site_title :''}}" />
                                                    
                                               
												</div>
												<div class="form-group">
													<label for="data2">Tagline</label>
													<input type="text" name="tagline" class="form-control" placeholder="Tagline" value="{{ isset($setting) ? $setting->site_title :''}}"  />
                                
												</div>
                                                <div class="form-group">
													<label for="data2">Meta Description</label>
                                                    <textarea name="meta_description" id="summernote" cols="20" class="form-control" rows="5" placeholder="Meta Description" >
                                                        @if (isset($setting))
                                                            {{ $setting->meta_description }}
                                                        @endif
                                                    </textarea>
													
                                
												</div>
                                                <div class="form-group">
													<label for="data2">School Email Address</label>
													<input type="email" name="company_email" class="form-control" placeholder="Email Address" value="{{ isset($setting) ? $setting->company_email :''}}"  />
                                
												</div>
                                                <div class="form-group">
													<label for="data2">School Address</label>
													<input type="text" name="company_address" class="form-control" placeholder="Address" value="{{ isset($setting) ? $setting->company_address :''}}" />
                                
												</div>
                                                <div class="form-group">
													<label for="data2">Contact Number</label>
													<input type="number" name="company_phone" class="form-control" placeholder="Contact Number" value="{{ isset($setting) ? $setting->company_phone :''}}" />
                                
												</div>
                                                <div class="form-group">
													<label for="data2">Footer Credit</label>
													<input type="text" name="footer_credit" class="form-control" placeholder="Footer Credit" value="{{ isset($setting) ? $setting->footer_credit :''}}"  />
                                
												</div>
												<button type="submit" class="btn btn-primary mt-3">Submit</button>
											</form>
										</div>
									</div>
								</div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="logo">
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
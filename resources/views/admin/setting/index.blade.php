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
                                        <li><a href="#chairman" class=" text-default vertical-tabs mb-2" data-bs-toggle="tab"> Chairman </a></li>
                                        <li><a href="#social" class=" text-default vertical-tabs mb-2" data-bs-toggle="tab"> Social </a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tabs-style-4 flex-2 border br-5">
                            <div class="panel-body tabs-menu-body border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="general">
                                        @include('admin.setting.partial.general_form')
                                    </div>
                                    <div class="tab-pane" id="logo">
                                        @include('admin.setting.partial.logo_form')
                                    </div>
                                    <div class="tab-pane" id="chairman">
                                        @include('admin.setting.partial.chairman_form')
                                    </div>
                                    <div class="tab-pane" id="social">
                                        @include('admin.setting.partial.social_form')
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
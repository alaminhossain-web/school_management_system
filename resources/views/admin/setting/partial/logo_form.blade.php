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
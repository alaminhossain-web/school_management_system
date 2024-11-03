<div class="row ">
    <div class="col-lg-8 col-xl-10 col-md-12 col-sm-12">
<div class="card box-shadow-0">
<div class="card-header border-bottom">
    <h4 class="card-title">Chairman Information</h4>
</div>
<div class="card-body">
    <form action="{{ route('chairman.setting')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail2">Chairman Image</label>
            <input type="file" name="chairman_image" class="form-control" placeholder="Image" accept="image/*" />
        @if (isset($setting))
        <div class="mt-2">
            <img src="{{ asset( $setting->chairman_image)}}" alt="" style="height: 80px">
        </div>
            
        @endif

        </div>
        <div class="form-group">
            <label for="exampleInputEmail2">Chairman Name</label>
            <input type="text" name="chairman_name" class="form-control" placeholder="Chairman Name" value="{{ isset($setting) ? $setting->chairman_name :''}}"  />
        </div>
        <div class="form-group">
            <label for="exampleInputEmail2">Message</label>
            <textarea  name="chairman_message" class="form-control summernote"  cols="30" rows="5" placeholder="Message">
                @if (isset($setting))
                    {{ $setting->chairman_message }}
                @endif
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
</div>
</div>
</div>
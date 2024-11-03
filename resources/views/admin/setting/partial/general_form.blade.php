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
            <input type="text" name="tagline" class="form-control" placeholder="Tagline" value="{{ isset($setting) ? $setting->tagline :''}}"  />

        </div>
        <div class="form-group">
            <label for="data2">Meta Description</label>
            <textarea name="meta_description"  cols="20" class="form-control summernote" rows="5" placeholder="Meta Description" >
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
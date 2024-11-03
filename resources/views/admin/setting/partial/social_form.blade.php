<div class="row ">
    <div class="col-lg-8 col-xl-12 col-md-12 col-sm-12">
<div class="card box-shadow-0">
<div class="card-header border-bottom">
    <h4 class="card-title">Social Setting</h4>
</div>
<div class="card-body">
   
    <form action="{{ route('social.setting')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="data1">Facebook</label>
            <input type="text" name="facebook" class="form-control" placeholder="Facebook Link" value="{{ isset($setting) ? $setting->facebook :''}}" />
            
       
        </div>
        <div class="form-group">
            <label for="data2">Youtube</label>
            <input type="text" name="youtube" class="form-control" placeholder="YouTube" value="{{ isset($setting) ? $setting->youtube :''}}"  />

        </div>
        
        <div class="form-group">
            <label for="data2">WhatsApp</label>
            <input type="text" name="whatsapp_number" class="form-control" placeholder="WhatsApp Number" value="{{ isset($setting) ? $setting->whatsapp_number :''}}"  />

        </div>
       
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
</div>
</div>
</div>
<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    use HasFactory;
    protected $guarded = [''];

    protected static $banner;

    public static function createOrUpdateBanner($request,$id=null)
    {
        if(isset($id))
        {
            self::$banner = Banner::find($id);
        }
        else
        {
            self::$banner = new Banner();
        }
        self::$banner->title     = $request->title;
        self::$banner->image    = fileUpload($request->file('image'),'banner',isset($id) ? Banner::find($id)->image : 'null');
        self::$banner->created_by     = Auth::id();
        if(isset($id)){
            self::$banner->updated_by     = Auth::id();

        }
        self::$banner->status   = $request->status == 'on' ? 1:0;
        self::$banner->save();

    }
    public static function deleteBanner($id)
    {
        self::$banner = Banner::find($id);
        if(file_exists(self::$banner->image))
        {
            unlink(self::$banner->image);
        }
        self::$banner->delete();
    }
    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}

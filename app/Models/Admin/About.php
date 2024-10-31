<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class About extends Model
{
    use HasFactory;
    protected $guarded = [''];

    protected static $about;

    public static function createOrUpdateAbout($request,$id=null)
    {
        if(isset($id))
        {
            self::$about = About::find($id);
        }
        else
        {
            self::$about = new About();
        }
        self::$about->title     = $request->title;
        self::$about->description     = $request->description;
        self::$about->image    = fileUpload($request->file('image'),'about',isset($id) ? About::find($id)->image : 'null');
        self::$about->created_by     = Auth::id();
        if(isset($id)){
            self::$about->updated_by     = Auth::id();

        }
        self::$about->status   = $request->status == 'on' ? 1:0;
        self::$about->save();

    }
    public static function deleteAbout($id)
    {
        self::$about = About::find($id);
        if(file_exists(self::$about->image))
        {
            unlink(self::$about->image);
        }
        self::$about->delete();
    }
    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}

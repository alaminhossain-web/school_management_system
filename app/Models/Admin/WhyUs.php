<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WhyUs extends Model
{
    use HasFactory;
    protected $guarded = [''];

    protected static $whyUs;

    public static function createOrUpdateWhyUs($request,$id=null)
    {
        if(isset($id))
        {
            self::$whyUs = WhyUs::find($id);
        }
        else
        {
            self::$whyUs = new WhyUs();
        }
        self::$whyUs->title     = $request->title;
        self::$whyUs->description     = $request->description;
        self::$whyUs->image    = fileUpload($request->file('image'),'why-us',isset($id) ? WhyUs::find($id)->image : 'null');
        self::$whyUs->created_by     = Auth::id();
        if(isset($id)){
            self::$whyUs->updated_by     = Auth::id();

        }
        self::$whyUs->status   = $request->status == 'on' ? 1:0;
        self::$whyUs->save();

    }
    public static function deleteWhyUs($id)
    {
        self::$whyUs = WhyUs::find($id);
        if(file_exists(self::$whyUs->image))
        {
            unlink(self::$whyUs->image);
        }
        self::$whyUs->delete();
    }
    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}

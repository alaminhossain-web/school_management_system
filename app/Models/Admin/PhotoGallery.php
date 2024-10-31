<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PhotoGallery extends Model
{
    use HasFactory;
    protected $guarded = [''];

    protected static $photo;

    public static function createOrUpdatePhoto($request,$id=null)
    {
        if(isset($id))
        {
            self::$photo = PhotoGallery::find($id);
        }
        else
        {
            self::$photo = new PhotoGallery();
        }
        self::$photo->title     = $request->title;
        self::$photo->image    = fileUpload($request->file('image'),'photo-gallery',isset($id) ? PhotoGallery::find($id)->image : 'null');
        self::$photo->created_by     = Auth::id();
        if(isset($id)){
            self::$photo->updated_by     = Auth::id();

        }
        self::$photo->status   = $request->status == 'on' ? 1:0;
        self::$photo->save();

    }
    public static function deletePhoto($id)
    {
        self::$photo = PhotoGallery::find($id);
        if(file_exists(self::$photo->image))
        {
            unlink(self::$photo->image);
        }
        self::$photo->delete();
    }
    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}

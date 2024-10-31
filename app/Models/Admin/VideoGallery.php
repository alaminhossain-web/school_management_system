<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VideoGallery extends Model
{
    use HasFactory;
    protected $guarded = [''];

    protected static $video;

    public static function createOrUpdateVideo($request,$id=null)
    {
        if(isset($id))
        {
            self::$video = VideoGallery::find($id);
        }
        else
        {
            self::$video = new VideoGallery();
        }
        self::$video->title     = $request->title;
        self::$video->video    = $request->video;
        self::$video->created_by     = Auth::id();
        if(isset($id)){
            self::$video->updated_by     = Auth::id();

        }
        self::$video->status   = $request->status == 'on' ? 1:0;
        self::$video->save();

    }
    public static function deleteVideo($id)
    {
        self::$video = VideoGallery::find($id);
        self::$video->delete();
    }
    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}

<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [''];

    protected static $blog;

    public static function createOrUpdateBlog($request,$id=null)
    {
        if(isset($id))
        {
            self::$blog = Blog::find($id);
        }
        else
        {
            self::$blog = new Blog();
        }
        self::$blog->title     = $request->title;
        self::$blog->description     = $request->description;
        self::$blog->image    = fileUpload($request->file('image'),'blogs',isset($id) ? Blog::find($id)->image : 'null');
        self::$blog->created_by     = Auth::id();
        if(isset($id)){
            self::$blog->updated_by     = Auth::id();

        }
        self::$blog->status   = $request->status == 'on' ? 1:0;
        self::$blog->save();

    }
    public static function deleteBlog($id)
    {
        self::$blog = Blog::find($id);
        if(file_exists(self::$blog->image))
        {
            unlink(self::$blog->image);
        }
        self::$blog->delete();
    }
    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}

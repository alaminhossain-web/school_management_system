<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use HasFactory;
    protected $guarded = [''];

    protected static $activity;

    public static function createOrUpdateActivity($request,$id=null)
    {
        if(isset($id))
        {
            self::$activity = Activity::find($id);
        }
        else
        {
            self::$activity = new Activity();
        }
        self::$activity->title     = $request->title;
        self::$activity->image    = fileUpload($request->file('image'),'activity',isset($id) ? Activity::find($id)->image : 'null');
        self::$activity->description     = $request->description;
        self::$activity->created_by     = Auth::id();
        if(isset($id)){
            self::$activity->updated_by     = Auth::id();

        }
        self::$activity->status   = $request->status == 'on' ? 1:0;
        self::$activity->save();

    }
    public static function deleteActivity($id)
    {
        self::$activity = Activity::find($id);
        if(file_exists(self::$activity->image))
        {
            unlink(self::$activity->image);
        }
        self::$activity->delete();
    }
    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}

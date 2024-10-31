<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notice extends Model
{
    use HasFactory;
    protected $guarded = [''];

    protected static $notice;

    public static function createOrUpdateNotice($request,$id=null)
    {
        if(isset($id))
        {
            self::$notice = Notice::find($id);
        }
        else
        {
            self::$notice = new Notice();
        }
        self::$notice->title     = $request->title;
        self::$notice->description    = $request->description;
        self::$notice->created_by     = Auth::id();
        if(isset($id)){
            self::$notice->updated_by     = Auth::id();

        }
        self::$notice->status   = $request->status == 'on' ? 1:0;
        self::$notice->save();

    }
    public static function deleteNotice($id)
    {
        self::$notice = Notice::find($id);
        self::$notice->delete();
    }
    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}

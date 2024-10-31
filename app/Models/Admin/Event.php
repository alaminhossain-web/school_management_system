<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    protected $guarded = [''];

    protected static $event;

    public static function createOrUpdateEvent($request,$id=null)
    {
        if(isset($id))
        {
            self::$event = Event::find($id);
        }
        else
        {
            self::$event = new Event();
        }
        self::$event->title     = $request->title;
        self::$event->description     = $request->description;
        self::$event->start_date     = $request->start_date;
        self::$event->end_date     = $request->end_date;
        self::$event->image    = fileUpload($request->file('image'),'events',isset($id) ? Event::find($id)->image : 'null');
        self::$event->created_by     = Auth::id();
        if(isset($id)){
            self::$event->updated_by     = Auth::id();

        }
        self::$event->status   = $request->status == 'on' ? 1:0;
        self::$event->save();

    }
    public static function deleteEvent($id)
    {
        self::$event = Event::find($id);
        if(file_exists(self::$event->image))
        {
            unlink(self::$event->image);
        }
        self::$event->delete();
    }
    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}

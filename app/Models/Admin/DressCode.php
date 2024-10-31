<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DressCode extends Model
{
    use HasFactory;
    protected $guarded = [''];

    protected static $dressCode;

    public static function createOrUpdateDressCode($request,$id=null)
    {
        if(isset($id))
        {
            self::$dressCode = DressCode::find($id);
        }
        else
        {
            self::$dressCode = new DressCode();
        }
        self::$dressCode->title     = $request->title;
        self::$dressCode->image    = fileUpload($request->file('image'),'dress-codes',isset($id) ? DressCode::find($id)->image : 'null');
        self::$dressCode->created_by     = Auth::id();
        if(isset($id)){
            self::$dressCode->updated_by     = Auth::id();

        }
        self::$dressCode->status   = $request->status == 'on' ? 1:0;
        self::$dressCode->save();

    }
    public static function deleteDressCode($id)
    {
        self::$dressCode = DressCode::find($id);
        if(file_exists(self::$dressCode->image))
        {
            unlink(self::$dressCode->image);
        }
        self::$dressCode->delete();
    }
    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}

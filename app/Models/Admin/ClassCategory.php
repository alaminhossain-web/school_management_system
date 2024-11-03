<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassCategory extends Model
{
    use HasFactory;
    protected $guarded= [''];

    protected static $classCategory;

    public static function createOrUpdateClassCategory($request,$id=null)
    {
        if(isset($id))
        {
            self::$classCategory = ClassCategory::find($id);
        }
        else
        {
            self::$classCategory = new ClassCategory();
        }

        self::$classCategory->class_category_id = $request->class_category_id;
        self::$classCategory->name     = $request->name;
        self::$classCategory->image    = fileUpload($request->file('image'),'class-categories',isset($id) ? ClassCategory::find($id)->image : 'null');
        self::$classCategory->created_by     = Auth::id();
        if(isset($id)){
            self::$classCategory->updated_by     = Auth::id();

        }
        self::$classCategory->status   = $request->status == 'on' ? 1:0;
        self::$classCategory->save();

    }
    public static function deleteClassCategory($id)
    {
        self::$classCategory = ClassCategory::find($id);
        if(file_exists(self::$classCategory->image))
        {
            unlink(self::$classCategory->image);
        }
        self::$classCategory->delete();
    }
    public function classCategory()
    {
        return $this->belongsTo(ClassCategory::class);
    }
    public function courseCategories()
    {
        return $this->hasMany(ClassCategory::class);
    }
}

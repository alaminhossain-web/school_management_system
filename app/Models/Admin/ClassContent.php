<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassContent extends Model
{
    use HasFactory;
    protected $guarded= [''];

    protected static $classContent;

    public static function createOrUpdateClassContent($request,$id=null)
    {
        if(isset($id))
        {
            self::$classContent = ClassContent::find($id);
        }
        else
        {
            self::$classContent = new ClassContent();
        }

        self::$classContent->class_category_id = $request->class_category_id;
        self::$classContent->title     = $request->title;
        self::$classContent->image    = fileUpload($request->file('image'),'class-contents',isset($id) ? ClassContent::find($id)->image : 'null');
        self::$classContent->description     = $request->description;
        self::$classContent->created_by     = Auth::id();
        if(isset($id)){
            self::$classContent->updated_by     = Auth::id();

        }
        self::$classContent->status   = $request->status == 'on' ? 1:0;
        self::$classContent->save();

    }
    public static function deleteClassContent($id)
    {
        self::$classContent = ClassContent::find($id);
        if(file_exists(self::$classContent->image))
        {
            unlink(self::$classContent->image);
        }
        self::$classContent->delete();
    }
    public function classCategory()
    {
        return $this->belongsTo(ClassCategory::class);
    }
    public function classCategories()
    {
        return $this->hasMany(ClassCategory::class);
    }
}

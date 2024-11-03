<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $guarded = [''];

    protected static $data;

    public static function createOrUpdateLogo($request)
    {
         // Get the latest Setting record or create a new instance if none exists
        self::$data = Setting::latest()->first() ?? new Setting();
       
        // Favicon Image Upload
        if ($request->hasFile('favicon_image')) {
            self::$data->favicon_image = fileUpload(
                $request->file('favicon_image'), 
                'logo', 
                self::$data->favicon_image ?? null
            );
        }

        // Logo Image Upload
        if ($request->hasFile('logo_image')) {
            self::$data->logo_image = fileUpload(
                $request->file('logo_image'), 
                'logo', 
                self::$data->logo_image ?? null
            );
        }
        self::$data->save();

    }
    public static function createOrUpdateGeneral($request)
    {
         // Get the latest Setting record or create a new instance if none exists
         self::$data = Setting::latest()->first() ?? new Setting();

         self::$data->site_title     = $request->site_title;
        self::$data->tagline    = $request->tagline;
        self::$data->meta_description     = $request->meta_description;
        self::$data->company_email     = $request->company_email;
        self::$data->company_address     = $request->company_address;
        self::$data->company_phone     = $request->company_phone;
        self::$data->footer_credit     = $request->footer_credit;
        self::$data->save();
    }
    public static function createOrUpdateChairman($request)
    {
         // Get the latest Setting record or create a new instance if none exists
         self::$data = Setting::latest()->first() ?? new Setting();
        // Image Upload
        if ($request->hasFile('chairman_image')) {
            self::$data->chairman_image = fileUpload(
                $request->file('chairman_image'), 
                'chairman', 
                self::$data->logo_image ?? null
            );
        }
        self::$data->chairman_name       = $request->chairman_name;
        self::$data->chairman_message    = $request->chairman_message;
        self::$data->save();
    }
    public static function createOrUpdateSocial($request)
    {
         // Get the latest Setting record or create a new instance if none exists
         self::$data = Setting::latest()->first() ?? new Setting();

         self::$data->facebook     = $request->facebook;
        self::$data->youtube    = $request->youtube;
        self::$data->whatsapp_number     = $request->whatsapp_number;
        self::$data->save();
    }

}

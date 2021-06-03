<?php

namespace App\Helper;
use Illuminate\Support\Str;

class UploadImage
{
    public static $file_name;

    public static function single($image, $filename, $path)
    {
        if (!empty($image)) {
            if ($filename == 'random') {
                Self::$file_name = UploadImage::generate_unique_string().'.'.$image->getClientOriginalExtension();
            } else {
                Self::$file_name = $filename;
            }

            $image->move(public_path($path), Self::$file_name);

            return $path.Self::$file_name;
        }
    }

    static function generate_unique_string($length = null, $start_string = null, $finish_string = null)
    {
        $string = '';
        if ($start_string) {
            $string .= $start_string;
        }
        if ($length) {
            $string .= str_shuffle(strtoupper(Str::random($length).rand(1, 100)));
        } else {
            $string .= str_shuffle(strtoupper(Str::random().rand(1, 100)));
        }
        if ($finish_string) {
            $string .= $finish_string;
        }

        return $string;
    }
}

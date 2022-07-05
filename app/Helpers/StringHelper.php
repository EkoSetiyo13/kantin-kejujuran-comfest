<?php

namespace App\Helpers;


class StringHelper
{
    public  function ImagePath($image)
    {
        $full_path = request()->getSchemeAndHttpHost() . "/storage/images/" . $image;
        return  $full_path;
    }
}

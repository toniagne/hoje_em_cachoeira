<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function displayImage($filename)

    {
         return storage_path('configs/hn12PSJ3aMR9yEAfmmgyuaQWfovOtnLLO3k47KJ7.jpeg');
    }
}

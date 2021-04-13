<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
   public function view(News $news)
   {
       return view('home.news', compact('news'));
   }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannersRequest;
use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;

class BannersController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }


    public function create()
    {

        $categories = Category::all();
        return view('admin.banners.create', compact('categories'));
    }


    public function store(BannersRequest $request)
    {
        $request->validated();

        $banners = new Banner();

        if ($request->hasFile('file_logo')) {
            $request['file'] = $banners->sendFile($request->file('file_logo'));
        }

        $banners->create($request->all());

        return redirect(route('banners.index'))->with(['message'=>'Banner cadastrado com sucesso']);
    }


    public function edit(Banner $banner)
    {
        $categories = Category::all();
        return view('admin.banners.edit', compact('banner', 'categories'));
    }


    public function update(BannersRequest $request, Banner $banner)
    {
        $request->validated();

        if ($request->hasFile('file_logo')) {
            $request['file'] = $banner->sendFile($request->file('file_logo'));
        }

        $banner->update($request->all());

        return redirect(route('banners.index'))->with(['message'=>'Banner alterado com sucesso']);
    }


    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect(route('banners.index'))->with(['message'=>'Banner apagado com sucesso']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index() {
        $role_name = Auth::user()->role->name;
        $data = [];
        if ($role_name == 'Yönetici' || $role_name == 'Moderatör') {
            $data['blogs'] = Blog::get();
        }else if($role_name == 'Yazar') {
            $data['blogs'] = Auth::user()->blogs;
        }else {
            return redirect()->route('home');
        }

        return view('blogs.index',$data);
    }

    public function detail(Blog $blog) {
        $data = [];
        $data['blog'] = $blog;

        return view('blogs.detail', $data);
    }

    public function create() {
        $role_name = Auth::user()->role->name;
        if ($role_name == 'Okuyucu'){
            return redirect()->route('home');
        }
        return view('blogs.new');
    }

    public function store(Request $request) {
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->short_description = $request->input('short_description');
        $blog->description =  $request->input('description');
        $blog->is_active = true;
        $blog->user_id = Auth::user()->id;
        $control = false;
        if ($request->file) {
            if(!File::isDirectory('storage/uploads/blogs')){
                File::makeDirectory('storage/uploads/blogs', 0777, true, true);
            }
            $file = $request->file('file');
            $file_ = $this->fileExtension($file->getClientOriginalName());
            if($file_){
                $blog->photo = $this->generateName($file->getClientOriginalName());
                $control = true;
            }

        }
        $blog->save();
        if ($control) {
            $file->storeAs('uploads/blogs', $blog->photo);
        }
        return redirect()->route('blogs.index')->with('message','işleminiz başarılı bir şekilde yapılmıştır.');
    }

    public function edit(Blog $blog) {
        $role_name = Auth::user()->role->name;
        if ($role_name == 'Okuyucu'){
            return redirect()->route('home');
        }
        $data = [];
        $data['blog'] = $blog;
        return view('blogs.edit',$data);
    }

    public function update(Request $request, Blog $blog) {
        $blog->title = $request->input('title');
        $blog->short_description = $request->input('short_description');
        $blog->description =  $request->input('description');
        $control = false;
        if ($request->file) {
            if(!File::isDirectory('storage/uploads/blogs')){
                File::makeDirectory('storage/uploads/blogs', 0777, true, true);
            }
            $file = $request->file('file');
            $file_ = $this->fileExtension($file->getClientOriginalName());
            if($file_){
                $blog->photo = $this->generateName($file->getClientOriginalName());
                $control = true;
            }

        }
        $blog->save();
        if ($control) {
            $file->storeAs('uploads/blogs', $blog->photo);
        }
        return redirect()->route('blogs.index')->with('message','işleminiz başarılı bir şekilde yapılmıştır.');
    }

    public function delete(Blog $blog) {
        $role_name = Auth::user()->role->name;
        if ($role_name != 'Yönetici' && $role_name != 'Moderatör' && Auth::user()->id != $blog->user_id){
            return redirect()->route('home');
        }
        $result = false;
        try {
            DB::beginTransaction();
            $blog->delete();
            DB::commit();
            $result = true;
        } catch (Exception $exception) {
            DB::rollBack();
            $result = false;
        }
        return response()->json($result)->header('Content-Type', 'application/json'); 
    }

    public function pasifive(Blog $blog) {
        $role_name = Auth::user()->role->name;
        if ($role_name != 'Yönetici' && $role_name != 'Moderatör'){
            return redirect()->route('home');
        }
        $result = false;
        try {
            if ($blog->is_active) {
                $blog->is_active = false;
            }else{
                $blog->is_active = true;
            }
            $blog->save();
            $result = true;
        } catch (Exception $exception) {
            $result = false;
        }
        return response()->json($result)->header('Content-Type', 'application/json');
    }

    public function fileExtension($file){
        $extension = pathinfo($file,PATHINFO_EXTENSION);
        if($extension == "jpeg" || $extension == "jpg" || $extension == "png")
            return true;
        else
            return false;
    }
    
    public function generateName($file){
        $extension = pathinfo($file,PATHINFO_EXTENSION);
        return md5(microtime(true)).".".$extension;
    }
}

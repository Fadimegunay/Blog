<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index(){
        $data = [];
        $data['blogs'] = Blog::where('is_active', true)
                                ->orderBy('created_at', 'DESC')->paginate();
        return view('home', $data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index() {
        $role_name = Auth::user()->role->name;
        if ($role_name != 'Yönetici' && $role_name != 'Moderatör'){
            return redirect()->route('home');
        }
        $data = [];
        $data['users'] = User::where('is_active', true)->paginate();
        return view('users.index',$data);
    }

    public function create() {
        $role_name = Auth::user()->role->name;
        if ($role_name != 'Yönetici' && $role_name != 'Moderatör'){
            return redirect()->route('home');
        }
        $datas = [];
        $datas['roles'] = Role::all();
        return view('users.new', $datas);
    }

    public function store(Request $request) {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = md5($request->input('password'));
        $user->role_id =  $request->input('role');
        $user->is_active = true;
        $control = false;
        if ($request->file) {
            if(!File::isDirectory('storage/uploads/users')){
                File::makeDirectory('storage/uploads/users', 0777, true, true);
            }
            $file = $request->file('file');
            $file_ = $this->fileExtension($file->getClientOriginalName());
            if($file_){
                $user->profile_photo = $this->generateName($file->getClientOriginalName());
                $control = true;
            }

        }
        $user->save();
        if ($control) {
            $file->storeAs('uploads/users', $user->profile_photo);
        }
        return redirect()->route('users.index')->with('message','işleminiz başarılı bir şekilde yapılmıştır.');
    }

    public function edit(User $user) {
        $role_name = Auth::user()->role->name;
        if ($role_name != 'Yönetici' && $role_name != 'Moderatör'){
            return redirect()->route('home');
        }
        $datas = [];
        $datas['user'] = $user;
        $datas['roles'] = Role::all();
        return view('users.edit',$datas);
    }

    public function update(Request $request, User $user) {
        $user->role_id = $request->input('role');
        $user->name = $request->input('name');
        if( $request->input('password')) {
            $user->password = md5($request->input('password'));
        }
        $control = false;
        if ($request->file) {
            if(!File::isDirectory('storage/uploads/users')){
                File::makeDirectory('storage/uploads/users', 0777, true, true);
            }
            $file = $request->file('file');
            $file_ = $this->fileExtension($file->getClientOriginalName());
            if($file_){
                $user->profile_photo = $this->generateName($file->getClientOriginalName());
                $control = true;
            }

        }
        $user->save();
        if ($control) {
            $file->storeAs('uploads/users', $user->profile_photo);
        }

        return redirect()->route('users.index')->with('message','işleminiz başarılı bir şekilde yapılmıştır.');
    }

    public function delete(User $user) {
        $role_name = Auth::user()->role->name;
        if ($role_name != 'Yönetici' && $role_name != 'Moderatör'){
            return redirect()->route('home');
        }
        $result = false;
        try {
            DB::beginTransaction();
            $user->is_active = false;
            $user->save();
            DB::commit();
            $result = true;
        } catch (Exception $exception) {
            DB::rollBack();
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

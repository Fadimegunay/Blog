<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index() {
        $data = [];
        $data['roles'] = Role::paginate();
        return view('roles.list',$data);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;

class UserController extends AdminController
{

    public function index(User $user)
    {
        $data['title'] = 'Список Пользователей';
        $data['users'] = $user->orderBy('id','desc')->paginate(10);
        return view('admin.user.index',$data);
    }

    public function create()
    {
        $data['title'] = 'Добавление Пользователея';
        return view('admin.user.create',$data);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        User::create([
            'name' => $input['name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'role' => $input['role'],
            'active' => 0,
        ]);
    }

    public function edit($id)
    {
        $data['title'] = 'Редактирование Пользователея';
        $data['user'] = User::find($id);
        return view('admin.user.edit',$data);
    }

    public function update(Request $request)
    {
        $id = intval($request->input('id'));
        $input = $request->all();
        $user = User::find($id );
        $user->name = $input['name'];
        $user->last_name = $input['last_name'];
        
        if(Auth::user()->id == $user->id){
            $user->password = bcrypt($input['password']);
        }

        if(Auth::user()->id != $id){
            $user->role = $input['role'];
            $user->active = $input['active'];
        }

        $user->save();
    }

    public function delete(Request $request,User $user)
    {
        $id = intval($request->input('id'));
        if(Auth::user()->id != $id){
            $user->where('id',$id)->delete();
        }
    }
    

    public function active(Request $request,User $user)
    {
        $id = intval($request->input('id'));
        if(Auth::user()->id != $id){
            $active = intval($request->input('active'));
            $edit['active'] = $active;
            $user->where('id',$id)->update($edit);
        }
        
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Behavior;
use App\Models\Category;
use Helper;
use Auth;

class BehaviorController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Behavior $behavior)
    {
        $data['title'] = 'Список Заведений';
        $data['behaviors'] = $behavior->orderBy('id','desc')->paginate(10);
        return view('admin.behavior.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Добавление Заведения';
        $data['categories'] = Category::all();
        return view('admin.behavior.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $behavior = new Behavior();
        $behavior->id_user = Auth::user()->id;
        $behavior->id_category = $input['id_category'];
        $behavior->title = $input['title'];
        $behavior->description = $input['description'];
        $behavior->alias = Helper::translit($input['title']);
        $behavior->active = $input['active'];
        $behavior->save();
        $id = $behavior->id;
        echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Редактирование Заведения';
        $data['behavior'] = Behavior::find($id);
        $data['categories'] = Category::all();
        return view('admin.behavior.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->all();
        $id = intval($input['id']);
        $behavior = Behavior::find($id);
        $behavior->id_user = Auth::user()->id;
        $behavior->id_category = $input['id_category'];
        $behavior->title = $input['title'];
        $behavior->description = $input['description'];
        $behavior->alias = Helper::translit($input['title']);
        $behavior->active = $input['active'];
        $behavior->save();
    }

    public function delete(Request $request,Behavior $behavior)
    {
        $id = intval($request->input('id'));
        $behavior->where('id',$id)->delete();
    }

    public function active(Request $request,Behavior $behavior)
    {
        $id = intval($request->input('id'));
        $active = intval($request->input('active'));
        $edit['active'] = $active;
        $behavior->where('id',$id)->update($edit);
    }
}

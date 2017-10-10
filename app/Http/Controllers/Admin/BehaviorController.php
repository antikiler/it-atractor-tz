<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Behavior;
use App\Models\Category;
use App\Models\GalleryBehavior;
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

    public function delete(Request $request, Helper $helper)
    {
        $id = intval($request->input('id'));
        $gallerys = GalleryBehavior::where('id_behavior',$id)->get()->toArray();
        
        if ($helper->delImg($id,$gallerys,'behavior')) {
           GalleryBehavior::where('id_behavior',$id)->delete();
        }
        
        Behavior::destroy($id);
        echo 1;
    }

    public function active(Request $request,Behavior $behavior)
    {
        $id = intval($request->input('id'));
        $active = intval($request->input('active'));
        $edit['active'] = $active;
        $behavior->where('id',$id)->update($edit);
    }
    public function addImg(Request $request, Helper $helper)
    {
        if ($request->ajax()) {
            $img = $request->all();

            $imgName = $helper->uploadItemImg('behavior',$img['value'],$img['name']);

            if ($img['id_pic'] == $img['main']) $main=1; else $main = 0;    

            $gallery = new GalleryBehavior();
            $gallery->id_behavior = $img['last_id'];
            $gallery->img = $imgName;
            $gallery->main = $main;
            $gallery->save();

            echo 1;
        }
        
    }
}

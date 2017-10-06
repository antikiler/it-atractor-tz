<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Helper;

class CategoryController extends AdminController
{
    /**
     * @return \App\Models\Category $category
     */
    public function index(Category $category)
    {
        $data['title'] = 'Список категорий';
        $data['categories'] = $category->orderBy('id','desc')->paginate(10);
        return view('admin.category.index',$data);
    }
    public function create()
    {
        $data['title'] = 'Добавление категории';
        return view('admin.category.create',$data);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {   
        $input = $request->all();
        $input['alias'] = Helper::translit($input['title']);
        Category::create($input);
    }

    /**
     * @param  int  $id
     */
    public function edit($id)
    {
        $data['title'] = 'Список категорий';
        $data['category'] = Category::find($id);
        return view('admin.category.edit',$data);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     */
    public function update(Request $request,Category $category)
    {
        $id = intval($request->input('id'));
        $active = intval($request->input('active'));
        $title = $request->input('title');
        $alias = Helper::translit($title);
        $edit['title'] = $title;
        $edit['alias'] = $alias;
        $edit['active'] = $active;
        $category->where('id',$id)->update($edit);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     */
    public function delete(Request $request,Category $category)
    {
        $id = intval($request->input('id'));
        $category->where('id',$id)->delete();
    }
    
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     */
    public function active(Request $request,Category $category)
    {
        $id = intval($request->input('id'));
        $active = intval($request->input('active'));
        $edit['active'] = $active;
        $category->where('id',$id)->update($edit);
    }
}

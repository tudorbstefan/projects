<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;

class CategoryController extends Controller
{
    function addCategory(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $category = new Category;
            $category->name = $data['category_name'];
            $category->parent_id = $data['category_parent'];
            $category->description = $data['category_description'];
            $category->url = $data['category_url'];
            $category->save();
            return redirect('/admin/add_category')->with('flash_message_success', 'Categorie adăugată cu succes!');
        }
        $levels = Category::where(['parent_id'=>0])->get();

        return view('admin.categories.add_category')->with(compact('levels'));
    }

    function viewCategories()
    {
        $categories = Category::get();
        return view('admin.categories.view_categories')->with(compact('categories'));
    }

    function editCategory(Request $request, $id = null)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            Category::where(['id'=>$id])->update(['name'=>$data['category_name'],'description'=>$data['category_description'],'url'=>$data['category_url']
            ]);
            return redirect('/admin/view_category')->with('flash_message_success_edit', 'Categoria a fost editată cu succes!');
        }
        $categoryDetails = Category::where(['id' => $id])->first();
        $levels = Category::where(['parent_id'=>0])->get();
        return view('admin.categories.edit_category')->with(compact('categoryDetails','levels'));
    }

    function deleteCategory($id = null)
    {
        if(!empty($id))
        {
            Category::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success_delete', 'Categoria a fost ștearsă cu succes!');
        }
        $categoryDetails = Category::where(['id' => $id])->first();
        return view('admin.categories.edit_category')->with(compact('categoryDetails'));
    }
}

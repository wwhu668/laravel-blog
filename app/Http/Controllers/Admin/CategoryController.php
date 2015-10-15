<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $category = Category::getSortedCategorys();

        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categorys = \App\Category::getTopLevel()->lists('name', 'id')->toArray();
        $categorys = ['0' => '/'] + $categorys;
        return view('admin.category.create', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        // flash()->success('Your category has been created!');
        return redirect('admin/category'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categorys = Category::getTopLevel()->lists('name', 'id')->toArray();
        $categorys = ['0' => '/'] + $categorys;
        return view('admin.category.edit', compact('category', 'categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $count = \App\Article::where('category_id', '=', $id)->count();
        if ($count) {
            return redirect()->back();
        }
        $return = Category::find($id)->delete();
        if($return) {
            $aa = Category::where('pid', '=', $id)->update(['pid' => 0]);
        }
        return redirect('admin/category');
    }

    public function Children($id)
    {
        echo 1;
    } 
}

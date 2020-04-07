<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin.layouts.category.all', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layouts.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    protected function getRandomString($length = 8)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';

        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[mt_rand(0, strlen($characters) - 1)];
        }

        return $string;
    }

    public function store(Request $request)
    {

        $request->validate([
            'cat_name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $category = new Category();
        $category->cat_name = $request->cat_name;
        $imageName = $this->getRandomString(15) . time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('image'), $imageName);
        $category->image = $imageName;
        $category->save();
        return redirect(route('adminCategory.index'))->with('success', 'Category is approved.');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.layouts.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cat_name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $category = Category::find($id);
        $category->cat_name = $request->cat_name;
        if (($request->image) == null) {
            $imageName = $category->image;
        } else {
            $imageName = $this->getRandomString(15) . time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('image'), $imageName);
        }
        $category->image = $imageName;
        $category->save();
        return redirect(route('adminCategory.index'))->with('success', 'Category is updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id',$id)->delete();
        return redirect(route('adminCategory.index'));
    }
}

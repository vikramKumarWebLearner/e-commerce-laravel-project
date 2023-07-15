<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $validatedData = $request->validated();

        $category = new Category;
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->desc = $validatedData['desc'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/category', $filename);
            $category->image = $filename;
        }

        $category->meta_title = $request->meta_title;
        $category->meta_keyword = $request->meta_keyword;
        $category->meta_desc = $request->meta_desc;

        $category->status = $request->status == true ? '1' : '0';

        $category->save();

        return redirect('admin/category')->with('message', 'Category Added Successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category)
    {

        $validatedData = $request->validated();
        $category = Category::findOrfail($category);

        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->desc = $validatedData['desc'];

        if ($request->hasFile('image')) {
            $path = 'uploads/category'.$category->image;
            if (File::exists($path)) {
                file::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/category', $filename);
            $category->image = $filename;
        }

        $category->meta_title = $request->meta_title;
        $category->meta_keyword = $request->meta_keyword;
        $category->meta_desc = $request->meta_desc;

        $category->status = $request->status == true ? '1' : '0';

        $category->update();

        return redirect('admin/category')->with('message', 'Category Update Successfully');
    }
}

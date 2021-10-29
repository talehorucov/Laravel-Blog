<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.store');
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        $image_name = $request->name . '-' . hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/categories/' . $image_name);
        $image_url = '/upload/categories/' . $image_name;
        
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $image_url;
        $category->save();

        $notification = [
            'message' => 'Kateqoriya uğurla əlavə edildi',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.categories.index')->with($notification);
    }

    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        if ($request->image) {
            $image = $request->file('image');
            $image_name = $request->name . '-' . hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/categories/' . $image_name);
            $image_url = '/upload/categories/' . $image_name;
            if ($category->image) {
                File::delete($category->image);
            }
            $category->image = $image_url;
        }

        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        $notification = [
            'message' => 'Kateqoriya uğurla redaktə edildi',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.categories.index')->with($notification);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        $notification = array(
            'message' => 'Kateqoriya uğurla silindi',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.categories.index')->with($notification);
    }
}

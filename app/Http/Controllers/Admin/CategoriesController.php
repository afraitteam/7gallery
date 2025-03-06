<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\StoreRequest;
use App\Http\Requests\Admin\Categories\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function create()
    {
        return view("admin.categories.create");
    }


    public function store(StoreRequest $request)
    {

        $validated_data = $request->validated();


        $createdCategory = Category::create(
            [
                "title" => $validated_data['title'],
                "slug" => $validated_data['slug'],
            ]
        );


        if (!$createdCategory) {
            return back()->with('failed', 'دسته بندی ایجاد نشد ');
        }
        return back()->with('success', 'دسته بندی ایجاد شد');
    }


    public function all()
    {
        $categories = Category::paginate(10);
        // dd($categories);

        return view('admin.categories.all', compact('categories'));
    }


    public function delete($category_id)
    {
        $category = Category::find($category_id);

        $category->delete();
        return back()->with('success', 'دسته بندی حذف شد');
    }


    public function edit($category_id)
    {
        $category = Category::find($category_id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(UpdateRequest $request, $category_id)
    {
        $validated_data = $request->validated();

        $category = Category::find($category_id);

        $updated_category = $category->update([
            'title' => $validated_data['title'],
            'slug' => $validated_data['slug'],
        ]);

        if (!$updated_category) {
            return back()->with('failed', 'دسته بندی بروز رسانی نشد');
        } else {
            return back()->with('success', 'دسته بندی بروز رسانی شد');
        }
    }

}

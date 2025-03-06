<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\StoreRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Utilities\ImageUploader;
use PhpParser\Node\Expr\Throw_;

class ProductsController extends Controller
{
    public function create()
    {
        $categories = Category::all();

        return view("admin.products.create", compact("categories"));
    }

    public function store(StoreRequest $request)
    {
        $ValidatedData = $request->validated();

        $admin = User::where("email", 'admin@gmail.com')->first();

        $createdProduct = Product::create([
            "title" => $ValidatedData["title"],
            "category_id" => $ValidatedData["category_id"],
            "description" => $ValidatedData["description"],
            "price" => $ValidatedData["price"],
            "owner_id" => $admin->id

        ]);

        try {
            $images = [
                'thumbnail_url' => $ValidatedData['thumbnail_url'],
                'demo_url' => $ValidatedData['demo_url'],
            ];

            $basePath = 'products/' . $createdProduct->id . '/';
            $imagesPath = ImageUploader::uploadMany($images, $basePath);


            $sourceImageFullPath = $basePath . 'soruce_url_' . $ValidatedData['source_url']->getClientOriginalName();
            ImageUploader::upload($ValidatedData['source_url'], $sourceImageFullPath);


            $uploadedImage = $createdProduct->update(
                [
                    'thumbnail_url' => $imagesPath['thumbnail_url'],
                    'demo_url' => $imagesPath['demo_url'],
                    'source_url' => $sourceImageFullPath
                ]
            );

            if (!$uploadedImage) {
                throw new \Exception('تصاویر آپلود نشد');
            }


            return back()->with('success', ' محصول ایجاد شد');

        } catch (\Exception $ex) {
            return back()->with('failed', $ex->getMessage());
        }

    }


    public function all()
    {
        $products = Product::paginate(10);

        return view('admin.products.all', compact('products'));
    }
}

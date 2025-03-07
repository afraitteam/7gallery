<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\StoreRequest;
use App\Http\Requests\Admin\Products\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Utilities\ImageUploader;
use PhpParser\Node\Expr\Throw_;
use function PHPUnit\Framework\returnValueMap;

class ProductsController extends Controller
{
    public function create()
    {
        $categories = Category::all();

        return view("admin.products.create", compact("categories"));
    }

    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();

        $admin = User::where('email', 'admin@gmail.com')->first();

        $createdProduct = Product::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'category_id' => $validatedData['category_id'],
            'price' => $validatedData['price'],
            'owner_id' => $admin->id,
        ]);

        if (!$this->uploadImage($createdProduct, $validatedData)){
            return back()->with('failed','محصول ایجاد نشد');
        }
        return back()->with('success','محصول ایجاد شد');
    }


    public function all()
    {
        $products = Product::paginate(10);

        return view('admin.products.all', compact('products'));
    }


    public function downloadDemo($productId)
    {
        $product = Product::findOrFail($productId);

        $filePath = public_path($product->demo_url);

        if (!file_exists($filePath)) {
            abort(404, 'فایل مورد نظر پیدا نشد');
        }

        return response()->download($filePath);
    }

    public function downloadSource($productId)
    {
        $product = Product::findOrFail($productId);

        $filePath = storage_path('app/local_storage/' . $product->source_url);

        if (!file_exists($filePath)) {
            abort(404, 'فایل مورد نظر پیدا نشد');
        }

        return response()->download($filePath);
    }

    public function delete($productId)
    {
        $product = Product::findOrFail($productId);
        $deletedProduct = $product->delete();

        if (!$deletedProduct) {
            return back()->with('failed', 'محصول حذف نشد، لطفا دوباره امتحان کنید!');
        }

        return back()->with('success', 'محصول حذف شد');
    }

    public function edit($productId)
    {
        $categories = Category::all();

        $product = Product::findOrFail($productId);
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(UpdateRequest $request, $productId)
    {

        $validatedData = $request->validated();
        $product = Product::findOrFail($productId);
        $updatedProduct = $product->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'category_id' => $validatedData['category_id'],
            'price' => $validatedData['price'],
        ]);


        if (!$this->uploadImage($product, $validatedData) || !$updatedProduct) {
            return back()->with('failed', 'تصاویر آپلود نشد');
        }
        return back()->with('success', 'محصول با موفقیت آپدیت شد');

    }


    public function uploadImage($createdProduct, $validatedData)
    {
        try {

            $basePath = '/products/' . $createdProduct->id . '/';

            $sourceImageFullPath = null;
            $data = [];

            if (isset($validatedData['source_url'])) {
                $sourceImageFullPath = $basePath . 'soruce_url_' . $validatedData['source_url']->getClientOriginalName();
                ImageUploader::upload($validatedData['source_url'], $sourceImageFullPath, 'local_storage');
                $data += ['source_url' => $sourceImageFullPath];
            }


            if (isset($validatedData['thumbnail_url'])) {
                $fullPath = $basePath . 'thumbnail_url_' . $validatedData['thumbnail_url']->getClientOriginalName();
                ImageUploader::upload($validatedData['thumbnail_url'], $fullPath);
                $data += ['thumbnail_url' => $fullPath];
            }

            if (isset($validatedData['demo_url'])) {
                $fullPath = $basePath . 'demo_url_' . $validatedData['demo_url']->getClientOriginalName();
                ImageUploader::upload($validatedData['demo_url'], $fullPath);
                $data += ['demo_url' => $fullPath];
            }

            $updateProduct = $createdProduct->Update($data);

            if (!$updateProduct) {
                throw new \Exception('تصاویر آپلود نشد');
            }
            return true;

        } catch (\Exception $ex) {
            return false;
        }
    }
}

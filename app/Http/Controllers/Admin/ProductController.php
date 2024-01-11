<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use File;
use Illuminate\Http\Request;
use Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status', '0')->get();

        return view('admin.products.create', compact('categories', 'brands', 'colors'));
    }

    public function store(ProductFormRequest $request)
    {
        $validated = $request->validated();

        $category = Category::findOrfail($validated['category_id']);

        $product = $category->product()->create([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'slug' => Str::slug($validated['slug']),
            'brand' => $validated['brand_id'],
            'small_desc' => $validated['small_desc'],
            'description' => $validated['description'],
            'original_price' => $validated['original_price'],
            'selling_price' => $validated['selling_price'],
            'quantity' => $validated['quantity'],
            'trending' => $request->trending == true ? '1' : '0',
            'featured' => $request->featured == true ? '1' : '0',
            'status' => $request->status == true ? '1' : '0',
            'meta_title' => $validated['meta_title'],
            'meta_keyword' => $validated['meta_keyword'],
            'meta_desc' => $validated['meta_desc'],
        ]);
        $i = 1;
        if ($request->hasfile('image')) {
            $uploadpath = 'uploads/product/';

            foreach ($request->file('image') as $imageFile) {
                $ext = $imageFile->getClientOriginalExtension();
                $fileName = time().$i++.'.'.$ext;
                $imageFile->move($uploadpath, $fileName);
                $finalImagePathName = $uploadpath.$fileName;

                $product->productImage()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        if ($request->colors) {
            foreach ($request->colors as $key => $color) {
                $product->productColor()->create([
                    'quantity' => $request->colorquantity[$key] ?? 0,
                    'product_id' => $product->id,
                    'color_id' => $color,
                ]);
            }
        }

        return redirect('/admin/products')->with('message', 'Product Added Successfully');

    }

    public function edit($product_id)
    {

        $product = Product::findOrfail($product_id);
        $productImage = ProductImage::get();
        $brands = Brand::get();
        $categories = Category::get();
        $product_color = $product->productColor->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id', $product_color)->get();

        return view('admin.products.edit', compact('product', 'productImage', 'brands', 'categories', 'colors'));

    }

    public function update(ProductFormRequest $request, int $product_id)
    {
        $validated = $request->validated();
        $product = Category::findOrfail($validated['category_id'])
            ->product()->where('id', $product_id)->first();

        if ($product) {
            $product->update([
                'category_id' => $validated['category_id'],
                'name' => $validated['name'],
                'slug' => Str::slug($validated['slug']),
                'brand' => $validated['brand_id'],
                'small_desc' => $validated['small_desc'],
                'description' => $validated['description'],
                'original_price' => $validated['original_price'],
                'selling_price' => $validated['selling_price'],
                'quantity' => $validated['quantity'],
                'trending' => $request->trending == true ? '1' : '0',
                'featured' => $request->featured == true ? '1' : '0',
                'status' => $request->status == true ? '1' : '0',
                'meta_title' => $validated['meta_title'],
                'meta_keyword' => $validated['meta_keyword'],
                'meta_desc' => $validated['meta_desc'],
            ]);
            $i = 1;
            if ($request->hasfile('image')) {
                $uploadpath = 'uploads/product/';

                foreach ($request->file('image') as $imageFile) {
                    $ext = $imageFile->getClientOriginalExtension();
                    $fileName = time().$i++.'.'.$ext;
                    $imageFile->move($uploadpath, $fileName);
                    $finalImagePathName = $uploadpath.$fileName;

                    $product->productImage()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }
            if ($request->colors) {
                foreach ($request->colors as $key => $color) {
                    $product->productColor()->create([
                        'quantity' => $request->colorquantity[$key] ?? 0,
                        'product_id' => $product->id,
                        'color_id' => $color,
                    ]);
                }
            }

            return redirect('/admin/products')->with('message', 'Product Updated Successfully');
        } else {

            return redirect('admin/products')->with('message', 'No Such Product Id found');
        }

    }

    public function destory_image(int $product_image_id)
    {
        $productImage = ProductImage::findOrfail($product_image_id);

        if (File::exists($productImage->image)) {
            File::delete($productImage->image);
        }

        $productImage->delete();

        return redirect()->back()->with('message', 'Product Image Deleted');
    }

    public function delete(int $product_id)
    {
        $product = Product::findOrfail($product_id);

        if ($product->productImage) {
            foreach ($product->productImage as $image) {
                if (file::exists($image->image)) {
                    file::delete($image->image);
                }
            }
        }

        $product->delete();

        return redirect()->back()->with('message', 'Product Deleted with all its image');
    }

    public function updateProductColor(Request $request, $prod_color_id)
    {
        $producColorData = Product::findOrfail($request->product_id)->productColor()->where('id', $prod_color_id)->first();

        $producColorData->update([
            'quantity' => $request->quantity,
        ]);

        return response()->json(['message' => 'Product Quantity Update']);
    }

    public function deleteProductColor($prod_color_id)
    {
        $productColor = ProductColor::findOrfail($prod_color_id);

        $productColor->delete();

        return response()->json(['message' => 'Product Color Delete']);
    }
}

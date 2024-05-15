<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::latest();
        if (!empty($request->get('keyword'))) {
            $products = $products->where('title', 'like', '%' . $request->get('keyword') . '%')->orWhere('district', 'like', '%' . $request->get('keyword') . '%');;
        }
        $products = $products->paginate(10);
        $data['products'] = $products;
        return view('admin.products.list', $data);
    }
    public function create()
    {
        $data = [];
        $categories = Category::orderBy('name', 'ASC')->get();
        $data['categories'] = $categories;
        return view('admin.products.create', $data);
    }
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required|unique:products',
            'district' => 'required',
            'price' => 'required|numeric',
            'sku' => 'required|unique:products',
            'qty' => 'required',
            'category' => 'required|numeric',
            'is_featured' => 'required|in:Yes,No',
        ]);
        if ($validator->passes()) {
            $product = new Product;
            $product->title = $request->title;
            $product->slug = $request->slug;
            $product->district = $request->district;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->compare_price = $request->compare_price;
            $product->sku = $request->sku;
            $product->barcode = $request->barcode;
            $product->qty = $request->qty;
            $product->status = $request->status;
            $product->category_id = $request->category;
            $product->is_featured = $request->is_featured;
            $product->save();

            //save gallery pics
            if (!empty($request->image_array)) {
                foreach ($request->image_array as $temp_image_id) {
                    $tempImageInfo = TempImage::find($temp_image_id);
                    $extArray = explode('.', $tempImageInfo->name);
                    $ext = last($extArray);

                    $productImage = new ProductImage();
                    $productImage->product_id = $product->id;
                    //$productImage->image = 'NULL';
                    //$productImage->save();

                    /*$photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            // Specify the path within the public disk
            $path = $photo->storeAs('uploads/items', $filename, 'public');
            $item->photo = $filename; // Save the full path or just the filename, as needed
            $item->save();*/

                    $imageName = $product->id . '-' . $productImage->id . '-' . time() . '.' . $ext;
                    $productImage->image = $imageName;
                    $productImage->save();

                }
            }
            return redirect()->route('products.index')->with('success', 'Product created successfully!');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::orderBy('name','ASC')->get();

        $data= [];
        $data['product']=$product;
        $data['categories']=$categories;
        return view('admin.products.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $validatedData = $request->validate([
            'title' => 'required',
            'district' => 'required',
            'price' => 'required|numeric',
            'qty' => 'required',
            'category' => 'required|numeric',
            'is_featured' => 'required|in:Yes,No',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    /*public function destroy($id, Request $request)
    {
        $product = Product::find($id);

        if(empty($product)){
            return redirect()->route('products.index')
            ->with('error', 'Product not found.');
        }

        File::delete()
    }*/

}

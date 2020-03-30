<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use File;
use Image;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Nullable;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->orderBy('created_at', 'DESC')->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate
        $this->validate($request,[
            'code' => 'required|string|max:10|unique:products',
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:100',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);

        try {

            $photo = null;

            if ($request->hasFile('photo')) {
                $photo = $this->saveFile($request->name, $request->file('photo'));
            }

            $product = Product::create([
                'code' => $request->code,
                'name' => $request->name,
                'description' => $request->description,
                'stock' => $request->stock,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'photo' => $photo
            ]);

            return redirect(route('product.index'))
                ->with(['success' => 'Product : ' . $product->name . ' Added']);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['error' => $e->getMessage()]);
        }
    }

    public function saveFile($name, $photo)
    {
        $images = Str::slug($name) . time() . '.' . $photo->getClientOriginalExtension();

        $path = public_path('uploads/product');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        Image::make($photo)->save($path . '/' . $images);

        return $images;
    }

    public function destroy($id)
    {
        $products = Product::findOrFail($id);

        if(!empty($products->photo)){
            // Delete file photo from uploads/product
            File::delete(public_path('uploads/product/' . $products->photo));
        }

        // Delete product from table
        $products->delete();
        return redirect()->back()->with(['success' => 'Product : ' . $products->name . ' Deleted']);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // validate
        $this->validate($request,[
            'code' => 'required|string|max:10|exists:products,code',
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:100',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);

        try{
            $product = Product::findOrFail($id);
            $photo = $product->photo;

            if ($request->hasFile('photo')) {
                // check if photo not null file in folder uploads/product deleted
                !empty($photo) ? File::delete(public_path('uploads/product/' . $photo)):null;

                //uploading file
                $photo = $this->saveFile($request->name, $request->file('photo'));
            }

            //update database
            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'stock' => $request->stock,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'photo' => $photo
            ]);

            return redirect(route('product.index'))
                ->with(['success' => 'Product : ' . $product->name . ' Updated']);
        } catch(\Exception $e) {
            return redirect()->back()
                ->with(['error' => $e->getMessage()]);
        }
    }
}

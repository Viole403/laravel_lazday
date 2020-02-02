<?php

namespace App\Http\Controllers\Web;

use DB;
use Storage;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ImagesProduct;
use PhpParser\Node\Stmt\TryCatch;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $products = new Product();
        // $products =  ($request->search != null)
        //     ? $products->where('product','like',"%$request->search%")
        //         ->paginate(10)
        //     : $products->paginate(10);


        $products = new Product();
        $products = ($request->search != null)
        ? $products->where('product','like',"%$request->search%")
        ->paginate(10)
        : $products->paginate(10);

        return view('admin.master.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // DD($request->all());
        DB::beginTransaction();

        try {
            //code...

            $product = Product::create([
                "product" => $request->product,
                "price" => $request->price,
                "stock" => $request->stock,
                "description" => $request->description,
            ]);

            if ($request->hasFile('images')) {

                $arrayImages = [];
                foreach ($request->images as $value) {
                    # code...
                    $path = $value->store('product');

                    $columnsImage =[
                        "product_id" => $product->id,
                        "images" => $path,
                    ];

                    array_push($arrayImages,$columnsImage);
                }
                ImagesProduct::insert($arrayImages);
                dd($request->all());
            }
            DB::commit();
        } catch (\Exception $e) {
            //throw $th;
            DB::rollback();
            dd($e);
        }
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with(['imageRelation'])->find($id);
        return view('admin.master.product.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.master.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id,)
        $product = Product::find($id);
        $oldImages = ImagesProduct::where('product_id', $id)->get();

        DB::beginTransaction();

        try {
            //code...

            $product->update([
                "product" => $request->product,
                "price" => $request->price,
                "stock" => $request->stock,
                "description" => $request->description,
            ]);

            // dd($product);

            if ($request->hasFile('images')) {

                if (count($oldImages) >= 0) {

                    foreach ($oldImages as $old) {
                        // Storgae::delete([$old->image]);
                        Storage::delete([$old->image]);
                    }

                    ImagesProduct::where('product_id', $id)->delete();
                }

                $arrayImages = [];
                foreach ($request->images  as $value) {
                    $path = $value->store('product');

                    $columnsImage = [
                        "product_id" => $product->id,
                        "image" => $path,
                    ];

                    array_push($arrayImages, $columnsImage);
                }
                ImagesProduct::insert($arrayImages);
            }
            //  dd($arrayImages);

            DB::commit();
        } catch (\Exception $e) {
            //throw $th;
            DB::rollback();
            dd($e);
        }
        return redirect()->route("product.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $product = product::find($id);
        if (!$product) {
            abort(404);
        }
        $oldImages = ImagesProduct::where('product_id', $id)->get();
        if (count($oldImages) >= 0) {
            # code...
            foreach ($oldImages as $old) {
                Storage::delete($old->image);
                # code...
            }
            ImagesProduct::where('product_id', $id)->delete();
        }
        $product->delete();
        return redirect()->route("product.index");
    }
}

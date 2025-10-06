<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('sort')) {
            if ($request->sort === 'high') {
                $query->orderBy('price', 'desc');
            } elseif ($request->sort === 'low') {
                $query->orderBy('price', 'asc');
            }
        }

    $products = $query->paginate(6)->appends($request->all());
    return view('products.product', compact('products'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
            $validated['image'] = basename($path);
    }

    Product::create($validated);
    return redirect()->route('products.index');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // 1) バリデーション済みデータの取得
        $data = $request->validated();

        // 2) 新しい画像がある場合だけ差し替え
        if ($request->hasFile('image')) {
        // 旧ファイルを消すならここ（任意）
        if ($product->image && Storage::disk('public')->exists('images/' . $product->image)) {
            Storage::disk('public')->delete('images/' . $product->image);
        }

        $path = $request->file('image')->store('images', 'public'); // "images/xxxx.jpg"
        // 画面では asset('storage/images/'.$product->image) としているので
        // DBにはファイル名だけを入れる:
        $data['image'] = basename($path);
        } else {
        // 3) 画像未アップロード時は image を更新しない（既存を維持）
        unset($data['image']);
        }

        // 4) 更新
        $product->update($data);

        return redirect()
        ->route('products.store', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postDelete($product_id)
    {
        $product = Product::find($product_id);
        $product->delete();
        $message = "製品の削除が完了しました。";
        $products = Product::paginate(6);

        return redirect('/products')->with(compact('products','message'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = Product::query();

        if (!empty($keyword)) {
        $query->where('name', 'LIKE', "%{$keyword}%");
        }

        $products = $query->paginate(6)->appends($request->all());
        return view('products.product', compact('products', 'keyword'));
    }
}
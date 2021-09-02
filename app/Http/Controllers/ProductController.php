<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        $products = Product::Paginate(5);
        return view ('products', [
            'products' => $products
            
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, rules: [
        //     'image' => 'required|mimes:jpg,jpeg,png'
        // ]);

        // $file_name = $request->image->getClientOriginalName();
        // $request->image->storeAs('thumbnail', $file_name);

        // Post::create([
        //     'id' => auth()->user()->id,
        //     'product_name' => $request->product_name,
        //     'image' => $request->image
        // ]);


        // untuk upload image di storage laravel
        // $file_name = $request->image->getClientOriginalName();
        // $request->image->storeAs('thumbnail', $file_name);
        // dd('berhasil');
        // dd($request->image); melihat request image
        $request->validate([
            'product_name' => 'required|unique:products,product_name',
            'amount' => 'required|integer',
            'unit' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image'
        ], [
            'product_name.required' => 'Nama product harus diisi !!!',
            'product_name.unique' => 'Nama product sudah diinputkan !!!',
            'amount.required' => 'Jumlah barang harus diisi !!!',
            'amount.integer' => 'Jumlah barang harus diisi dengan angka !!!',
            'unit.required' => 'Satuan barang harus dipilih !!!',
            'price.required' => 'Harga barang harus diisi !!!',
            'price.numeric' => 'Harga barang harus diisi dengan angka !!!',
            'image.required' => 'Image harus diinput kan !!!',
            'image.image' => 'Format harus Image(jpeg, jpg, png, dll) !!!'
            
        ]);

        /* CARA 1
        DB::insert('insert into products (product_name, amount, unit, price) values (?, ?, ?, ?)', [
            $request->input('product_name'),
            $request->input('amount'),
            $request->input('unit'),
            $request->input('price')
        ]);*/

        /* CARA 2
        DB::table('products')->insert([
            'product_name' => $request->input('product_name'),
            'amount' => $request->input('amount'),
            'unit' => $request->input('unit'),
            'price' => $request->input('price')
        ]);*/

        $product = new Product;
        $product->product_name = $request->input('product_name');
        $product->amount = $request->input('amount');
        $product->unit = $request->input('unit');
        $product->price = $request->input('price');
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalName();
            $filename = time().'.'.$extention;
            $file->move('uploads/product/', $filename);
            $product->image =$filename;
        }
        $product->save();
        

        /* CARA 4
        $product = Product::create([
            'product_name' => $request->input('product_name'),
            'amount' => $request->input('amount'),
            'unit' => $request->input('unit'),
            'price' => $request->input('price')
        ]);*/

        // CARA 5 : apabila nama untuk semua variabel sudah sama
        
        // $product = Product::create($request->all());

        if ($product){
            //jika sukses
            session()->flash('success', 'Data berhasil disimpan.');
        }else{
            //jika gagal
            session()->flash('fail', 'Data gagal disimpan.');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrfail($id);
        
        return view('show-product', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('edit-product', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // $nama = $request->input('nama');
        // $jumlah = $request->input('jumlah');
        // $satuan = $request->input('satuan');
        // $harga = $request->input('harga');

        // $product = Product::find($id);
        // $product->product_name = $nama;
        // $product->amount = $jumlah;
        // $product->unit = $satuan;
        // $product->price = $harga;
        // $product->save();

        $product->update($request->all());
        $product->product_name = $request->input('product_name');
        $product->amount = $request->input('amount');
        $product->unit = $request->input('unit');
        $product->price = $request->input('price');
        if($request->hasfile('image')){
            $destination = 'uploads/product/'.$product->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalName();
            $filename = time().'.'.$extention;
            $file->move('uploads/product/', $filename);
            $product->image =$filename;
        }
        $product->update();

        if ($product){// if ($product->save()){
            //jika sukses
            session()->flash('success', 'Data berhasil diupdate.');
        }else{
            //jika gagal
            session()->flash('fail', 'Data gagal diupdate.');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();// $product = Product::destroy($id);

        if ($product){// if ($product->save()){
            //jika sukses
            session()->flash('success', 'Data berhasil dihapus.');
        }else{
            //jika gagal
            session()->flash('fail', 'Data gagal dihapus.');
        }
        return redirect()->back();
    }

    // public function upload(Request $request) {
        
    //     $product = new Product;
    //     $product->product_name = $request->input('product_name');
    //     $product->amount = $request->input('amount');
    //     $product->unit = $request->input('unit');
    //     $product->price = $request->input('price');
    // }

    public function upload($id) {
        
        $product = Product::findOrfail($id);
        return view('upload-image', [
            'product' => $product
        ]);
    }
}


// $product = new Product;
//         $product->product_name = $request->input('product_name');
//             $product->amount = $request->input('amount');
//             $product->unit = $request->input('unit');
//             $product->price = $request->input('price');
//             if($request->hasfile('image')){
//                 $file = $request->file('image');
//                 $extention = $file->getClientOriginalName();
//                 $filename = time().'.'.$extention;
//                 $file->move('uploads/products/',$filename);
//                 $product->image =$filename;
//             }
//             $product->save();
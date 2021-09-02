@extends('layouts.app2')

@section('content')
    <h3>Update Product</h3>

    <!-- Jika sukses -->
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <!-- @if(session()->has('success'))
        {{ session()->get('success') }}
    @endif -->

     <!-- Jika gagal  -->
    @if(session()->has('fail'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session()->get('fail') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <!-- @if(session()->has('fail'))
        {{ session()->get('fail') }}
    @endif -->

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama" name="product_name" value="{{ $product->product_name }}" disabled>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="text" class="form-control" id="jumlah" name="amount" value="{{ $product->amount }}" disabled>
        </div>
        <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <input type="text" class="form-control" id="satuan" name="amount" value="{{ $product->unit }}" disabled>  
            </select>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" name="price" value="{{ $product->price }}" disabled>
        </div>
        <div>
        <img src="{{ asset('uploads/product/'.$product->image) }}" width="150px" height="150px" alt="Image">
        </div>
@endsection
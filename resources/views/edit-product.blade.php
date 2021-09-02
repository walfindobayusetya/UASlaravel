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

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama" name="product_name" value="{{ $product->product_name }}">
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="text" class="form-control" id="jumlah" name="amount" value="{{ $product->amount }}">
        </div>
        <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <select id="satuan" name="unit" class="form-control">
                <option @if($product->unit == "Buah") selected @endif>Buah</option>
                <option @if($product->unit == "Liter") selected @endif>Liter</option>
                <option @if($product->unit == "Kg") selected @endif>Kg</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" name="price" value="{{ $product->price }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
            @error ('image')<div id="validationServer03Feedback" class="invalid-feedback"> {{ $message }} </div> @enderror
            <img src="{{ asset('uploads/product/'.$product->image) }}" width="70px" height="70px" alt="Image">
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
@endsection
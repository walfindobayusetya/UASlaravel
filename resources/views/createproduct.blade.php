@extends('layouts.app2')

@section('content')
    <h3>Create Product</h3>

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

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="product_name" class="form-label">Nama Produk</label>
            <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name"
            value="{{ old('product_name') }}">
            @error('product_name')<div id="validationServer03Feedback" class="invalid-feedback"> {{ $message }} </div>@enderror 
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Jumlah</label>
            <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount"
            value="{{ old('amount') }}">
            @error('amount')<div id="validationServer03Feedback" class="invalid-feedback"> {{ $message }} </div>@enderror 
        </div>
        <div class="mb-3">
            <label for="unit" class="form-label">Satuan</label>
            <select id="unit" name="unit" class="form-control @error('unit') is-invalid @enderror">
                <option value="">--- Pilihan ---</option>
                <option value="Buah" @if('Buah' == old('unit')) selected @endif>Buah</option>
                <option value="Liter" @if('Liter' == old('unit')) selected @endif>Liter</option>
                <option value="Kg" @if('Kg' == old('unit')) selected @endif>Kg</option>
            </select>
            @error('unit')<div id="validationServer03Feedback" class="invalid-feedback"> {{ $message }} </div>@enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
            value="{{ old('price') }}">
            @error('price')<div id="validationServer03Feedback" class="invalid-feedback"> {{ $message }} </div>@enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
            @error('image')<div id="validationServer03Feedback" class="invalid-feedback"> {{ $message }} </div>@enderror
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
@endsection
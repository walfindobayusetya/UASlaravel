@extends('layouts.app2')

@section('content')
    <h3>Data Products</h3>

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
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Products</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $no => $product)
                <tr>
                    <td>{{ $products->firstItem() + $no }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->amount }}</td>
                    <td>{{ $product->unit }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <img src="{{ asset('uploads/product/'.$product->image) }}" width="70px" height="70px" alt="Image">
                    </td>
                    <td>
                            <div class="btn-group" role="group" aria-label="Basic example" >                     
                            <a class="btn btn-primary btn-sm" href="{{ route('products.edit', $product->id) }}">Edit</a>
                            <a class="btn btn-success btn-sm" href="{{ route('products.show', $product->id) }}">Show</a>
                            <a class="btn btn-warning btn-sm" href="{{ URL::to('upload-image') }}/{{ $product->id }}">Upload</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm">Hapus</a></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
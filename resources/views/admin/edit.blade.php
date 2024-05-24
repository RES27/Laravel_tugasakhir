@extends('layout_admin.index')
@section('content')
<div class="container my-lg-3">
    {{-- @if ($errors->any())
        <div class="col-md-6 offset-3 bg-danger rounded px-3 py-2 text-white my-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <div class="row">
        <div class="col-md-6 offset-3 bg-info rounded py-3">
            <h1 class="text-center fw-bold">Tambah Data Produk</h1>
            <form class="mx-1 my-3" action="{{ route('product_update', ['id' => $list->id]) }}" method="POST">
                @csrf()
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-semibold">Nama Produk</label>
                    <input type="text" class="form-control" name="name" id="exampleFormControlInput1"
                        placeholder="{{$list->Nama}}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-semibold">Berat</label>
                    <input type="number" class="form-control" name="berat" id="exampleFormControlInput1"
                        placeholder="{{$list->Berat}}">
                        @error('berat')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-semibold">gambar</label>
                    <input type="file" class="form-control" name="gambar" id="exampleFormControlInput1"
                        placeholder="{{$list->Gambar}}">
                        @error('gambar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-semibold">Harga</label>
                    <input type="number" class="form-control" name="harga" id="exampleFormControlInput1"
                        placeholder="{{$list->Harga}}">
                        @error('harga')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-semibold">Stok</label>
                    <input type="number" class="form-control" name="stok" id="exampleFormControlInput1"
                        placeholder="{{$list->stock}}">
                        @error('stok')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-semibold">Kondisi Barang</label>
                    <select class="form-select" name="kondisi" id="">
                        <option value="0" selected>{{ $list->Kondisi }}</option>
                        <option value="Baru">Baru</option>
                        <option value="Bekas">Bekas</option>
                    </select>
                    @error('kondisi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label fw-semibold">Deskripsi</label>
                    <textarea class="form-control" placeholder="{{$list->Deskripsi}}" id="exampleFormControlTextarea1" name="deskripsi" rows="3"></textarea>
                    @error('deskripsi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex">
                    <button class=" mt-3 btn btn-lg btn-dark mx-auto" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layout_admin.index')
@section('content')
             @if ($errors->any())
                <div class="col-md-6 offset-3 bg-danger rounded px-3 py-2 text-white my-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
<div class="mx-lg-5 mt-lg-4 mb-lg-3">
    <div class="rounded bg-info pt-3 pb-3">
        <h2 class="text-center fw-bold mt-2">List Product</h2>
        <div class="mt-3 bg-dark mx-auto rounded" style="height: 3px;width: 75px"></div>
        <div class="d-flex m-auto p-auto my-2">
            {{-- <button type="button" class="btn btn-dark" >
                <a href="{{ route('cafe') }}" style="text-decoration: none; color: inherit; ">Product</a>
            </button> --}}
            <button type="button" class="btn btn-success" >
                <a href="{{ route('product_form') }}" style="text-decoration: none; color: inherit; ">Tambah Product</a>
            </button>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Stock</th>
                    <th>Berat</th>
                    <th>Harga</th>
                    <th>Kondis</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($product as $post)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $post->Nama }}</td>
                        <td>{{ $post->stock }}</td>
                        <td>{{ $post->Berat }}</td>
                        <td>{{ $post->Harga}}</td>
                        <td>{{ $post->Kondisi}}</td>

                        <td>
                            <a href="{{ route('product_edit', $post->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('product_delete', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="d-flex">
            {{ $posts->links() }}
        </div> --}}
    </div>

        </div>
    </div>
</div>
@endsection

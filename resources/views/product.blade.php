@extends('layout.index')
@section('content')
<div class="mx-lg-5 mt-lg-4 mb-lg-3">
    <div class="rounded bg-info pt-3 pb-3">
        <h2 class="text-center fw-bold mt-2">PRODUCTS</h2>
        <div class="mt-3 bg-dark mx-auto rounded" style="height: 3px;width: 75px"></div>
        <div class="d-flex justify-content-between my-2">
        </div>
        <div class="grid mx-3 mt-4">
            <div class="row row-gap-4">
                @foreach ($product as $item)
                    <div class="col-3">
                        <div class="card bg-white w-100">
                            <img class="rounded" src="{{ asset('storage/images/' . $item->Gambar) }}">
                            <div class="card-body">
                                <div class="d-flex justify-content-between my-2">
                                    <p class="card-title fw-bold my-auto" style="font-size: 24px">
                                        {{ $item->Nama }}
                                    </p>
                                    @if ($item->Kondisi == 'Baru')
                                        <p class="my-auto rounded py-1 bg-success px-2 fw-semibold"
                                            style="font-size: 16px">{{ $item->Kondisi }}
                                        </p>
                                    @else
                                        <p class="my-auto rounded py-1 bg-warning px-2 fw-semibold"
                                            style="font-size: 16px">{{ $item->Kondisi }}
                                        </p>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-between my-2">
                                    <p class="my-auto rounded py-1 bg-success px-2 fw-semibold"
                                        style="font-size: 16px">{{ $item->Berat }} Gram
                                    </p>
                                    <p class="my-auto rounded py-1 bg-info px-2 fw-semibold"
                                        style="font-size: 16px">Rp.
                                        {{ number_format($item->Harga, 0, ',', '.') }}
                                    </p>
                                    <p class="my-auto rounded py-1 bg-success px-2 fw-semibold"
                                        style="font-size: 16px">{{ $item->stock }} Pcs
                                    </p>
                                </div>
                                <p class=""
                                    style="overflow: hidden;max-width: 400px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; margin: 10px auto;">
                                    {{ $item->Deskripsi }}
                                </p>
                                <button class="btn btn-primary w-100">Pesan Sekarang</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

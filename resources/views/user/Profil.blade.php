@extends('layout.index')
@section('content')
<div class="mx-lg-5 mt-lg-4 mb-lg-3">
    <div class="rounded  pt-3 pb-3">
        <h2 class="text-center fw-bold mt-2">Profil</h2>
        <div class="mt-3 bg-dark mx-auto rounded" style="height: 3px;width: 75px"></div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="col-md-4 p-2 m-2">
                <div class="card">
                    @foreach ($list as $item)
                    <div class="card-body">
                        <h5 class="card-title">Role : {{ $item->role }}</h5>
                        <p class="card-title">Nama : {{ $item->name }}</p>
                        <p class="card-text">Email :{{ $item->email }}</p>
                        <p class="card-text">Jenis Kelamin :{{ $item->gender }}</p>
                        <p class="card-text">Alamat :{{ $item->address }}</p>
                    </div>
                    <button class=" mt-3 btn btn-lg btn-danger mx-auto" type="submit"><a href="{{route('logout')}}">Logout</a></button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
@endsection

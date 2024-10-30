@extends('dashboard')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Bookings</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('bookings') }}">Bookings</a>
                        </li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('bookings.store') }}" method="post" enctype="multipart/form-data"
                                class="needs-validation" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="Class" class="form-label">Class</label>
                                            <input type="class" class="form-control @error('class') is-invalid @enderror"
                                                id="Class" placeholder="Masukkan Class" name="class">
                                            @error('class')
                                                <div class="invalid-feedback">
                                                    ! Class tidak boleh kosong
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="Price" class="form-label">Price</label>
                                            <input type="price" class="form-control @error('price') is-invalid @enderror"
                                                id="Price" placeholder="Masukkan Price" name="price">
                                            @error('price')
                                                <div class="invalid-feedback">
                                                    ! Price tidak boleh kosong
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-4">
                                    <label for="bookDropdown" class="form-label">Book</label>
                                    <select class="form-select @error('id_book') is-invalid @enderror" id="bookDropdown"
                                        aria-label="Pilih buku" name="id_book">
                                        <option selected="">Pilih buku</option>
                                        @foreach ($book as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_book')
                                        <div class="invalid-feedback">
                                            ! Book tidak boleh kosong
                                        </div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection

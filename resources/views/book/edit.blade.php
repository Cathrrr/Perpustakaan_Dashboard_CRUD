@extends('dashboard')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Book</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">BOOKS</a>
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
                            <form action="{{ route('book.update', $book->id) }}" method="POST"
                                enctype="multipart/form-data" class="needs-validation" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="images" class="form-label">Image</label>
                                    <input class="form-control" type="file" id="images" name="images">
                                </div>
                                <div class="mb-3">
                                    <label for="Title" class="form-label">Title</label>
                                    <input type="title" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ $book->title }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">
                                            x The title field is required.
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="Author" class="form-label">Author</label>
                                            <input type="author" class="form-control @error('author') is-invalid @enderror"
                                                id="Author" name="author" value="{{ $book->author }}" required>
                                            @error('author')
                                                <div class="invalid-feedback">
                                                    x The author field is required.
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="Pages" class="form-label">Pages</label>
                                            <input type="pages" class="form-control @error('pages') is-invalid @enderror"
                                                id="Pages" name="pages" value="{{ $book->pages }}" required>
                                            @error('pages')
                                                <div class="invalid-feedback">
                                                    x The pages field is required.
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Edit</button>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection

@extends('app')

@section('content')
    <div class="container w-25 border p-4">
        <form action="{{ route('categories-store') }}" method="POST">
            @csrf
            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif


            @error('name')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            @error('color')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            <div class="mb-3">
                <label for="name" class="form-label">Category</label>
                <input type="text" name="name" class="form-control">

            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="color" name="color" class="form-control">

            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>

        @foreach ($categories as $category)
            <div class="row py-1">
                <div class="col-md-9 d-flex align-items-center ">
                    <span class="color-container me-2" style="background-color: {{ $category->color }}"></span>
                    <a class="text-black" href="{{ route('categories-show', ['id' => $category->id]) }}">
                        {{ $category->name }}</a>
                </div>



                <div class="col-md-3 d-flex justify-content-end">

                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                        data-bs-target="#{{ $category->id }}">Delete</button>
                </div>
            </div>

            <div class="modal fade" id="{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('categories-delete', [$category->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

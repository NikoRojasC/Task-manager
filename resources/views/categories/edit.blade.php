@extends('app')

@section('content')
    <div class="container w-25 border p-4">
        <form action="{{ route('categories-update', [$category->id]) }}" method="POST">
            @method('PATCH')
            @csrf


            <div class="mb-3">
                <label for="name" class="form-label">Edit category</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}">

            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Edit color</label>
                <input type="color" name="color" class="form-control" value="{{ $category->color }}">

            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

        <div>
            @if ($category->todos->count() > 0)
                @foreach ($category->todos as $todo)
                    <div class="row py-1">
                        <div class="col-md-9 d-flex align-items-center">
                            <a class="text-black"
                                href="{{ route('todos-show', ['id' => $todo->id]) }}">{{ $todo->task }}</a>
                        </div>

                        <div class="col-md-3 d-flex justify-content-end">
                            <form action="{{ route('todos-delete', [$todo->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="py-1">
                    <h5>No task for this category</h5>
                </div>
            @endif
        </div>


    </div>
@endsection

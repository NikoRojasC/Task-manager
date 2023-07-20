@extends('app')

@section('content')
    <div class="container w-25 border p-4">
        <form action="{{ route('todos') }}" method="POST">
            @csrf
            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif


            @error('task')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            <div class="mb-3">
                <label for="task" class="form-label">Task to do</label>
                <input type="text" name="task" class="form-control">
            </div>

            <div class="mb-3">
                <label for="task" class="form-label">Category</label>
                <select name="categorie_id" id="categories" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">add</button>
        </form>

        @foreach ($todos as $todo)
            <div class="row py-1">
                <div class="col-md-9 d-flex align-items-center">
                    @php
                        $id = $todo->categorie_id;
                        $color = collect($categories)->first(function ($category) use ($id) {
                            return $category->id === $id;
                        });
                    @endphp
                    <span class="color-container me-2" style="background-color: {{ $color->color }}"></span>
                    <a class="text-black" href="{{ route('todos-show', ['id' => $todo->id]) }}">{{ $todo->task }}</a>
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
    </div>
@endsection

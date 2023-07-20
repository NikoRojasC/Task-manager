@extends('app')

@section('content')
    <div class="container w-25 border p-4">
        <form action="{{ route('todos-edit', [$todo->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif


            @error('task')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            <div class="mb-3">
                <label for="task" class="form-label">Task to edit</label>
                <input type="text" name="task" class="form-control" value="{{ $todo->task }}">
            </div>
            <button type="submit" class="btn btn-success">save</button>
        </form>


    </div>
@endsection

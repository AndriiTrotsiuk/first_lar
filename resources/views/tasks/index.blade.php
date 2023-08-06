@extends('layouts.default')

@section('content')
    <h2>All tasks</h2>
    @include('common.errors')
    <form action="{{ route('tasks.index') }}" method="post">
       {{ csrf_field() }}
        <label>Task name:
            <input type="text" name="name" value="{{ old('name') }}">
        </label>
        <input type="submit">
    </form>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->name }}</td>
                    <td>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
                            <button>Delete</button>
                        </form>
                        <form action="{{ route('tasks.edit', $task) }}" method="get">
                            <button>Edit</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
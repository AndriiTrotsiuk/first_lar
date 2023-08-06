@extends('layouts.default')

@section('content')
    <h2>Edit task</h2>
    @include('common.errors')
    <form action="{{ route('tasks.update', $task) }}" method="post">
        {{ csrf_field() }}
        {{method_field('PATCH')}}
        <label>Task name:
            <input type="text" name="name" value="{{ old('name', $task->name)}}">
        </label>
        <input type="submit" value="Save">
    </form>
@endsection
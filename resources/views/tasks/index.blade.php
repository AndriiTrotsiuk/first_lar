@extends('layouts.default')

@section('content')
    <h2>All tasks</h2>
    <form action="/tasks" method="post">
       {{ csrf_field() }}
        <label>Task name:
            <input type="text" name="name">
        </label>
        <input type="submit">
    </form>
{{--    TODO--}}
@endsection
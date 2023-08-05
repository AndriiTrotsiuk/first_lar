@extends('layouts.default')

@section('content')
    <h2>All tasks</h2>
    @include('common.errors')
    <form action="/tasks" method="post">
       {{ csrf_field() }}
        <label>Task name:
            <input type="text" name="name" value="{{ old('name') }}">
        </label>
        <input type="submit">
    </form>
{{--    TODO--}}
@endsection
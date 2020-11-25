@extends('layout')

@section('content')

    <div class="container">
        <form action="{{ url('/create') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-row">
                <label class="">URL:</label>
                <input type="text" name="url" class="form-control">

                @error('url')
                <div class="alert alert-danger">{{ ($message) }}</div>
                @enderror
            </div>

            <div class="form-row">
                <input type="submit" value="Добавить">
            </div>
        </form>
    </div>

@endsection()


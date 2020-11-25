@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9">
                <form action="/search">
                    <div class="form-group">
                        <input type="text" name="search" placeholder="Поиск" class="form-control">
                        <input type="submit" value="Найти">
                    </div>

                </form>

                {{  ($bookmarks->links()) }}

                @include('_table', compact('bookmarks'))

                {{ $bookmarks->links() }}
            </div>
        </div>
    </div>

@endsection()


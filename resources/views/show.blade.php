@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <dl class="row">
                    <dt class="col-sm-3">Заголовок</dt>
                    <dd class="col-sm-9">{{ $bookmark->title }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-3">Дата добавления</dt>
                    <dd class="col-sm-9">{{ optional($bookmark->created_at)->format('Y-m-d H:i') }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-3">Favicon</dt>
                    <dd class="col-sm-9"><img src="{{ ($bookmark->favicon_path) }}" /></dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-3">URL</dt>
                    <dd class="col-sm-9">{{ $bookmark->url }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-3">Meta Description</dt>
                    <dd class="col-sm-9">{{ $bookmark->meta_description }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-3">Meta Keywords</dt>
                    <dd class="col-sm-9">{{ $bookmark->meta_keywords }}</dd>
                </dl>

            </div>
        </div>
    </div>

@endsection()


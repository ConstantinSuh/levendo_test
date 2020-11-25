<table class="table">
    <thead>
    <tr class="">
        <th>@sortablelink('created_at', 'Дата добавления')</th>
        <th>Icon</th>
        <th>@sortablelink('title', 'Заголовок')</th>
        <th>@sortablelink('url', 'URL')</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($bookmarks as $bookmark)
        <tr>
            <td>
                <span>{{ optional($bookmark->created_at)->format('Y-m-d H:i') }}</span>
            </td>
            <td>
                <a href="{{ route('bookmark.show', ['id' => $bookmark->id]) }}">
                    <img width="32" src="{{ ($bookmark->favicon_path) }}"/>
                </a>
            </td>
            <td>
                <a href="{{ route('bookmark.show', ['id' => $bookmark->id]) }}">{{ $bookmark->title }}</a>
            </td>
            <td>
                <a href="{{$bookmark->url}}" target="_blank"> {{ $bookmark->url }}</a>
            </td>

        </tr>
    @endforeach
    </tbody>
</table>

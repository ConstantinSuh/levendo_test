<?php


namespace App\Http\Controllers;


use App\Exceptions\IncorrectUrlException;
use App\Http\Requests\BookmarkStoreRequest;
use App\Models\Bookmark;
use App\Services\BookmarkStoreService;

class BookmarkController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $bookmarks = Bookmark::sortable()
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('index', compact('bookmarks'));
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(string $id)
    {
        $bookmark = Bookmark::findOrFail($id);

        return view('show', compact('bookmark'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('create');
    }

    /**
     * @param BookmarkStoreRequest $request
     * @param BookmarkStoreService $service
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(BookmarkStoreRequest $request, BookmarkStoreService $service)
    {
        try {
            $bookmark = $service->storeFromUrl($request->input('url'));
        } catch (IncorrectUrlException $exception) {
            return redirect()
                ->back()
                ->withErrors(['url' => $exception->getMessage()]);
        }

        return redirect(route('bookmark.show', ['id' => $bookmark->id]));
    }

    public function delete()
    {

    }

}

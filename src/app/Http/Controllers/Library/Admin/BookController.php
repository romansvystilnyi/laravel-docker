<?php

namespace App\Http\Controllers\Library\Admin;

use App\Http\Requests\BookCreateRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(__METHOD__);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $i = 1;
        $genres = DB::table('categories')->pluck('genre');
        return view('library.book.admin.create', compact('genres', 'i'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookCreateRequest $request)
    {
        $data = $request->input();
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }
        $data = array_merge($data, [
            'category_id' => $data['genre'],
            'content_raw' => $data['description'],
            'content_html' => '<p>' . $data['description'] . '<p>',
        ]);
        $book = new Book($data);
        $book->save();

        if ($book->exists) {
            if (!empty($request->file('image'))) {
                $request->file('image')->storeAs('books', $data['slug'],
                    'public');
            }
            return redirect()
                ->route('library.admin.books.edit', $book->id)
                ->with(['success' => 'Saved successfully!']);
        } else {
            return back()->withErrors(['msg' => "Error"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $i = 1;
        $genres = DB::table('categories')->get();
        $book = Book::query()->firstWhere('id', $id);
        return view('library.book.admin.edit', compact('genres', 'i', 'book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookUpdateRequest $request, $id)
    {
        $book = Book::find($id);
        $data = $request->all();

        if (empty($book)) {
            return back()->withErrors(['msg' => "Not found id=[{$id}]"]);
        }

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $data = array_merge($data, [
            'category_id' => $data['genre'],
            'content_raw' => $data['description'],
            'content_html' => '<p>' . $data['description'] . '<p>',
        ]);
        $result = $book->update($data);
        if ($result) {
            if (!empty($request->file('image'))) {
                $request->file('image')->storeAs('books', $data['slug'],
                    'public');
            }
            return redirect()
                ->route('library.admin.books.edit', $book->id)
                ->with(['success' => 'Saved successfully!']);
        } else {
            return back()->withErrors(['msg' => "Error"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $result = $book->delete($book->id);

        if ($result) {
            return redirect()
                ->route('library.book.index')
                ->with(['success' => 'Deleted successfully!']);
        } else {
            return back()->withErrors(['msg' => "Error"]);
        }
    }
}

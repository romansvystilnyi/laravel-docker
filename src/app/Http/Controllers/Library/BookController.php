<?php

namespace App\Http\Controllers\Library;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Models\Book;

class BookController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $queryBook = Book::query();
        $title = 'Library!';

        if ($request->filled('genre')) {
            $queryBook->where('genre', '=', $request->genre);
        }
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case "Number +":
                    $queryBook->orderBy('id');
                    break;
                case "Number -":
                    $queryBook->orderBy('id', 'desc');
                    break;
                case "Author Sort A to Z":
                    $queryBook->orderBy('author');
                    break;
                case "Author Sort Z to A":
                    $queryBook->orderBy('author', 'desc');
                    break;
                case "Title Sort A to Z":
                    $queryBook->orderBy('title');
                    break;
                case "Title Sort Z to A":
                    $queryBook->orderBy('title', 'desc');
                    break;
            }
        }
        if ($request->filled('search')) {
            $q = $request->input('search');
            $queryBook->where('author', 'LIKE', "%{$q}%")
            ->orWhere('title', 'LIKE', "%{$q}%");
        }

        $items = $queryBook->join('categories', 'books.category_id', '=', 'categories.id')
            ->select('categories.genre', 'books.id', 'books.category_id', 'books.title', 'books.author', 'books.content_html', 'books.slug')
            ->paginate(5);

        return view('library.book.index', compact('title', 'items', 'genres'));
    }
}

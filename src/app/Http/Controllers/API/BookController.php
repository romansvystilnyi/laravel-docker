<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\Controller;
use App\Http\Requests\APIBookCreateRequest;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class BookController extends Controller
{
    /**
     * @OA\Get(
     *     path="/books",
     *     operationId="booksAll",
     *     tags={"Library"},
     *     summary="Display the list of books",
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="The page number",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="successful operation",
     *     )
     * )
     *
     * Display the list of books.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $queryBook = Book::query()->join('categories', 'books.category_id', '=', 'categories.id')
            ->select('categories.genre', 'books.id', 'books.category_id', 'books.title', 'books.author', 'books.content_html', 'books.slug')
            ->paginate();
        return response()->json([
            'status' => 'success',
            'status_code' => Response::HTTP_OK,
            'data' => [
                'books' => $queryBook
            ],

            'message' => 'All books pulled out successfully'

        ]);
    }

    /**
     * @OA\Post(
     *     path="/books",
     *     tags={"Library"},
     *     summary="Add a new book to the library",
     *     description="",
     *     operationId="addBook",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/StoreRequest")
     *     ),
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Response(
     *         response="201",
     *         description="successful operation",
     *     )
     * )
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(APIBookCreateRequest $request): JsonResponse
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

        return response()->json([
            'status' => 'success',
            'status_code' => Response::HTTP_OK,
            'data' => [
                'books' => $book
            ],

            'message' => 'Books added successfully'

        ]);
    }

    /**
     * @OA\Put(
     *     path="/books/{id}",
     *     operationId="bookUpdate",
     *     tags={"Library"},
     *     summary="Update book by ID",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of book",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="successful operation",
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateRequest")
     *     ),
     * )
     *
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $data = $request->all();
        $book = Book::query()->findOrFail($id);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $data = array_merge($data, [
            'category_id' => $data['genre'],
            'content_raw' => $data['description'],
            'content_html' => '<p>' . $data['description'] . '<p>',
        ]);
        $book->fill($data);
        $book->save();

        return response()->json($book);
    }

    /**
     * @OA\Delete(
     *     path="/books/{id}",
     *     operationId="deleteBook",
     *     tags={"Library"},
     *     summary="Delete book by ID",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of book",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *         response="202",
     *         description="Deleted",
     *     ),
     * )
     *
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(int $id): JsonResponse
    {
        $book = Book::query()->findOrFail($id);
        $book->delete();

        return response()->json([
            'status' => 'success',
            'status_code' => Response::HTTP_OK,
            'data' => [
                'books' => $book
            ],

            'message' => 'Books Deleted successfully'

        ]);
    }
}

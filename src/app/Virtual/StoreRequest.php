<?php


namespace App\Virtual;

/**
 * @OA\Schema(
 *     type="object",
 *     title="Example storring request",
 *     description="Some simple request createa as example",
 * )
 *
 * Class StoreRequest
 * @package App\Virtual
 */
class StoreRequest
{
    /**
     * @OA\Property(
     *     title="title",
     *     description="Title for storring",
     *     example="Title book",
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *     title="slug",
     *     description="slug for storring(generated automatically)",
     *     example="",
     * )
     *
     * @var string
     */
    public $slug;

    /**
     * @OA\Property(
     *     title="genre",
     *     description="category_id for storring(from 1 to 10)",
     *     example="1",
     * )
     *
     * @var string
     */
    public $genre;

    /**
     * @OA\Property(
     *     title="author",
     *     description="Author name for storring",
     *     example="test author",
     * )
     *
     * @var string
     */
    public $author;

    /**
     * @OA\Property(
     *     title="description",
     *     description="Description for storring",
     *     example="About our company",
     * )
     *
     * @var string
     */
    public $description;
}

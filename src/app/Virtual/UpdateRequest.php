<?php


namespace App\Virtual;

/**
 * @OA\Schema(
 *     type="object",
 *     title="Example updating request",
 *     description="Some simple request createa as example",
 * )
 *
 * Class StoreRequest
 * @package App\Virtual
 */
class UpdateRequest
{
    /**
     * @OA\Property(
     *     title="title",
     *     description="Update title for storring",
     *     example="Title book",
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *     title="slug",
     *     description="Update slug for storring(generated automatically)",
     *     example="",
     * )
     *
     * @var string
     */
    public $slug;

    /**
     * @OA\Property(
     *     title="genre",
     *     description="Update category_id for storring(example from 1 to 10)",
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
     *     example="Update test author",
     * )
     *
     * @var string
     */
    public $author;

    /**
     * @OA\Property(
     *     title="description",
     *     description="Description for storring",
     *     example="Update.About our company",
     * )
     *
     * @var string
     */
    public $description;
}

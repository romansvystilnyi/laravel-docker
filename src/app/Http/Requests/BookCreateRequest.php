<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'min:1|max:200',
            'slug' => 'max:200|unique:books,slug',
            'genre' => 'exists:categories,id',
            'author' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:500',
            'image' => 'nullable|mimes:png,jpg,jpeg|file|max:1000|dimensions:min_width=100,min_height=100',
        ];
    }
}

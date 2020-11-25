<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class BookmarkStoreRequest extends \Illuminate\Foundation\Http\FormRequest
{

    public function rules()
    {
        return [
            'url' => [
                'required',
                Rule::unique('bookmarks', 'url'),
            ],
        ];
    }
}

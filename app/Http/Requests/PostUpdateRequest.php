<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'user_id'    => 'required|integer',
            'category_id'=> 'required|integer',
            'title'      => 'required',
            'slug'       => ['required', Rule::unique('posts')->ignore($this->slug,'slug')],
            'tags'       => 'required|array',
            'status'     => 'required|in:DRAFT,PUBLISHED',
            // 'excerpt'    => 'required',
            'body'       => 'required'
        ];

        if ($this->get('file'))
            $rules = array_merge($rules, ['file' => 'mimes:jpg,jpeg,png']);

        return $rules;
    }
}

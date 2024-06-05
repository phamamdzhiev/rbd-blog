<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'title' => 'required|max:250',
            'content' => 'required|max:2500',
            'image' => ['required', 'max:2048'],
            'is_published' => 'required|boolean'
        ];

        if ($this->route('article')) {
            $rules['image'] = ['nullable', 'max:2048'];
        }

        return $rules;
    }

    public function messages()
    {
        //customize messages for rules
        return parent::messages(); // TODO: Change the autogenerated stub
    }
}

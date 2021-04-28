<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TweetsRequest extends FormRequest
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
            'title' => 'required|',
            'tweet' => 'required|max:140',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルを入力してください',
            'tweet.required' => 'ツイート内容を入力してください',
            'tweet.max' => '内容は140字以内で入力してください。',
        ];
    }
}

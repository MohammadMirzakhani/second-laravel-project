<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
        return
        [
            'title'=>'required|bail',
            'body'=>'required',
            'Image'=>'required|max:10000|mimes:png,jpg',
        ];
    }
    public function messages()
    {
        return
        [
            'title.required'=>'فیلد موضوع اجباری میباشد',
            'body.required'=>'فیلد توضیحات اجباری میباشد',

        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:5',
            'content'=> 'required',
            'photo_id'=> 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'حقل العنوان مطلوب. ',
            'title.min' => 'يجب ألا يقل العنوان عن 5 أحرف. ',
            'content.required'=>'حقل المحتوى مطلوب.',
            'photo_id.required'=>'حقل لصورة مطلوب.'
        ];
    }
}

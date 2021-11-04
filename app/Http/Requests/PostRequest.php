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


    public function rules()
    {
        if (request()->edit_id){
            return [
                'title' => 'required|min:5',
                'content'=> 'required',
//                'slider'=>'required'
            ];
        }
        return [
            'title' => 'required|min:5',
            'content'=> 'required',
            'photo'=> 'required',
//            'slider'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'حقل العنوان مطلوب. ',
            'title.min' => 'يجب ألا يقل العنوان عن 5 أحرف. ',
            'content.required'=>'حقل المحتوى مطلوب.',
            'photo.required'=>'حقل لصورة مطلوب.'
        ];
    }
}

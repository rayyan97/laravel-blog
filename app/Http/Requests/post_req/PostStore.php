<?php

namespace App\Http\Requests\post_req;

use Illuminate\Foundation\Http\FormRequest;

class PostStore extends FormRequest
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
            'title'=>'required|unique:posts',
            'description'=>'required',
            'mycontent'=>'required',
            'published_at'=>'required',
            'image'=> 'required|image',
            'categories'=> 'required'
        ];
    }
}

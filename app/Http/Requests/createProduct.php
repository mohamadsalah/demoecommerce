<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createProduct extends FormRequest
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
        'img1' =>'
           required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',

        'img2' => '
          nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        'img3' => ' 
            nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        'img4' => ' 
            image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        'img5' => '
            nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        'img6' => ' 
           nullable| image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        'price' => 'required|integer',
        'category' => 'required',
        'brand' => 'required',
        'location' => 'required',
        'describtion' => 'required',
        'name' => 'required',
        'year' => 'required|integer',
        ];
    }
}

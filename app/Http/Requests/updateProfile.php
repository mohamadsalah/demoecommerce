<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateProfile extends FormRequest
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
        'phone' =>'nullable|regex:/(01)[0-9]{9}/',
        'password1'=>'nullable|min:6|same:password2',
        'name' => 'nullable|min:6',
        'year' => 'nullable|min:4|integer',
        ];

      
    }
}

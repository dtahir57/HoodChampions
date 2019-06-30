<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return [
                        'title' => 'required|max:255|string',
                        'categoryable_type' => 'required',
                        'image' => 'required',
                        'image.*' => 'image|mimes:png,jpg,gif|max:300'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'title' => 'required|max:255|string',
                        'categoryable_type' => 'required',
                        'image' => 'required',
                        'image.*' => 'image|mimes:png,jpg,gif|max:300'
                    ];
                }
            default:
                return [];
        }
    }
}

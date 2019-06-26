<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
                        'user_id' => 'required',
                        'hood_id' => 'required',
                        'title' => 'required|max:255|string',
                        'description' => 'required|max:1000|text',
                        'price' => 'required|float|min:0',
                        'email' => 'required|max:255|string',
                        'contact_no' => 'required|max:255|string',
                        'image' => 'required|string',
                        'image.*' => 'image|mimes:png,jpg,gif|max:300'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'user_id' => 'required',
                        'hood_id' => 'required',
                        'title' => 'required|max:255|string',
                        'description' => 'required|max:1000|text',
                        'price' => 'required|float|min:0',
                        'email' => 'required|max:255|string',
                        'contact_no' => 'required|max:255|string',
                        'image' => 'required|string',
                        'image.*' => 'image|mimes:png,jpg,gif|max:300'
                    ];
                }
            default:
                return [];
        }
    }
}

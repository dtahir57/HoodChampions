<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
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
                        'hood_id' => 'required',
                        'category_id' => 'required',
                        'user_id' => 'required',
                        'type' => 'required',
                        'title' => 'required|max:30|string',
                        'description' => 'required|max:1000',
                        'about_us' => 'required|max:30|string',
                        'email' => 'required|max:30|string',
                        'contact_no' => 'required|max:30|string',
                        'meetup_place' => 'required|max:30|string',
                        'image' => 'required',
                        'image.*' => 'image|mimes:png,jpg,gif|max:300'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'hood_id' => 'required',
                        'category_id' => 'required',
                        'user_id' => 'required',
                        'type' => 'required',
                        'title' => 'required|max:30|string',
                        'description' => 'required|max:1000',
                        'about_us' => 'required|max:30|string',
                        'email' => 'required|max:30|string',
                        'contact_no' => 'required|max:30|string',
                        'meetup_place' => 'required|max:30|string',
                        'image' => 'required',
                        'image.*' => 'image|mimes:png,jpg,gif|max:300'
                    ];
                }
            default:
                return [];
        }
    }
}

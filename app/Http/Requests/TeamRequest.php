<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
                        'users' => 'required|array',
                        'title' => 'required|max:255|string',
                        'max_no_of_players' => 'required|min:1',
                        'description' => 'required|max:1000',
                        'about_us' => 'required|max:30',
                        'email' => 'required|string',
                        'contact_no' => 'required|string',
                        'meetup_place' => 'required|string|max:30',
                        'image' => 'required',
                        'image.*' => 'image|mimes:png,jpg,gif|max:300'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'hood_id' => 'required',
                        'users' => 'required|array',
                        'title' => 'required|max:255|string',
                        'max_no_of_players' => 'required|min:1',
                        'description' => 'required|max:1000',
                        'about_us' => 'required|max:30',
                        'email' => 'required|string',
                        'contact_no' => 'required|string',
                        'meetup_place' => 'required|string|max:30',
                        'image' => 'required',
                        'image.*' => 'image|mimes:png,jpg,gif|max:300'
                    ];
                }
            default:
                return [];
        }
    }
}

<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                        'email' => 'required|max:255|unique:users',
                        'name' => 'required|max:255',
                        'username' => 'required|max:255|unique:users',
                        'hood_id' => 'required',
                        'phone_number' => 'required|max:255|unique:users',
                        'gender' => 'required|boolean',
                        'date_of_birth' => 'required'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'email' => 'required|max:255',
                        'name' => 'required|max:255',
                        'username' => 'required|max:255',
                        'hood_id' => 'required',
                        'phone_number' => 'required|max:255',
                        'gender' => 'required|boolean',
                        'date_of_birth' => 'required'
                    ];
                }
            default:
                return [];
        }
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BattleRequest extends FormRequest
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
        switch($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST':
                return [
                    'hood_id' => 'required',
                    'category_id' => 'required',
                    'teams' => 'required|array',
                    'title' => 'required|max:255|string',
                    'max_no_of_teams' => 'required|max:255',
                    'email' => 'required|max:30',
                    'contact_no' => 'required|max:20',
                    'meetup_place' => 'required|string|max:30',
                    'about_us' => 'required|max:255',
                    'description' => 'required|max:1000',
                    'image' => 'required',
                    'image.*' => 'image|mimes:png,jpg,gif|max:300'
                ];
            case 'UPDATE':
                return [
                    'hood_id' => 'required',
                    'category_id' => 'required',
                    'teams' => 'required|array',
                    'title' => 'required|max:255|string',
                    'max_no_of_teams' => 'required|max:255',
                    'email' => 'required|max:30',
                    'contact_no' => 'required|max:20',
                    'meetup_place' => 'required|string|max:30',
                    'about_us' => 'required|max:255',
                    'description' => 'required|max:1000',
                    'image' => 'required',
                    'image.*' => 'image|mimes:png,jpg,gif|max:300'
                ];
            default:
                return [];
        }
    }
}

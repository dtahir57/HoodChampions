<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HoodRequest extends FormRequest
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
                    'planning_area_name' => 'required|max:225|unique:hoods',
                    'region' => 'required|max:255'
                ];
            case 'UPDATE':
                return [
                    'planning_area_name' => 'required|max:225',
                    'region' => 'required|max:255'
                ];
            default:
                return [];
        }
    }
}

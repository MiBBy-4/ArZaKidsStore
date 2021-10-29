<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'color' => 'required|string|max:50',
            'price' => 'required|min:0|max:99999',
            'composition' => 'required|string',
            'size' => 'required|string',
            'image' => 'required|active_url',
            'is_active' => 'required|boolean',
        ];
    }

}

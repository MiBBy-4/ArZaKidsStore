<?php

namespace App\Http\Requests\main\order;

use App\Rules\Phone;
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
            'FIO' => ['required','string','max:255'],
            'email' => ['required','email'],
            'phone_number' => ['required', new Phone],
            'adress' => ['required', 'string'],
        ];
    }
}

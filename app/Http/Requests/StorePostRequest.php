<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required','string','min:4','max:64'],
            'type'=>['required','string','min:3','max:64'],
            // 'price' => 'required|numeric',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif',
            // 'marketable_number' => 'required|numeric'
           
        ];
    }
}

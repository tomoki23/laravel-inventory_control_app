<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockPostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tool_name' => 'required|max:255',
            'quantity' => 'required|numeric|min:1|max:1000'
        ];
    }
}

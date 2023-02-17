<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportPostRequest extends FormRequest
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
            'user_name' => 'required|max:255',
            'site_name' => 'required|max:255',
            'member' => 'nullable|array',
            'content' => 'required|max:1000'
        ];
    }
}

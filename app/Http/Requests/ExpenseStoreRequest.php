<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseStoreRequest extends FormRequest
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
        $rules =  [
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'date' => 'required|date|date_format:Y-m-d',
            'description' => 'required|string|max:191',
            'value' => 'required|numeric|min:0'
        ];
        
        return $rules;
    }
}

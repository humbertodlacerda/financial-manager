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
            'user_id' => 'required',
            'category_id' => 'required',
            'date' => 'required|date|date_format:Y-m-d|after_or_equal:today|before_or_equal:+12month',
            'description' => 'required|string|max:191',
            'value' => 'required|numeric|min:0'
        ];
        
        return $rules;
    }
}

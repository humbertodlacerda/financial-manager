<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class RevenueStoreRequest extends FormRequest
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
        $endOfMonth = Carbon::now()->endOfMonth()->format('Y-m-d');

        $rules =  [
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'date' => 'required|date|date_format:Y-m-d|after_or_equal:today|
                before_or_equal:'.$endOfMonth,
            'description' => 'required|string|max:191',
            'value' => 'required|numeric|min:0'
        ];
        
        return $rules;
    }
}

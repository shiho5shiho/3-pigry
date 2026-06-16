<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeightRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'recorded_date' => 'required|date|before_or_equal:today',
            'weight' => 'required|numeric|min:1|max:999.99',

        ];
    }

    public function messages(): array
    {
        return [
            'recorded_date.required' => '記録日を入力してください。',
            'recorded_date.date' => '有効な日付で入力してください。',
            'recorded_date.before_or_equal' => '未来の日付は登録できません。',
            'weight.required' => '体重を入力してください。',
            'weight.numeric' => '数値を入力してください。',
            'weight.min' => '1kg以上を入力してください。',
            'weight.max' => '999.99以下を入力してください。',
        ];
    }
}

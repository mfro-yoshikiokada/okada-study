<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updaterequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:25'],
            'fee' => ['required', 'numeric','between:10,1000000'],
            'explanation' => ['required', 'max:200']
        ];
    }
    public function attributes()
    {
        return [
            "name" => "名前",
            "fee" => "値段",
            "explanation" => "説明欄"
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => '名前を入力してください',
            'name.max' => '名前は25文字以内で入力してください',
            'explanation.required' => '説明欄を入力してください',
            'explanation.max' => '説明欄は200文字未満で入力してください',
            'fee.required' => '値段を入力してください',
            'fee.between' => '値段は10円から100万円まで有効です。',
            'fee.max' => '値段は1から8桁の数字で入力してください',
            'fee.min' => '値段は1以上を入力してください'
        ];
    }
}

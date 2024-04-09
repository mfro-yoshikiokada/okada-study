<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\MaxWordCountValidation;

class ArticleStoreRequest extends FormRequest
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
            'name' => ['required', 'max:10'],
            'fee' => ['required', 'numeric','max:8'],
            'explanation' => ['required', 'max:200'],
            'file' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            "name" => "名前",
            "fee" => "値段",
            "explanation" => "説明欄",
            'file' => "写真"
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
            'name.max' => '名前は10文字以内で入力してください',
            'explanation.required' => '説明欄を入力してください',
            'explanation.max' => '説明欄は200文字未満で入力してください',
            'fee.required' => '値段を入力してください',
            'fee.numeric' => '値段は数字で入力してください',
            'fee.max' => '値段は1から8桁の数字で入力してください',
            'fee.min' => '値段は1以上を入力してください',
            'file.required' => '写真を入力してください'
        ];
    }
}

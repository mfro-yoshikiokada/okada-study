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
return true; // 認証はここでは無効にしていますが、実際のプロジェクトに合わせて変更してください。
}

/**
* Get the validation rules that apply to the request.
*
* @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
    */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:25'],
            'explain' => ['required', 'string', 'max:600'],
            'fee' => ['required', 'numeric', 'digits_between:1,6', 'min:1'],
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
            'explain.required' => '説明を入力してください',
            'explain.max' => '説明は600文字未満で入力してください',
            'fee.required' => '値段を入力してください',
            'fee.numeric' => '値段は数字で入力してください',
            'fee.digits_between' => '値段は1から6桁の数字で入力してください',
            'fee.min' => '値段は1以上を入力してください',
        ];
    }
}

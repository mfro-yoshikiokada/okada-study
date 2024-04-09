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
            'name' => ['required', new MaxWordCountValidation(10)],
            'fee' => ['required', 'max:8'],
            'explanation' => ['required', new MaxWordCountValidation(200)],
            'file' => 'required',
            'sub-files.*.photo' => 'image|mimes:jpeg,bmp,png',
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
}

<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
// 以下は他人のコードの引用です。出典: https://qiita.com/hiro_nr825/items/a1900cef901dd764c0f5
// 著者: @hiro_nr825(しも)
class MaxWordCountValidation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(private int $MaxWordCount)
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $trim = str_replace(array("\r\n", "\r", "\n"), '', $value);
        $Length = strlen($trim);
        return $this->MaxWordCount >= $Length;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ":attributeは{$this->MaxWordCount}文字以下で入力してください";
    }
}

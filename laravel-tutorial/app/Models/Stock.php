<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $guarded = ['id'];

    public function insert(string $name, string $explain, int $fee, string $imagePath)
    {
        $insert = [
            'name' => $name,
            'explain' => $explain,
            'fee' => $fee,
            'imagePath' => $imagePath
        ];

        // 直接 create メソッドを呼び出す
        $this->create($insert);
    }
}


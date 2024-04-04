<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Stock extends Model
{
    protected $guarded = ['id'];

    public function insert(string $name, string $explanation ,int $fee, string $imagePath)
    {
        $insert = [
            'name' => $name,
            'explain' => $explanation,
            'fee' =>$fee,
            'imagePath' => $imagePath
        ];

        // 直接 create メソッドを呼び出す
        $this->create($insert);
    }
}


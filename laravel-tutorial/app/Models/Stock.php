<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Stock extends Model
{
    protected $guarded = ['id'];

    public function insert(Request $request, string $imagePath)
    {
        $insert = [
            'name' => (string) $request->input('name'),
            'explain' => (string) $request->input('explanation'),
            'fee' =>(int) $request->input('fee'),
            'imagePath' => $imagePath
        ];

        // 直接 create メソッドを呼び出す
        $this->create($insert);
    }
}


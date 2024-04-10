<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Stock extends Model
{
    protected $guarded = ['id'];

    public function insert(string $name, string $explanation , int $fee, string $genre, string $imagePath)
    {
        $insert = [
            'name' => $name,
            'explain' => $explanation,
            'fee' => $fee,
            'genre' => $genre,
            'imagePath' => $imagePath
        ];

        return self::insertGetId($insert);
    }
}


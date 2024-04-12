<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Stock extends Model
{
    protected $guarded = ['id'];

    public function insert(string $name, string $explanation , int $fee, string $genre, string $imagePath, int $userId)
    {
        $insert = [
            'name' => $name,
            'explain' => $explanation,
            'fee' => $fee,
            'genre' => $genre,
            'imagePath' => $imagePath,
            'userId' =>$userId
        ];

        return self::insertGetId($insert);
    }
    public function showDetail($stockId)
    {
        return $this->where('id', $stockId)->first()->getOriginal();

    }
    public function deleteDetail($id)
    {
        return $this->where('id', $id)->delete();
    }
}


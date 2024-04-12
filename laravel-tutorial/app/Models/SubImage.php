<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SubImage extends Model
{
    use HasFactory;
    protected $fillable = ['stockId', 'imagePath']; //保存したいカラム名が1つの場合
    protected $table = 'sub_image_table';
    public function insert(int $stockId, string $path)
    {
        $insert = [
            'stockId' => $stockId,
            'imagePath' => $path
        ];
        $this->create($insert);
    }
    public function show($stockId)
    {
        return $this->where('stockId', $stockId)->get();
    }
}

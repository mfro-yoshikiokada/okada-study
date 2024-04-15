<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleStoreRequest;

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
    public function updateStock($editId, $request, $img_name) {
        $id =self::find($editId); 
        if ($img_name == null ) {
            $id->update([
                "name" =>(string) $request->input('name'),
                "explain" => (string) $request->input('explanation'),
                "genre" => (string) $request->input('genre'),
                "fee" => (int) $request->input('fee')
            ]); 
        } else {
            $id->update([
                "name" =>(string) $request->input('name'),
                "explain" => (string) $request->input('explanation'),
                "genre" => (string) $request->input('genre'),
                "fee" => (int) $request->input('fee'),
                "imagePath" => $img_name,
            ]); 
        }
        
    }
    public function deleteStock($id)
    {
        return $this->find($id)->delete();
    }
}


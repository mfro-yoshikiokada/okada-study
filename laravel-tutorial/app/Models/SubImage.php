<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class SubImage extends Model
{
    use HasFactory;
    protected $fillable = ['stockId', 'imagePath', 'imageNumber']; 
    protected $table = 'sub_image_table';
    public function insert(int $stockId, string $path, int $imgNum)
    {
        $insert = [
            'imageNumber' => $imgNum,
            'stockId' => $stockId,
            'imagePath' => $path
        ];
        $subImage = $this->create($insert);

        return $subImage;
    }
    public function show($stockId)
    {
        return $this->where('stockId', $stockId)->get();
    }

    public function updateSubImg(int $stockId, string $imgPath, int $imgNum) {
        $this->where('stockId', $stockId)->where('imageNumber', $imgNum)->update([  
            "imagePath" =>  $imgPath
        ]); 

    }
    public function search($stockId, $imageNum)
    {
        return $this->where('stockId', $stockId)->where('imageNumber', $imageNum)->get();
    }
    public function deleteSubImg($stockId, $imageNum)
    {   
    
        return $this->where('stockId', $stockId)->where('imageNumber', $imageNum)->delete();
    }
}

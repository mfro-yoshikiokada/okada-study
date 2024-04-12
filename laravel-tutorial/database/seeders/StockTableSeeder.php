<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stocks')->truncate(); //2回目実行の際にシーダー情報をクリア
        DB::table('stocks')->insert([
            'name' => 'フィルムカメラ',
            'explain' => '1960年式のカメラです',
            'fee' => 200000,
            'genre' =>'antique',
            'imagePath' => 'filmcamera.jpg',
            'userId' => 1,
        ]);

        DB::table('stocks')->insert([
            'name' => 'イヤホン',
            'explain' => 'ノイズキャンセリングがついてます',
            'fee' => 20000,
            'genre' =>'electrical-products',
            'imagePath' => 'iyahon.jpg',
            'userId' => 1
        ]);

        DB::table('stocks')->insert([
            'name' => '時計',
            'explain' => '1980年式の掛け時計です',
            'fee' => 120000,
            'genre' =>'antique',
            'imagePath' => 'clock.jpg',
            'userId' => 1
        ]);

        DB::table('stocks')->insert([
            'name' => '地球儀',
            'explain' => '珍しい商品です',
            'fee' => 120000,
            'genre' =>'antique',
            'imagePath' => 'earth.jpg',
            'userId' => 1
        ]);


        DB::table('stocks')->insert([
            'name' => '腕時計',
            'explain' => 'プレゼントにどうぞ',
            'fee' => 9800,
            'genre' =>'electrical-products',
            'imagePath' => 'watch.jpg',
            'userId' => 1
        ]);

        DB::table('stocks')->insert([
            'name' => 'カメラレンズ35mm',
            'explain' => '最新式です',
            'fee' => 79800,
            'genre' =>'parts',
            'imagePath' => 'lens.jpg',
            'userId' => 1
        ]);

        DB::table('stocks')->insert([
            'name' => 'シャンパン',
            'explain' => 'パーティにどうぞ',
            'fee' => 800,
            'genre' =>'drink',
            'imagePath' => 'shanpan.jpg',
            'userId' => 1
        ]);

        DB::table('stocks')->insert([
            'name' => 'ビール',
            'explain' => '大量生産されたビールです',
            'fee' => 200,
            'genre' =>'drink',
            'imagePath' => 'beer.jpg',
            'userId' => 1
        ]);

        DB::table('stocks')->insert([
            'name' => 'やかん',
            'explain' => 'かなり珍しいやかんです',
            'fee' => 1200,
            'genre' =>'antique',
            'imagePath' => 'yakan.jpg',
            'userId' => 1
        ]);

        DB::table('stocks')->insert([
            'name' => '精米',
            'explain' => '米30Kgです',
            'fee' => 11200,
            'genre' =>'food',
            'imagePath' => 'kome.jpg',
            'userId' => 1
        ]);

        DB::table('stocks')->insert([
            'name' => 'パソコン',
            'explain' => 'ジャンク品です',
            'fee' => 11200,
            'genre' =>'electrical-products',
            'imagePath' => 'pc.jpg',
            'userId' => 1
        ]);

        DB::table('stocks')->insert([
            'name' => 'アコースティックギター',
            'explain' => 'ヤマハ製のエントリーモデルです',
            'fee' => 25600,
            'genre' =>'antique',
            'imagePath' => 'aguiter.jpg',
            'userId' => 1
        ]);

        DB::table('stocks')->insert([
            'name' => 'エレキギター',
            'explain' => '初心者向けのエントリーモデルです',
            'fee' => 15600,
            'genre' =>'antique',
            'imagePath' => 'eguiter.jpg',
            'userId' => 1
        ]);

        DB::table('stocks')->insert([
            'name' => '加湿器',
            'explain' => '乾燥する季節の必需品',
            'fee' => 3200,
            'genre' =>'antique',
            'imagePath' => 'steamer.jpeg',
            'userId' => 1
        ]);

        DB::table('stocks')->insert([
            'name' => 'マウス',
            'explain' => 'ゲーミングマウスです',
            'fee' => 4200,
            'genre' =>'electrical-products',
            'imagePath' => 'mouse.jpeg',
            'userId' => 1
        ]);

        DB::table('stocks')->insert([
            'name' => 'Android Garxy10',
            'explain' => '中古美品です',
            'fee' => 84200,
            'genre' =>'electrical-products',
            'imagePath' => 'mobile.jpg',
            'userId' => 1
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Genre extends Model
{
    use HasFactory;
    public static function selectAll(){
        return DB::table('genres')->select('*')->get();
    }
    public static function strToSql($genre){
        $genre = str_replace("\\", "\\\\", $genre);
        $genre = str_replace(',', '",\\"', $genre);
        return "'" . $genre ."'";
    }
    public static function selectName(){
        return DB::table('genres')->select('name')->get();
    }
}

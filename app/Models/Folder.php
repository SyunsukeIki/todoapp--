<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;


class Folder extends Model
{
    use HasFactory;

    // 表示と検索
    public function getName(){
        return $this->folder_name ;
    }

    // 各フォルダ画面に移動するURL生成のため
    public function getId(){
        return $this->id;
    }

    // バリデーションのルール
    protected $guarded = array('id');
    public static $rules = array(
        'folder_name' => 'required'
    );

    // has Many結合処理
    public function folders(){
        return $this->hasMany(Todolist::class,'todo_folder');
    }

    // 検索
    public function getDate(){
        return $this->created_at->format('Y年m月d日');
    }

}

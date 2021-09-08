<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Contracts\Service\Attribute\Required;


class Folder extends Model
{
    use HasFactory;

    // 表示
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

    


}

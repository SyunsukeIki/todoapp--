<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    // 名前表示と検索
    public function getName(){
        return $this->todo_name;
    }

    //進行状況の表示
    public function getState(){
        return $this->todo_state;
    }

    // 期限の表示
    public function getDue(){
        return $this->todo_due;
    }

    // タスク追加のURLのため
    public function getID(){
        return $this->todo_folder;
    }

    // バリデーションのルール
    protected $guarded = array('id');
    public static $rules = array(
        'todo_name' => 'required'
    );

    // 検索(作成日)
    public function getDate(){
        return $this->created_at->format('Y年m月d日');
    }

    // 検索(最終更新日　＝　タスク完了日)
    public function getDone(){
        return $this->updated_at->format('Y年m月d日');
    }

    // belongs to 結合処理
    public function todolist(){
        return $this->belongsTo(Folder::class,'todo_folder');
    }
}

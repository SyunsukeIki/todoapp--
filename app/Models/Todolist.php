<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    public function getName(){
        return $this->todo_name;
    }

    public function getState(){
        return $this->todo_state;
    }

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

    // belongs to 結合処理
    public function todolist(){
        return $this->belongsTo(Folder::class,'todo_folder');
    }
}

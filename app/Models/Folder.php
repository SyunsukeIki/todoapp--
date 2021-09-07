<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Contracts\Service\Attribute\Required;


class Folder extends Model
{
    use HasFactory;

    // 表示
    public function getData(){
        return $this->folder_name ;
    }
    // バリデーションのルール
    protected $guarded = array('id');

    public static $rules = array(
        'folder_name' => 'required'
    );



}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    //protected $fillable = ['name'];

    public function allI(){
        return $this->select('*')->get();
    }

}

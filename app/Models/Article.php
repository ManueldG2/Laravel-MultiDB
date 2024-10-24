<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $fillable = ['name','price','insert','taking','amount','amount'];

    public function allI(){
        return $this->select('*')->get();
    }

}

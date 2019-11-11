<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artigos extends Model
{

    use SoftDeletes;
    protected $table = 'artigos';

    protected $fillable = [
        'id',
        'titulo',
        'descricao'
    ];

    public function getFillable()
    {
          return $this->fillable;
    }


}

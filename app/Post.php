<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';
    protected $guarded = ['id'];
    public $result = [];
    protected $fillable = [
      'title', 'desc'
    ];
}

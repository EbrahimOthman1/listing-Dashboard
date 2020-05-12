<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class listings extends Model
{
    public function user() {
    return $this->belongTo('App\user');
  }
}

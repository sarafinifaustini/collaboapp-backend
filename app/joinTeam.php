<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class joinTeam extends Model
{
public function Users(){
    return $this->belongsTo(Users::class)
}
}

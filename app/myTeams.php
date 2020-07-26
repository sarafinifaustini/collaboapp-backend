<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class myTeams extends Model
{   //table name
    protected $table = 'my_teams'
    //primary key
    public $primaryKey = 'id';
    
    public function User(){
        return $this->belongsTo(User::class);
    }
 
}

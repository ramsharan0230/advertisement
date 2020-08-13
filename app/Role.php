<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name', 'status'];

    public function users(){
        return $this->hasMany(Role::class);
    }
}

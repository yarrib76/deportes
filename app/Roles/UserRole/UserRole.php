<?php namespace Deportes\Roles\UserRole;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model {

    protected $table = 'users_roles';


    public function usuario(){
        return $this->belongsTo('Deportes\User', 'user_id');

    }
}

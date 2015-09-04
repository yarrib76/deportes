<?php namespace Deportes\Usuarios;

use Illuminate\Database\Eloquent\Model;

class TrackLogin extends Model {

    protected $table = 'track_user_login';
    protected $fillable =['ultimo_login','user_id'];
    public $timestamps = false;

    public function usuario(){

        return $this->belongsTo('Deportes\User', 'user_id');
    }
}

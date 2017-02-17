<?php
/**
 * Created by PhpStorm.
 * User: Doan-PC
 * Date: 2/17/2017
 * Time: 10:49 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model  {

    protected $table = 'user';

    protected $fillable = ['id', 'username', 'password', 'images', 'create_time', 'updated_at', 'created_at'];

    public static function getUserByName($username) {
        $data = User::where('username','=', $username)->get()->toArray();

        if($data)
            return true;
        return false;
    }

    public static function getUserByNameAndId($username, $id) {
        $data = User::where('username','=', $username)->where('id','!=', $id)->get()->toArray();

        if($data)
            return true;
        return false;
    }

}

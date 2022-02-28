<?php 

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Users extends Model
{
    //
    protected $collection = 'users';
    protected $hidden = ['password'];
    // protected $connection = 'mongodb';
}
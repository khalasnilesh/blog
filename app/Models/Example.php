<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Example extends Model 
{
    protected $connection = 'mongodb';
    protected $collection = 'customers';
    protected $primaryKey = '_id';
}
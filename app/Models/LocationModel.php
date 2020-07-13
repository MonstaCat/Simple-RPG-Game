<?php

namespace App\Models;

use CodeIgniter\Model;

class LocationModel extends Model
{
    protected $table = 'location';
    protected $primaryKey = 'idLocation';
    protected $allowedFields = ['idLocation', 'nameLocation', 'descLocation'];
}

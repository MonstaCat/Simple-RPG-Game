<?php

namespace App\Models;

use CodeIgniter\Model;

class BattleModel extends Model
{
    protected $table = 'battle';
    protected $primaryKey = 'idBattle';
    protected $allowedFields = [
        'idBattle',
        'battleRound',
        'username',
        'playerATK',
        'playerMaxHP',
        'playerHP',
        'playerDEF',
        'idMob',
        'nameMob',
        'mobATK',
        'mobMaxHP',
        'mobHP',
        'mobDEF',
        'battleStatus'
    ];
}

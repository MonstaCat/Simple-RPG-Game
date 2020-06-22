<?php

namespace App\Models;

use CodeIgniter\Model;

class BattleModel extends Model
{
    protected $table = 'battle';
    protected $primaryKey = 'idBattle';
    protected $allowedFields = ['battleRound', 'playerATK', 'playerMaxHP', 'playerHP', 'playerDEF', 'mobATK', 'mobMaxHP', 'mobHP', 'mobDEF', 'battleStatus'];
}

<?php

namespace App\Entity\Statistic;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $table = 'statistics';

    protected $fillable = ['ip_address', 'web_browser'];
}

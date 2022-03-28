<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllInfoWeb extends Model
{
    use HasFactory;
    protected $fillable = [
        'logoHeader',
        'logoFooter',
        'logoLoadPage',
        'target',
        'slogan',
        'numberHeader',
        'numberFooter',
        'GmailFooter',
        'icon',
        'memberOne',
        'menberTow',
        'LinkFBFooter'
    ];

}

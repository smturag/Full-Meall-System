<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amount extends Model
{
    protected $table = "amounts";
    protected $fillable = ["id","member_id","amount","date"];
    public $timestamps = false;
    use HasFactory;
}

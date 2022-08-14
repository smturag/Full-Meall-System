<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearMonth extends Model
{
    protected $table = "year_months";
    protected $fillable = ["id","year_month"];
    public $timestamps = false;
    use HasFactory;
    
}

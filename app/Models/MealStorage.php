<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealStorage extends Model
{
    use HasFactory;
    protected $table = "meal_storages";
    protected $fillable = ["id","ym_id","member_id","date","meal"];
    public $timestamps = false;
}

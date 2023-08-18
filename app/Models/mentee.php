<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mentee extends Model
{
    use HasFactory;
    protected $fillable = ['nim','nama','prodi'];
    protected $table = 'mentee';
    public $timestamps = false;
}

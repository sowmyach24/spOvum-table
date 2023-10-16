<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tables extends Model
{
    use HasFactory;
	protected $table	= 'data_tables';
	protected $guarded 	= [];
	public $timestamps 	= false;
}

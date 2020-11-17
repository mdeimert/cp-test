<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Starship
 *
 * @package App\Models
 */
class Starship extends Model
{
    use HasFactory;

	protected $table = 'starships';

	protected $casts = [
		'crew' => 'int'
	];

	protected $fillable = [
		'name',
		'crew',
		'model',
		'image'
	];

}

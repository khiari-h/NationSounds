<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Lieu
 * 
 * @property int $Id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property float|null $latitude
 * @property float|null $longitude
 * 
 * @property Collection|Concert[] $concerts
 * @property Collection|Genre[] $genres
 * @property Collection|PointsInterest[] $points_interests
 *
 * @package App\Models
 */
class Lieu extends Model
{
	protected $table = 'lieu';
	protected $primaryKey = 'Id';

	protected $casts = [
		'latitude' => 'float',
		'longitude' => 'float'
	];

	protected $fillable = [
		'latitude',
		'longitude'
	];

	public function concerts()
	{
		return $this->hasMany(Concert::class, 'Id_lieu');
	}

	public function genres()
	{
		return $this->hasMany(Genre::class, 'Id_lieu');
	}

	public function points_interests()
	{
		return $this->hasMany(PointsInterest::class, 'Id_lieu');
	}
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Concert
 * 
 * @property int $ID
 * @property string $Groupe
 * @property int $Horaires
 * @property string $Scene
 * @property string $Descriptif
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $Id_lieu
 * 
 * @property Lieu|null $lieu
 * @property Collection|Genre[] $genres
 * @property Collection|Partenaire[] $partenaires
 *
 * @package App\Models
 */
class Concert extends Model
{
	protected $table = 'concert';
	protected $primaryKey = 'ID';

	protected $casts = [
		'Horaires' => 'int',
		'Id_lieu' => 'int'
	];

	protected $fillable = [
		'Groupe',
		'Horaires',
		'Scene',
		'Descriptif',
		'Id_lieu'
	];

	public function lieu()
	{
		return $this->belongsTo(Lieu::class, 'Id_lieu');
	}

	public function genres()
	{
		return $this->hasMany(Genre::class, 'Id_concert');
	}

	public function partenaires()
	{
		return $this->hasMany(Partenaire::class, 'Id_concert');
	}
}

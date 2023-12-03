<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Genre
 * 
 * @property int $Id
 * @property string $Nom
 * @property int $Id_concert
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $Id_lieu
 * 
 * @property Concert $concert
 * @property Lieu|null $lieu
 *
 * @package App\Models
 */
class Genre extends Model
{
	protected $table = 'genre';
	protected $primaryKey = 'Id';

	protected $casts = [
		'Id_concert' => 'int',
		'Id_lieu' => 'int'
	];

	protected $fillable = [
		'Nom',
		'Id_concert',
		'Id_lieu'
	];

	public function concert()
	{
		return $this->belongsTo(Concert::class, 'Id_concert');
	}

	public function lieu()
	{
		return $this->belongsTo(Lieu::class, 'Id_lieu');
	}
}

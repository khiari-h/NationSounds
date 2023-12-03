<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PointsInterest
 * 
 * @property int $Id
 * @property string $Type
 * @property string $Nom
 * @property int $Id_lieu
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Lieu $lieu
 *
 * @package App\Models
 */
class PointsInterest extends Model
{
	protected $table = 'points_interest';
	protected $primaryKey = 'Id';

	protected $casts = [
		'Id_lieu' => 'int'
	];

	protected $fillable = [
		'Type',
		'Nom',
		'Id_lieu'
	];

	public function lieu()
	{
		return $this->belongsTo(Lieu::class, 'Id_lieu');
	}
}

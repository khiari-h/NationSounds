<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Partenaire
 * 
 * @property int $id
 * @property string $Catégories
 * @property string $Nom
 * @property int $Logo
 * @property string $Url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $Id_concert
 * 
 * @property Concert|null $concert
 *
 * @package App\Models
 */
class Partenaire extends Model
{
	protected $table = 'partenaire';

	protected $casts = [
		'Logo' => 'int',
		'Id_concert' => 'int'
	];

	protected $fillable = [
		'Catégories',
		'Nom',
		'Logo',
		'Url',
		'Id_concert'
	];

	public function concert()
	{
		return $this->belongsTo(Concert::class, 'Id_concert');
	}
}

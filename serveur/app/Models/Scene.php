<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Scene
 * 
 * @property int $Id
 * @property string $Nom
 * @property string $Type
 * @property int $Id_lieu
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Scene extends Model
{
	protected $table = 'scene';
	protected $primaryKey = 'Id';

	protected $casts = [
		'Id_lieu' => 'int'
	];

	protected $fillable = [
		'Nom',
		'Type',
		'Id_lieu'
	];
}

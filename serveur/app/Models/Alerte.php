<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Alerte
 * 
 * @property int $Id
 * @property string $Titre
 * @property string $Type
 * @property string $Texte
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $Id_user
 *
 * @package App\Models
 */
class Alerte extends Model
{
	protected $table = 'alerte';
	protected $primaryKey = 'Id';

	protected $casts = [
		'Id_user' => 'int'
	];

	protected $fillable = [
		'Titre',
		'Type',
		'Texte',
		'Id_user'
	];
}

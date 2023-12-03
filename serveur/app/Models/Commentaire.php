<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Commentaire
 * 
 * @property int $Id
 * @property int $Id_user
 * @property int $Id_concert
 * @property string $Texte
 * @property int $Note
 * @property Carbon $Date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Commentaire extends Model
{
	protected $table = 'commentaire';
	protected $primaryKey = 'Id';

	protected $casts = [
		'Id_user' => 'int',
		'Id_concert' => 'int',
		'Note' => 'int',
		'Date' => 'datetime'
	];

	protected $fillable = [
		'Id_user',
		'Id_concert',
		'Texte',
		'Note',
		'Date'
	];
}

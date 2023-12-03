<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Preference
 * 
 * @property int $Id
 * @property int|null $Id_user
 * @property string $Theme
 * @property string $Genre
 * @property string $Notification
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Preference extends Model
{
	protected $table = 'preference';
	protected $primaryKey = 'Id';

	protected $casts = [
		'Id_user' => 'int'
	];

	protected $fillable = [
		'Id_user',
		'Theme',
		'Genre',
		'Notification'
	];
}

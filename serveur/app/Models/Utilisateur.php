<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Utilisateur
 * 
 * @property int $Id
 * @property string $Nom
 * @property string $Mdp
 * 
 * @property Collection|Commentaire[] $commentaires
 *
 * @package App\Models
 */
class Utilisateur extends Model
{
	protected $table = 'utilisateurs';
	protected $primaryKey = 'Id';
	public $timestamps = false;

	protected $fillable = [
		'Nom',
		'Mdp'
	];

	public function commentaires()
	{
		return $this->hasMany(Commentaire::class, 'Id_user');
	}
}

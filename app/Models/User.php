<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'first_name',
		'last_name',
		'username',
		'email',
		'avatar',
		'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function getName()
	{
		if ($this->first_name && $this->last_name) {
			return "{$this->first_name} {$this->last_name}";
		}

		if ($this->first_name) {
			return $this->first_name;
		}

		return null;
	}

	public function getNameOrUsername()
	{
		return $this->getName() ?: $this->username;
	}

	public function getFirstNameOrUsername()
	{
		return $this->first_name ?: $this->username;
	}

	/**
	 * Return all  tasks for login user.
	 */
	public function tasks()
	{
		return $this->hasMany('App\Models\Task', 'user_id');
	}

}

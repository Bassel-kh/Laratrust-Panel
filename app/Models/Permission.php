<?php

namespace App\Models;


use Laratrust\Models\LaratrustPermission;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends LaratrustPermission
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description',
    ];

    public function Roles()
    {
        return $this->belongsToMany(Role::class);
    }
}

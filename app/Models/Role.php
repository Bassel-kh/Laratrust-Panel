<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends LaratrustRole
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

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}

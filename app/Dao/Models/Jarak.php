<?php

namespace App\Dao\Models;

use App\Dao\Models\Core\SystemModel;


/**
 * Class Jarak
 *
 * @property $jarak_code
 * @property $jarak_nama
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class Jarak extends SystemModel
{
    protected $perPage = 20;
    protected $table = 'jarak';
    protected $primaryKey = 'jarak_code';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['jarak_code', 'jarak_nama'];


}

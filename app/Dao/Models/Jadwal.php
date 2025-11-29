<?php

namespace App\Dao\Models;

use App\Dao\Models\Core\SystemModel;
use App\Facades\Model\UserModel;

/**
 * Class Jadwal
 *
 * @property $jadwal_id
 * @property $jadwal_tanggal
 * @property $jadwal_keterangan
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class Jadwal extends SystemModel
{
    protected $perPage = 20;
    protected $table = 'jadwal';
    protected $primaryKey = 'jadwal_id';
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['jadwal_id', 'jadwal_tanggal', 'jadwal_keterangan'];

    public static function field_name()
    {
        return 'jadwal_tanggal';
    }

    public function has_absen()
    {
        return $this->belongsToMany(UserModel::getModel(), 'user_absen', 'jadwal_id', 'id');
    }
}

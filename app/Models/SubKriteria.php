<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sub_kriterias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'deskripsi',
        'nilai',
        'kriteria_id',
    ];

    /**
     * Get the kriteria that owns the sub kriteria.
     */
    public function kriteria() {
        return $this->belongsTo(Kriteria::class);
    }

    public function penilaians()
    {
        return $this->hasMany(Penilaian::class, 'sub_kriteria_id');
    }
}

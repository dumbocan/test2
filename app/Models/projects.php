<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\boats;

class projects extends Model
{
    use HasFactory;
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'project_id';

    public function boats()
    {
        return $this->belongsTo(Boats::class, 'boat_id');
    }

    public function worksheets()
    {
        return $this->hasMany(Worksheets::class, 'project_id');
    }

}

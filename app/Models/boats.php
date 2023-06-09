<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clients;

class boats extends Model
{
    use HasFactory;
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'boat_id';

    public function clients()
{
        return $this->belongsTo(Clients::class, 'client_id');
}


    public function projects()
    {
        return $this->hasMany(Projects::class, 'boat_id');
    }
}

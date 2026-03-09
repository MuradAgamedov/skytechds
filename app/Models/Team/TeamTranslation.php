<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;

class TeamTranslation extends Model
{
    protected $fillable = ["team_id", "language_id", "name", "position"];

    public function translation()
    {
        return $this->belongsTo(Team::class);
    }
}

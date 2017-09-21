<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use HipsterJazzbo\Landlord\BelongsToTenants;

class Student extends Model
{
	use BelongsToTenants;

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}

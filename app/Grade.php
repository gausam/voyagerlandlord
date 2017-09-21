<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use HipsterJazzbo\Landlord\BelongsToTenants;

class Grade extends Model
{
	use BelongsToTenants;

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Tenant scope for Landlord.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $tenantId Landlord tenant id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTenant($query, $tenantId)
    {
        return $query->whereHas('student.school', function($query) use ($tenantId) {
            $query->where('id', $tenantId);
        });
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyect extends Model
{
	protected $fillable = [
        'id', 'title', 'company_id', 'description', 'team_size',
    ];

    public function freelancers()
    {
    	return $this->belongsToMany(Freelancer::class);
    }

    public function company()
    {
    	return $this->hasOne(Company::class, 'company_id', 'companies_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Freelancer; 

class Proyect extends Model
{
	protected $fillable = [
        'id', 'title', 'company_id', 'description', 'team_size',
    ];

    public function company()
    {
    	return $this->hasOne(Company::class);
    }

    public function freelancers()
    {
        return $this->belongsToMany(Freelancer::class);
    }
}

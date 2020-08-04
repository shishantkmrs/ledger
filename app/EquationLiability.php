<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquationLiability extends Model
{
    protected $table ='equation_liabilities';



    //one to one relationship
    public function EquationPaidLiabilitys()
    {
    	return $this->hasOne('App\EquationPaidLiability','liability_id','id');
    }
}

	
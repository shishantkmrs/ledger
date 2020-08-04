<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquationPaidLiability extends Model
{
   protected $table='equation_paid_liabilities';
   // belongs to for 1 to 1 relation
   public function EquationLiability()
   {
   	return $this->belongsTo('App\EquationLiability');
   }
}

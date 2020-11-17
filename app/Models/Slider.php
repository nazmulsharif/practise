<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
	use SoftDeletes;
    use HasFactory;
    public function user(){
    	return $this->hasOne(User::class, 'id','user_id');
    }
}

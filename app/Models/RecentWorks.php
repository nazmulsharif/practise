<?php

namespace App\Models;

use App\Models\RecentWorksCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class RecentWorks extends Model
{
    use HasFactory;
    public function category(){
        return $this->hasOne(RecentWorksCategory::class, 'id','category_id');
    }
    public function user(){
        return $this->hasOne(User::class, 'id','user_id');
    }
}

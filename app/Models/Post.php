<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded=[];

    //relation with categorypost table
    public function categorypost()
    {
        return $this->belongsToMany(Categorypost::class);
    }

    //relation with tagpost
    public function tagpost()
    {
        return $this->belongsToMany(Tagpost::class);
    }

    //relation with adminuser
    public function author()
    {
        return $this->belongsTo(AdminUser::class, 'adminuser_id', 'id');
    }
}

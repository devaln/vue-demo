<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    use HasFactory;
    protected $table = 'userinfos';
    public $timestamp = true;
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'contact', 'gender', 'profile_pic', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

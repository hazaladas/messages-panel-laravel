<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;
    
    //bu modelin bağlı olduğu tabloyu isimlendirir.
    protected $table = 'messages';

    //doldurulabilir (mass-assignable) alanlar
    protected $fillable = [
        'user_name',
        'user_mail',
        'message',
        'is_read'
    ];
    
}

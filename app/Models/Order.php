<?php

namespace App\Models;

use App\Models\Background;
use App\Models\Character;
use App\Models\Size;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_totPrice',
        'order_date',
        'order_delivery',
        'order_pay',
        'order_link',
        'order_public',
        'created_at',
        'updated_at',
        'user_id',
        'type_id',
        'size_id',
        'character_id',
        'bkg_id',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }

    public function character()
    {
        return $this->belongsTo(Character::class, 'character_id');
    }

    public function background()
    {
        return $this->belongsTo(Background::class, 'bkg_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

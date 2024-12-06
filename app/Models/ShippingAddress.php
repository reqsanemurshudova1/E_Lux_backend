<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;

    // 'shipping_addresses' tablosuna bağlanır
    protected $table = 'shipping_addresses';

    // Tüm alanların doldurulmasına izin veriyoruz (fillalbe ya da guarded seçebilirsiniz)
    protected $fillable = [
        'country',
        'full_name',
        'email',
        'phone_number',
        'street_address',
        'city',
        'state',
        'postal_code',
        'shipping_cost',
    ];

    public function orders() {
        return $this->hasMany(Order::class);
    }
}

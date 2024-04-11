<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id',
        'user_id',
    ];

    /**
     * Add an item to the basket.
     *
     * @param int $listingId
     * @param int $userId
     * @return \App\Models\Basket
     */
    public static function addItem(int $listingId, int $userId): self
    {
        return self::create([
            'listing_id' => $listingId,
            'user_id' => $userId,
        ]);
    }


    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function listings()
    {
        return $this->belongsToMany(Listing::class);
    }
}

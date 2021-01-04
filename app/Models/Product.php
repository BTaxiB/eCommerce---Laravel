<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    protected $fillable = ['name', 'description', 'price'];

    public function url()
    {
        return $this->morphOne(Url::class, 'urlable');
    }

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'store_circuits');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stores';

    protected $fillable = ['name', 'code', 'website_url'];

    public function url()
    {
        return $this->morphOne(Url::class, 'urlable');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'store_circuits');
    }
}

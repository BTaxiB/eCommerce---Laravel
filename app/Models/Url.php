<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'urls';

    protected $fillable = ['name', 'urlable_id', 'urlable_type'];

    public function urlable()
    {
        return $this->morphTo();
    }
}

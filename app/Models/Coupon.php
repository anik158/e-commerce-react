<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Coupon extends Model
{
    protected $guarded = ['id'];


    public function setNameAttribute(string $name): void {
        $this->attributes['name'] = Str::upper($name);
    }

    public function isValid(): bool
    {
        return ($this->valid_until > Carbon::now());
    }
}

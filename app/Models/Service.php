<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Service extends Model
{
    protected $fillable = ['name','short_description','description','price_from','icon','status'];
    protected $casts = ['price_from'=>'decimal:2'];
}

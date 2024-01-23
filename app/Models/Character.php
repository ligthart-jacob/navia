<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Character extends Model
{
    use HasFactory;
    // To ensure Eloquent understands which column to use
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['name', 'image', 'series_id'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['series'] ?? false)
        {
            $query->where('series.slug', '=', $filters['series']);
        }

        if ($filters['search'] ?? false)
        {
            $query->where('characters.name', 'like', "%{$filters['search']}%")
            ->orWhere('series.name', 'like', "%{$filters['search']}%");
        }

        $query->orderBy($filters['sort'] ?? 'created_at', ($filters['order'] ?? 0) ? 'asc' : 'desc');
    }
}

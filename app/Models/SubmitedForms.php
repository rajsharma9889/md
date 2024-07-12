<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmitedForms extends Model
{
    use HasFactory;

    public function scopeSearch($query, $search)
    {
        return $query->where(function (Builder $query) use ($search) {
            $columns = $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
            foreach ($columns as $column) {
                $query->orWhere($column, 'LIKE', '%' . $search . '%');
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

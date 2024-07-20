<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KarigarRequestList extends Model
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

    public function karigar()
    {
        return  $this->belongsTo(Karigar::class, 'karigar_id');
    }
}

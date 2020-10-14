<?php

namespace App\EloquentSort;

use Illuminate\Http\Request;

trait Sortable
{
    public function scopeSortBy($query, Request $req)
    {
        $query->when($req->has('sortBy'), function ($query) use ($req) {
            if ($this->sortable !== null && count($this->sortable) !== 0) {
                if (! in_array($req->input('sortBy'), $this->sortable)) {
                    abort(400, "Sort by column not allowed");
                }
            }

            if ($req->has('sortOrder')) {
                $query->orderBy($req->input('sortBy'), $req->input('sortOrder'));
            } else {
                $query->orderBy($req->input('sortBy'), 'asc');
            }
        });
    }

}

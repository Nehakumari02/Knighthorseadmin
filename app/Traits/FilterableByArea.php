<?php

namespace App\Traits;

trait FilterableByArea
{
    /**
     * Scope to filter by area (either passed explicitly or from session)
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int|null $areaId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForArea($query, $areaId = null)
    {
        // Get area ID from parameter or session
        $filterAreaId = $areaId ?? session('current_area_id');

        // Apply filter if we have an area ID
        if ($filterAreaId) {
            return $query->whereHas('areas', function($q) use ($filterAreaId) {
                $q->where('areas.id', $filterAreaId);
            });
        }

        return $query;
    }

    /**
     * Scope to filter by area or show all if no area selected
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithAreaFilter($query)
    {
        if (session()->has('current_area_id')) {
            return $query->whereHas('areas', function($q) {
                $q->where('areas.id', session('current_area_id'));
            });
        }

        return $query;
    }

    /**
     * Get the current area filter ID
     *
     * @return int|null
     */
    public static function getCurrentAreaFilter()
    {
        return session('current_area_id');
    }

    /**
     * Check if area filtering is active
     *
     * @return bool
     */
    public static function isAreaFilterActive()
    {
        return session()->has('current_area_id');
    }

    /**
     * Clear the current area filter
     *
     * @return void
     */
    public static function clearAreaFilter()
    {
        session()->forget('current_area_id');
    }
}
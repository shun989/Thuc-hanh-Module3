<?php
namespace App\Repositories\Impl;

use App\Models\Staff;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\StaffRepository;

class StaffRepositoryImpl extends EloquentRepository implements StaffRepository
{
    public function getModel()
    {
        $model = Staff::class;
        return $model;
    }
}

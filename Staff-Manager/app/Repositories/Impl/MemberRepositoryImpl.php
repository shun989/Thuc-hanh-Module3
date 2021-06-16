<?php


namespace App\Repositories\Impl;


use App\Models\Member;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\MemberRepository;


class MemberRepositoryImpl extends EloquentRepository implements MemberRepository
{
    public function getModel()
    {
        $model = Member::class;
        return $model;
    }
}

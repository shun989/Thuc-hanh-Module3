<?php


namespace App\Services\Impl;



use App\Repositories\MemberRepository;
use App\Services\MemberService;


class MemberServiceImpl implements MemberService
{
    protected $memberRepository;

    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    public function getAll()
    {
        $members = $this->memberRepository->getAll();
        return $members;
    }

    public function findById($id)
    {
        $member = $this->memberRepository->findById($id);

        $statusCode = 200;
        if (!$member)
            $statusCode = 404;

        $data = [
            'statusCode' => $statusCode,
            'products'=> $member
        ];
        return $data;
    }

    public function create($request)
    {
        $member = $this->memberRepository->create($request);

        $statusCode = 201;
        if (!$member)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'products' => $member
        ];
        return $data;
    }

    public function update($request, $id)
    {
        $oldMember = $this->memberRepository->findById($id);
        if (!$oldMember) {
            $newMember = null;
            $statusCode = 404;
        }else {
            $newMember = $this->memberRepository->update($request, $oldMember);
            $statusCode =200;
        }

        $data = [
            'statusCode' => $statusCode,
            'products' => $newMember
        ];
        return $data;
    }

    public function destroy($id)
    {
        $member = $this->memberRepository->findById($id);

        $statusCode = 404;
        $message = 'User not found';
        if ($member) {
            $this->memberRepository->destroy($member);
            $statusCode = 200;
            $message = "Delete success";
        }
        $data = [
            'statusCode' => $statusCode,
            'products' => $message
        ];
        return $data;
    }
}

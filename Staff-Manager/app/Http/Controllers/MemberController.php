<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Services\MemberService;
use Illuminate\Http\Request;

class MemberController extends Controller
{


    protected $memberService;

    public function __construct(MemberService $memberService)
    {
        $this->memberService = $memberService;
    }

    public function index()
    {
        $members = $this->memberService->getAll();

        return response()->json($members, 200);
    }

    public function indexWeb()
    {
//        $members = $this->$this->memberService->getAll();
        $members = Member::paginate(5);
        return view('index', compact('members'));
    }

    public function show($id)
    {
        $dataMember = $this->memberService->findById($id);

        return response()->json($dataMember['members'], $dataMember['statusCode']);
    }

    public function formCreate()
    {
        $members = Member::all();
        return view('create',compact('members'));
    }

    public function create(Request $request)
    {
        $dataMember = $this->memberService->create($request->all());
        return redirect()->route('home');
    }

    public function store(Request $request)
    {
        $dataMember = $this->memberService->create($request->all());

        return response()->json($dataMember['members'], $dataMember['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataMember = $this->memberService->update($request->all(), $id);

        return response()->json($dataMember['members'], $dataMember['statusCode']);
    }

    public function editForm($id)
    {
        $oldMember = Member::find($id);
        return view('update', ['oldMember' => $oldMember]);
    }

    public function updateWeb(Request $request, $id)
    {
        $dataMember = $this->memberService->update($request->all(), $id);
        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $dataMember = $this->memberService->destroy($id);

        return response()->json($dataMember['message'], $dataMember['statusCode']);
    }

    public function destroyWeb($id)
    {
        $dataMember = $this->memberService->destroy($id);
        return redirect()->back();
    }

    public function getSearch(Request $request)
    {
        $data = Member::where('name','like','%'.$request->key.'%')
            ->orWhere('group',$request->key)
            ->orWhere('sex',$request->key)
            ->orWhere('memberCode',$request->key)
            ->get();
        return view('search',compact('data'));
    }
}


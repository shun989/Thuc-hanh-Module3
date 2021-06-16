<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Staff;
use App\Services\StaffService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    protected $staffService;

    public function __construct(StaffService $staffService)
    {
        $this->staffService = $staffService;
    }

    public function index()
    {
//        $staffs = $this->staffService->getAll();
        $staffs = DB::table('staffs')
            ->leftJoin('group', 'staffs.groupId', '=', 'group.id')
            ->paginate(5);
        return view('index',compact('staffs'));
    }


    public function createForm()
    {
        $staffs = DB::table('staffs')
            ->select('group.groupName')
            ->rightJoin('group','group.id','=','staffs.groupId')
            ->groupBy('groupName')->get();
        return view('manager.create',compact('staffs'));
    }

    public function create(Request $request)
    {
//        $dataStaff = $this->staffService->create($request->all());
        $staff = new Staff();
        $staff->staffCode = $request->staffCode;
        $staff->name = $request->name;
        $staff->sex = $request->sex;
        $staff->phone = $request->phone;
        $staff->groupId = $request->groupId;
        $staff->save();
        return redirect()->route('home');
    }

    public function updateForm($id)
    {
        $oldStaff = Staff::find($id);
        return view('manager.update',compact('oldStaff'));
    }

    public function update(Request $request, $id)
    {
        $dataStaff = $this->staffService->update($request->all(), $id);
        return redirect()->route('home');
    }

    public function delete($id)
    {
        $dataStaff = DB::table('staffs')->delete($id);
        return redirect()->back();
    }
}

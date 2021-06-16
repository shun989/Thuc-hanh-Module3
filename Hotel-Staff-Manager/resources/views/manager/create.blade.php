@extends('layouts.master')
@section('content')
    <h2>Add Staff</h2>
    <form action="{{route('staff.create')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Mã nhân viên</label>
            <input type="text" name="staffCode" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Họ tên</label>
            <input type="text" name="name" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Giới tính</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex">
                <label class="form-check-label" for="inlineRadio1">Nam</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex">
                <label class="form-check-label" for="inlineRadio2">Nữ</label>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Số điện thoại</label>
            <input type="number" name="phone" class="form-control" >
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example">
                <option selected>Open this select group</option>
                @foreach($staffs as  $item)
                <option name="groupId">{{$item->groupName}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

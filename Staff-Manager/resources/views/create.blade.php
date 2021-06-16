@extends('layouts.master')
@section('content')
    <h2>Add member</h2>
    <form action="{{route('member.create')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Mã nhân viên</label>
            <input type="text" name="memberCode" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Họ tên</label>
            <input type="text" name="name" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Giới tính</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" value="Nam">
                <label class="form-check-label" for="inlineRadio1">Nam</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" value="Nữ">
                <label class="form-check-label" for="inlineRadio2">Nữ</label>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Số điện thoại</label>
            <input type="number" name="phone" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Vị trí</label>
            <input type="text" name="group" class="form-control" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

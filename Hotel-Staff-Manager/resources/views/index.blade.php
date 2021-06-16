@extends('layouts.master')
@section('content')
    <style>
        .w-5{
            display: none;
        }
        p{
            margin-top: 10px;
        }
    </style>
    <table class="table">
        <a href="{{route('staff.createForm')}}" class="btn btn-primary">Add Staff</a>
        <h2 class="text-center">Danh sách nhân viên</h2>
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Mã nhân viên</th>
            <th scope="col">Họ tên</th>
            <th scope="col">Giới tính</th>
            <th scope="col">Phone</th>
            <th scope="col">Group</th>
            <th scope="col" colspan="2">Option</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Mã nhân viên</th>
            <th scope="col">Họ tên</th>
            <th scope="col">Giới tính</th>
            <th scope="col">Phone</th>
            <th scope="col">Group</th>
            <th scope="col" colspan="2">Option</th>
        </tr>
        </tfoot>
        <tbody>
        @foreach($staffs as $key => $item)
        <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$item->staffCode}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->sex}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->groupName}}</td>
            <td><a href="{{route('staff.updateForm',$item->id)}}" class="btn btn-warning">Update</a></td>
            <td><a href="{{route('staff.delete',$item->id)}}" class="btn btn-danger">Delete</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{$staffs->links()}}
@endsection

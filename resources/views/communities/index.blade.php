@extends('layouts.app')
@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">ข้อมูลชุมชน</li>
            </ol>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>รายการชุมชน
                                <a href="{{ route('communities.create') }}" class="btn btn-primary float-right">เพิ่มชุมชน
                                </a>
                            </h3>
                        </div>
                        <div class="card-body">
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover ">
                                            <thead class=" text-primary">
                                                <tr>
                                                    <th>
                                                        รหัสชุมชน
                                                    </th>
                                                    <th>
                                                        หมู่บ้าน
                                                    </th>
                                                    <th>
                                                        หมู่
                                                    </th>
                                                    <th>
                                                        ตำบล
                                                    </th>
                                                    <th>
                                                        แขวง
                                                    </th>
                                                    <th>
                                                        จัดการข้อมูล
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($communities as $community)
                                                    <tr>
                                                        <td>{{ $community->code }}</td>
                                                        <td>{{ $community->village }}</td>
                                                        <td>{{ $community->moo }}</td>
                                                        <td>{{ $community->district }}</td>
                                                        <td>
                                                            @if ($community->sub_district == 'NAKORNPING')
                                                                <span class="badge badge-success">
                                                                    นครพิงค์
                                                                </span>
                                                            @elseif($community->sub_district == 'KAWILA')
                                                                <span class="badge badge-warning">
                                                                    กาวิละ
                                                                </span>
                                                            @elseif($community->sub_district == 'MENGRAI')
                                                                <span class="badge badge-danger">
                                                                    เม็งราย
                                                                </span>
                                                            @elseif($community->sub_district == 'SRIVICHAI')
                                                                <span class="badge badge-info">
                                                                    ศรีวิชัย
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('communities.edit', $community->id) }}"
                                                                class="btn btn-primary btn-sm">แก้ไข</a>
                                                            <form action="{{ route('communities.destroy', $community->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    onclick="return confirm('คุณต้องการลบผู้ใช้งานหรือไม่ ?')"
                                                                    class="btn btn-danger btn-sm">ลบ</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

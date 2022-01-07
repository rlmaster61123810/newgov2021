{{-- users/index.blade.php --}}
@extends('layouts.app')
@section('content')
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> ผู้ใช้งาน <a href="{{ route('users.create') }}"
                                class="btn btn-primary float-right"> เพิ่มผู้ใช้งาน </a> </h4>

                    </div>
                    <div class="card-body">
                        {{-- if has success --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        ที่
                                    </th>
                                    <th>
                                        ชื่อผู้ใช้งาน
                                    </th>
                                    <th>
                                        ตำแหน่ง
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        สถานะ
                                    </th>
                                    <th>
                                        จัดการข้อมูล
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                {{ $user->id }}
                                            </td>
                                            <td>
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                {{ $user->position }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td>
                                                {{ $user->role }}
                                            </td>
                                            <td>
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    แก้ไข </a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('คุณต้องการลบผู้ใช้งานหรือไม่ ?')"
                                                        {{ count($users) == 1 ? 'disabled' : '' }}
                                                        class="btn btn-sm btn-danger"> ลบ </button>
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
@endsection

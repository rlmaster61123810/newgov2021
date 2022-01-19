@extends('layouts.app')
@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">จัดสรรพื้นที่ขาย</li>
            </ol>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>จัดสรรพื้นที่ขาย</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">
                                            <i class="fas fa-filter"></i>
                                            ตัวกรอง
                                        </label>
                                        <select name="selectFilter" class="form-control" id="selectFilter">
                                            <option value="0" @if ($filter == 0 || $filter == null) selected @endif>
                                                ทั้งหมด</option>
                                            <option value="1" @if ($filter == 1)
                                                selected
                                                @endif
                                                >ยังไม่มีพื้นที่ขาย</option>
                                            <option @if ($filter == 2)
                                                selected
                                                @endif
                                                value="2">มีพื้นที่ขายแล้ว</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ชื่อร้านค้า</th>
                                        <th>สถานที่ขาย</th>
                                        <th>สถานะ</th>
                                        <th>ผู้อนุมัติ</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($approves as $approve)
                                        <tr>
                                            <td>{{ $approve->application->shop_name }}</td>
                                            <td>{!! $approve->sale_area ? '[' . $approve->sale_area->name . '] - ' . $approve->sale_area->location . ' <a href="' . route('sale-area.delete', $approve->id) . '" class="text-danger" onclick="return confirm(\'คุณต้องการลบรายการนี้ใช่หรือไม่\')">X ลบ</a>' : '' !!}</td>
                                            </td>
                                            <td>
                                                @if (!$approve->sale_area)
                                                    <span class="badge badge-warning">ยังไม่มีพื้นที่ขาย</span>
                                                @else
                                                    <span class="badge badge-success">มีพื้นที่ขายแล้ว</span>
                                                @endif
                                            </td>
                                            <td>{{ $approve->user->name }}</td>
                                            <td>
                                                <a href="/saleareas/edit/{{ $approve->id }}"
                                                    class="btn btn-sm btn-info">แก้ไข</a>
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
@section('script')
    <script>
        $('#selectFilter').change(function() {
            var filter = $(this).val();
            if (filter == 0) {
                window.location.href = '/saleareas';
            } else {
                window.location.href = '/saleareas?filter=' + filter;
            }
        });
    </script>
@endsection

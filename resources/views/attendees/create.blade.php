@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="{{ route('attendees.create') }}">ผู้เข้าร่วมโครงการ</a></li>
            <li class="breadcrumb-item active" aria-current="page">เพิ่มผู้เข้าร่วมโครงการ</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>เพิ่มผู้เข้าร่วมโครงการ</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('attendees.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            {{-- form_id --}}
                            <label for="form_id">เลขที่แบบฟอร์ม</label>
                            <input type="text" class="form-control" id="form_id" name="form_id"
                                value="{{ old('form_id') }}" readonly>
                        </div>
                        <label for="type">สถานะผู้เข้าร่วมโครงการ</label>
                        <select id="type" class="form-control" name="type" required>
                            <option value="community">ชุมชน</option>
                            <option value="entrepreneur">ผู้ประกอบการ</option>
                            <option value="individual">บุคคลธรรมดา</option>
                        </select>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">สร้างผู้เข้าร่วมโครงการ</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection

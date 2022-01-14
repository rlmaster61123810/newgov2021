{{-- form/create.blade.php --}}

@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="{{ route('forms.index') }}">แบบตอบรับ</a></li>
            <li class="breadcrumb-item active" aria-current="page">เพิ่มแบบตอบรับ</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">เพิ่มแบบตอบรับ</h5>
                </div>
                <div class="card-body">
                    {{-- has error --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('forms.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="project_id">โครงการ</label>
                            <select class="form-control" name="project_id" id="project_id">
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="type">ประเภท</label>
                            <select class="form-control" name="type" id="type">
                                <option value="community">ชุมชน</option>
                                <option value="entrepreneur">ผู้ประกอบการ</option>
                                <option value="individual">บุคคลธรรมดา</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="community_id">ชุมชน</label>
                            <select class="form-control" name="community_id" id="community_id">
                                @foreach ($communities as $community)
                                    <option value="{{ $community->id }}">{{ $community->village }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="attendee_detail">ผู้ร่วมโครงการ
                                <button type="button" class="btn btn-sm btn-outline-primary" id="attendee_detail">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-danger" id="removetendees">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </label>
                            <div id="appendable">
                                <div class="row border p-2">
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="attendee_detail[0][fullname]"
                                            id="attendee_detail[0][fullname]" placeholder="ชื่อ-สกุล">
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="attendee_detail[0][phone]"
                                            id="attendee_detail[0][phone]" placeholder="เบอร์โทรผู้ร่วมโครงการ">
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input"
                                                name="attendee_detail[0][is_halal]" id="attendee_detail[0][is_halal]"
                                                value="1">
                                            <label class="form-check-label"
                                                for="attendee_detail[0][is_halal]">อาหารฮาลาล</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="auditor_name">ชื่อผู้ตรวจสอบ</label>
                            <input type="text" class="form-control" name="auditor_name" id="auditor_name"
                                placeholder="ชื่อผู้ตรวจสอบ">
                            {{-- has error --}}
                            @if ($errors->has('auditor_name'))
                                <div class="text-danger">
                                    {{ $errors->first('auditor_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="auditor_position">ตำแหน่งผู้ตรวจสอบ</label>
                            <input type="text" class="form-control" name="auditor_position" id="auditor_position"
                                placeholder="ตำแหน่งผู้ตรวจสอบ">
                            {{-- has error --}}
                            @if ($errors->has('auditor_position'))
                                <div class="text-danger">
                                    {{ $errors->first('auditor_position') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="auditor_phone">เบอร์โทรผู้ตรวจสอบ</label>
                            <input type="text" class="form-control" name="auditor_phone" id="auditor_phone"
                                placeholder="เบอร์โทรผู้ตรวจสอบ">
                            {{-- has error --}}
                            @if ($errors->has('auditor_phone'))
                                <div class="text-danger">
                                    {{ $errors->first('auditor_phone') }}
                                </div>
                            @endif
                        </div>
                        {{-- submit button --}}
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {

            // append attendee
            $('#attendee_detail').click(function() {
                var i = 1;
                $('#appendable').append(`
                    <div class="row border p-2">
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="attendee_detail[` + i + `][fullname]"
                                id="attendee_detail[` + i + `][fullname]" placeholder="ชื่อ-สกุล">
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="attendee_detail[` + i + `][phone]"
                                id="attendee_detail[` + i + `][phone]" placeholder="เบอร์โทรผู้ร่วมโครงการ">
                        </div>
                        <div class="col-md-2">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"
                                    name="attendee_detail[` + i + `][is_halal]" id="attendee_detail[` + i + `][is_halal]"
                                <label class="form-check-label" for="attendee_detail[` + i + `][is_halal]">อาหารฮาลาล</label>
                            </div>
                        </div>
                    </div>
                `);
            });

            // remove attendee
            $('#removetendees').click(function() {
                // can't remove if only one #appendable
                if ($('#appendable').children().length > 1) {
                    $('#appendable').children().last().remove();
                }
            });
        });
    </script>
@endsection

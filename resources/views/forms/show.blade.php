@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="{{ route('forms.index') }}">แบบตอบรับ</a></li>
            <li class="breadcrumb-item active" aria-current="page">แสดงข้อมูลแบบตอบรับ</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">แสดงแบบตอบรับ</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('forms.show', $form->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="project_id">โครงการ</label>
                            <select class="form-control" name="project_id" id="project_id" disabled="project_id">
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}"
                                        {{ $project->id == $form->project_id ? 'selected' : '' }}>{{ $project->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="community_id">ชุมชน</label>
                            <select class="form-control" name="community_id" id="community_id" disabled="community_id">
                                @foreach ($communities as $community)
                                    <option value="{{ $community->id }}" disabled="community_id"
                                        {{ $community->id == $form->community_id ? 'selected' : '' }}>
                                        {{ $community->village }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="auditor_name">ชื่อผู้ตรวจสอบ</label>
                            <input type="text" class="form-control" name="auditor_name" id="auditor_name"
                                placeholder="ชื่อผู้ตรวจสอบ" value="{{ $form->auditor_name }}" disabled="auditor_name">
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
                                placeholder="ตำแหน่งผู้ตรวจสอบ" value="{{ $form->auditor_position }}" disabled="auditor_position">
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
                                placeholder="เบอร์โทรผู้ตรวจสอบ" value="{{ $form->auditor_phone }}" disabled="auditor_phone">
                            {{-- has error --}}
                            @if ($errors->has('auditor_phone'))
                                <div class="text-danger">
                                    {{ $errors->first('auditor_phone') }}
                                </div>
                            @endif
                        </div>
                        {{-- submit --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">โครงการ</a></li>
            <li class="breadcrumb-item active" aria-current="page">เพิ่มโครงการ</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>เพิ่มโครงการ</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">ชื่อโครงการ</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            {{-- help text --}}
                            @if ($errors->has('name'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('name') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">รายละเอียด</label>
                            <textarea class="form-control" id="description" name="description"
                                rows="3">{{ old('description') }}</textarea>

                            {{-- help text --}}
                            @if ($errors->has('description'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('description') }}
                                </small>
                            @endif
                        </div>
                        {{-- department --}}
                        <div class="form-group">
                            <label for="department">หน่วยงาน</label>
                            <input type="text" class="form-control" id="department" name="department"
                                value="{{ old('department') }}">
                            @error('department')
                                {{-- helptext --}}
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- location --}}
                        <div class="form-group">
                            <label for="location">สถานที่</label>
                            <input type="text" class="form-control" id="location" name="location"
                                value="{{ old('location') }}">
                            @error('location')
                                {{-- helptext --}}
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                            </select>
                        </div>
                        {{-- input officer --}}
                        <div class="form-group">
                            <label for="officer">ผู้ดูแลโครงการ</label>
                            <input type="text" class="form-control" id="officer" name="officer"
                                value="{{ old('officer') }}">
                            @error('officer')
                                {{-- helptext --}}
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                            </select>
                        </div>
                        {{-- deadline --}}
                        <div class="form-group">
                            <label for="deadline">วันสิ้นสุดการรับสมัคร</label>
                            <input type="date" class="form-control" id="deadline" name="deadline"
                                value="{{ old('deadline') }}">
                            @error('deadline')
                                {{-- helptext --}}
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- training_start --}}
                        <div class="form-group">
                            <label for="training_start">วันเริ่มการอบรม</label>
                            <input type="datetime-local" class="form-control" id="training_start" name="training_start"
                                value="{{ old('training_start') }}">
                            @error('training_start')
                                {{-- helptext --}}
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- training_end --}}
                        <div class="form-group">
                            <label for="training_end">วันสิ้นสุดการอบรม</label>
                            <input type="datetime-local" class="form-control" id="training_end" name="training_end"
                                value="{{ old('training_end') }}">
                            @error('training_end')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- register_details --}}
                        <div class="form-group">
                            <label for="register_details">รายละเอียดการลงทะเบียน</label>
                            <textarea class="form-control" id="register_details" name="register_details"
                                rows="3">{{ old('register_details') }}</textarea>
                            @error('register_details')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- result --}}
                        <div class="form-group">
                            <label for="result">สถานะ</label>
                            <select id="result" class="form-control" name="result" required>
                                <option value="processed">เสร็จสมบูรณ์</option>
                                <option value="processing">ระหว่างดำเนินการ</option>
                                <option value="unprocessed">ยังไม่แล้วเสร็จ</option>
                            </select>
                        </div>
                        {{-- kpi --}}
                        <div class="form-group">
                            <label for="kpi">ตัวชี้วัดผลการอบรม</label>
                            <textarea class="form-control" id="kpi" name="kpi" rows="3">{{ old('kpi') }}</textarea>
                            @error('kpi')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- kpi_unit --}}
                        <div class="form-group">
                            <label for="kpi_unit">หน่วยนับตัวชี้วัดผลการอบรม</label>
                            <input type="text" class="form-control" id="kpi_unit" name="kpi_unit"
                                value="{{ old('kpi_unit') }}">
                            @error('kpi_unit')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- budget --}}
                        <div class="form-group">
                            <label for="budget">งบประมาณ</label>
                            <input type="text" class="form-control" id="budget" name="budget"
                                value="{{ old('budget') }}">
                            @error('budget')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- disbursement --}}
                        <div class="form-group">
                            <label for="disbursement">งบประมาณที่ได้รับจัดสรร</label>
                            <input type="text" class="form-control" id="disbursement" name="disbursement"
                                value="{{ old('disbursement') }}">
                            @error('disbursement')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- start_date --}}
                        <div class="form-group">
                            <label for="start_date">วันเริ่มกิจกรรม</label>
                            {{-- datetime input format dmy --}}
                            <input type="datetime-local" class="form-control" id="start_date" name="start_date"
                                value="{{ old('start_date') }}">
                            @error('start_date')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- end_date --}}
                        <div class="form-group">
                            <label for="end_date">วันสิ้นสุดกิจกรรม</label>
                            <input type="datetime-local" class="form-control" id="end_date" name="end_date"
                                value="{{ old('end_date') }}">
                            @error('end_date')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- comment --}}
                        <div class="form-group">
                            <label for="comment">หมายเหตุ</label>
                            <textarea class="form-control" id="comment" name="comment"
                                rows="3">{{ old('comment') }}</textarea>
                            @error('comment')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- attachment --}}
                        <div class="form-group">
                            <label for="attachment">เอกสารแนบ</label>
                            <input type="file" class="form-control-file" id="attachment" name="attachment"
                                accept="image/*,application/pdf,application/msword,application/vnd.ms-excel,application/vnd.ms-powerpoint,text/plain">
                            @error('attachment')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">สร้างโครงการ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">โครงการ</a></li>
                <li class="breadcrumb-item active" aria-current="page">แสดงโครงการ</li>
            </ol>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">แสดงโครงการ</h5>
                </div>
                <div class="card-body">
                    {{-- edit form --}}
                    <form action="{{ route('projects.show', $project->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">ชื่อโครงการ</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}"
                                disabled="name">
                            @error('name')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">รายละเอียด</label>
                            <textarea class="form-control" id="description" name="description" rows="3"
                                disabled="description">{{ $project->description }}</textarea>
                            @error('description')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- department --}}
                        <div class="form-group">
                            <label for="department">หน่วยงาน</label>
                            <input type="text" class="form-control" id="department" name="department"
                                value="{{ $project->department }}" disabled="department">
                            @error('department')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- location --}}
                        <div class="form-group">
                            <label for="location">สถานที่</label>
                            <input type="text" class="form-control" id="location" name="location"
                                value="{{ $project->location }}" disabled="location">
                            @error('location')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                            </select>
                        </div>
                        {{-- input officer --}}
                        <div class="form-group">
                            <label for="officer">ผู้ดูแลโครงการ</label>
                            <input type="text" class="form-control" id="officer" name="officer"
                                value="{{ $project->officer }}" disabled="officer">
                            @error('officer')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                            </select>
                        </div>
                        {{-- deadline --}}
                        <div class="form-group">
                            <label for="deadline">วันสิ้นสุดการรับสมัคร</label>
                            <input type="date" class="form-control" id="deadline" name="deadline"
                                value="{{ date('Y-m-d', strtotime($project->deadline)) }}" disabled="deadline">
                            @error('deadline')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- training_start --}}
                        <div class="form-group">
                            <label for="training_start">วันเริ่มการอบรม</label>
                            <input type="datetime-local" class="form-control" id="training_start" name="training_start"
                                value="{{ date('Y-m-d\TH:i', strtotime($project->training_start)) }}"
                                disabled="training_start">
                            @error('training_start')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror


                        </div>
                        {{-- training_end --}}
                        <div class="form-group">
                            <label for="training_end">วันสิ้นสุดการอบรม</label>
                            {{-- convert to google chome datetime format --}}
                            <input type="datetime-local" class="form-control" id="training_end" name="training_end"
                                value="{{ date('Y-m-d\TH:i', strtotime($project->training_end)) }}"
                                disabled="training_end">
                            @error('training_end')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- register_details --}}
                        <div class="form-group">
                            <label for="register_details">รายละเอียดการลงทะเบียน</label>
                            <textarea class="form-control" id="register_details" name="register_details" rows="3"
                                disabled="register_details">{{ $project->register_details }}</textarea>
                            @error('register_details')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="result">สถานะผลการอบรม</label>
                            {{-- select --}}
                            <select id="" class="form-control {{ $errors->has('result') ? ' is-invalid' : '' }}"
                                name="result" required value={{ $project->result }} name="result" required
                                disabled="result">
                                <option value="processed" {{ $project->result == 'processed' ? 'selected' : '' }}>
                                    ดำเนินงานเรียบร้อยแล้ว
                                </option>
                                <option value="processing" {{ $project->result == 'processing' ? ' selected' : '' }}>
                                    ระหว่างดำเนินงาน
                                </option>
                                <option value="unprocessed" {{ $project->result == 'unprocessed' ? 'selected' : '' }}>
                                    ยังไม่ได้ดำเนินงาน
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kpi">ตัวชี้วัดผลการอบรม</label>
                            <textarea class="form-control" id="kpi" name="kpi" rows="3" disabled="kpi">
                                        {{ $project->kpi }}</textarea>
                            @error('kpi')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- kpi_unit --}}
                        <div class="form-group">
                            <label for="kpi_unit">หน่วยนับตัวชี้วัดผลการอบรม</label>
                            <input type="text" class="form-control" id="kpi_unit" name="kpi_unit" disabled="kpi_unit"
                                value="{{ $project->kpi_unit }}">
                            @error('kpi_unit')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- budget --}}
                        <div class="form-group">
                            <label for="budget">งบประมาณ</label>
                            <input type="text" class="form-control" id="budget" name="budget"
                                value="{{ $project->budget }}" disabled="budget">
                            @error('budget')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- disbursement --}}
                        <div class="form-group">
                            <label for="disbursement">งบประมาณที่ได้รับจัดสรร</label>
                            <input type="text" class="form-control" id="disbursement" name="disbursement"
                                value="{{ $project->disbursement }}" disabled="disbursement">
                            @error('disbursement')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- start_date --}}
                        <div class="form-group">
                            <label for="start_date">วันเริ่มกิจกรรม</label>
                            <input type="datetime-local" class="form-control" id="start_date" name="start_date"
                                value="{{ date('Y-m-d\TH:i', strtotime($project->start_date)) }}" disabled="start_date">
                            @error('start_date')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- end_date --}}
                        <div class="form-group">
                            <label for="end_date">วันสิ้นสุดกิจกรรม</label>
                            <input type="datetime-local" class="form-control" id="end_date" name="end_date"
                                value="{{ date('Y-m-d\TH:i', strtotime($project->end_date)) }}" disabled="end_date">
                            @error('end_date')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- comment --}}
                        <div class="form-group">
                            <label for="comment">หมายเหตุ</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3"
                                disabled="comment">{{ $project->comment }}</textarea>
                            @error('comment')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- attachment --}}
                        <div class="form-group">
                            <label for="attachment">เอกสารแนบ</label>
                            @if ($project->attachment)
                                <br>
                                {{-- link to filename with delete button --}}
                                <a href="{{ asset('uploads/' . $project->attachment) }}"
                                    target="_blank">{{ $project->attachment }}</a>
                                <a href="{{ route('projects.destroyAttachment', $project->id) }}"
                                    class="text-danger">X</a>
                            @endif
                            <input type="file" class="form-control" id="attachment" name="attachment"
                                accept="image/*,application/pdf,application/msword,application/vnd.ms-excel,application/vnd.ms-powerpoint,text/plain"
                                disabled="attachment">
                            @error('attachment')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

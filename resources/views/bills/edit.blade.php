@extends('layouts.app')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าแรก</a></li>
        <li class="breadcrumb-item"><a href="{{ route('bills.index') }}">ใบเสร็จ</a></li>
        <li class="breadcrumb-item active" aria-current="page">เพิ่มใบชำระเงิน</li>
    </ol>
</nav>

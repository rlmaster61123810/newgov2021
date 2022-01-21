<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>C.S.S.D.CM</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sarabun:wght@100;400&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }

        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

    </style>

</head>

<body> {{-- bottom-center --}}
    <div class="container p-5 my-3">
        <div class="row justify-content-center">
            {{-- insent images --}}
            <div>
                <img src="/images/cm.png" alt="logo" class="img-fluid" width="150" height="150">
                <div class="row justify-content-center">
                    <div class="col-md-6-content-center">
                        <h5>ใบคำร้องขอรับร้องผู้ประกอบการ</h5>
                    </div>
                </div>
                <br>
                <br>
                <h5>เอกสารที่แนบมาด้วย</h5>
                <p>
                    {!! $application->has_idcard ? ' &check;' : ' &cross;' !!} สำเนาบัตรประชาชน
                </p>
                <p>
                    {!! $application->has_house_registration ? ' &check;' : ' &cross;' !!} สำเนาทะเบียนบ้าน
                </p>
                <p>
                    {!! $application->has_document ? ' &check;' : ' &cross;' !!} เอกสารประกอบอื่นๆ
                </p>

                <hr>

                <h5>รายละเอียดผู้สมัคร</h5>

                <p>
                    <strong> ชื่อ-สกุล :</strong><u> {{ $application->fullname }} </u> &nbsp;
                    <strong>ที่อยู่ :</strong><u>&nbsp; &nbsp; {{ $application->address }} &nbsp; </u>
                    &nbsp;
                    {{-- phone --}}
                    <strong>เบอร์โทรศัพท์ :</strong><u> &nbsp; {{ $application->phone }}</u> &nbsp;
                    {{-- email --}}
                    @if ($application->group_name)
                        <strong>ซึ่งเป็นประธานกลุ่ม : </strong> {{ $application->group_name }}
                    @else
                        <strong>ซึ่งเป็นผู้ประกอบการผลิตภัณฑ์</strong>
                    @endif&nbsp;
                </p>

                <hr>

                <h5>สินค้า</h5>
                <p>
                    <strong>ประเภทสินค้า :</strong> {{ $application->product_type }} <br>

                </p>
                <strong>รายการสินค้า</strong>
                <ul>
                    @foreach ($application->products as $product)
                        <li>
                            {{ $product->name }}
                        </li>
                    @endforeach
                </ul>
                <h5>ชื่อร้านค้า</h5>
                <ul>
                    <li>
                        {{ $application->shop_name }}&nbsp;
                    </li>
                </ul>
                <h5>ที่อยู่ร้านค้า</h5>
                <ul>
                    <li>
                        {{ $application->shop_address }}&nbsp;
                    </li>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6-content-center">
            <a href="{{ route('applications.index') }}" class="btn btn-primary btn-sm">ย้อนกลับ</a>
            {{-- downloadPDF --}}
            <a href="{{ route('application.downloadPDF', $application->id) }}" class="btn btn-primary btn-sm">ดาวน์โหลดเอกสาร</a>
        </div>
    </div>
</body>

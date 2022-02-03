<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document</title>

    <style>
        @font-face {
            /* prompt font */
            font-family: 'Kanit';
            font-weight: 400;
            font-style: normal;
            src: url("{{ public_path('fonts/Kanit-Regular.ttf') }}") format('truetype');
        }

        /* bold */
        @font-face {
            /* prompt font */
            font-family: 'Kanit';
            font-weight: 700;
            font-style: normal;
            src: url("{{ public_path('fonts/Kanit-Bold.ttf') }}") format('truetype');

        }

        body {
            font-size: 12px;
            font-family: 'Kanit';
        }

        .float-end {
            float: right;
        }

        .col-6 {
            width: 50%;
            float: left;
        }

        .col-6:nth-child(2) {
            width: 50%;
            float: right;
        }

        .col-3-right {
            width: 33.33%;
            float: right;
        }

        .col-4-right {
            width: 25%;
            float: right;
        }

        .col-6-right {
            width: 50%;
            float: right;
        }


        li {
            margin-bottom: 10px;
        }

        .text-center {
            text-align: center;
        }

        .text-bold {
            font-weight: bold;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="text-center">
            <img src="{{ public_path('images/cm.png') }}" alt="" width="100px">
        </div>
        <br>
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="float-end">วันที่
                    {{ \Silkyland\Sawasdee::toThaiDateTime($application->created_at, '...%d... %m .... พ.ศ. .. %y.. ') }}
                    {{-- clear fix --}}

                </div>
                <br>
                <p><strong>เรื่อง</strong> หนังสือรับรองผู้ประกอบการหนึ่งตำบลหนึ่งผลิตภัณฑ์ (OTOP)</p>
                <p> <strong>เรียน</strong> นายกเทศมนตรีนครเชียงใหม่</p>
                <p><strong>สิ่งที่แนบมาด้วย:</strong> </p>
                <ol>
                    <li>สำเนาบัตรประจำตัวประชาชน {{ $application->has_idcard ? '1 ฉบับ' : '*ไม่ได้แนบมาด้วย' }}</li>
                    <li>สำเนาทะเบียนบ้าน {{ $application->has_house_registration ? '1 ฉบับ' : '*ไม่ได้แนบมาด้วย' }}
                    </li>
                    <li>ภาพถ่ายหรือเอกสารที่เกี่ยวข้องกับผลิตภัณฑ์
                        {{ $application->has_document ? '1 ชุด' : '*ไม่ได้แนบมาด้วย' }}</li>
                </ol>
                <p>
                    ข้าพเจ้า <span
                        style="border-bottom: 1px dotted">&nbsp;&nbsp;{{ $application->fullname }}&nbsp;&nbsp;</span>
                    อยู่บ้านเลขที่ <span class="" style="border-bottom: 1px dotted">&nbsp;&nbsp;
                        {{ $application->address }} &nbsp;&nbsp; </span>
                    @if ($application->group_name)
                        ซึ่งเป็นประธานกลุ่ม : <span class="" style="border-bottom: 1px dotted">
                            {{ $application->group_name }}</span>
                    @else
                        ซึ่งเป็นผู้ประกอบการผลิตภัณฑ์
                    @endif
                    ประเภท
                </p>
                <div class="row">
                    <div class="col-6">
                        <p style="padding-left:25px;">{{ $application->product_type == 'อาหาร' ? '[/]' : '[X]' }}
                            อาหาร
                        </p>
                        <p style="padding-left:25px;">
                            {{ $application->product_type == 'เครื่องดื่ม' ? '[/]' : '[X]' }}
                            เครื่องดื่ม</p>
                        <p style="padding-left:25px;">{{ $application->product_type == 'เสื้อผ้า' ? '[/]' : '[X]' }}
                            เสื้อผ้าเครื่องแต่งกาย</p>
                    </div>
                    <div class="col-6">
                        <p>{{ $application->product_type == 'ของทาน' ? '[/]' : '[X]' }} ของใช้ ของตกแต่ง ของที่ระลึก
                        </p>
                        <p>{{ $application->product_type == 'สมุนไพร' ? '[/]' : '[X]' }} สมุนไพรไม่ใช่อาหาร</p>
                        <p>{{ $application->product_type == 'อื่นๆ' ? '[/]' : '[X]' }} อื่นๆ ระบุ <span
                                style="border-bottom: 1px dotted">{{ $application->reason }}</span></p>
                    </div>
                    <div style="clear: both;">&nbsp;</div>
                </div>
                <p>มีความประสงค์ขอหนังสือรับรองเป็นกลุ่มผู้ผลิตหรือผู้ปกระกอบหนึ่งตำบลหนึ่งผลิตภัณฑ์ (OTOP)
                    ชื่อผลิตภัณฑ์</p>
                <ol style="margin-right: 50px;">
                    @foreach ($application->products as $product)
                        <li style="border-bottom: 1px dotted"> {{ $product->name }} </li>
                    @endforeach
                </ol>
                <p>โดยมีสถานประกอบการอยู่ บ้านเลขที่ <span
                        style="border-bottom: 1px dotted">{{ $application->shop_address }} </span></p>
                <p>จึงเรียนมาเพื่อโปรดพิจารณา</p>
                <div class="col-6-right">
                    <div class="float-end">
                        <p><strong>(ลงชื่อ)</strong></p>
                        <p>( <span
                                style="border-bottom: 1px dotted">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            )</p>
                        <p>โทร <span style="border-bottom: 1px dotted">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                {{ $application->phone }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

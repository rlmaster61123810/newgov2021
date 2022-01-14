{{-- has_idcard --}}
{{-- check icon --}}
<div>
    <h4>เอกสารที่แนบมาด้วย</h4>
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

    <h4>รายละเอียดผู้สมัคร</h4>

    <p>
        <strong> ชื่อ-สกุล :</strong><u> {{ $application->fullname }} </u> &nbsp;
        <strong>ที่อยู่ :</strong><u>&nbsp; &nbsp; {{ $application->address }} &nbsp; </u> &nbsp;
        {{-- phone --}}
        <strong>เบอร์โทรศัพท์ :</strong><u> &nbsp; {{ $application->phone }}</u> &nbsp;
        {{-- email --}}
        @if ($application->group_name)
            <strong>ซึ่งเป็นประธานกลุ่ม : </strong> {{ $application->group_name }}
        @else
            <strong>ซึ่งเป็นผู้ประกอบการผลิตภัณฑ์</strong>
        @endif
    </p>

    <hr>

    <h4>สินค้า</h4>
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
</div>

@extends('layouts')
@section('content')
    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <p>ชื่อผู้ใช้ : {{Auth::user()->name}}</p>
                        <p>อีเมล : {{Auth::user()->email}}</p>
                        <p>รหัสผ่าน : xxxxxxxx</p>
                        <form action="{{url('logout')}}" method="post">
                            @csrf
                            <button class="btn" type="submit">ออกจากระบบ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

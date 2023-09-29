@extends('layouts')
@section('content')
    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="card">
                <div class="card-body">
                   <form action="{{url('/registerpost')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="my-input">ชื่อผู้ใช้</label>
                        <input required class="form-control" type="text" name="name" placeholder="">
                    </div>
                    <div class="form-group mt-2">
                        <label for="my-input">อีเมล</label>
                        <input required class="form-control" type="email" name="email" placeholder="">
                    </div>
                    <div class="form-group mt-2">
                        <label for="my-input">รหัสผ่าน</label>
                        <input required class="form-control" type="text" name="password" placeholder="">
                    </div>
                    <div class="form-text  my-3">มีบัญชีแล้วใช่ไหม? <a href="{{route('login')}}">เข้าสู่ระบบเลย</a></div>
                    <button type="submit" class="btn">สมัคร</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
@endsection

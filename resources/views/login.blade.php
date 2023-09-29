@extends('layouts')
@section('content')
    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                    <form action="{{ url('/loginpost') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="my-input">อีเมล</label>
                            <input required class="form-control" type="email" name="email" placeholder=""  value="{{old('email')}}">
                        </div>
                        <div class="form-group mt-2">
                            <label for="my-input">รหัสผ่าน</label>
                            <input required class="form-control" type="text" name="password" placeholder="" value="{{old('password')}}">
                        </div>
                        <div class="form-text  my-2">ยังไม่มีบัญชีใช่ไหม? <a href="{{ route('register') }}">สมัครเลย</a>
                        </div>
                        <button type="submit" class="btn">เข้าสู่ระบบ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

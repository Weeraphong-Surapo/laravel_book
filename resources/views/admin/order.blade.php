@extends('layouts')
@section('content')
    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="p-3 p-lg-5 border bg-white">
                <div class="row mb-5">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>รหัส</th>
                                    <th>สถานะ</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($lists as $list)
                                    <tr>
                                        <td width="10%">{{ $i++ }}</td>
                                        <td>{{ $list->code }}</td>
                                        <td>
                                            @if ($list->status == 0)
                                                <span class="badge bg-warning">รออนุมัติ</span>
                                            @elseif ($list->status == 1)
                                                <span class="badge bg-success">อนุมัติ</span>
                                            @else
                                                <span class="badge bg-danger">ไม่อนุมัติ</span>
                                            @endif
                                        </td>
                                        <td width="25%">
                                            <div class="btn-group">
                                                <form action="{{url('/admin/toggle',$list->id)}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="status" value="no">
                                                    <button type="submit" class="btn bg-danger"
                                                        onclick="return confirmNo();">ไม่อนุมัติ</button>
                                                </form>
                                                <form action="{{url('/admin/toggle',$list->id)}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="status" value="yes">
                                                    <button class="btn bg-success"
                                                        onclick="return confirmYes();">อนุมัติ</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmNo() {
            if (confirm('ไม่อนุมัติ?')) {

                return true;
            } else {
                return false;
            }
        }

        function confirmYes() {
            if (confirm('อนุมัติ?')) {

                return true;
            } else {
                return false;
            }
        }
    </script>
@endsection

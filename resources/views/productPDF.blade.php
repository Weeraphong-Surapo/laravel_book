<html>
<header>
    <title>pdf</title>
    <meta http-equiv="Content-Language" content="th" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link
        href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'sarabun', sans-serif;
            font-size: 20px;
        }

        table {
            width: 100%;
            font-size: 14px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table#header tr td {
            border: 0;
        }
    </style>
</header>

<body>
    @php
        $date = date_create();
    @endphp
    <h4 style="text-align:center;">รายการสินค้าในระบบ</h4>
    <span style="text-align: right;">{{ date_format($date, 'm/d/Y H:i') }} น.</span>
    <table>
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>ชื่อสินค้า</th>
                <th>ราคา</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($books as $book)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$book->book_name}}</td>
                    <td>{{$book->book_price}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>

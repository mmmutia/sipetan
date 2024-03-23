<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
    <title>Cetak Data Kesesuaian Tanaman Pangan</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Data Kesesuaian Tanaman Pangan</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Kecamatan</th>
                    <th>Kecocokan Tanaman Pangan</th>
                    <th>Persentase</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comparison as $data)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $data->subdistrict->subdistrict }}</td>
                    <td>{{ $data->result }}</td>
                    <td>{{ number_format($data->percentase, 0, '.', '') }}%</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>

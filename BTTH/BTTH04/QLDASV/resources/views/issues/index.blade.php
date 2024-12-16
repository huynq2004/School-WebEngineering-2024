<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Issues</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href="{{ route('issues.index') }}"> QL Đồ án sinh viên</a>
            <div class="justify-end">
                <div class="col">
                    <a class="btn btn-sm btn-success" href="{{ route('issues.create') }}">Thêm vấn đề</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Issues List</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Mã vấn đề</th>
                    <th>Tên máy tính</th>
                    <th>Tên phiên bản</th>
                    <th>Người báo cáo sự cố</th>
                    <th>Thời gian báo cáo</th>
                    <th>Mức độ sự cố</th>
                    <th>Trạng thái hiện tại</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($issues as $issue)
                    <tr>
                        <td>{{ $issue->id }}</td>
                        <td>{{ $issue->computer->computer_name }}</td>
                        <td>{{ $issue->computer->model }}</td>
                        <td>{{ $issue->reported_by }}</td>
                        <td>{{ $issue->reported_date }}</td>
                        <td>{{ ucfirst($issue->urgency) }}</td>
                        <td>{{ ucfirst($issue->status) }}</td>
                        <td>
                            <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                            <form action="{{ route('issues.destroy', $issue->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this issue?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>

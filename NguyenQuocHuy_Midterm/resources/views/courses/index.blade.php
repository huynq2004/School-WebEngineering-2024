<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Courses</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href="{{ route('courses.index') }}">QL Khóa học</a>
            <div class="justify-end">
                <div class="col">
                    <a class="btn btn-sm btn-success" href="{{ route('courses.create') }}">Thêm Khóa học</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Danh sách khóa học</h1>

        {{-- Hiển thị thông báo phản hồi --}}
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            
        </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Mã khóa học</th>
                    <th>Tên khóa học</th>
                    <th>Mô tả</th>
                    <th>Mức độ</th>
                    <th>Giá</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ ucfirst($course->difficulty) }}</td>
                    <td>{{ number_format($course->price, 0, ',', '.') }} VND</td>
                    <td>
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa khóa học này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            <nav>
                <ul class="pagination">
                    {{-- Tùy chỉnh liên kết phân trang --}}
                    @if ($courses->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">Trước</span></li>
                    @else
                    <li class="page-item"><a class="page-link" href="{{ $courses->previousPageUrl() }}">Trước</a></li>
                    @endif

                    @foreach ($courses->getUrlRange(1, $courses->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $courses->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                    @endforeach

                    @if ($courses->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $courses->nextPageUrl() }}">Tiếp</a></li>
                    @else
                    <li class="page-item disabled"><span class="page-link">Tiếp</span></li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybPbmCkASRqaJ8vO+5L5o8tOZQ8qz5DIOv9Pp4w+0sH5GEr4w" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0vbVz+XbX9nJ6Lg2vOXREfVj72yqa8V8fPps1P7hZ1y7UuN8" crossorigin="anonymous"></script>

</body>

</html>
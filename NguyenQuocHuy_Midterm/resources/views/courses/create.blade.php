<!-- Blade view: course.create -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
        crossorigin="anonymous">
    <title>Add Course</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href={{ route('courses.index') }}>Quản lý khóa học</a>
        </div>
    </nav>

    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Thêm 1 khóa học mới</h3>
                <form action="{{ route('courses.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên khóa học</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="description">Mô tả</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>

                    <div class="form-group mt-3">
                        <label for="difficulty">Độ khó</label>
                        <select class="form-control" id="difficulty" name="difficulty" required>
                            <option value="beginner">Beginner</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="advanced">Advanced</option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="price">Giá</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="start_date">Ngày bắt đầu</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Tạo khóa học</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

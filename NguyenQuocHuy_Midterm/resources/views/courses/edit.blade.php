<!-- Blade view: course.edit -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
        crossorigin="anonymous">
    <title>Edit Course</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href="{{ route('courses.index') }}">Manage Courses</a>
            <div class="justify-end">
                <div class="col">
                    <a class="btn btn-sm btn-success" href="{{ route('courses.create') }}">Add Course</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Edit Course</h3>
                <form action="{{ route('courses.update', $course->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Course Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $course->name }}" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $course->description }}</textarea>
                    </div>

                    <div class="form-group mt-3">
                        <label for="difficulty">Difficulty</label>
                        <select class="form-control" id="difficulty" name="difficulty" required>
                            <option value="beginner" {{ $course->difficulty == 'beginner' ? 'selected' : '' }}>Beginner</option>
                            <option value="intermediate" {{ $course->difficulty == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                            <option value="advanced" {{ $course->difficulty == 'advanced' ? 'selected' : '' }}>Advanced</option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ $course->price }}" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $course->start_date }}" required>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Update Course</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

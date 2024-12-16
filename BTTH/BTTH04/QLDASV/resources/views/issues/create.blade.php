<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
        crossorigin="anonymous">
    <title>Add Issue</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href={{ route('issues.index') }}>CRUD Issues</a>
        </div>
    </nav>

    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Add a New Issue</h3>
                <form action="{{ route('issues.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="computer_id">Computer</label>
                        <select class="form-control" id="computer_id" name="computer_id" required>
                            @foreach($computers as $computer)
                                <option value="{{ $computer->id }}">{{ $computer->computer_name }} - {{ $computer->model }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="reported_by">Reported By</label>
                        <input type="text" class="form-control" id="reported_by" name="reported_by" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="reported_date">Reported Date</label>
                        <input type="datetime-local" class="form-control" id="reported_date" name="reported_date" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>

                    <div class="form-group mt-3">
                        <label for="urgency">Urgency</label>
                        <select class="form-control" id="urgency" name="urgency" required>
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Open">Open</option>
                            <option value="In progress">In progress</option>
                            <option value="Resolved">Resolved</option>
                        </select>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Create Issue</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

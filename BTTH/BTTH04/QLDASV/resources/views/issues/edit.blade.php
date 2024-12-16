<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
        crossorigin="anonymous">
    <title>Edit Issue</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href="{{ route('issues.index') }}">CRUD Issues</a>
            <div class="justify-end">
                <div class="col">
                    <a class="btn btn-sm btn-success" href="{{ route('issues.create') }}">Add Issue</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Edit Issue</h3>
                <form action="{{ route('issues.update', $issue->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="computer_id">Computer</label>
                        <select class="form-control" id="computer_id" name="computer_id" required>
                            @foreach($computers as $computer)
                            <option value="{{ $computer->id }}"
                                {{ $computer->id == $issue->computer_id ? 'selected' : '' }}>
                                {{ $computer->computer_name }} - {{ $computer->model }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="reported_by">Reported By</label>
                        <input type="text" class="form-control" id="reported_by"
                            name="reported_by" value="{{ $issue->reported_by }}" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="reported_date">Reported Date</label>
                        <input type="datetime-local" class="form-control" id="reported_date"
                            name="reported_date" value="{{ date('Y-m-d\TH:i', strtotime($issue->reported_date)) }}" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $issue->description }}</textarea>
                    </div>

                    <div class="form-group mt-3">
                        <label for="urgency">Urgency</label>
                        <select class="form-control" id="urgency" name="urgency" required>
                            <option value="Low" {{ $issue->urgency == 'Low' ? 'selected' : '' }}>Low</option>
                            <option value="Medium" {{ $issue->urgency == 'Medium' ? 'selected' : '' }}>Medium</option>
                            <option value="High" {{ $issue->urgency == 'High' ? 'selected' : '' }}>High</option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Open" {{ $issue->status == 'Open' ? 'selected' : '' }}>Open</option>
                            <option value="In progress" {{ $issue->status == 'In progress' ? 'selected' : '' }}>In progress</option>
                            <option value="Resolved" {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                        </select>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Update Issue</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
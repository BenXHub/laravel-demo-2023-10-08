<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/dist/bootstrap-5.2.3/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>Students</title>
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                @if(session('success'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="text-success">Student List</h2>
                    <a href="{{ route('student_create') }}" class="btn btn-success">Add Student</a>
                </div>
                <h5 class="mb-4">Curiosity Unleashed, Potential Unlocked!.</h5>

                <!-- Student List -->
                <div>
                    <table class="table table-hover table-student-info ">
                        <thead class="table-success">
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $key => $student)
                                <tr>
                                    <td>
                                        <a class="list-group-item" style="font-weight: normal; color: inherit">{{ $student['first_name'] }}</a>
                                    </td>
                                    <td>
                                        <a class="list-group-item" style="color: inherit">{{ $student['last_name'] }}</a>
                                    </td>
                                    <td>
                                        <a class="list-group-item" href="{{ route('student_show', ['id' => $student['id']]) }}"><button class="text-bg-light" style="border-radius: 0 32px 0 32px; border: 1px solid black">👁️</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

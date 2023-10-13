<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/dist/bootstrap-5.2.3/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>Edit Student</title>
</head>

<body>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Edit Student</h2>
                <a href="{{ route('student_index') }}" class="btn btn-outline-success">All Students</a>
            </div>
            <p>Empowering Future Leaders!.</p>
            <form action="{{ route('student_update', ['id' => $student->id]) }}" method="post">
                @csrf
                @method('put')

                <!-- First Name -->
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $student->first_name }}" required>
                </div>

                <!-- Last Name -->
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $student->last_name }}" required>
                </div>

                <!-- Gender -->
                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_male" id="gender_male" value="1" {{ $student->is_male ? 'checked' : '' }}>
                        <label class="form-check-label" for="gender_male">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_male" id="gender_female" value="0" {{ !$student->is_male ? 'checked' : '' }}>
                        <label class="form-check-label" for="gender_female">
                            Female
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class=" bg-info">
    <div class="container-lgr">
        <div class="row m-5">
            <div class="col-md-8 mx-auto p-5  border bg-light shadow-lg rounded">
                <h1 class="fw-bold">💌 <span class="border-bottom border-5 mb-3 border-info "> Todo list </span></h1>
                @if (session('success'))
                    <div class="mt-4 alert alert-info">{{ session('success') }}</div>
                @endif

                <form action="{{ route('createtodo') }}" method="POST">
                    @csrf
                    <div class="row my-4">
                        <div class="col-11 m-2">
                            <div class="input-group input-group-lg">
                                <input class="form-control shadow-sm" type="text"
                                    placeholder="Write a new task here..." name="description" required>
                                <div class="ms-3 d-flex">
                                    <button class="btn btn-info text-light shadow-sm" type="submit">→</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>


                <table class="table p-5">
                    <thead class="">
                        <tr>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @if (count($todos) > 0)
                            @foreach ($todos as $todo)
                                <tr>
                                    <td>{{ $todo->description }}</td>
                                    <td>
                                        @if ($todo->status == 'pending')
                                            <span class="badge text-bg-light">Pending</span>
                                        @else
                                            <span class="badge text-bg-info">Completed</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($todo->status == 'pending')
                                            <a href="{{ route('updatetodo', $todo->id) }}"class="btn btn-info text-white btn-sm">√</button>
                                            @else
                                        @endif
                                        <a href="{{ route('deletetodo', $todo->id) }}"class="btn btn-danger btn-sm mx-1">⨉</button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <td colspan="6" class="text-center">
                                <h3 class="fw-bold">No Records</h3>
                            </td>
                        @endif
                    </tbody>


                </table>
                <div class="col text-center mt-5">
                    <h6> Developed by: <span class="fw-bold"> Raymart <span></h6>
                    <a class="text-center" href="{{ route('about') }}"><span class="text-info"> Go to About</span></a>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>

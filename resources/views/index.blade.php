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
<body>
    <div class="container-lg">
        <div class="row m-5">
            <div class="col-md-8 mx-auto p-5 border shadow rounded">
                <h1 class="fw-bold">💌 Todo list</h1>
                @if (session('success'))
                    <div class="alert alert-primary">{{ session('success') }}</div>
                @endif

                <form action="{{ route('createtodo') }}" method="POST">
                    @csrf
                    <div class="row my-4">
                        <div class="col-11">
                            <input class="form-control" type="text" placeholder="Write a new task here..."
                                name="description" required>
                        </div>
                        <div class="col-1 d-flex">
                            <button class="btn btn-primary" type="submit">→</button>
                        </div>
                    </div>
                </form>
                <table class="table p-5">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>   
                        @if (count($todos) > 0  )                                                                                               
                        @foreach ($todos as $todo)                                          
                            <tr>                                                          
                                <td>{{ $todo->description }}</td>
                                <td>
                                    @if ($todo->status == 'pending')
                                        <span class="badge text-bg-light">Pending</span>
                                    @else
                                        <span class="badge text-bg-success">Completed</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($todo->status == 'pending')
                                        <a href="{{ route('updatetodo', $todo->id) }}"
                                            class="btn btn-primary">√</button>
                                        @else
                                    @endif
                                    <a href="{{ route('deletetodo', $todo->id) }}" class="btn btn-danger">⨉</button>
                                </td>
                            </tr>                         
                        @endforeach
                        @else                
                            <td colspan="6" class="text-center"> <h3 class="fw-bold">No Records</h3></td>                   
                        @endif                     
                    </tbody>
                </table>
                <a href="{{ route('about') }}">Go to About</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>

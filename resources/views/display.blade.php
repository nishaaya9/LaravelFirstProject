<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container mt-3">
    <center>
      @if(session('success'))
      <div class="alert alert-success">
        {{session('success')}}
      </div>
      @elseif(session('danger'))
      <div class="alert alert-danger">
        {{session('danger')}}
      </div>
      @endif
    </center>
    <div><a href="{{route('create')}}" class="btn btn-primary">Add New Data</a></div>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Contact</th>
          <th>Image</th>
          <th>EDIT</th>
          <th>DELETE</th>
        </tr>
      </thead>
      <tbody>
        @foreach($students as $key)
        <tr>
          <td>{{$key->sid}}</td>
          <td>{{$key->name}}</td>
          <td>{{$key->contact}}</td>
          <td><img src="/Images/{{$key->image}}" height="50px" width="70px"></td>
          <td><a href="{{route('student.edit',$key->sid)}}" class="btn btn-success">Edit</a></td>
          <td>
            <form action="{{route('student.destroy',$key ->sid)}}" method="post">
              @csrf
              @method('delete')
              <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</body>

</html>
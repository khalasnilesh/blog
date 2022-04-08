@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div>
            <div>
                <h3>Users</h3> <hr> 
            </div>
            <div>
                <table class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created at </th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $row)
                      <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->role}}</td>
                        <td>{{$row->created_at}}</td>
                        <td>
                            <div class="btn btn-success" onclick="editRecord('{{$row->id}}')">Edit</div>
                            <div class="btn btn-danger" onclick="DeleteRecord('{{$row->id}}')">Delete</div>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
      
    </div>
</div>
@endsection

<script type="text/javascript">

function editRecord(userID){
    alert('edit record '); 
}

function DeleteRecord(userID){
    alert('Delete record ');   

    // $.ajax({
    //     url: "{{ url('/users/delete') }}",
    //     type: "POST",
    //     data: {
    //         user_id: userID,
    //         _token: '{{csrf_token()}}'
    //     },
    //     dataType: 'json',
    //     success: function (res) {
    //         console.log(res); 
    //     }
    // });
}

</script>
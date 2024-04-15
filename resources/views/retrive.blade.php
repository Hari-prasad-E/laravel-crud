@if(isset($result) && count($result) > 0)
<a href="{{ url('/register') }}"><button>Add new user</button></a>
<p></p>
<form action="{{ url('mulSelect') }} " method="GET">
<table border="1px" style="border-collapse: collapse; position:relative;top:-30px">
    <tr>
        <th>Select</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Contact Number</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    @foreach($result as $user)
    <tr>
        <td><input type="checkbox" name="selecteditems[]" value="{{ $user->id }}"></td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->address }}</td>
        <td>{{ $user->contactnumber }}</td>
        <td><img src="{{ asset('images/' .$user->profileimage) }}" alt=""></td>
        <td><a href="edit/{{ $user->id }}">Update</a></td>
        <td><a href="delete/{{ $user->id }}" onclick="deleteConformation()">Delete</a></td>
    </tr>
    @endforeach
    <a><button type="submit" onclick="deleteConformation()" style="position: relative; top: -40px; left: 400px;">Delete the selected users</button></a>
</table>
</form>
@else
No data available
@endif
<script>
    function deleteConformation() {
        return confirm("Are you sure you want to delete this record?");
    }
</script>
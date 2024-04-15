<form method="POST" action="{{url('register')}}">
@csrf
    @if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <fieldset>
        <legend>Details</legend>
        <label>Name : <input type="text" name="name" value="{{ old('name')}}"></label> <br>
        <p></p>
        <label>email : <input type="text" name="email" value="{{ old('email')}}"></label> <br>
        <p></p>
        <label>address : <input type="text" name="address" value="{{ old('address')}}"></label> <br>
        <p></p>
        <label>contact number : <input type="text" name="contactnumber" value="{{ old('contactnumber')}}"></label> <br>
        <p></p>
        <label>Profile picture : <input type="file" name="profileimage" placeholder="browse for profile picture"></label>
        <p></p>
        <input type="submit" placeholder="REGISTER">
    </fieldset>
</form>
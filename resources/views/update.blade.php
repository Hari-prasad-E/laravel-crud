@if($user)
<form action="{{ route('update1',['id' => $user->id])}}" method="POST">
    @csrf
    @method("PATCH")
    <fieldset>
        <legend>Details</legend>
        <label>Name : <input type="text" name="name" value="{{ $user->name }}"></label> <br>
        <p></p>
        <label>email : <input type="text" name="email" value="{{ $user->email }}"></label> <br>
        <p></p>
        <label>address : <input type="text" name="address" value="{{ $user->address }}"></label><br>
        <p></p>
        <label>contact number : <input type="text" name="contactnumber" value="{{ $user->contactnumber }}"></label> <br>
        <p></p>
        <button value="submit">update the change</button>
    </fieldset>
</form>
@endif
@if($errors->any())
    <ul style="color:red">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<div>
    <form method="post" enctype="multipart/form-data">
        @csrf
        帳號<input name="uid" value="{{old('uid')}}"> <br>
        密碼<input name="password"><br>
        密碼<input name="password_confirmation"><br>
        <input type="file" name="photo"><br>
        <button>Submit</button>
    </form>
</div>

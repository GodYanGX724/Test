<div>
    <form method="post">
        @csrf
        <input name="id" value="{{isset($id) ? $id : null}}">
        <button>Search</button>
        <hr>
        {{  isset($result) ? $result : ""}}
    </form>
</div>
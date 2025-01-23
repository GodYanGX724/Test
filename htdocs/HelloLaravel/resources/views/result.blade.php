<div>
    <?php
    // foreach ($users as $user) {
    //     print($user->cname."<br>");
    // }
    ?>
    @php($cname = '王小妹')
    @foreach ( $users as $user )
        @if($user->cname == $cname)
            <div style="color:green">{{$user->cname}}</div>
        @else
            <div style="color:orange">{{$user->cname}}</div>
        @endif
        
    @endforeach
</div>

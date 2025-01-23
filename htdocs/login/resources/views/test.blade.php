<div>
   @if (Auth::check())
   <!-- <div>click</div>{{Auth::id()}} -->
   <button>click</button>{{json_decode(Auth::user(),true)['name']}}
    @endif
</div>

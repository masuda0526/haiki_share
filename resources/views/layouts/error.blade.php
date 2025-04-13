@if (count($errors) > 0)
    <div class="l-error">
        @foreach ($errors->all() as $err)
            <li>{{$err}}</li>
        @endforeach
    </div>
@endif

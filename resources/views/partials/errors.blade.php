<div class="form-group">
    @if(count($errors) > 0)
        <ul class = "alert alert-danger col-md-10 col-sm-12">
            @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    @endif
</div>
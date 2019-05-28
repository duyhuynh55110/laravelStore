@if($errors->any())
    <ul class="alert-danger blockquote-reverse" style="list-style: none;padding: 10px;">
        @foreach($errors->all() as $error)
            <li>{!! $error !!}</li>
        @endforeach
    </ul>
@endif
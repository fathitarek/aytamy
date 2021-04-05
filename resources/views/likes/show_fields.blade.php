<!-- From Field -->
<div class="form-group">
    {!! Form::label('from', 'From:') !!}
    <p>{{ $likes->from }}</p>
</div>

<!-- To Field -->
<div class="form-group">
    {!! Form::label('to', 'To:') !!}
    <p>{{ $likes->to }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $likes->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $likes->updated_at }}</p>
</div>


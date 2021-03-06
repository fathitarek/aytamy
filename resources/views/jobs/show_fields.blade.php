<!-- Name En Field -->
<div class="form-group">
    {!! Form::label('name_en', 'Name English:') !!}
    <p>{{ $jobs->name_en }}</p>
</div>



<!-- Name Ar Field -->
<div class="form-group">
    {!! Form::label('name_ar', 'Name Arabic:') !!}
    <p>{{ $jobs->name_ar }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $jobs->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $jobs->updated_at }}</p>
</div>


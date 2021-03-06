<!-- Name En Field -->
<div class="form-group">
    {!! Form::label('name_en', 'Name En:') !!}
    <p>{{ $educations->name_en }}</p>
</div>

<!-- Name Ar Field -->
<div class="form-group">
    {!! Form::label('name_ar', 'Name Ar:') !!}
    <p>{{ $educations->name_ar }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $educations->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $educations->updated_at }}</p>
</div>


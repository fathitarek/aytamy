<!-- Name En Field -->
<div class="form-group">
    {!! Form::label('name_en', 'Name English:') !!}
    <p>{{ $cities->name_en }}</p>
</div>

<!-- Name Ar Field -->
<div class="form-group">
    {!! Form::label('name_ar', 'Name Arabic:') !!}
    <p>{{ $cities->name_ar }}</p>
</div>

<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', 'Country:') !!}
    <p>{{ $cities->name_en }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $cities->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $cities->updated_at }}</p>
</div>


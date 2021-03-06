<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $customers->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $customers->email }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p>{{ $customers->image }}</p>
</div>

<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', 'Country Id:') !!}
    <p>{{ $customers->country_id }}</p>
</div>

<!-- Dream Id Field -->
<div class="form-group">
    {!! Form::label('dream_id', 'Dream Id:') !!}
    <p>{{ $customers->dream_id }}</p>
</div>

<!-- Job Id Field -->
<div class="form-group">
    {!! Form::label('job_id', 'Job Id:') !!}
    <p>{{ $customers->job_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $customers->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $customers->updated_at }}</p>
</div>


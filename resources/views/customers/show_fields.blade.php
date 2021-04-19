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
@if ($customers->image)
<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <img src= "{{$customers->image}}" height="160"/>
</div>
@endif

@if ($customers->country_id)
<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', 'Country:') !!}
    <p>{{ $customers->country->name_en }}</p>
</div>

@endif
@if ($customers->dream_id)
<!-- Dream Id Field -->
<div class="form-group">
    {!! Form::label('dream_id', 'Dream:') !!}
    <p>{{ $customers->dream->name_en }}</p>
</div>
@endif

@if ($customers->job_id)
<!-- Job Id Field -->
<div class="form-group">
    {!! Form::label('job_id', 'Job:') !!}
    <p>{{ $customers->job->name_en }}</p>
</div>
@endif
@if ($customers->city_id)
<div class="form-group">
    {!! Form::label('city_id', 'City:') !!}
    <p>{{ $customers->city->name_en }}</p>
</div>
@endif
@if ($customers->education_id)
<div class="form-group">
    {!! Form::label('education_id', 'Education:') !!}
    <p>{{ $customers->education->name_en }}</p>
</div>
@endif
@if ($customers->nationality_id)
<div class="form-group">
    {!! Form::label('nationality_id', 'Nationality:') !!}
    <p>{{ $customers->nationality->name_en }}</p>
</div>
@endif
<div class="form-group">
    {!! Form::label('date_birth', 'Date birth:') !!}
    <p>{{ $customers->date_birth }}</p>
</div>

@if ($customers->personal_id)
<!-- Image Field -->
<div class="form-group">
    {!! Form::label('personal_id', 'Personal Id:') !!}
    <img src= "{{$customers->personal_id}}" height="160" style="margin-left: 200px;"/>
</div>
@endif
@if ($customers->mother_certificate)
<!-- Image Field -->
<div class="form-group">
    {!! Form::label('mother_certificate', 'Mother Certificate:') !!}
    <img src= "{{$customers->mother_certificate}}" height="160" style="margin-left: 140px;"/>
</div>
@endif

    @if ($customers->father_certificate)
    <!-- Image Field -->
<div class="form-group">
    {!! Form::label('father_certificate', 'Father Certificate:') !!}
    <img src= "{{$customers->father_certificate }}" height="160" style="margin-left: 140px;"/>
</div>
    @endif

    @if ($customers->education_certificate)
<!-- Image Field -->
<div class="form-group">
    {!! Form::label('education_certificate', 'Education Certificate:') !!}
    <img src= "{{$customers->education_certificate }}" height="160" style="margin-left: 140px;"/>
</div>
@endif
<div class="form-group">
    {!! Form::label('whats_app', 'Whats App:') !!}
    <p>{{ $customers->whats_app }}</p>
</div>

<div class="form-group">
    {!! Form::label('parent_mobile', 'Parent Mobile:') !!}
    <p>{{ $customers->parent_mobile }}</p>
</div>

<div class="form-group">
    {!! Form::label('gender', 'Gender:') !!}
    <p>{{ $customers->gender }}</p>
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $customers->description }}</p>
</div>


<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    @if ($customers->type==1)
    <p>كفيل </p>
    @else
<p> يتيم</p>
    @endif 
</div>
<div class="form-group">
    {!! Form::label('warranty', 'ًWarranty:') !!}
    @if ($customers->warranty==1)
    <p>كفاله اجتماعيه </p>
    @else
<p> كفاله ماديه</p>
    @endif 
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


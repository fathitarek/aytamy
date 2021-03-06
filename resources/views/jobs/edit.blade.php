@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Jobs
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($jobs, ['route' => ['jobs.update', $jobs->id], 'method' => 'patch']) !!}

                        @include('jobs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Notifications
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($notifications, ['route' => ['notifications.update', $notifications->id], 'method' => 'patch']) !!}

                        @include('notifications.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
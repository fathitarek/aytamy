<div class="table-responsive">
    <table class="table" id="customers-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Completed</th>
        {{-- <th>Dream Id</th> --}}
        {{-- <th>Job Id</th> --}}
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($customers as $customers)
            <tr>
            <td>{{ $customers->name }}</td>
            <td>{{ $customers->email }}</td>
            <td>{{ $customers->age }}</td>
            <td>
                @if ($customers->is_complete==1)
               Yes
                @else
                No
                @endif
            </td>
            {{-- <td>{{ $customers->dream_id }}</td> --}}
            {{-- <td>{{ $customers->job_id }}</td> --}}
                <td>
                    {{-- {!! Form::open(['route' => ['customers.destroy', $customers->id], 'method' => 'delete']) !!} --}}
                    <div class='btn-group'>
                        <a href="{{ route('cases.show', [$customers->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        {{-- <a href="{{ route('customers.edit', [$customers->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> --}}
                        {{-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} --}}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

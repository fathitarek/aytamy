<div class="table-responsive">
    <table class="table" id="customers-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Email</th>
        <th>Image</th>
        <th>Country Id</th>
        <th>Dream Id</th>
        <th>Job Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($customers as $customers)
            <tr>
                <td>{{ $customers->name }}</td>
            <td>{{ $customers->email }}</td>
            <td>{{ $customers->image }}</td>
            <td>{{ $customers->country_id }}</td>
            <td>{{ $customers->dream_id }}</td>
            <td>{{ $customers->job_id }}</td>
                <td>
                    {!! Form::open(['route' => ['customers.destroy', $customers->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('customers.show', [$customers->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('customers.edit', [$customers->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

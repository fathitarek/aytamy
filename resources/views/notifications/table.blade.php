<div class="table-responsive">
    <table class="table" id="notifications-table">
        <thead>
            <tr>
                <th>Title</th>
        <th>Body</th>
        <th>Customer Id</th>
        <th>Lang</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($notifications as $notifications)
            <tr>
                <td>{{ $notifications->title }}</td>
            <td>{{ $notifications->body }}</td>
            <td>{{ $notifications->customer_id }}</td>
            <td>{{ $notifications->lang }}</td>
                <td>
                    {!! Form::open(['route' => ['notifications.destroy', $notifications->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('notifications.show', [$notifications->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('notifications.edit', [$notifications->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

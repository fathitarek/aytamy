<div class="table-responsive">
    <table class="table" id="likes-table">
        <thead>
            <tr>
                <th>From</th>
        <th>To</th>
                {{-- <th colspan="3">Action</th> --}}
            </tr>
        </thead>
        <tbody>
        @foreach($likes as $likes)
            <tr>
                <td>{{ $likes->customer->name }}</td>
            <td>{{ $likes->customer_to->name }}</td>
                <td>
                    {{-- {!! Form::open(['route' => ['likes.destroy', $likes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('likes.show', [$likes->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('likes.edit', [$likes->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!} --}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

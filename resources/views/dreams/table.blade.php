<div class="table-responsive">
    <table class="table" id="dreams-table">
        <thead>
            <tr>
                <th>Name English</th>
        <th>Name Arabic</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dreams as $dreams)
            <tr>
                <td>{{ $dreams->name_en }}</td>
            <td>{{ $dreams->name_ar }}</td>
                <td>
                    {!! Form::open(['route' => ['dreams.destroy', $dreams->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('dreams.show', [$dreams->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('dreams.edit', [$dreams->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

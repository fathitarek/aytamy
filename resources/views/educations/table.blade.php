<div class="table-responsive">
    <table class="table" id="educations-table">
        <thead>
            <tr>
                <th>Name En</th>
        <th>Name Ar</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($educations as $educations)
            <tr>
                <td>{{ $educations->name_en }}</td>
            <td>{{ $educations->name_ar }}</td>
                <td>
                    {!! Form::open(['route' => ['educations.destroy', $educations->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('educations.show', [$educations->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('educations.edit', [$educations->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

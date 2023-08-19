<p>Greetings,</p>
@if (count($records) === 1)
<p>This user is unverified:</p>
@else
<p>These users are unverified:</p>
@endif
<table>
    <tr>
        <th>id#</th>
        <th>user_id</th>
        <th>status</th>
        <th>name</th>
        <th>email</th>
        <th>created_at</th>
        <th>updated_at</th>
    </tr>
    @foreach ($records as $record)
    <tr>
        <td>{{ $record->id }}</td>
        <td>{{ $record->user_id }}</td>
        <td>{{ $record->status }}</td>
        <td>{{ $record->name }}</td>
        <td>{{ $record->email }}</td>
        <td>{{ $record->created_at }}</td>
        <td>{{ $record->updated_at }}</td>
    </tr>
    @endforeach
</table>
<p>-- Owl Search Games</p>
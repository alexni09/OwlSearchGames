<p>Greetings,</p>
@if (count($records) === 1)
<p>This email has been flagged:</p>
@else
<p>These emails have been flagged:</p>
@endif
<table>
    <tr>
        <th>id#</th>
        <th>string</th>
        <th>ip</th>
    </tr>
    @foreach ($records as $record)
    <tr>
        <td>{{ $record->id }}</td>
        <td>{{ $record->part }}</td>
        <td>{{ $record->ip }}</td>
    </tr>
    @endforeach
</table>
<p>-- Owl Search Games</p>
<h1>Domain Monitor</h1>

<form method="POST" action="/domains">
    @csrf
    <input type="url" name="url" placeholder="https://example.com" required>
    <button type="submit">Add Domain</button>
</form>

<table>
    <tr>
        <th>Domain</th>
        <th>Status</th>
    </tr>
    @foreach ($domains as $domain)
    <tr>
        <td>{{ $domain->url }}</td>
        <td>{{ $domain->is_up ? 'Up' : 'Down' }}</td>
    </tr>
    @endforeach
</table>

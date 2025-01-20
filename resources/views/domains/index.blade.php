<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domain Monitor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center py-8">
    <div class="container mx-auto bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold mb-6 text-center">Domain Monitor</h1>

        <!-- Form -->
        <form method="POST" action="/domains" class="mb-6 flex items-center justify-center">
            @csrf
            <input
                type="url"
                name="url"
                placeholder="https://example.com"
                required
                class="w-full max-w-md px-4 py-2 rounded-lg border border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none" />
            <button
                type="submit"
                class="ml-4 px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600">
                Add Domain
            </button>
        </form>

        <!-- Domains Table -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 border border-gray-200 text-left font-semibold">Domain</th>
                        <th class="px-4 py-2 border border-gray-200 text-left font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($domains as $domain)
                    <tr class="{{ $domain->is_up ? 'bg-green-50' : 'bg-red-50' }}">
                        <td class="px-4 py-2 border border-gray-200">{{ $domain->url }}</td>
                        <td class="px-4 py-2 border border-gray-200">
                            <span class="px-2 py-1 text-sm rounded-lg {{ $domain->is_up ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                {{ $domain->is_up ? 'Up' : 'Down' }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>

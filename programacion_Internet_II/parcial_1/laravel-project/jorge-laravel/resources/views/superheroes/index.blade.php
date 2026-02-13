<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Superheroes</title>
</head>
<body>
    <main style="max-width: 900px; margin: 40px auto; font-family: system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell, Noto Sans, Arial, sans-serif; line-height: 1.5;">
        <h1 style="margin: 0 0 12px;">Superheroes</h1>

        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="text-align: left; padding: 10px 8px; border-bottom: 1px solid #ddd;">ID</th>
                    <th style="text-align: left; padding: 10px 8px; border-bottom: 1px solid #ddd;">Nombre</th>
                    <th style="text-align: left; padding: 10px 8px; border-bottom: 1px solid #ddd;">Nombre real</th>
                    <th style="text-align: left; padding: 10px 8px; border-bottom: 1px solid #ddd;">Género</th>
                    <th style="text-align: left; padding: 10px 8px; border-bottom: 1px solid #ddd;">Universo</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($characters as $character)
                    <tr>
                        <td style="padding: 10px 8px; border-bottom: 1px solid #f0f0f0;">{{ $character->id_character }}</td>
                        <td style="padding: 10px 8px; border-bottom: 1px solid #f0f0f0;">{{ $character->name }}</td>
                        <td style="padding: 10px 8px; border-bottom: 1px solid #f0f0f0;">{{ $character->real_name }}</td>
                        <td style="padding: 10px 8px; border-bottom: 1px solid #f0f0f0;">{{ $character->gender }}</td>
                        <td style="padding: 10px 8px; border-bottom: 1px solid #f0f0f0;">
                            {{ $character->universe?->universe ?? 'N/A' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding: 12px 8px;">No hay personajes en la tabla <code>characters</code>.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div style="margin-top: 18px;">
            <a href="{{ url('/') }}">Volver a inicio</a>
        </div>
    </main>
</body>
</html>

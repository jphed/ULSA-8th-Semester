<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suma</title>
</head>
<body>
    <main style="max-width: 720px; margin: 40px auto; font-family: system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell, Noto Sans, Arial, sans-serif; line-height: 1.5;">
        <h1 style="margin: 0 0 12px;">Sumar 2 números</h1>

        @if ($errors->any())
            <div style="padding: 12px 16px; border: 1px solid #f5c2c7; background: #f8d7da; border-radius: 10px; margin-bottom: 16px;">
                <strong>Errores:</strong>
                <ul style="margin: 8px 0 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('suma.sumar') }}" style="display: grid; gap: 12px;">
            @csrf

            <label style="display: grid; gap: 6px;">
                <span>Número A</span>
                <input name="a" type="number" step="any" value="{{ old('a') }}" style="padding: 10px 12px; border: 1px solid #ddd; border-radius: 10px;" required>
            </label>

            <label style="display: grid; gap: 6px;">
                <span>Número B</span>
                <input name="b" type="number" step="any" value="{{ old('b') }}" style="padding: 10px 12px; border: 1px solid #ddd; border-radius: 10px;" required>
            </label>

            <button type="submit" style="padding: 10px 12px; border: 1px solid #111; background: #111; color: #fff; border-radius: 10px; cursor: pointer;">
                Sumar
            </button>
        </form>

        @isset($resultado)
            <section style="margin-top: 18px; padding: 12px 16px; border: 1px solid #ddd; border-radius: 10px;">
                <div><strong>Resultado:</strong> {{ $resultado }}</div>
            </section>
        @endisset

        <div style="margin-top: 18px;">
            <a href="{{ url('/') }}">Volver a inicio</a>
        </div>
    </main>
</body>
</html>

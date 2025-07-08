<!-- resources/views/person/create.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Pessoa</title>
</head>

<body>
    <h1>Criar Pessoa</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form action="{{ url('/person/create') }}" method="POST">
        @csrf

        <label for="type">Tipo de Pessoa:</label>
        <select name="type" id="type" required>
            <option value="FISICA">Pessoa Física</option>
            <option value="JURIDICA">Pessoa Jurídica</option>
        </select><br><br>

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="document">Documento:</label>
        <input type="text" name="document" id="document" required><br><br>

        <button type="submit">Criar Pessoa</button>
    </form>
</body>

</html>

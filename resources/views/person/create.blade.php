<!-- resources/views/person/create.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Pessoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Criar Pessoa</h3>
            </div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('person.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="type" class="form-label">Tipo de Pessoa</label>
                        <select name="type" id="type" class="form-select" required>
                            <option value="FISICA">Pessoa Física</option>
                            <option value="JURIDICA">Pessoa Jurídica</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="document" class="form-label">Documento</label>
                        <input type="text" name="document" id="document" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Criar Pessoa</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

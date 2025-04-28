<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Connexion - Merylowers</title>
  <script src="https://cdn.tailwindcss.com/3.4.16"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#e84c93',
            secondary: '#4a8b3b',
          },
          borderRadius: {
            button: '8px',
          },
        },
      },
    };
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
</head>
<body class="bg-gray-50 text-gray-800">

  @include('UserNav')

  <main class="min-h-screen flex items-center justify-center px-4 py-12">
    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
      <h2 class="text-2xl font-semibold text-center text-primary mb-6">Connexion</h2>

      <form action="{{route('login')}}" method="POST" class="space-y-4">
      @csrf
        <div>
          <label for="email" class="block text-sm font-medium mb-1">Adresse email</label>
          <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary outline-none" required>
        </div>
        <div>
          <label for="password" class="block text-sm font-medium mb-1">Mot de passe</label>
          <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary outline-none" required>
        </div>
        <div class="flex items-center justify-between text-sm">
          <label class="flex items-center gap-2">
            <input type="checkbox" class="rounded text-primary focus:ring-primary">
            Se souvenir de moi
          </label>
          <a href="#" class="text-primary hover:underline">Mot de passe oublié ?</a>
        </div>
        <button type="submit" class="w-full bg-primary text-white py-2 rounded-button hover:bg-opacity-90 transition-colors">
          Se connecter
        </button>
      </form>

      <p class="text-sm text-center mt-4">Pas encore inscrit ? <a href="#" class="text-primary hover:underline">Créer un compte</a></p>
    </div>
  </main>

</body>
</html>

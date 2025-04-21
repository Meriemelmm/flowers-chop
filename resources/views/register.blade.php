<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inscription - Merylowers</title>
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

  <header class="bg-white shadow-sm">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
      <a href="#" class="text-3xl font-['Pacifico'] text-primary">Merylowers</a>
      <nav class="hidden md:flex space-x-6">
        <a href="#" class="hover:text-primary transition-colors">Accueil</a>
        <a href="#" class="hover:text-primary transition-colors">Boutique</a>
        <a href="#" class="hover:text-primary transition-colors">À propos</a>
        <a href="#" class="hover:text-primary transition-colors">Contact</a>
      </nav>
    </div>
  </header>

  <main class="min-h-screen flex items-center justify-center px-4 py-12">
    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-semibold text-center text-primary mb-6">Créer un compte</h2>
      
        <form action="{{route('register.store')}}" method="POST" class="space-y-4">
  @csrf

  <div>
    <label for="name" class="block text-sm font-medium mb-1">Nom complet</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary outline-none @error('name') border-red-500 @enderror" required>
    @error('name')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
  </div>

  <div>
    <label for="email" class="block text-sm font-medium mb-1">Adresse email</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary outline-none @error('email') border-red-500 @enderror" required>
    @error('email')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
  </div>

  <div>
    <label for="password" class="block text-sm font-medium mb-1">Mot de passe</label>
    <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary outline-none @error('password') border-red-500 @enderror" required>
    @error('password')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
  </div>

  <div>
    <label for="country" class="block text-sm font-medium mb-1">Pays</label>
    <input type="text" id="country" name="country" value="{{ old('country') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary outline-none @error('country') border-red-500 @enderror" required>
    @error('country')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
  </div>

  <div>
    <label for="city" class="block text-sm font-medium mb-1">Ville</label>
    <input type="text" id="city" name="city" value="{{ old('city') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary outline-none @error('city') border-red-500 @enderror" required>
    @error('city')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
  </div>

  <div>
    <label for="postal_code" class="block text-sm font-medium mb-1">Code postal</label>
    <input type="text" id="postal_code" name="postal_code" value="{{ old('postal_code') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary outline-none @error('postal_code') border-red-500 @enderror" required>
    @error('postal_code')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
  </div>

  <div>
    <label for="phone" class="block text-sm font-medium mb-1">Téléphone</label>
    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary outline-none @error('phone') border-red-500 @enderror" required>
    @error('phone')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
  </div>

  <button type="submit" class="w-full bg-primary text-white py-2 rounded-button hover:bg-opacity-90 transition-colors">
    S'inscrire
  </button>
</form>

      
        <p class="text-sm text-center mt-4">Vous avez déjà un compte ? <a href="#" class="text-primary hover:underline">Se connecter</a></p>
      </div>
      
  </main>

</body>
</html>

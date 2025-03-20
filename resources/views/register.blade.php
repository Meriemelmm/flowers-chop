<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Flower Chop</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Lien vers une bibliothèque d'icônes (ex: FontAwesome) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>/* Style de base */
body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(135deg, #f9f9f9, #e6f4e6);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.flower-background {
    background-image: url('flower-background.jpg'); /* Ajoutez une image de fond florale */
    background-size: cover;
    background-position: center;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.register-container {
    background: rgba(255, 255, 255, 0.9);
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 350px;
    text-align: center;
    position: relative;
}

h2 {
    color: #4CAF50;
    font-size: 24px;
    margin-bottom: 20px;
}

h2 i {
    margin-right: 10px;
    color: #4CAF50;
}

.input-group {
    margin-bottom: 20px;
    text-align: left;
}

.input-group label {
    display: block;
    margin-bottom: 5px;
    color: #333;
    font-weight: bold;
}

.input-group input {
    width: 100%;
    padding: 10px;
    border: 2px solid #ddd;
    border-radius: 8px;
    box-sizing: border-box;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

.input-group input:focus {
    border-color: #4CAF50;
    outline: none;
}

.register-btn {
    width: 100%;
    padding: 12px;
    border: none;
    background-color: #4CAF50;
    color: white;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.register-btn:hover {
    background-color: #45a049;
}

.register-btn i {
    margin-left: 10px;
}

.flower-decoration {
    margin-top: 20px;
    display: flex;
    justify-content: space-around;
    color: #4CAF50;
    font-size: 24px;
    animation: float 3s ease-in-out infinite;
}

</style>
</head>
<body>
    <div class="flower-background">
        <div class="register-container">
            <h2><i class="fas fa-seedling"></i> Inscription à Flower Chop</h2>
            <form action="{{route('register.store')}}" method="post">
            @csrf 
                <div class="input-group">
                    <label for="name"><i class="fas fa-user"></i> Nom d'utilisateur</label>
                    <input type="text" id="name" name="name" value="{{old('name')}}" class="@error('name') is-invalid @enderror" required>

                </div>
                @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                <div class="input-group">
                    <label for="email"><i class="fas fa-envelope"></i> Email</label>
                    <input type="email" id="email" name="email"value="{{old('email')}}" class="@error('email') is-invalid @enderror"required>
                </div>
                @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                <div class="input-group">
                    <label for="password"><i class="fas fa-lock"></i> Mot de passe</label>
                    <input type="password" id="password" name="password" class="@error('password') is-invalid @enderror"required >
                </div>
                @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                <div class="input-group">
                    <label for="password_confirmation"><i class="fas fa-lock"></i> Confirmez le mot de passe</label>
                    <input type="password" id="confirm-password" name="password_confirmation" required>
                </div>
                <button type="submit" class="register-btn">S'inscrire <i class="fas fa-arrow-right"></i></button>
            </form>
            <div class="flower-decoration">
                <i class="fas fa-spa"></i>
                <i class="fas fa-leaf"></i>
                <i class="fas fa-spa"></i>
            </div>
        </div>
    </div>
</body>
</html>
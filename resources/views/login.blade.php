<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Flowers Shop</title>
    <link rel="stylesheet" href="styles.css">
    <style>/* Style général */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

/* Conteneur du formulaire */
.login-container {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    width: 320px;
    text-align: center;
}

/* Titre */
.login-container h2 {
    margin-bottom: 20px;
    color: #333;
}

/* Champs du formulaire */
.input-group {
    text-align: left;
    margin-bottom: 15px;
}

.input-group label {
    display: block;
    font-size: 14px;
    margin-bottom: 5px;
}

.input-group input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Se souvenir de moi */
.remember-me {
    display: flex;
    align-items: center;
    font-size: 14px;
    margin-bottom: 15px;
}

.remember-me input {
    margin-right: 5px;
}

/* Bouton de connexion */
button {
    width: 100%;
    background-color: #28a745;
    color: white;
    border: none;
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background-color: #218838;
}

/* Lien mot de passe oublié */
.forgot-password {
    margin-top: 10px;
}

.forgot-password a {
    color: #007bff;
    text-decoration: none;
}

.forgot-password a:hover {
    text-decoration: underline;
}
</style>
</head>
<body>
    <div class="login-container">
        <h2>Connexion à Flowers Shop</h2>

        <form action="{{route('login')}}" method="POST">
            <!-- Email -->
            @csrf
            <div class="input-group">
                <label for="email">Adresse Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <!-- Mot de passe -->
            <div class="input-group">
                <label for="password">Mot de Passe</label>
                <input type="password" id="password" name="password" required>
            </div>

            <!-- Se souvenir de moi -->
            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Se souvenir de moi</label>
            </div>

            <!-- Bouton de connexion -->
            <button type="submit">Se connecter</button>

            <!-- Lien mot de passe oublié -->
            <div class="forgot-password">
                <a href="#">Mot de passe oublié ?</a>
            </div>
        </form>
    </div>
</body>
</html>

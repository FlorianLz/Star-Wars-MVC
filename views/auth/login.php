<h3>Connexion</h3>
<form action="/login" method="POST">
    <label for="email">Adresse email</label>
    <input type="email" id="email" name="email" placeholder="Entrez votre adresse email">
    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe">
    <button type="submit">Se connecter</button>
    <p>Pas encore inscrit ? <a href="/register">Inscription</a></p>
    <?php if (isset($error)): ?>
        <div role="alert">
            <?= $error ?>
        </div>
    <?php endif; ?>
</form>

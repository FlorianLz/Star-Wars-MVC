<div class="container">
    <h1>Connexion</h1>
    <form action="/login" method="POST" id="formLogin">
        <label for="email">Adresse email</label>
        <input type="email" id="email" name="email" placeholder="Entrez votre adresse email">
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe">
        <button type="submit" class="generic-cta">Se connecter</button>
        <p class="pasInscrit">Pas encore inscrit ? <a href="/register">Inscription</a></p>
        <?php if (isset($error)): ?>
            <div role="alert">
                <?= $error ?>
            </div>
        <?php endif; ?>
    </form>
</div>

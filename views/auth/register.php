<div class="container">
    <h1>Inscription</h1>
    <form action="/register" method="POST" id="formInscription">
        <label for="firstName">Prénom</label>
        <input type="text" id="firstName" name="prenom" placeholder="Entrez votre prénom" required>
        <label for="lastName">Nom</label>
        <input type="text" id="lastName" name="nom" placeholder="Entrez votre nom" required>
        <label for="email">Adresse email</label>
        <input type="email" id="email" name="email" placeholder="Entrez votre adresse email" required>
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
        <button type="submit" class="generic-cta">S'inscrire</button>
        <p class="pasInscrit">Déjà inscrit ? <a href="/login">Connexion</a></p>
    </form>
</div>

<h3>Inscription</h3>
<form action="/register" method="POST">
    <label for="firstName">Prénom</label>
    <input type="text" id="firstName" name="prenom" placeholder="Entrez votre prénom">
    <label for="lastName">Nom</label>
    <input type="text" id="lastName" name="nom" placeholder="Entrez votre nom">
    <label for="email">Adresse email</label>
    <input type="email" id="email" name="email" placeholder="Entrez votre adresse email">
    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe">
    <button type="submit">S'inscrire</button>
    <p>Déjà inscrit ? <a href="/login">Connexion</a></p>
</form>

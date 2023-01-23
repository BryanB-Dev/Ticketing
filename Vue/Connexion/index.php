<?php $this->titre = "Mon Ticketing - Connexion" ?>

<script>
    const element = document.querySelector('.sidebar');
    element.remove();
</script>

<img class="wave" alt="wave" src="Contenu/img/wave.png">
<div class="container">
    <div class="img"></div>
    <div class="login-content">
        <form action="connexion/connecter" method="post">
            <img alt="avatar" src="Contenu/img/avatar.svg">
            <h2 class="title">Welcome</h2>
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <h5>Email</h5>
                    <input class="input" name="login" type="text" required autocomplete="email">
                </div>
            </div>
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Password</h5>
                    <input class="input" name="mdp" type="password" required autocomplete="current-password">
                </div>
            </div>
            <a href="#">Forgot Password?</a>
            <button class="btn" type="submit">Connexion</button>
        </form>
    </div>
    <?php if (isset($msgErreur)): ?>
    <div class="toast">
        <div class="toast-content">
            <i class="fas fa-solid fa-exclamation check"></i>

            <div class="message">
                <span class="text text-1">Erreur</span>
                <span class="text text-2">
                    <?= $msgErreur ?>
                </span>
            </div>
        </div>
        <i class="fa-solid fa-xmark close"></i>

        <div class="progress"></div>
    </div>
    <script src="Contenu/js/toast.js"></script>
    <?php endif; ?>
</div>
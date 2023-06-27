<!DOCTYPE html>
<html>

<head>
    <title>Tela de Login</title>
    <link rel="stylesheet" href="../css/registar.css">
</head>

<body>

    <div class="container">
        <form action="../controller/loginController.php" method="POST">
            <input type="text" name="username" placeholder="Usuário" required>
            <input type="password" name="password" id="password" placeholder="Senha" required>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirmar Senha" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <!-- Outros campos do formulário de registro -->
            <button type="submit" id="submitBtn"  name="register" disabled>Registrar</button>
            <p id="password_match_message"></p>
            <p>Já possui uma conta? <a href="../index.php">Fazer Login</a></p>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var password = document.getElementById("password");
            var confirm_password = document.getElementById("confirm_password");
            var submitBtn = document.getElementById("submitBtn");
            var password_match_message = document.getElementById("password_match_message");

            function validatePassword() {
                if (password.value !== confirm_password.value) {
                    password_match_message.style.color = "red";
                    password_match_message.innerHTML = "As senhas não coincidem!";
                    confirm_password.classList.remove("match");
                    confirm_password.classList.add("no-match");
                    submitBtn.disabled = true;
                } else {
                    password_match_message.style.color = "green";
                    password_match_message.innerHTML = "As senhas coincidem!";
                    confirm_password.classList.remove("no-match");
                    confirm_password.classList.add("match");
                    submitBtn.disabled = false;
                }
            }

            password.addEventListener("input", validatePassword);
            confirm_password.addEventListener("input", validatePassword);
        });
    </script>

</body>

</html>
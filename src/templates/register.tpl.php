<?php
    include 'partials/header.tpl.php';
    include 'partials/nav.tpl.php';
?>
<body>
    <form action="?url=registeraction" method="POST">
        <label for="username">Nombre de usuario</label><br>
        <input type="text" name="username"><br><br>
        <label for="email">Correo electronico</label><br>
        <input type="text" name="email"><br><br>
        <label for="password">Contraseña</label><br>
        <input type="text"  name="password">
        <button>Login</button>
    </form>
</body>
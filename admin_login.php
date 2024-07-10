<?php
session_start();
if (isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_dashboard.php');
    exit();
}
require_once "header.php";
?>
<div class="login-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-content">
                    <div class="login-title">
                        <h4>se connecter</h4>
                        <p>Veuillez vous connecter en utilisant les détails du compte ci-dessous.</p>
                    </div>
                    <div class="login-form">
                        <form action="admin_login_process.php" method="POST">
                            <input name="username" placeholder="Username" type="text">
                            <input name="password" placeholder="Password" type="password">
                            <div class="button-remember">
                                <button class="login-btn" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once "footer.php";
?>
<?php session_start() ?>
<?php include('prog/connect.php'); ?>
<?php include('prog/login_control.php'); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/favicon.svg" type="image/svg+xml">
    <title>ПроМастер — Игровая образовательная платформа</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php


$page = $_GET["page"] ?? null;

function goToMain()
{
    echo '<script>location.href="/"</script>';
    exit;
}

if ($page !== "admin") include('components/header.php');

if ($page == "login") {
    if ($user['role'] != 'guest') goToMain();
    include('pages/login.php');
}
if ($page == "register") {
    if ($user['role'] != 'guest') goToMain();
    include('pages/register.php');
}
if ($page == "profile") {
    if ($user['role'] != 'user') goToMain();
    include('pages/profile.php');
}
if (
    $page == "admin"
) {
    if ($user['role'] != 'admin') goToMain();
    include('pages/admin.php');
}

if ($page == null) include('pages/main.php');

if ($page !== "admin") include('components/footer.php');
?>

<script src="assets/js/main.js"></script>
</body>
</html>
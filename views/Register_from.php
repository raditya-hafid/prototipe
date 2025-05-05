<!DOCTYPE html>
<html>
<head>
  <title>Form Registrasi</title>
</head>
<body>
  <h2>Form Registrasi</h2>
  <form action="../controller/RegisterController.php" method="POST">
    <input type="text" name="name" placeholder="Nama" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required><br><br>
    <button type="submit">Daftar</button>
  </form>
</body>
</html>

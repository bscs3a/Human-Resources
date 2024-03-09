<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
  <link href="./../src/tailwind.css" rel="stylesheet">
  <title>New Employee</title>
</head>
<body class="text-gray-800 font-sans">

<!-- sidenav -->
<?php 
    require_once 'inc/sidenav.php';
?>
<!-- end of sidenav -->
</body>
  <form action="insert.php" method="post">
    <input type="text" name="firstname" placeholder="Enter First Name">
    <input type="text" name="lastname" placeholder="Enter Last Name">
    <input type="text" name="email" placeholder="Enter Email">
    <input type="text" name="contactnumber" placeholder="Enter Contact Number">
    <textarea name="address" placeholder="Enter Address"></textarea>
    <input type="submit" name="submit" value="SUBMIT">
  </form>
</body>
</html> 
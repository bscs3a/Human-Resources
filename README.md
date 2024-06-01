# READ ME

### For Newly Cloned Files
```
npm install
```
```
composer install
```

### Clone enviroment variables and insert your own accounts and dir
```
cp .env.example .env
```

### For Tailwind to work
> run this command first and wait a few minutes to build all the tailwind classes used
```
npm run build
```


### For Gulp Live Server
```
npm run serve
```
or
```
gulp serve
```

## Routing 3.1
> Bug Fix: Rootfolder and Routing issue
> 
> New Feature: post-method and dynamic routing <br>

### Try to understand how the Routing works at `routes.php` of your system folder<br><br>
### Root Folder Filename issues fix

Go to `.htaccess` and change the Rewritebase into your folder name
> use lowercase to prevent any further issues
>
> make sure to rename it back to `master` before any pull request
```
RewriteEngine On
RewriteBase /changeME/
DirectoryIndex index.php
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ index.php?/$1 [QSA,L]
```
Add this script at the bottom of your page before the end of the `</body>` tag
> the number of dots may vary on your route namings
```
<script  src="./../src/route.js"></script>
<script  src="./../src/form.js"></script>
```

### Sample Usage
no need to include the root folder name just the route
> it only works on the given example html elements

```
<a route='/fin/sampleRoute'>

<button route='/sls/sampleRoute'>

<div route='/dlv/sampleRoute'>
```

### Dynamic Routing
```
'/fin/test/id={id}' => function($id) use ($basePath) {
        $_SESSION['id'] = $id;
        $_GET['id'] = $id;
        include $basePath . "test2.php";
},
 ----- add more "../" per extra slash on routes, to connect css and route and formjs
```

### Post-Method
code snippet
> make sure to insert it on `routes.php`

```
Router::post('/insert', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $name = $_POST['name'];

    $stmt = $conn->prepare("INSERT INTO name (name) VALUES (:name)");
    $stmt->bindParam(':name', $name);

    $rootFolder = dirname($_SERVER['PHP_SELF']);

    if (empty($name)) {
        header("Location: $rootFolder/fin/test");
        return;
    }

    // Execute the statement
    $stmt->execute();

    header("Location: $rootFolder/fin/test");
});

Router::post('/delete', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $name = $_POST['name'];

    $stmt = $conn->prepare("DELETE FROM name WHERE name = :name");
    $stmt->bindParam(':name', $name);

    // Execute the statement
    $stmt->execute();

    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/fin/test");
});
```

### Sample Form Usage
```
 <form action="/insert" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <input type="submit" value="Submit">
</form>
```

### Everything should work perfectly fine!!!





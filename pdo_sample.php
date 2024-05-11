<?php
$dsn="mysql:host=localhost;dbname=phptest;";
$username= "amir";
$password= "1234";
try{
$pdo=new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statement=$pdo->prepare("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
)");
$statement->execute();
$name="amir";
$email="amir@farhad.com";
$insert_statement=$pdo->prepare("insert into users (name,email) VALUES (:name,:email)");
$insert_statement->bindParam(':name',$name);
$insert_statement->bindParam(':email',$email);
$insert_statement->execute();
$select_statement=$pdo->query('select * from users');
while ($row= $select_statement->fetch(PDO::FETCH_ASSOC)){
    echo 'NAME '.$row['name'].' EMAIL '.$row['email'] ;
    echo PHP_EOL;
}}
catch(PDOException $e){echo $e->getMessage(); }

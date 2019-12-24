<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$HOST = "ec2-174-129-254-223.compute-1.amazonaws.com";
$PORT = "5432";
$DBNAME = "d9svmbikm2lhoo";
$USER = "jdcaahdkeriaui";
$PASSWORD = "9d6d9873cfcd5254dc063187a9a757234d93e9f6a68dee7b2bb987be813a737d";

//$link = pg_connect("host=$HOST dbname=$DBNAME user=$USER password=$PASSWORD sslmode=require");
 $link = pg_connect("dbname=d9svmbikm2lhoo host=ec2-174-129-254-223.compute-1.amazonaws.com port=5432 user=jdcaahdkeriaui password=9d6d9873cfcd5254dc063187a9a757234d93e9f6a68dee7b2bb987be813a737d sslmode=require");
//$link = pg_connect(getenv("DATABASE_URL"));

// Check connection
if($link === false){
    die("ERROR: Could not connect. ");
}
 else {echo "Connected";}

// Escape user inputs for security

$id =  pg_escape_string($link,$_REQUEST['id']);
$name = pg_escape_string($link,$_REQUEST['name']);
$cat = pg_escape_string($link,$_REQUEST['cat']);
$date =  pg_escape_string($link,$_REQUEST['date']);
$price =  pg_escape_string($link,$_REQUEST['price']);
$description = pg_escape_string($link,$_REQUEST['description']);

echo "<br>";
echo "Product ID: " ;
echo $id."<br>";
echo "Product Name: " ;
echo $name."<br>";
echo "Category: " ;
echo $cat."<br>";
echo "Date: " ;
echo $date."<br>";
echo "Price: " ;
echo $price."USD <br>";
echo "Description: " ;
echo $description."<br>";

// Attempt insert query execution

/*echo $sql;

$sql2 = "INSERT INTO Product (Id, Product_Name, Catergory, Date, Price, Descriptions) VALUES ('02', 'Me', 'CatX','2019-12-20',11,'abc')";

$sql3 = 'INSERT INTO public."Product" (
"Date", "Id", "Product_Name", "Catergory", "Descriptions", "Price") VALUES ('."
'2019-12-20'::date, '121210'::character varying(20), 'my product XYZ'::character varying(100), 'kit'::character varying(40), 'my product xyz'::character varying(200), '12'::integer)".
 'returning "Id"';
echo $sql3;*/
$sql4 = 'INSERT INTO public."Product" (
"Date", "Id", "Product_Name", "Catergory", "Descriptions", "Price") VALUES ('."
'$date'::date, '$id'::character varying(20), '$name'::character varying(100), '$cat'::character varying(40), '$description'::character varying(200), '$price'::integer)".
 'returning "Id"';
echo $sql4;

$result = pg_query($link, $sql4);
echo $result;

if($result){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . pg_error($link);
}

// Close connection

pg_close($link);
?>

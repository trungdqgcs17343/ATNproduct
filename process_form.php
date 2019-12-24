<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$HOST = "ec2-174-129-33-132.compute-1.amazonaws.com";
$PORT = "5432";
$DBNAME = "d595jqdcjdg0kc";
$USER = "aguxchgramctxq";
$PASSWORD = "993e88bf26022314e73c1c8e82ec8d4290d8d7bf06f40d1fdeeaffa1700428e6";

//$link = pg_connect("host=$HOST dbname=$DBNAME user=$USER password=$PASSWORD sslmode=require");
 $link = pg_connect("dbname=d595jqdcjdg0kc host=ec2-174-129-33-132.compute-1.amazonaws.com port=5432 user=aguxchgramctxq password=993e88bf26022314e73c1c8e82ec8d4290d8d7bf06f40d1fdeeaffa1700428e6 sslmode=require");
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

echo $id;
echo "";
echo $name;
echo "";
echo $cat;
echo "";
echo $date;
echo "";
echo $price;
echo "";
echo $desc;
echo "";


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

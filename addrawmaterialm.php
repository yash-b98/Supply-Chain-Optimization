<?php
   $host        = "host = ec2-54-227-250-33.compute-1.amazonaws.com";
   $port        = "port = 5432";
   $dbname      = "dbname = dfh1ffcplg2486";
   $credentials = "user = eacvhyhfmkrufp password=09ed8a0efcefee49aecd377a6e0a69cbfa41939219c9a9747eb0324c7d616d24";
   session_start();
   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   }


   if(isset($_POST['submit'])){

      $product = $_POST['product'];
      $raw_material = $_POST['raw_material'];
      $quant = $_POST['quantity'];
      $user = $_SESSION['userName'];

      

      $sql =<<<EOF
      set search_path to sco;
      insert into manufacturer values ('$user','$product','$raw_material','$quant');
EOF;
      
      $ret = pg_query($db, $sql);
      if(!$ret) {
         echo pg_last_error($db);
      }
      
      pg_close($db);
      echo "<script>location='Manufacture.php'</script>";
      exit;
      }
   
?>
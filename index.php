konekphp
<?php
$conn=mysqli_connect ("localhost", "root","","lat");
?>

tambahphp
<?php
include "koneksi.php";
if(isset($_POST['kirim'])) {
    $nama=$_POST ['nama'] ;
    $email=$_POST ['email'] ;
    $komentar=$_POST ['komentar'];

    $sql="INSERT INTO dupak VALUES ('','$nama','$email','$komentar',CURRENT_DATE())";
   
    $result = mysqli_query($conn,$sql);
    if (!$result) {
        die ("Query gagal".mysqli_error($conn));
    } else {
        echo "<script>alert ('komentar ditambhkan'); window.location='index.php'; </script>";
    }
}


komentarphp
<?php 
include "koneksi.php";
$sql="SELECT nama,komentar,tanggal FROM dupak";
$result = $conn->query($sql);

$comments = [];

if ($result->num_rows>0) {
    while ($row= mysqli_fetch_assoc($result)) {
        $comments[]=$row;
    }
}else{
    echo"Belum ada komentar";
}


?>

counterphp
<?php
$filecounter = ("counter.txt");
$kunjungan=file($filecounter);
$kunjungan [0]++;
$file=fopen($filecounter,"w");
fputs($file,"$kunjungan[0]");
fclose($file);
?>

indexcounterphp
<center>Kunjungan hari ini
    <?php
    include "counter.php";
    echo "<p style='color:red; font-weight:bold;'>$kunjungan[0]</p>";
    ?>
    </center>

indexkomenphp
<div class="container-fluid w-75 m-3 mx-auto ">
 <?php 
   include 'komentar.php';
   foreach($comments as $comment) :
   ?>
   <div class="border-2 border-dark-subtle border rounded-2 p-2 my-3">
   <div class="d-flex align-items-center border-bottom border-dark-subtle pb-1 border-2" style="width: 200px;">
   <img src="images/cart-item2.jpg" alt="" width="25">
<p class="warna-text  mx-1 my-auto " style="font-size: larger;"><?php  echo htmlspecialchars($comment['nama']); ?></p>
    </div>

    <div class="position-relative">
    <p class="warna-text mb-4" style="font-size: small;"><?php  echo htmlspecialchars($comment['komentar']); ?></p>
                        
    <p class="warna-text m-0 position-absolute" style="right: 0; bottom: -20px; font-size: smaller;"><?php echo htmlspecialchars($comment['tanggal']); ?></p>

    </div>
    </div>
    <?php endforeach; ?>
    </div>

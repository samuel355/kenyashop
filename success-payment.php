<?php include_once 'include/head.php' ?>
<body>
<?php
    if(isset($_GET['successPaid'])){
        $referenceCode = $_GET['successPaid'];
        echo $referenceCode;
    }
?>
<?php include_once 'include/preloader.php' ?>


<div class="maill-success">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="success-content">
                    <i class="lni lni-envelope"></i>
                    <h2>Your Payment is made Successfully</h2>
                    <p>Thanks for your purchase.</p>
                    <div class="button">
                        <a href="index.php" class="btn">View your orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="assets/js/bootstrap.min.js"></script>
<script>
    window.onload = function () {
      window.setTimeout(fadeout, 500);
    }

    function fadeout() {
      document.querySelector('.preloader').style.opacity = '0';
      document.querySelector('.preloader').style.display = 'none';
    }
  </script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"67c185e58d3006fb","version":"2021.7.0","r":1,"token":"93dd3b16eaea413cbf84c7c6b5a1817a","si":10}'></script>
</body>

<?php
include("hhh.php");
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- <title>FAQ Template | CodyHouse</title> -->
</head>
<?php
$q=mysqli_query($conn,"select * from tlbfaq");
?>
<div class="top-brands">
		<div class="container">
		<h2>FAQ's</h2>
        <br><br><br>
<section class="cd-faq js-cd-faq container max-width-md margin-top-lg margin-bottom-lg">
    <?php
    while($row=mysqli_fetch_array($q))
    {
    ?>
<div class="cd-faq__items">
		<ul id="basics" class="cd-faq__group">
			
			<li class="cd-faq__item" style="text-align: justify; text-justify: inter-word;">
				<a class="cd-faq__trigger" href="#0"><span><?php echo $row['question']; ?></span></a>
				<div class="cd-faq__content">
          <div class="text-component" style="text-align: justify; text-justify: inter-word;">
            <p><?php echo $row['answer']; ?></p>
          </div>
				</div> <!-- cd-faq__content -->
		</li>
</ul>

  
  <div class="cd-faq__overlay" aria-hidden="true"></div>
</div>  
<br><br>
<?php
    }
?>
</div>
</div>
</section>
<script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
<script src="assets/js/main.js"></script>
<?php
include("fff.php");
?>
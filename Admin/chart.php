<?php
  //user
		$con=mysqli_connect("localhost","root","","jimmyshoping") or die("");
		$q2="SELECT user_id FROM tbluser_master ORDER BY user_id";
		$q2_run=mysqli_query($con,$q2);
		$row=mysqli_num_rows($q2_run);
  //seller
		$q3="SELECT seller_id FROM tblseller_master ORDER BY seller_id";
		$q3_run=mysqli_query($con,$q3);
		$row2=mysqli_num_rows($q3_run);
  //product
    $q4="SELECT product_id FROM tblproduct_master ORDER BY product_id";
    $q4_run=mysqli_query($con,$q4);
    $row3=mysqli_num_rows($q4_run);
  //order
    $q5="SELECT order_id FROM tblorder_details";
    $q5_run=mysqli_query($con,$q5);
    $row4=mysqli_num_rows($q5_run);
	?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task','Hours per Day'],
          ['Seller',<?php echo $row2; ?>],
          ['Product',<?php echo $row3; ?>],
          ['User',<?php echo $row; ?>],
          ['order',<?php echo $row4;?>]
        ]);

        var options = {
          title: 'Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>

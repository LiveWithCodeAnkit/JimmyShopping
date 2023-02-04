<?php
include('hhh.php');
if(!isset($_SESSION['userid']))
{
	echo "<script>alert('you have to login first'); window.location.href='login.php';</script>";
}
?>
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Order History Page</li>
			</ol>
		</div>
</div>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <!--<link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">-->
    <style type="text/css">
    	body{
background:#eee;
}
.panel-order .row {
	border-bottom: 1px solid #ccc;
}
.panel-order .row:last-child {
	border: 0px;
}
.panel-order .row .col-md-1  {
	text-align: center;
	padding-top: 15px;
}
.panel-order .row .col-md-1 img {
	width: 50px;
	max-height: 50px;
}
.panel-order .row .row {
	border-bottom: 0;
}
.panel-order .row .col-md-11 {
	border-left: 1px solid #ccc;
}
.panel-order .row .row .col-md-12 {
	padding-top: 7px;
	padding-bottom: 7px; 
}
.panel-order .row .row .col-md-12:last-child {
	font-size: 11px; 
	color: #555;  
	background: #efefef;
}
.panel-order .btn-group {
	margin: 0px;
	padding: 0px;
}
.panel-order .panel-body {
	padding-top: 0px;
	padding-bottom: 0px;
}
.panel-order .panel-deading {
	margin-bottom: 0;
}                    
    </style>
</head>
<body>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
<div class="container bootdey">
    <div class="panel panel-default panel-order">
        <div class="panel-heading">
            <strong>Order history</strong>
        </div>
        
        <div class="panel-body">
        <?php
            $uid=$_SESSION['userid'];
            $conn=mysqli_connect("localhost","root","","jimmyshoping") or die("Connection Not Estalabish");
            $q=mysqli_query($conn,"select * from tblorder_master where user_id=$uid order by order_id desc");
            $sres=mysqli_num_rows($q);
            if($sres>0)
            {
                while($row=mysqli_fetch_array($q))
                {
                    
                    $oid=$row['order_id'];
                    $odate=$row['order_date'];
                    $q2=mysqli_query($conn,"select * from tblorder_details where order_id=$oid order by order_detail_id desc");
                    while($row2=mysqli_fetch_array($q2))
                    {
                        //echo "isthere a problem?";
                        $ddate=$row2['dispatch_date'];
                        $approved=$row2['is_approved'];
                        $pid=$row2['product_id'];
                        $q3=mysqli_query($conn,"select * from tblproduct_master where product_id=$pid");
                        $row3=mysqli_fetch_array($q3);
                        $q4=mysqli_query($conn,"select * from tblproduct_image where product_id=$pid and default_img=1");
                        $row4=mysqli_fetch_array($q4);
                        $image=$row4['productimg_url'];

        ?>
            <div class="row">
                <div class="col-md-1"><a href="single.php?pid=<?php echo $pid; ?>"><img src="images/<?php echo $image;?>" alt=" " class="media-object img-thumbnail" /></a></div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                                if($row2['is_delivered']==1)
                                {
                            ?>
                                    <div class="pull-right"><label class="label label-info">Delivered</label></div>
                            <?php
                                }
                                elseif($ddate==null && $approved==0)
                                {
                            ?>
                                    <div class="pull-right"><label class="label label-warning">Pending</label></div>
                            <?php
                                }
                                elseif($ddate!=null && $approved==0)
                                {
                            ?>
                                    <div class="pull-right"><label class="label label-danger">Rejected</label></div>
                            <?php
                                }
                                elseif($ddate==null && $approved==1)
                                {
                            ?>
                                    <div class="pull-right"><label class="label label-success">Approved</label></div>
                            <?php
                                }
                                elseif($ddate!=null && $approved==1)
                                {
                            ?>
                                    <div class="pull-right"><label class="label label-primary">Dispatched</label></div>
                            <?php
                                }
                            ?>
                            <a href="ordertrack.php?oid=<?php echo $row2['order_detail_id'];?>"><span><strong><?php echo $row3['product_name']; ?></strong></span> <span class="label label-info"><?php echo $row3['company_name']; ?></span></a><br />
                            Quantity : <?php echo $row2['product_quantity']; ?>, cost: <?php echo $row2['total_price']+$row2['delivery_charge'];?>₹ <br />
                            
                        </div>
                        <div class="col-md-12">order made on: <?php echo $odate; ?> by <?php echo $row['full_name']; ?> </div>
                    </div>
                </div>
            </div>
            <?php 
                    }
                }
            }
            else
            {
                ?>
                <div class="panel-body">
                    <div class="row">
                        <h4 style="padding: 10px;">You haven't ordered anything yet</h4>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <!--<div class="panel-footer">Put here some note for example: bootdey si a gallery of free bootstrap snippets bootdeys</div>-->
    </div>
</div>
</div>  

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<!--<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->

</body>
<?php
include('fff.php');
?>
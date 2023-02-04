<!DOCTYPE html>
<html>
<head>
<title>Creating Dynamic Data Graph using PHP and Chart.js</title>
<style type="text/css">

#chart-container {
    width: 100%;
    height: auto;
}
</style>
<script type="text/javascript" src="js1/jquery.min.js"></script>
<script type="text/javascript" src="js1/Chart.min.js"></script>


</head>
<body>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("seller_data.php",
                function (data)
                {
                    console.log(data);
                     //var name = [];
                    //var marks = [];

                    var month1 = [];
                    var t_char = [];

                    for (var i in data) {
                        //name.push(data[i].student_name);
                        //marks.push(data[i].marks);

                        month1.push(data[i].month);
                        t_char.push(data[i].product_name);
                    }

                    var chartdata = {
                        labels: month1,
                        datasets: [
                            {
                                label: 'Earning',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: t_char
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
        </script>

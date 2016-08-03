<?php
include ("includes/head_sideMenuPub.php");
include ("./db/dbconn.php");
?>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<div class="page-content">
    <div class="container-fluid">
        <?php
        $query = '';

        /**
         * Pesquisa por nome de serviçoF
         */
        if (isset($_GET ['qParam'])) {
            $name = (filter_var($_GET ['qParam']));
            $query .= '#Advanced Search Criteria > ' . $name . ' ';
        }
        /**
         * Pesquisa por nome da cidade
         */
        if (isset($_GET ['name'])) {
            $city = (filter_var($_GET ['name']));
            $query .= '#City > ' . $city . ' ';
        }
        /**
         * Pesquisa por categoria
         */
        if (isset($_GET ['Category'])) {
            $CategoryId = (filter_var($_GET ['Category']));
            $query .= '#Category > ' . DB_getCategoryName($pdo, $CategoryId) . ' ';
        }
        /**
         * Pesquisa por subCategoria
         */
        if (isset($_GET ['SubCategory'])) {
            $SubCategory = (filter_var($_GET ['SubCategory']));
            $query .= '#SubCategory > ' . DB_getSubCategoryName($pdo, $SubCategory) . ' ';
        }

        if (isset($_GET ['PageNum'])) {
            $PageNum = (filter_var($_GET ['PageNum']));
            if ($PageNum < 0) {
                echo '<script>updateQueryStringParameter("PageNum","0"); </script>';
                $query .= '#Page > 1 ';
            }
            $query .= '#Page > ' . ($PageNum + 1) . ' ';
        } else {
            echo '<script>updateQueryStringParameter("PageNum","0"); </script>';
            $query .= '#Page > 1 ';
            $PageNum = 0;
        }

        if (isset($_GET ['qParam']) || isset($_GET ['name']) || isset($_GET ['PageNum']) || isset($_GET ['Category']) || isset($_GET ['SubCategory'])) {
            $clear = '<a href="indexPub.php"> Reset</a>';
        } else {
            $clear = '';
        }

        echo $query . $clear . '<br><br>';

        /**
         * Vai buscar as subCats da Cat
         */
        if (isset($_GET ['Category'])) {
            $CategoryId = (filter_var($_GET ['Category']));
            //DEVOLVE SUBCATS DE UMA CAT
            DB_GetSubCategories($pdo, $CategoryId);
        }
        ?>
        <div data-role="main" class="ui-content">
            <div data-role="popup" id="myPopup" class="ui-content" style="min-width:250px;">
                <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>
                <form>
                    <div>
                        <h3>Login information</h3>
                        <input type="submit" data-inline="true" value="Log in">
                    </div>
                </form>
            </div>
        </div>
        <div class="cards-grid" data-columns>
            <?php
            /**
             * Executa a Querie c/ todos os parametros
             */
            //DB_getServicesForIndexByQuery($pdo, $CategoryId, $name, $city, $SubCategory, $PageNum);
            DB_getServicesForPublicIndexByQuery($pdo, $CategoryId, $name, $city, $SubCategory, $page);
            //$numPag = DB_getServicesForIndexCount($pdo, $CategoryId, $name, $city, $SubCategory, $page);
            ?>

        </div>
        <div class="clear"></div>
        <!--        <div style="padding-left: 500px;">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item disabled">
                               
                                echo'<a class="page-link" aria-label="Previous" onclick="setPAge(' . ($PAgeNum - 1) . ')"  >
                                    <span aria-hiden="true">&laquo;</span>
                                   
                                    <span class="sr-only">Previous</span>
                                </a>';
                           
                            </li>
                            <li class="page-item active">
                                <a class="page-link" ><span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link">2</a></li>
                            <li class="page-item"><a class="page-link">3</a></li>
                            <li class="page-item"><a class="page-link">4</a></li>
                            <li class="page-item"><a class="page-link">5</a></li>
                            <li class="page-item">
                                <a class="page-link" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>-->
        <div class="right" style="margin-left: 450px; padding-left: 35px;" >
            <?php
            //DB_CountServices($pdo, $CategoryId, $name, $city, $SubCategory); 
            //onclick="updateQueryStringParameter('Category', '4');"

            echo '<button class="btn btn-rounded btn-inline btn-secondary-outline" onclick="setPage(' . ($PageNum - 1) . ')" type="button">Previous</button>';
//        if (($PageNum + 1) > ($numPag / 50)) {
//            echo '<button onclick="setPage(' . ($PageNum) . ')" type="button">>></button>';
//        } else {
            echo '<button  class="btn btn-rounded btn-inline btn-secondary-outline" onclick="setPage(' . ($PageNum + 1) . ')" type="button">Next</button>';
//        }
            ?>

            <!--<div data-role="page"-->
            <!--        <div data-role="main" class="ui-content">
                                    <a href="#myPopup" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all ui-icon-check ui-btn-icon-left">Show Popup Form</a>
            
                        <div data-role="popup" id="myPopup" class="ui-content" style="min-width:250px;">
                            <form method="post" action="demoform.asp">
                                <div>
                                    <h3>Login information</h3>
                                    <label for="usrnm" class="ui-hidden-accessible">Username:</label>
                                    <input type="text" name="user" id="usrnm" placeholder="Username">
                                    <label for="pswd" class="ui-hidden-accessible">Password:</label>
                                    <input type="password" name="passw" id="pswd" placeholder="Password">
                                    <label for="log">Keep me logged in</label>
                                    <input type="checkbox" name="login" id="log" value="1" data-mini="true">
                                    <input type="submit" data-inline="true" value="Log in">
                                </div>
                            </form>
                        </div>
                    </div>-->
            <!--</div>-->



            <!--        <div style="padding-left: 500px;">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>-->
        </div>
    </div>

    <script src="js/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="js/lib/tether/tether.min.js" type="text/javascript"></script>
    <script src="js/lib/tether/tether.min.js"></script>
    <script src="js/lib/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>

    <script type="text/javascript" src="js/lib/jqueryui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/lib/lobipanel/lobipanel.min.js"></script>
    <script type="text/javascript" src="js/lib/match-height/jquery.matchHeight.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script src="js/lib/salvattore/salvattore.min.js"></script>

    <!--MAKE RADIO LOOKS LIKE A CHECKBOX-->
    <style type="text/css">
        div.options > label > input {
            visibility: hidden;
        }

        div.options > label {
            display: block;
            margin: 0 0 0 -10px;
            padding: 0 0 20px 0;  
            height: 20px;
            width: 150px;

        }

        div.options > label > img {
            display: inline-block;
            padding: 0px;
            /*height:30px;
            width:30px;*/
            height:20px;
            width:20px;
            background: none;
        }

        div.options > label > input:checked +img {  
            background: url(https://www.ureach.com/home/images/checkmark_grey20.png);
            background-repeat: no-repeat;
            background-position:center center;
            /*background-size:30px 30px;*/
            background-size:20px 20px;
        }

    </style>

    <script>
        $(document).ready(function () {
            $('.panel').lobiPanel({
                sortable: true
            });

            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var dataTable = new google.visualization.DataTable();
                dataTable.addColumn('string', 'Day');
                dataTable.addColumn('number', 'Values');
                // A column for custom tooltip content
                dataTable.addColumn({type: 'string', role: 'tooltip', 'p': {'html': true}});
                dataTable.addRows([
                    ['MON', 130, ' '],
                    ['TUE', 130, '130'],
                    ['WED', 180, '180'],
                    ['THU', 175, '175'],
                    ['FRI', 200, '200'],
                    ['SAT', 170, '170'],
                    ['SUN', 250, '250'],
                    ['MON', 220, '220'],
                    ['TUE', 220, ' ']
                ]);

                var options = {
                    height: 314,
                    legend: 'none',
                    areaOpacity: 0.18,
                    axisTitlesPosition: 'out',
                    hAxis: {
                        title: '',
                        textStyle: {
                            color: '#fff',
                            fontName: 'Proxima Nova',
                            fontSize: 11,
                            bold: true,
                            italic: false
                        },
                        textPosition: 'out'
                    },
                    vAxis: {
                        minValue: 0,
                        textPosition: 'out',
                        textStyle: {
                            color: '#fff',
                            fontName: 'Proxima Nova',
                            fontSize: 11,
                            bold: true,
                            italic: false
                        },
                        baselineColor: '#16b4fc',
                        ticks: [0, 25, 50, 75, 100, 125, 150, 175, 200, 225, 250, 275, 300, 325, 350],
                        gridlines: {
                            color: '#1ba0fc',
                            count: 15
                        },
                    },
                    lineWidth: 2,
                    colors: ['#fff'],
                    curveType: 'function',
                    pointSize: 5,
                    pointShapeType: 'circle',
                    pointFillColor: '#f00',
                    backgroundColor: {
                        fill: '#008ffb',
                        strokeWidth: 0,
                    },
                    chartArea: {
                        left: 0,
                        top: 0,
                        width: '100%',
                        height: '100%'
                    },
                    fontSize: 11,
                    fontName: 'Proxima Nova',
                    tooltip: {
                        trigger: 'selection',
                        isHtml: true
                    }
                };

                var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
                chart.draw(dataTable, options);
            }
            $(window).resize(function () {
                drawChart();
                setTimeout(function () {
                }, 1000);
            });

            $('.panel').on('dragged.lobiPanel', function (ev, lobiPanel) {
                $('.dahsboard-column').matchHeight();
            });
        });
    </script>

    <script src="js/app.js"></script>
    <script src="js/lib/jquery-tag-editor/jquery.caret.min.js"></script>
    <script src="js/lib/jquery-tag-editor/jquery.tag-editor.min.js"></script>
    <script src="js/lib/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="js/lib/select2/select2.full.min.js"></script>

    <!--O PROXIMO SCRIPT DESABILITA BOTAO DIREITO-->
    <script>
        $(function () {
            $('#tags-editor-textarea').tagEditor();
        });
    </script>

    <script type="text/javascript">
        //MUDAR PARA POPUP LOGIN
        function openMyWics(Sid) {
            var x = (screen.width / 2) - (435 / 2);
            var y = (screen.height / 2) - (362 / 2);
            if (Sid > 0) {
                window.open('./ajax/getMyWicsPopup.php?id=' + Sid + '', 'MyWics', 'height=455,width=322,left=' + x + ',top=' + y);
            } else {

            }
        }
    </script>
    <script>
        function openWindow() {
            $('#myPopup').popup("open");
        }
        function  closeWindow() {
            var timeout = window.setTimeout(function () {
                $('#myPopup').stop().fadeOut('medium');
            }, 10000);
        }
        window.onload = closeWindow();
    </script>

</body>
</html>

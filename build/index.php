<?php
include_once ("includes/head_sideMenu.php");
//include ("./db/dbconn.php");
?>

<div class="page-content">
    <div class="container-fluid">
        
        
                            <div id="boxes" class="card-typical window" >
            <div  id="dialog" class=" card-typical window">
<!--                <div class="card-typical-section">
                    <div class="user-card-row">
                        atum
                    </div>
                </div>
                <div class="card-typical-content">Welcome to Wic
                    <div class="photo">
                        <img src="img/wic_logo.png" style="max-width:80px;">
                    </div>
                
                
                <header class="title"> Welcome TO Wic</header>
                <p>Simple Modal Window | </p>
                </div>-->
                
                		<article class="card-typical">
						<div class="card-typical-section">
							<div class="user-card-row">
								<div class="tbl-row">
<!--									<div class="tbl-cell tbl-cell-photo">
										<a href="#">
                                                                                    <img src="img/wic_logo.png"style="max-width: 80px" alt="">
										</a>
									</div>-->
									<div class="tbl-cell">
                                                                            <p class="user-card-row-name"><h3>Welcome to WiC</h3></p>
										<!--<p class="color-blue-grey-lighter">3 days ago - 23 min read</p>-->
									</div>
									<div class="tbl-cell tbl-cell-status">
                                                                            
										<a href="#">
                                                                                    <img src="img/wic_logo.png"style="max-width: 80px" alt="">
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-typical-section card-typical-content">
							<header class="title">Search, Chat and Deal with the best vendors for yours:</header>
                                                        <br>                                
<p>Social Events, Meet ups, Brand activations, product launch, Fashion shows, Fast meetings, executive breakfasts, coffee breaks, business dinners, galas, corporate parties and a lot more.</p>
<br>
<p>Enjoy the biggest community of events and entertainment:</p>

<p >&emsp;&emsp;&ordm;&emsp;4000+ services for events around the world</p>

<p> &emsp;&emsp;&ordm;&emsp;700+ vendors</p>

<p> &emsp;&emsp;&ordm;&emsp;The best tools and support for your event management.</p>
<br>
<p>This is not a marketplace. The transaction or any type of sale is responsible for the Planner and Vendor. </p>
<br>
<p>Each event is unique and there is no customized prices for any type of service provided.</p>
<br>

						</div>
						<!--<div class="card-typical-section">-->
                                                <div class="card-typical-linked"><a class="btn btn-rounded btn-success close" style="font-size: xx-large;margin: 10px auto auto 100px; display: table-row-group;">Start Planning</a>
                                                
                                                    <p >Event Your Life !</p>
                                                <br><p >WiC&copy; All rights reserved 2016</p></div>
<!--							<a href="#" class="card-typical-likes">
								<i class="font-icon font-icon-heart"></i>
								123
							</a>-->
                                                     
						<!--</div>-->
					</article><!--.card-typical-->
            
            
            <!--<a href="#" class="close">Close it</a>-->
            
<!--            <div class="box-typical-footer">
            <button class="btn btn-rounded btn-primary close"> Start Planning</button>
            
            </div>-->
            
            </div>
            <!-- Mask to cover the whole screen -->
            <div style=" display: none; opacity: 0.8;" id="mask"></div>
            </div>
        
        
        
        
        
        
        
        
        
        <?php
        $query = '';

        /**
         * Pesquisa por nome de serviçoF
         */
//        if (isset($_GET ['qParam'])) {
//            $name = (filter_var($_GET ['qParam']));
//            $query .= '#Advanced Search Criteria > ' . $name . ' ';
//        }
        //        numero de pagina
        if (isset($_GET ['PageNum'])) {
            $PageNum = (filter_var($_GET ['PageNum']));
            if ($PageNum < 0) {
                echo '<script>updateQueryStringParameter("PageNum","0"); </script>';
                $query .= '#Page > 1 ';
            }
            $query .= '<div class="form-group" style="padding-left:35px;">'
                    . '<button type="button" class="btn btn-inline" disabled><i class="fa fa-home"></i> Page: ' . ($PageNum + 1) . ' </button>';
        } else {
            echo '<script>updateQueryStringParameter("PageNum","0"); </script>';

            $query .= '#Page > 1 ';

            $PageNum = 0;
        }

        /**
         * Pesquisa por nome de serviçoF
         */
        if (isset($_GET ['qParam'])) {
            $name = (filter_var($_GET ['qParam']));
            $query .= '<button type="button" class="btn btn-inline" disabled><i class="fa fa-home"></i>Advanced Search Criteria : ' . $name . '</button> ';
        }
        /**
         * Pesquisa por nome da cidade
         */
        if (isset($_GET ['name'])) {
            $city = (filter_var($_GET ['name']));
            $query .= '<button type="button" class="btn btn-inline" disabled><i class="font-icon font-icon-pin-2"></i> City : <h8> ' . $city . '</h8></button> ';
        }
        /**
         * Pesquisa por categoria
         */
        if (isset($_GET ['Category'])) {
            $CategoryId = (filter_var($_GET ['Category']));
            $query .= '<button type="button" class="btn btn-inline" disabled><i class="fa fa-cubes"></i> Category: <h8> ' . DB_getCategoryName($pdo, $CategoryId) . '</h8></button> ';
        }
        /**
         * Pesquisa por subCategoria
         */
        if (isset($_GET ['SubCategory'])) {
            $SubCategory = (filter_var($_GET ['SubCategory']));
            $query .= '<button type="button" class="btn btn-inline" disabled><i class="fa fa-cubes"></i>SubCategory: <h8> ' . DB_getSubCategoryName($pdo, $SubCategory) . '</h8></button>';
        }

//        botao reset

        if (isset($_GET ['qParam']) || isset($_GET ['name']) || isset($_GET ['PageNum']) || isset($_GET ['Category']) || isset($_GET ['SubCategory'])) {
            $clear = '<a class="btn btn-rounded btn-inline btn-secondary" href="index.php"><i class="fa fa-refresh"></i> Reset</a>'
                    . '</div>';
        } else {
            $clear = '';
        }

        echo $query . $clear . '<br>';

        /**
         * Vai buscar as subCats da Cat
         */
        if (isset($_GET ['Category'])) {
            $CategoryId = (filter_var($_GET ['Category']));
            //DEVOLVE SUBCATS DE UMA CAT
            DB_GetSubCategories($pdo, $CategoryId);
        }
        ?>
        <div class="cards-grid" data-columns>
            <?php
            /**
             * Executa a Querie c/ todos os parametros
             */
            DB_getServicesForIndexByQuery($pdo, $CategoryId, $name, $city, $SubCategory, $PageNum);
            //$numPag = DB_getServicesForIndexCount($pdo, $CategoryId, $name, $city, $SubCategory, $page);
            ?>

        </div>
        <div class="clear"></div>

        <section class="center-block" style="margin: 0px auto; display: block; max-width: 300px; position: static;" >
            <?php
            echo '<button class="btn btn-rounded btn-inline btn-secondary-outline" onclick="setPage(' . ($PageNum - 1) . ')" type="button">Previous</button>';
            if (($PageNum + 1) > ($numPag / 50)) {

                echo '<button  class="btn btn-rounded btn-inline btn-secondary-outline" onclick="setPage(' . ($PageNum + 1) . ')" type="button">Next</button>';
//           echo '<button onclick="setPage(' . ($PageNum) . ')" type="button">>></button>';
            } else {
                echo '<button  class="btn btn-rounded btn-inline btn-secondary-outline" onclick="setPage(' . ($PageNum + 1) . ')" type="button">Next</button>';
            }
            ?>

        </section>
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
        //    $(document).ready(function ()
        //    {
        //        $(document).bind("contextmenu", function (e) {
        //            return false;
        //        });
        //    })
        $(function () {
            $('#tags-editor-textarea').tagEditor();
        });
    </script>

    <script type="text/javascript">
        function openMyWics(Sid) {
            var x = (screen.width / 2) - (435 / 2);
            var y = (screen.height / 2) - (362 / 2);
            if (Sid > 0) {
                window.open('./ajax/getMyWicsPopup.php?id=' + Sid + '', 'MyWics', 'height=455,width=322,left=' + x + ',top=' + y);
            } else {

            }
        }
    </script>

</body>
</html>

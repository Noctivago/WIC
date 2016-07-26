<?php
include ("includes/head_sideMenu.php");
include_once '../build/db/dbconn.php';
include_once '../build/db/session.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-lg-push-0 col-md-12">
                <!--IMAGEM PERFIL SERVICE-->
                <section class="box-typical" stye="background-color:black">
                    <div id="imagePreview" style="width: 100%"></div>                    
                </section>    
                <section class="box-typical">
                    <div class="recomendations-slider">
                        <div class="slide">
                            <div class="user-card-row">
                                <div class="tbl-row">
                                    <?php
                                    if ($_SESSION['role'] === 'user') {
                                        header("location: ../build/index.php");
                                    }
                                    $user = $_SESSION['id'];
                                    $org = DB_GetOrgIdByUserBossId2($pdo, $user);
                                    $idOrg = $org['Id'];
                                    if (isset($_POST['addservice']) && !empty($_POST['cName']) && !empty($_POST['cDescription']) && !empty($_POST['cSubCat'])) {
                                        $cname = $_POST['cName'];
                                        $cDescription = $_POST['cDescription'];
                                        $cSub = $_POST['cSubCat'];
                                        $city = $_POST['citySelect'];
                                        //     $serv = $_POST['Serv'];
                                        $last_Id = DB_AddNewService($pdo, $cname, $cDescription, $cSub, $idOrg, $city);
                                        $sID = $last_Id;
                                        $name = $_FILES['uploadFile']['name'];
                                        $newfilename = $sID . generateActivationCode() . '.jpg';
                                        if (isset($name)) {
                                            if (!empty($name)) {
                                                // Check for errors
                                                if ($_FILES['uploadFile']['error'] > 0) {
                                                    die('An error ocurred when uploading.');
                                                }
                                                if (!getimagesize($_FILES['uploadFile']['tmp_name'])) {
                                                    die('Please ensure you are uploading an image.');
                                                }
                                                // Check filesize
                                                if ($_FILES['uploadFile']['size'] > 500000) {
                                                    die('File uploaded exceeds maximum upload size.');
                                                }
                                                if (!move_uploaded_file($_FILES['uploadFile']['tmp_name'], 'pics/' . $newfilename)) {
                                                    die('Error uploading file - check destination is writeable.');
                                                } else {
                                                    $picture_path = 'pics_service/' . $newfilename;
                                                    //INSERIR NA TABELA MULTIMEDIA - FirstPage
                                                    $msg = DB_AddNewServiceFirstPagePicture($pdo, $sID, $user, $picture_path, 1);
                                                    //$msg = ('File uploaded successfully.');
                                                }
                                            }
                                        }
                                    }
                                    ?> 
                                    <div class="tbl-cell tbl-cell-photo">
                                        <a>
                                            <img src="<?php echo $org['Picture_Path']; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="tbl-cell">
                                        <p>Service Name</p>
                                        <p id="serviceName" class="user-card-row-name"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="slide">
                            <div class="user-card-row">
                                <div class="tbl-cell">
                                    <?php echo '<p>Organization Name</p>
                                 <p class="user-card-row-name"><a href="profile_org.php?Organization=' . $org['Id'] . '">' . $org['Name'] . '</a></p>'; ?>
                                </div>
                            </div>
                        </div>

                        <div class = "slide">
                            <div class = "user-card-row">
                                <?php
                                $subId = 0;
                                DB_getCategoryAndSubCategoryData($pdo, $subId);
                                echo '<b>Category: </b><b id="Cat">' . $CatSubCatData['CatName'] . '</b><br><b> Sub category : </b> <b id="SubCat">' . $CatSubCatData['SubCatName'] . ' </b>';
                                ?>
                                <div class = "tbl-cell">
                                </div> </div>
                        </div>

                    </div>
                </section>

                <section class = "box-typical">
                    <header class = "box-typical-header-sm">Service Information</header>
                    <article class = "profile-info-item">
                        <header class = "profile-info-item-header">
                            <i class = "font-icon font-icon-notebook-bird"></i>
                            Description
                        </header>
                        <div class = "text-block text-block-typical">
                            <?php echo '<p id="description">' . $data['Description'] . '</p>'; ?>
                        </div>
                    </article>
                </section>

            </div>
            <div class = "col-lg-3 col-md-6 col-sm-6" style = "padding-right: 0px;">
                <section class = "box-typical">
                    <header class = "box-typical-header-sm">Add new service </header>
                    <?= $msg; ?>
                    <form class = "sign-box" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="formm" enctype="multipart/form-data" method="post">
                        <!--PROFILE SERVICE PIC-->
                        <input id="uploadFile" name="uploadFile" accept = "images/*" type="file" name="image" class="img" />
                        Files: <input type="file" id="files" accept = "images/*" name="files" multiple><br/>

                        <div id="selectedFiles"></div>

                        <header class = "sign-title">Fill the fields below</header>

                        <div class = "form-group">
                            <div class = "form-control-wrapper form-control-icon-left" >
                                <input type = "text" class = "form-control" onchange="reloadName()"id="cName" name="cName" required  placeholder = " Service Name"/>
                                <i class = "font-icon font-icon-user"></i>
                            </div>
                        </div>
                        <div class = "form-control-wrapper form-control-icon-left">
                            <select id = "countrySelect" class="bootstrap-select bootstrap-select-arrow" placeholder="Country"  onchange="myFunction()" required>
                                <option value="0">Country</option>
                                <?php DB_getCountryAsSelect($pdo) ?>
                            </select>
                        </div>

                        <div class = "form-group" >
                            <div class = "form-control-wrapper form-control-icon-left" id="state">

                            </div>
                        </div>
                        <div class = "form-group" >
                            <div class = "form-control-wrapper form-control-icon-left" id="cities">

                            </div>    
                        </div>
                        <div class = "form-group">
                            <?php
                            $idCat = $CatSubCatData['CatId'];
                            DB_getCatgoryAsSelect($pdo, $idCat);
                            ?>
                            <div class = "form-group">
                                <?php
                                $idSubCat = $CatSubCatData['SubCatId'];
                                DB_getSubCategoryAsSelect($pdo, $idCat, $idSubCat);
                                ?>
                            </div>
                        </div>
                        <div class = "form-control-wrapper form-control-icon-left" >
                            <textarea onchange="reloadDescription()" name="cDescription" id="cDescription" rows = "8" class = "form-control"  required placeholder = "Service Info"><?= $data['Description'] ?></textarea>
                            <i class = "font-icon font-icon-user"></i>
                        </div>
                        <button type = "submit" name="addservice" class = "btn btn-rounded btn-success sign-up">Add Service</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>

<!--PREVIEW DAS RESTANTES PICS DO SERVICE-->
<style>
    #selectedFiles img {
        max-width: 70px;
        max-height: 70px;
        float: left;
        margin-bottom:10px;
    }
</style>

<!--GET Country / State / City-->
<script>
    function myFunction() {
        var x = document.getElementById("countrySelect").value;
        if (x === '0') {

        } else {
            loadState(x);
        }
    }
    function myFunctionC() {
        var x = document.getElementById("stateSelect").value;
        if (x === '0') {

        } else {
            loadCity(x);
        }
    }
    function loadState(Country) {
        var Country_Id = Country;
        $.ajax({
            url: '../build/ajax/get_state.php',
            method: 'post',
            data: {con: Country_Id},
            success: function (data) {
                $('#state').html(data);
            }
        });
    }
    function loadCity(State) {
        var State_Id = State;
        $.ajax({
            url: '../build/ajax/get_city.php',
            method: 'post',
            data: {con: State_Id},
            success: function (data) {
                $('#cities').html(data);
            }
        });
    }
</script>

<!--Atualiza preview-->
<script>
    function reloadDescription() {
        document.getElementById('description').innerHTML = document.getElementById('cDescription').value;
    }
    function reloadName() {
        document.getElementById('serviceName').innerHTML = document.getElementById('cName').value;
    }
    function reloadPhoto() {

    }
    function reloadServ(sel) {
        document.getElementById('SubCat').innerHTML = sel.options[sel.selectedIndex].text;
    }

    function reloadSubCat(sel) {
        var val = sel.options[sel.selectedIndex].text;
        document.getElementById('Cat').innerHTML = val;
        var value = sel.options[sel.selectedIndex].value;
        var idSub = document.getElementById('cSubCat').value;
        $.post("ajax/SubCategories.php", {value: value, idSub: idSub}, function (result) {
            // $('#sc').find('select').remove().end();
            //    $('#sc').html(result);
            document.getElementById('sc').innerHTML = result;

        });

        return false;
    }
</script>

<script src = "js/lib/jquery/jquery.min.js" type = "text/javascript"></script>
<script src="js/lib/tether/tether.min.js" type="text/javascript"></script>
<script src="js/lib/tether/tether.min.js"></script>
<script src="js/lib/bootstrap/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script type="text/javascript" src="js/lib/jqueryui/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/lib/lobipanel/lobipanel.min.js"></script>
<script type="text/javascript" src="js/lib/match-height/jquery.matchHeight.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="js/lib/salvattore/salvattore.min.js"></script>
<script src="js/lib/ion-range-slider/ion.rangeSlider.js"></script>

<!--PREVIEW DAS RESTANTES PICS DO SERVICE-->
<script>
    var selDiv = "";
    var storedFiles = [];

    $(document).ready(function () {
        $("#files").on("change", handleFileSelect);

        selDiv = $("#selectedFiles");
        $("#myForm").on("submit", handleForm);

        $("body").on("click", ".selFile", removeFile);
    });

    function handleFileSelect(e) {
        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
        filesArr.forEach(function (f) {

            if (!f.type.match("image.*")) {
                return;
            }
            storedFiles.push(f);

            var reader = new FileReader();
            reader.onload = function (e) {
                var html = "<div><img src=\"" + e.target.result + "\" data-file='" + f.name + "' class='selFile' title='Click to remove'>X<br clear=\"left\"/></div>";
                selDiv.append(html);

            }
            reader.readAsDataURL(f);
        });

    }

    function handleForm(e) {
        e.preventDefault();
        var data = new FormData();

        for (var i = 0, len = storedFiles.length; i < len; i++) {
            data.append('files', storedFiles[i]);
        }

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'handler.cfm', true);

        xhr.onload = function (e) {
            if (this.status == 200) {
                console.log(e.currentTarget.responseText);
                alert(e.currentTarget.responseText + ' items uploaded.');
            }
        }

        xhr.send(data);
    }

    function removeFile(e) {
        var file = $(this).data("file");
        for (var i = 0; i < storedFiles.length; i++) {
            if (storedFiles[i].name === file) {
                storedFiles.splice(i, 1);
                break;
            }
        }
        $(this).parent().remove();
    }
</script>

<script>
    $(document).ready(function () {
        $("#range-slider-1").ionRangeSlider({
            min: 0,
            max: 100,
            from: 30,
            hide_min_max: true,
            hide_from_to: true
        });
        $("#range-slider-2").ionRangeSlider({
            min: 0,
            max: 100,
            from: 30,
            hide_min_max: true,
            hide_from_to: true
        });
        $("#range-slider-3").ionRangeSlider({
            min: 0,
            max: 100,
            from: 30,
            hide_min_max: true,
            hide_from_to: true
        });
        $("#range-slider-4").ionRangeSlider({
            min: 0,
            max: 100,
            from: 30,
            hide_min_max: true,
            hide_from_to: true
        });
    });
</script>

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

<script>
    $(function () {
        $('.chat-settings .change-bg-color label').on('click', function () {
            var color = $(this).data('color');
            $('.messenger-message-container.from').each(function () {
                $(this).removeClass(function (index, css) {
                    return (css.match(/(^|\s)bg-\S+/g) || []).join(' ');
                });
                $(this).addClass('bg-' + color);
            });
        });
    });
</script>

<!--PIC SERVICE PROF-->
<script>
    $(function () {
        $("#uploadFile").change(function () {
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader)
                return; // no file selected, or no FileReader support

            if (/^image/.test(files[0].type)) { // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function () { // set image data as background of div
                    $("#imagePreview").css("background-image", "url(" + this.result + ")");
                };
            }
        });
    });
</script>
<!--MULTIPICS-->


<!--PENSO QUE SE PODEM REMOVER OS PROXIMOS DOIS SCRIPTS TESTAR PRIMEIRO-->

<style>
    #imagePreview {
        width: 664px;
        height: 415px;
        background-position: center center;
        background-size: cover;
        -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
        display: inline-block;
    }
</style>

<style>
    #imageThumbnails {
        width: 50px;
        height: 50px;
        background-position: center center;
        background-size: cover;
        -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
        display: inline-block;
    }
</style>

<script src="js/lib/jquery-tag-editor/jquery.caret.min.js"></script>
<script src="js/lib/jquery-tag-editor/jquery.tag-editor.min.js"></script>
<script src="js/lib/bootstrap-select/bootstrap-select.min.js"></script>
<script src="js/lib/select2/select2.full.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>

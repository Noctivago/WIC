<!DOCTYPE html>

<?php
include("includes/head_singleforms.php");
include_once '../build/db/locations.php';
?>
<body>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box">
                    <div class="sign-avatar no-photo">&plus;</div>
                    <header class="sign-title">Sign Up</header>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Organization Name"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="E-Mail"/>
                    </div>
                    <section class="card box-typical-full-height">
                        <div class="card-block">
                            <h8 class="with-border m-t-lg">Address</h8>
                            <div class="row">
                                <div >
                                    <select id = "countrySelect" class="bootstrap-select bootstrap-select-arrow" placeholder="Country">
                                        <option value="volvo">Volvo</option>
                                    </select>
                                </div>
                                <div >
                                    <select id = "stateSelect"class="bootstrap-select bootstrap-select-arrow states" placeholder="State" disabled>
                                        <option value="volvo">Volvo</option>
                                    </select>
                                </div>
                                <div >
                                    <select id = "citySelect" class="bootstrap-select bootstrap-select-arrow cities" placeholder="City" disabled>
                                        <option value="volvo">Volvo</option>
                                    </select>
                                </div>
                            </div><!--.row-->
                        </div>
                    </section>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password"/>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Repeat password"/>
                    </div>
                    <button type="submit" class="btn btn-rounded btn-success sign-up">Sign up</button>
                    <p class="sign-note">Already have an account? <a href="sign_in.php">Sign in</a></p>
                    <!--<button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>-->
                </form>
            </div>
        </div>
    </div><!--.page-center-->

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/tether/tether.min.js"></script>
    <script src="js/lib/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>

    <script src="js/lib/jquery-tag-editor/jquery.caret.min.js"></script>
    <script src="js/lib/jquery-tag-editor/jquery.tag-editor.min.js"></script>
    <script src="js/lib/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="js/lib/select2/select2.full.min.js"></script>

    <script>
        $(function () {
            $('#tags-editor-textarea').tagEditor();
        });
    </script>

    <script>
        function myFunction() {
            var x = document.getElementById("countrySelect").value;
            loadState(x);
        }
        function myFunctionC() {
            var x = document.getElementById("stateSelect").value;
            loadCity(x);
        }
        function loadState(Country) {
            //var Country_Id = document.getElementById(x).value;
            var Country_Id = Country;
            var stateOp = document.getElementById('stateSelect');
            stateOp.disabled = false;
            $.ajax({
                url: '../ajax/get_state.php',
                method: 'post',
                data: {con: Country_Id},
                success: function (data) {
                    $('.states').html(data);
                }
            });
        }
        function loadCity(State) {
            //var Country_Id = document.getElementById(x).value;
            var State_Id = State;
            var cityOp = document.getElementById('citySelect');
            cityOp.disabled = false;
            $.ajax({
                url: '../ajax/get_city.php',
                method: 'post',
                data: {con: State_Id},
                success: function (data) {
                    $('.cities').html(data);
                }
            });
        }
    </script>


    <script src="js/app.js"></script>




</body>
</html>
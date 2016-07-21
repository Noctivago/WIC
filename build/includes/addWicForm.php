<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form class="sign-box" action="" method="post">
    <div class="sign-avatar no-photo">&plus;</div>
    <header class="sign-title">Add new Wic Planner</header>
    <div class="form-group">
        <input type="text" id = "email" name ="Wic Planner Name" class="form-control" placeholder="Wic Planner Name" required/>
    </div>
    <div class="form-group">
        <select class="bootstrap-select bootstrap-select-arrow" placeholder="Country">
            <option>Country</option>
            <option>City</option>
            <option>City</option>
            <option>City</option>
            <option>Long long long extra long example line long long long extra long example line </option>
        </select>
        <select class="bootstrap-select bootstrap-select-arrow" placeholder="State">
            <option>State</option>
            <option>City</option>
            <option>City</option>
            <option>City</option>
            <option>Long long long extra long example line long long long extra long example line </option>
        </select>
        <select class="bootstrap-select bootstrap-select-arrow" placeholder="City">
            <option>City</option>
            <option>City</option>
            <option>City</option>
            <option>City</option>
            <option>Long long long extra long example line long long long extra long example line </option>
        </select>
    </div>
    <div class='input-group date'>
        <input id="daterange3" type="text" value="01/08/2016" class="form-control">
        <span class="input-group-addon">
            <i class="font-icon font-icon-calend"></i>
        </span>
    </div>

    <p class="sign-note">  <?= $msg; ?> </p>
    <button type="submit" name="signup" class="btn btn-rounded btn-success sign-up">Add Wic Planner</button>
</form>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Trophy Cost Calculator</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<style>
    body{
        margin-top: 50px;
    }
</style>

<body>

<div class="container">

    <div class="row">
        <div class="col-md-8">
            <div class="page-header">
                <h1> Trophy Price Calculator </h1>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Select Shapes
                </div>
                <div class="panel-body" id="panelShape">
                    <div class="list-group">
                        <button type="button" class="list-group-item" id="sphere" value="Sphere">Sphere</button>
                        <button type="button" class="list-group-item" id="cylinder" value="Cylinder">Cylinder</button>
                        <button type="button" class="list-group-item" id="cube" value="Cube">Cube</button>
                    </div>
                    <button type="button" class="btn btn-success" id="showMetal">Next</button>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Select Metal
                </div>
                <div class="panel-body" id="panelMetal">
                    <div class="list-group">
                        <button type="button" class="list-group-item" id="aluminium">Aluminium <span class="pull-right"> 15$ </span></button>
                        <button type="button" class="list-group-item" id="steel">Steel<span class="pull-right"> 10$ </span></button>
                        <button type="button" class="list-group-item" id="copper">Copper<span class="pull-right"> 7$ </span></button>
                    </div>
<!--                    Quantity (between 1 and 5):-->
<!--                    <input type="number" name="quantity" min="1" max="5">-->
                    <button type="button" class="btn btn-default" id="showShape">Previous</button>
                    <button type="button" class="btn btn-success" id="showCoating">Next</button>
                </div>

            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Select Coating
                </div>
                <div class="panel-body" id="panelCoating">
                    <div class="list-group">
                        <button type="button" class="list-group-item" id="gold">Gold <span class="pull-right"> 25$ </span></button>
                        <button type="button" class="list-group-item" id="silver">Silver <span class="pull-right"> 20$ </span></button>
                        <button type="button" class="list-group-item" id="bronze">Bronze <span class="pull-right"> 15$ </span></button>
                    </div>
                    <button type="button" class="btn btn-default" id="gobacktoMetal">Previous</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Total Cost</h3>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-6">Shape:</div>
                            <div class="col-md-6" ><div class="pull-right" id="finalShape"></div></div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-4">Metal:</div>
                            <div class="col-md-4" id="finalMetal"></div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <span class="input-group-addon" id="finalMetalPrice">00.00</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-4">Coating:</div>
                            <div class="col-md-4" id="finalCoating"></div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <span class="input-group-addon" id="finalCoatingPrice">00.00</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <label for="basic-url">Your Total</label>
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="total">
                            <span class="input-group-addon">.00</span>
                        </div>
                    </li>
                </ul>
        </div>
    </div>

</div>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script>

    $(document).ready(function(){

        var trophy = {
            metalPrice: 0,
            coatingPrice:0
        };



        $("#panelMetal").slideUp("fast");
        $("#panelCoating").slideUp("fast");
        $("#showMetal").prop('disabled', true);
        $("#showCoating").prop('disabled', true);

        $("#showShape").click(function(){
            $("#panelShape").slideDown("slow");
            $("#panelMetal").slideUp("slow");
            $("#panelCoating").slideUp("slow");
        });
        $("#showMetal").click(function(){
            $("#panelMetal").slideDown("slow");
            $("#panelShape").slideUp("slow");
            $("#panelCoating").slideUp("slow");
        });
        $("#gobacktoMetal").click(function(){
            $("#panelMetal").slideDown("slow");
            $("#panelShape").slideUp("slow");
            $("#panelCoating").slideUp("slow");
        });
        $("#showCoating").click(function(){
            $("#panelShape").slideUp("slow");
            $("#panelMetal").slideUp("slow");
            $("#panelCoating").slideDown("slow");
        });

        $("#sphere").click(function(){
            $("#showMetal").prop('disabled', false);
            $("#finalShape").text("Sphere");
        });
        $("#cylinder").click(function(){
            $("#showMetal").prop('disabled', false);
            $("#finalShape").text("Cylinder");
        });
        $("#cube").click(function(){
            $("#showMetal").prop('disabled', false);
            $("#finalShape").text("Cube");
        });

        $("#aluminium").click(function(){
            $("#showCoating").prop('disabled', false);
            $("#finalMetal").text("Aluminium");
            $("#finalMetalPrice").text("15.00");
            trophy.metalPrice = 15;
            updatetotal();
        });
        $("#copper").click(function(){
            $("#showCoating").prop('disabled', false);
            $("#finalMetal").text("Copper");
            $("#finalMetalPrice").text("7.00");
            trophy.metalPrice = 7;
            updatetotal();
        });
        $("#steel").click(function(){
            $("#showCoating").prop('disabled', false);
            $("#finalMetal").text("Steel");
            $("#finalMetalPrice").text("10.00");
            trophy.metalPrice = 10;
            updatetotal();
        });

        $("#gold").click(function(){
            $("#finalCoating").text("Gold");
            $("#finalCoatingPrice").text("25.00");
            trophy.coatingPrice = 25;
            updatetotal();
        });
        $("#silver").click(function(){
            $("#finalCoating").text("Silver");
            $("#finalCoatingPrice").text("20.00");
            trophy.coatingPrice = 20;
            updatetotal();
        });
        $("#bronze").click(function(){
            $("#finalCoating").text("Bronze");
            $("#finalCoatingPrice").text("15.00");
            trophy.coatingPrice = 15;
            updatetotal();
        });

        updatetotal = function(){
            $("#total").val(trophy.coatingPrice + trophy.metalPrice);
        }
    });

</script>

</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: Tahaa Karim
 * Date: 30/12/15
 * Time: 8:29 PM
 */


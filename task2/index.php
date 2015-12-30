<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Interleaving String Check</title>

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
        margin-top: 100px;
    }
</style>

<body>


<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">

        <div id="alert">
        </div>


            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">A</span>
                    <input type="text" class="form-control" id="a" placeholder="Enter Value of A">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">B</span>
                    <input type="text" class="form-control" id="b" placeholder="Enter Value of B">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">C</span>
                    <input type="text" class="form-control" id="c" placeholder="Enter Value of C">
                </div>
            </div>
            <button type="submit" class="btn btn-default btn-block" id="result">Check Result</button>

    </div>
    <div class="col-md-4"></div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script>

    $(document).ready(function(){

        $("#result").click(function(){
            if($("#a").val()=="" || $("#c").val()=="" || $("#b").val()==""){
                $("#alert").html('<div class="alert alert-danger" role="alert"> Empty Input</div>');
            }else{

                if(checkresult()){
                    $("#alert").html('<div class="alert alert-success" role="alert"> C is an interleaving of A and B </div>');
                }
                else{
                    $("#alert").html('<div class="alert alert-danger" role="alert"> C is not an interleaving of A and B</div>');
                }

            }
        });

        checkresult = function(){
            var A = $("#a").val();
            var B = $("#b").val();
            var C = $("#c").val();
            //var res = [];

            var res = new Array($("#a").val().length+1);
            for (var i = 0; i <= $("#a").val().length+1; i++) {
                res[i] = new Array($("#b").val().length);
            }


            for (var i=0; i<=$("#a").val().length; ++i) {
                for (var j = 0; j <= $("#b").val().length; ++j) {
                    res[i][j] = 0;
                }
            }


            console.log()
            if ( ($("#a").val().length + $("#b").val().length) != $("#c").val().length){
                return false;
            }
            for (var i=0; i<=$("#a").val().length; ++i)
            {
                for (var j=0; j<=$("#b").val().length; ++j)
                {
                    // two empty strings have an empty string
                    // as interleaving
                    if (i==0 && j==0)
                        res[i][j] = true;

                    // A is empty
                    else if (i==0 && B[j-1]==C[j-1])
                        res[i][j] = res[i][j-1];

                    // B is empty
                    else if (j==0 && A[i-1]==C[i-1])
                        res[i][j] = res[i-1][j];

                    // Current character of C matches with current character of A,
                    // but doesn't match with current character of B
                    else if(A[i-1]==C[i+j-1] && B[j-1]!=C[i+j-1])
                        res[i][j] = res[i-1][j];

                    // Current character of C matches with current character of B,
                    // but doesn't match with current character of A
                    else if (A[i-1]!=C[i+j-1] && B[j-1]==C[i+j-1])
                        res[i][j] = res[i][j-1];

                    // Current character of C matches with that of both A and B
                    else if (A[i-1]==C[i+j-1] && B[j-1]==C[i+j-1])
                        res[i][j]=(res[i-1][j] || res[i][j-1]) ;
                }
            }

            return res[$("#a").val().length][$("#b").val().length];
        };

    });

</script>
</body>
</html>


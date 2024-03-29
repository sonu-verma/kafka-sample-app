<!DOCTYPE html>
<html>
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>

    <head>
        <style>
            table{
                height: 20px;
                width: 100%;
                padding: 1px 1px 1px 1px;
            }
            table{
                border: 2px solid gray;
            }

            table td{       
                border: 2px solid #65646E;
            }
        </style>
    </head>

<body>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
<div class="container">

    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Sign Up</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="/accounts/login/">Sign In   sdfdf</a></div>
            </div>
            <div class="panel-body" >
                <form method="post" class="form">

                    <form  class="form-horizontal" method="post" >

                        <div id="div_id_username" class="form-group required">
                            <label for="id_username" class="control-label col-md-4  requiredField"> Username<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md  textinput textInput form-control" id="id_username" maxlength="30" name="username" placeholder="Choose your username" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>
                        <div id="div_id_email" class="form-group required">
                            <label for="id_email" class="control-label col-md-4  requiredField"> E-mail<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md emailinput form-control" id="id_email" name="email" placeholder="Your current email address" style="margin-bottom: 10px" type="email" />
                            </div>
                        </div>
                        <div id="div_id_password1" class="form-group required">
                            <label for="id_password1" class="control-label col-md-4  requiredField">Password<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md textinput textInput form-control" id="id_password1" name="password1" placeholder="Create a password" style="margin-bottom: 10px" type="password" />
                            </div>
                        </div>
                        <div id="div_id_password2" class="form-group required">
                            <label for="id_password2" class="control-label col-md-4  requiredField"> Re:password<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md textinput textInput form-control" id="id_password2" name="password2" placeholder="Confirm your password" style="margin-bottom: 10px" type="password" />
                            </div>
                        </div>
                        <div id="div_id_name" class="form-group required">
                            <label for="id_name" class="control-label col-md-4  requiredField"> full name<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md textinput textInput form-control" id="id_name" name="name" placeholder="Your Frist name and Last name" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>
                        <div id="div_id_gender" class="form-group required">
                            <label for="id_gender"  class="control-label col-md-4  requiredField"> Gender<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "  style="margin-bottom: 10px">
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="id_gender_1" value="M"  style="margin-bottom: 10px">Male
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="id_gender_2" value="F"  style="margin-bottom: 10px">Female
                                </label>
                            </div>
                        </div>
                        <div id="div_id_company" class="form-group required">
                            <label for="id_company" class="control-label col-md-4  requiredField"> company name<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md textinput textInput form-control" id="id_company" name="company" placeholder="your company name" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="aab controls col-md-4 "></div>
                            <div class="controls col-md-8 ">
                                <input type="submit" name="Signup" value="Signup" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                            </div>
                        </div>

                    </form>

                </form>
            </div>
        </div>
    </div>
</div>

<?php
$redisObj = new Redis();

function openRedisConnection( $hostName, $port){
    global $redisObj;
    // Opening a redis connection
    $redisObj->connect( $hostName, $port );
    return $redisObj;
}

function setValueWithTtl( $key, $value, $ttl ){

    try{
        global $redisObj;
        // setting the value in redis
        $redisObj->setex( $key, $ttl, $value );
    }catch( Exception $e ){
        echo $e->getMessage();
    }
}

function getValueFromKey( $key ){
    try{
        global $redisObj;
        // getting the value from redis
        return $redisObj->get( $key);
    }catch( Exception $e ){
        echo $e->getMessage();
    }
}

function deleteValueFromKey( $key ){
    try{
        global $redisObj;
        // deleting the value from redis
        $redisObj->del( $key);
    }catch( Exception $e ){
        echo $e->getMessage();
    }
}

/* Functions for converting sql result  object to array goes below  */

function convertToArray( $result ){
    $resultArray = array();

    for( $count=0; $row = $result->fetch_assoc(); $count++ ) {
        $resultArray[$count] = $row;
    }

    return $resultArray;
}


// Opening a redis connection
openRedisConnection( 'localhost', 6379 );

// Fetching value from redis using the key.
//$val = getValueFromKey( 'users_rajendra' );
$allKeys = $redisObj->keys('*');
if(count($allKeys) > 0){
    echo "<table>";
    foreach($allKeys as $key=>$value){

        $val = getValueFromKey( $value );
        $someArray = json_decode($val, true);
        echo '<tr>';
        echo '<td>'.$someArray['name'].'<td>';
        echo '<td>'.$someArray['email'].'<td>';
        echo '<td>'.$someArray['password1'].'<td>';
        echo '<td>'.$someArray['gender'].'<td>';
        echo '<td>'.$someArray['username'].'<td>';
        echo '<td>'.$someArray['company'].'<td>';
        echo '</tr>';
    }
    echo "</table>";
}

?>

<script>
    $(function () {

        $('form').on('submit', function (e) {

            e.preventDefault();
            $.ajax({
                crossOrigin: true,
                dataType: 'json',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                url: 'http://127.0.0.1:3000/save',
                data: $('form').serialize(),
                success: function (data) {
                    console.log(data);
                    alert('form was submitted');
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                }
            });

        });

    });
</script>


</body>
</html>

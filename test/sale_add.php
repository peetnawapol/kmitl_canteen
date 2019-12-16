<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Shop</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-12 ">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <h1>Register Shop</h1>
                    <form id="commentForm" action="saleadd_script.php" method="post">
                        <!-- Material input -->
                        <div class="row">

                            <!--First Name-->
                            <div class="col-md-6">
                                <div class="md-form ">
                                    <i class="fas fa-user prefix"></i>
                                    <input type="text" id="idFirstname" class="form-control" name="f_name">
                                    <label for="idFirstname">First Name</label>
                                </div>
                            </div>

                            <!--Last Name-->
                            <div class="col-md-6">
                                <div class="md-form ">
                                    <input type="text" id="idLastname" class="form-control" name="l_name">
                                    <label for="idLastname">Last Name</label>
                                </div>
                            </div>
                        </div>

                        <!--People Card ID & Shop Name-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form">
                                    <i class="fas fa-user-tag prefix"></i>
                                    <input type="text" id="idStd" class="form-control" name="user">
                                    <label for="idStd" >Username</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="md-form">
                                    <i class="fas fa-store prefix"></i>
                                    <input type="text" id="idFaculty" class="form-control" name="shop_name">
                                    <label for="idFaculty">Shop Name</label>
                                </div>
                            </div>
                        </div>

                        <div class="md-form">
                                <i class="fas fa-key prefix"></i>
                                <input type="text" id="idPhone" class="form-control" name="password">
                                <label for="idPhone">Password</label>
                        </div>


                        <input id="commentBtn" type="submit" class="btn btn-outline-elegant btn-rounded waves-effect"
                            value="Add">
                    </form>
                </div>
            </div>




            <script>
                
            </script>
            <!-- JQuery -->
            <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <!-- Bootstrap tooltips -->
            <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
            <!-- Bootstrap core JavaScript -->
            <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <!-- MDB core JavaScript -->
            <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>
</body>

</html>
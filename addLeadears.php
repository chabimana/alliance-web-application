<body class="hold-transition skin-blue fixed layout-top-nav">
    <div class="wrapper">
<?php
// include database and model files
include_once 'config/database.php';
include_once 'model/leader.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to objects
$leader = new leader($db);

// set page headers
$page_title = "register leader";
include 'common/header.php';

?>
<?php 
// if the form was submitted 
if($_POST){
 if (count($_FILES) > 0) {
    if (isset($_FILES['image'])) {
    $leader->position = $_POST['position'];
    $leader->email = $_POST['email'];
    $leader->names = $_POST['names'];
    $leader->image = fopen($_FILES['image']['tmp_name'], 'rb');

    if($leader->addleaders()){
        echo "<div class='alert alert-success'>leader created successful.</div>";
    }
 
    else{
        echo "<div class='alert alert-danger'>Unable to create leader.</div>";
    }
}
}
}
?>
    
        <div class="content-wrapper">
            <div class="container">
                
                <section class="content-header">
                    <h1>
                        Content<small>MIS</small>
                    </h1>
                </section>
               
            <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Leader's Information</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form"  action="" enctype="multipart/form-data"
                            method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Full Name</label> <input
                                        type="text" class="form-control" id="exampleInputPassword1"
                                        placeholder="enter full name" name="names" /> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label> <input
                                        type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter email" name="email" /> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Leader's Position</label> <input
                                        type="text" class="form-control" placeholder="ex: President"
                                       name="position" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Image input</label> <input
                                        type="file" name="image" />
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>  
</body>
</html>

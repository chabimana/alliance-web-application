<body class="hold-transition skin-blue fixed layout-top-nav">
    <div class="wrapper">
<?php
// include database and model files
include_once 'config/database.php';
include_once 'model/program.php';
include_once 'model/Icons.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to objects
$program = new Program($db);
$icons = new Icons($db);
// set page headers
$page_title = "register program";
include 'common/header.php';

?>
<?php 
// if the form was submitted 
if($_POST){
 
    
    $program->title = $_POST['title'];
    $program->content = $_POST['content'];
    $program->iconsid = $_POST['iconsid'];
 
  
    if($program->createProgram()){
        echo "<div class='alert alert-success'>program created successful.</div>";
    }
 
    else{
        echo "<div class='alert alert-danger'>Unable to create program.</div>";
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
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            Program Details <small>Tile and Content</small>
                        </h3>
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-default btn-sm"
                                data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <form  action="" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    placeholder="Enter Title" name="title" />
                            </div>
                            <div class="form-group">
                                <label for="hospitalname" class="col-sm-2 control-label">Icons
                                </label> <?php 
                                $stmt = $icons->read();
                                echo "<select class='form-control' name='iconsid'>";
                             echo "<option>Select Icons...</option>";
 
                              while ($row_icon = $stmt->fetch(PDO::FETCH_ASSOC)){
                           extract($row_icon);
                            echo "<option value='{$id}'>{$icon_desc}</option>";
                             }
                            echo "</select>";
                            ?>
                            </div>
                            <textarea class="textarea" placeholder="enter content" name="content" 
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            <div class="form-group">
                                <input type="submit" value="Save"
                                    class="btn btn-primary py-3 px-5" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</body>
</html>

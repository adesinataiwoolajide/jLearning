<?php 
    include_once("header.php");
    include_once("sidebar.php");
?>
<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Department
                <small class="text-muted">Welcome to JLearning</small>
                </h2>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
               
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="./"><i class="zmdi zmdi-home"></i> Jlearning</a></li>
                    <li class="breadcrumb-item"><a href="departments.php">Department</a></li>
                    <li class="breadcrumb-item active">Adding New Department</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Department</strong> Form <small>Please fill the below form to add a new department...</small> </h2>
                        
                    </div>
                    <div class="body">
                        <form class="form-horizontal" action="process-dept.php" method="POST"  enctype="multipart/form-data">
                            <div class="row clearfix">
                            
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Department Name" name="dept_name" required>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block text-uppercase" name="add_dept">ADD DEPARTMENT</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
        <div class="col-md-12">
                <div class="card student-list">
                    <div class="header">
                        <h2><strong>Department</strong> List</h2>
                       
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover m-b-0">
                                <thead>
                                    <tr>                                       
                                        <th>S/N</th>
                                        <th>Department Name</th>
                                        
                                    </tr>
                                </thead>
                                <tbody><?php
                                    $num =1;
                                    foreach(getAllDept() as $dept){?>
                                        <tr>
                                            
                                            <td><?php echo $num; ?>
                                                <a href="edit-department.php?dept_id=<?php echo $dept['dept_id'] ?>"
                                                class="btn btn-primary"><i class="fa fa-pencil"></i>Edit</a>
                                                <a href="delete-department.php?dept_id=<?php echo $dept['dept_id'] ?>" class="btn btn-danger" ><i class="fa fa-trash-o"></i>Delete</a>
                                            </td>
                                            <td><?php echo ucwords($dept['dept_name']) ?></td>
                                        
                                        </tr><?php
                                        $num++;
                                    } ?> 

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
</section>
<?php 
    include_once("footer.php")
?>
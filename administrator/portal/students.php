<?php 
    include_once("header.php");
    include_once("sidebar.php");
?>
<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Stdent Information
                <small class="text-muted">Welcome to Jlearning</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-white btn-icon btn-round float-right m-l-10" type="button">
                    <i class="zmdi zmdi-plus"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="./"><i class="zmdi zmdi-home"></i> Jlearning</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Student</a></li>
                    <li class="breadcrumb-item active">Add</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Basic</strong> Information <small>Description text here...</small> </h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right slideUp">
                                    <li><a href="javascript:void(0);" class="waves-effect waves-block">Action</a></li>
                                    <li><a href="javascript:void(0);" class="waves-effect waves-block">Another action</a></li>
                                    <li><a href="javascript:void(0);" class="waves-effect waves-block">Something else</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <form action="process-student.php" method="POST" enctype="multipart/form-data">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="file" id="roundText" class="form-control round" name="file" required>
                                </div>
                            </div>
                            
                             <div class="col-lg-12 col-md-6 col-sm-12">
                                <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="add-student">UPLOAD THE STUDENTS RECORD</button>
                                </div>
                            </div>
                            
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card student-list">
                    
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover m-b-0">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Matric</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Level</th>
                                    <th>Program</th>
                                </tr>
                            </thead>
                            <tbody><?php 
                                $num =1;
                               
                                foreach(getAllstudents() as $students){ ?>

                                    <tr>
                                        <td><?php echo $num; ?>
                                        <a href="delete-student.php?matric_number=<?php echo $students['matric_number'] ?>" class="btn btn-danger" 
                                            ><i class="fa fa-trash-o"></i>Edit</a>
                                        </td>
                                        <td><?php echo $students['student_name']; ?></td>
                                        <td><?php echo $students['matric_number']; ?></td>
                                        <td><?php echo $students['student_email']; ?></td>
                                        <td><?php echo $students['phone_number']; ?></td>
                                        <td><?php echo $students['level']; ?></td>
                                        <td><?php echo $students['program']; ?></td>
                                        
                                    </tr><?php 
                                    $num++;
                                }
                            ?>
                                
                                
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="body">                            
                        <ul class="pagination pagination-primary m-b-0">
                            <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="zmdi zmdi-arrow-left"></i></a></li>
                            <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="zmdi zmdi-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<?php 
    include_once("footer.php")
?>
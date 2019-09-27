<?php 
    include_once("header.php");
    include_once("sidebar.php");
?>
<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Course Info
                <small class="text-muted">Welcome to Jlearning</small>
                </h2>
            </div>
            <div class="col-lg-12 col-md-6 col-sm-12">
                <button class="btn btn-white btn-icon btn-round float-right m-l-10" type="button">
                    <i class="zmdi zmdi-plus"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="./"><i class="zmdi zmdi-home"></i> Jlearning</a></li>
                    <li class="breadcrumb-item"><a href="courses.php">Courses</a></li>
                    <li class="breadcrumb-item active">Add Course</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid"><?php
        if($role == 'Admin'){ ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Departmental</strong> Course <small>Please fill the below form to add course to department...</small> </h2>
                            
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="process-course.php" method="POST"  enctype="multipart/form-data">
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="file" class="form-control" placeholder="Course File" name="file" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Course Title" name="course_title" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" class=" form-control" placeholder="Course Code" name="course_code" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Course Unit" name="course_unit" required>
                                        </div>
                                    </div>
                                
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <select class="form-control" name="status" required>
                                                <option> -- Select The Status -- </option>
                                                <option></option><?php
                                                $status = array('Compulsory', 'Required', 'Elective'); 
                                                foreach($status as $positions){ ?>
                                                    <option value="<?php echo $positions ?>"> <?php echo $positions ?>  </option><?php
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <select  class="form-control" name="dept_id" required>
                                                <option> -- Select The Department -- </option>
                                                <option></option><?php
                                            
                                            foreach(getAllDept() as $dept){?>
                                                    <option value="<?php echo $dept['dept_id'] ?>"> <?php echo $dept['dept_name'] ?>  </option><?php
                                                } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block" name="add-course">ADD THE COURSE</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div><?php 
        } ?>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card student-list">
                   
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover m-b-0">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>File </td>
                                    <th>Course Title</th>
                                    <th>Course Code</th>
                                    <th>Course Unit</th>
                                    <th>Course Status</th>
                                    <th>Dept</th>
                                </tr>
                            </thead>
                            <tbody><?php
                                $num =1;
                                if($role == 'Admin'){
                                    foreach(getAllCourses() as $courses){?>
                                        <tr>
                                            <td><?php echo $num; 
                                                if($role == 'Admin'){ ?>
                                                    <a href="delete-course.php?course_code=<?php echo $courses['course_code'] ?>" 
                                                    class="btn btn-danger" onclick="return(confirmToDelete());"><i class="fa fa-trash-o"></i>Delete</a>
                                                    <a href="edit-course.php?course_id=<?php echo $courses['course_id'] ?>" class="btn btn-success" 
                                                    onclick="return(confirmToEdit());"><i class="fa fa-pencil"></i>Edit </a><?php 
                                                } ?>
                                            
                                            </td>
                                            <td><a href="<?php echo '../../course_file/'.$courses['course_file'] ?>"
                                                        target="_blank" class="btn btn-success">
                                                    <i class="fa fa-download"></i>Download
                                                </a>
                                            </td>
                                            <td><?php echo $courses['course_title'] ?></td>
                                            <td><?php echo $courses['course_code'] ?></td>
                                            <td><?php echo $courses['course_unit'] ?></td>
                                            <td><?php echo $courses['course_status'] ?></td>
                                            <td><?php 
                                                $depo = $courses['dept_id'];
                                                $deed = getSingleDepo($depo);
                                                echo $deed['dept_name'] ?>
                                            </td>
                                            
                                        </tr><?php 
                                        $num++;
                                    }
                                }else{

                                    $email = $_SESSION['user_name'];
                                    $depting = getSingleStudentEmail($email);
                                    
                                    foreach(getSingleDeptCourseList($depting['dept_id']) as $courses){?>
                                        <tr>
                                            <td><?php echo $num; 
                                                ?>
                                            
                                            </td>
                                            <td><a href="<?php echo '../../course_file/'.$courses['course_file'] ?>"
                                                        target="_blank" class="btn btn-success">
                                                    <i class="fa fa-download"></i>Download
                                                </a>
                                            </td>
                                            <td><?php echo $courses['course_title'] ?></td>
                                            <td><?php echo $courses['course_code'] ?></td>
                                            <td><?php echo $courses['course_unit'] ?></td>
                                            <td><?php echo $courses['course_status'] ?></td>
                                            <td><?php 
                                                $depo = $courses['dept_id'];
                                                $deed = getSingleDepo($depo);
                                                echo $deed['dept_name'] ?>
                                            </td>
                                            
                                        </tr><?php 
                                        $num++;
                                    }
                                } ?>
                                
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
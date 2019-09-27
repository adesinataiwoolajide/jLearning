<?php 
    include_once("header.php");
    include_once("sidebar.php");
    $user_id = $_GET['user_id'];
    $data = getSingleUserId($user_id);
?>
<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Edit Student
                <small class="text-muted">Welcome to Jlearning</small>
                </h2>
            </div>
            <div class="col-lg-12 col-md-6 col-sm-12">
                <button class="btn btn-white btn-icon btn-round float-right m-l-10" type="button">
                    <i class="zmdi zmdi-plus"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="./"><i class="zmdi zmdi-home"></i> JLearning</a></li>
                    <li class="breadcrumb-item"><a href="edit-user.php?user_id=<?php echo $user_id ?>">Edit User</a></li>
                    <li class="breadcrumb-item"><a href="users.php">User</a></li>
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
                        <h2><strong>System</strong> Administrator <small>Please Fill the below for to update Admin...</small> </h2>
                        
                    </div>
                    <div class="body">
                        <form class="form-horizontal" action="update_user.php" method="POST"  enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Username" name="email" required 
                                        value="<?php echo $data['email'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name" name="name" required
                                        value="<?php echo $data['name'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Enter Password" name="password">
                                    </div>
                                </div>

                                <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                

                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block text-uppercase" name="update_user">UPDATE 
                                        USER</button>
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
                        <h2><strong>Admin</strong> List</h2>
                        
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover m-b-0">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody><?php
                                    $num =1;
                                    foreach(getAllUser() as $users){?>
                                        <tr>
                                            <td><?php echo $num; ?>
                                            
                                                <a href="delete-user.php?email=<?php echo $users['email'] ?>" class="btn btn-danger" 
                                                ><i class="fa fa-trash-o"></i>Delete</a>
                                                <a href="edit-user.php?email=<?php echo $users['email'] ?>" class="btn btn-success" 
                                               ><i class="fa fa-pencil"></i>Edit</a>
                                    
                                            </td>
                                            <td><?php echo $users['name'] ?></td>
                                            <td><?php echo $users['email'] ?></td>
                                            <td><?php echo $users['role'] ?></td>
                                            
                                        </tr>
                                    <?php
                                    $num++;
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
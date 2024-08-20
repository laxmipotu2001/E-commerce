<?php
session_start();
$con=mysqli_connect("localhost","root","","task");
if(($_SESSION['admin'])==null)
{
  header("location:adminlogin.php");
}
else
{
  if(isset($_POST['btn']))
  {
      $imgname=$_FILES['images']['name'];
      $imgsize=$_FILES['images']['size'];
      $imgtype=$_FILES['images']['type'];
      $filecount=count($_FILES['images']['name']);
      $imgarr=array();
      $pname=$_POST['pname'];
      $cate=$_POST['cate'];
      $price=$_POST['price'];
      $description=$_POST['description'];
      for($i=0; $i<$filecount;$i++)
      {
        move_uploaded_file($_FILES['images']['tmp_name'][$i], "../images/".$_FILES['images']['name'][$i]);
        array_push($imgarr,$_FILES['images']['name'][$i]);
      }
      $path=implode(",", $imgarr);
      $sql="insert into product(img,pname,price,category,details) values('$path','$pname','$price','$cate','$description')";
       if(mysqli_query($con,$sql))
       {
        header("location:mdi.php");
       }
       else
       {
        mysqli_error($con);
       }

  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>MULTISHOP Admin</title>
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
          <a class="sidebar-brand brand-logo" href="../../index.php"><img src="../../assets/images/logo.png" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="../../index.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <?php
              $con=mysqli_connect("localhost","root","","task");
              $email=$_SESSION['admin'];
              $sql="select * from admin_reg where email='$email'";
              $rs=mysqli_query($con,$sql);
              while($rw=mysqli_fetch_row($rs))
              {
                $username=$rw[1];
                $img=$rw[4];
              } 
        ?>
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="../../assets/images/<?php echo $img;?>" alt="profile" />
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column pr-3">
                <span class="font-weight-medium mb-2"><?php echo $username;?></span>
                <!-- <span class="font-weight-normal">$8,753.00</span> -->
              </div>
              <span class="badge badge-danger text-white ml-3 rounded">3</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../index.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              <span class="menu-title">Basic UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                </li>
              </ul>
            </div>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="./mdi.php">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Products</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="pages/forms/basic_elements.html">
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              <span class="menu-title">Forms</span>
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="../charts/chartjs.php">
              <i class="mdi mdi-chart-bar menu-icon"></i>
              <span class="menu-title">Category</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../order_detail.php">
              <i class="mdi mdi-table-large menu-icon"></i>
              <span class="menu-title">Order Details</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../customer_detail.php">
              <i class="mdi mdi-table-large menu-icon"></i>
              <span class="menu-title">Customer Details</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../feedback.php">
              <i class="mdi mdi-table-large menu-icon"></i>
              <span class="menu-title">Feedbacks</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <span class="nav-link" href="#">
              <span class="menu-title">Docs</span>
            </span>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link" href="https://www.bootstrapdash.com/demo/breeze-free/documentation/documentation.html">
              <i class="mdi mdi-file-document-box menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li> -->
          <li class="nav-item sidebar-actions">
            <div class="nav-link">
              <div class="mt-4">
                <div class="border-none">
                  <p class="text-black">Notification</p>
                </div>
                <ul class="mt-4 pl-0">
                    <li><a href="adminlogout.php">Sign Out</a></li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
      </nav>
      <div class="container-fluid page-body-wrapper">
        <!-- <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles light"></div>
            <div class="tiles dark"></div>
          </div>
        </div> -->
        <nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
            <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="../../index.php"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
            <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
              <i class="mdi mdi-menu"></i>
            </button>
            <!-- <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell-outline"></i>
                  <span class="count count-varient1">7</span>
                </a>
                <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../assets/images/faces/face4.jpg" alt="" class="profile-pic" />
                    </div>
                    <div class="preview-item-content">
                      <p class="mb-0"> Dany Miles <span class="text-small text-muted">commented on your photo</span>
                      </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../assets/images/faces/face3.jpg" alt="" class="profile-pic" />
                    </div>
                    <div class="preview-item-content">
                      <p class="mb-0"> James <span class="text-small text-muted">posted a photo on your wall</span>
                      </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../assets/images/faces/face2.jpg" alt="" class="profile-pic" />
                    </div>
                    <div class="preview-item-content">
                      <p class="mb-0"> Alex <span class="text-small text-muted">just mentioned you in his post</span>
                      </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0">View all activities</p>
                </div>
              </li>
              <li class="nav-item dropdown d-none d-sm-flex">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-email-outline"></i>
                  <span class="count count-varient2">5</span>
                </a>
                <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow">
                      <span class="badge badge-pill badge-success">Request</span>
                      <p class="text-small text-muted ellipsis mb-0"> Suport needed for user123 </p>
                    </div>
                    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow">
                      <span class="badge badge-pill badge-warning">Invoices</span>
                      <p class="text-small text-muted ellipsis mb-0"> Invoice for order is mailed </p>
                    </div>
                    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow">
                      <span class="badge badge-pill badge-danger">Projects</span>
                      <p class="text-small text-muted ellipsis mb-0"> New project will start tomorrow </p>
                    </div>
                    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                  </a>
                  <h6 class="p-3 mb-0">See all activity</h6>
                </div>
              </li>
              <li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
                <form class="nav-link form-inline mt-2 mt-md-0">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-magnify"></i>
                      </span>
                    </div>
                  </div>
                </form>
              </li>
            </ul> -->
            <ul class="navbar-nav navbar-nav-right ml-lg-auto">
              <!-- <li class="nav-item dropdown d-none d-xl-flex border-0">
                <a class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-earth"></i> English </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                  <a class="dropdown-item" href="#"> French </a>
                  <a class="dropdown-item" href="#"> Spain </a>
                  <a class="dropdown-item" href="#"> Latin </a>
                  <a class="dropdown-item" href="#"> Japanese </a>
                </div>
              </li> -->
              <li class="nav-item nav-profile dropdown border-0">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                  <img class="nav-profile-img mr-2" alt="" src="../../assets/images/<?php echo $img;?>" />
                  <span class="profile-name"><?php echo $username;?></span>
                </a>
                <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                  <!-- <a class="dropdown-item" href="#">
                    <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a> -->
                  <a class="dropdown-item" href="../../adminlogout.php">
                    <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">MULTISHOP Products</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Icons</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Material design icons </li>
                </ol>
              </nav>
            </div>
            <div class="template-demo" style="text-align: right; margin-right: 30px;">
            <button type="button" class="btn btn-primary"><a href="addprod.php" style="text-decoration: none; color:black;"> ADD PRODUCT</a> </button>
          </div>
        <!-- Start product froms -->
            <!-- <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card" style="height: 570px;">
                  <div class="card-body">
                    <h4 class="card-title">Product form</h4>
                    <p class="card-description">Add products</p>
                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Product Image</label>
                        <input type="file" class="form-control" id="exampleInputUsername1" placeholder="Username" name="images[]" multiple />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Product Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Product Name" name="pname" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Category</label>
                        <select name="cate" class='form-control' id='exampleInputConfirmPassword1'>
                          <option>Select Category Name..</option>
                          <?php
                          $con=mysqli_connect("localhost","root","","task");
                          $sql="select * from category";
                          $rs=mysqli_query($con,$sql);
                          while($rw=mysqli_fetch_row($rs))
                          {
                            echo "<option value=$rw[0]>$rw[1]</option>";
                           }
                           echo "</select>";
                          ?> -->
                          <!-- <input type="text" class='form-control' id='exampleInputConfirmPassword1' placeholder="Password" /> -->
                        
                     <!--  </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Product Price</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="price"placeholder="Price" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Product Description</label>
                        <textarea type="number" class="form-control" id="exampleInputPassword1" name="description" placeholder="description"></textarea>
                      </div> -->

                      <!-- <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password" />
                      </div> -->
                      <!-- <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" /> Remember me </label>
                      </div> -->
                      <!-- <button type="submit" class="btn btn-primary mr-2" name="btn"> Submit </button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div> -->
              <div class="col-md-6 grid-margin stretch-card">

                <!-- <div class="card"> -->
                  <!-- <div class="card-body"> -->
                   <!--  <h4 class="card-title">Select category</h4>
                    <p class="card-description">Display Table</p>
                    <form class="forms-sample"> -->
                     <!--  <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">category</label>
                        <div class="col-sm-9">
                          <select type="text" class="form-control" id="exampleInputUsername2" placeholder="Username" />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email" />
                        </div>
                      </div> -->
                    <!--   <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number" />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" />
                        </div>
                      </div> -->
                     <!--  <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="exampleInputConfirmPassword2" placeholder="Password" />
                        </div>
                      </div>
                      <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" /> Remember me </label>
                      </div> -->
                      <!-- <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                      <button class="btn btn-light">Cancel</button> -->
                    <!-- </form>
                  </div> -->
                <!-- </div> -->
              <!-- </div> -->
            </div>
          <!-- End product forms -->
          <!-- start product table -->
            <div class="row">
              <div class="col-lg-12 grid-margin">
                <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Product Table</h4>
                    <p class="card-description">Product Details Here...
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Product ID</th>
                            <th>Images</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Update</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $con=mysqli_connect("localhost","root","","task");
                            $sql="select * from product";
                            $rs=mysqli_query($con,$sql);
                            while($rw=mysqli_fetch_row($rs))
                            {
                              $img=$rw[1];
                              $sizemulti = explode(',', $img);
                              $count=sizeof($sizemulti);
                              echo "<tr>";
                              echo "<td>$rw[0]</td>";
                              echo "<td>";
                              for ($i=0;$i<$count;$i++)
                              {
                                  echo "<img src='../images/$sizemulti[$i]' style='height:50px !important; width:50px !important;'>";
                              }
                              echo "</td>";
                              echo "<td>$rw[2]</td>";
                              echo "<td>Rs.$rw[3]</td>";
                              echo "<td>$rw[4]</td>";
                              echo "<td>$rw[5]</td>";
                              echo "<td><a href='pupdate.php?id=$rw[0]'>UPDATE</a></td>";
                              echo "<td><a href='pdelete.php?id=$rw[0]'>Delete</a></td>";
                              echo "</tr>";
                            }
                          ?>
                        <!--   <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />
                            </td>
                            <td>Herman Beck</td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>$ 77.99</td>
                            <td>May 15, 2015</td>
                          </tr> -->
                          <!-- <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-2.png" alt="image" />
                            </td>
                            <td>Messsy Adam</td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>$245.30</td>
                            <td>July 1, 2015</td>
                          </tr> -->
                          <!-- <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-3.png" alt="image" />
                            </td>
                            <td>John Richards</td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>$138.00</td>
                            <td>Apr 12, 2015</td>
                          </tr> -->
                          <!-- <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-4.png" alt="image" />
                            </td>
                            <td>Peter Meggik</td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>$ 77.99</td>
                            <td>May 15, 2015</td>
                          </tr> -->
                          <!-- <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />
                            </td>
                            <td>Edward</td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>$ 160.25</td>
                            <td>May 03, 2015</td>
                          </tr> -->
                          <!-- <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-2.png" alt="image" />
                            </td>
                            <td>John Doe</td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>$ 123.21</td>
                            <td>April 05, 2015</td>
                          </tr> -->
                          <!-- <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-3.png" alt="image" />
                            </td>
                            <td>Henry Tom</td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>$ 150.00</td>
                            <td>June 16, 2015</td>
                          </tr> -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="template-demo" style="text-align: right;">
                      <button type="button" class="btn btn-primary"><a href="export.php" style="text-decoration: none; color:black;"> Export Data </a> </button>
                      <button type="button" class="btn btn-primary"><a href="import.php" style="text-decoration: none; color:black;"> Import Data </a> </button>
              </div>

                      
              <div>
                <form action="" method="post" enctype="multipart/form-data">
                </form>
              </div>
            <!-- Product table end -->
                <!-- <div class="card"> -->
                  <!-- <div class="card-body"> -->
                    <!-- <div class="row icons-list"> -->
                      <!-- <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-access-point"></i> mdi mdi-access-point
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-access-point-network"></i> mdi mdi-access-point-network
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-account-check"></i> mdi mdi-account-check
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-account-circle"></i> mdi mdi-account-circle
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-account-convert"></i> mdi mdi-account-convert
                      </div> -->
                      <!-- <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-account-multiple-minus"></i> mdi mdi-account-multiple-minus
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-account-multiple-outline"></i> mdi mdi-account-multiple-outline
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-account-multiple-plus"></i> mdi mdi-account-multiple-plus
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-account-network"></i> mdi mdi-account-network
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-account-off"></i> mdi mdi-account-off
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-account-outline"></i> mdi mdi-account-outline
                      </div> -->
                      <!-- <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-airplane-off"></i> mdi mdi-airplane-off
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-airplane-takeoff"></i> mdi mdi-airplane-takeoff
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-airplay"></i> mdi mdi-airplay
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-alarm"></i> mdi mdi-alarm
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-alarm-check"></i> mdi mdi-alarm-check
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-alarm-multiple"></i> mdi mdi-alarm-multiple
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-alarm-off"></i> mdi mdi-alarm-off
                      </div> -->
                      <!-- <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-alarm-plus"></i> mdi mdi-alarm-plus
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-album"></i> mdi mdi-albums
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-alert"></i> mdi mdi-alert
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-alert-box"></i> mdi mdi-alert-box
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-alert-circle"></i> mdi mdi-alert-circle
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <i class="mdi mdi-alert-circle-outline"></i> mdi mdi-alert-circle-outline
                      </div>   -->                    
                    <!-- </div> -->
                  <!-- </div> -->
                <!-- </div> -->
              </div>
            </div>
          </div>
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
  </body>
</html>
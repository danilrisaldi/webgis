<?php
include "../../../config/connect.php";

if ($_POST['simpan']=='Simpan') {
      $username = $_POST['username'];
      $password = md5($_POST['password']);
      $email = $_POST['email'];
      $role = $_POST['role'];
      //simpan data ke database
      $sql="insert into user  SET 
              username='$username', password='$password', email='$email'
              ,role='$role'
              ";
      // echo $sql; exit();
      $query=mysqli_query($db,$sql);
      if($query)
      {
          $msg[]='<div class="alert alert-success">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              Data Berhasil Disimpan
                          </div>';
      }
      else{
          $msg[]='<div class="alert alert-danger">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              Data Gagal Disimpan.'.mysqli_error($db).'
                          </div>';
      }
      $_SESSION['msg']=$msg;
      echo "<script>location.href='?p=user';</script>";
}
?>


<h4>Tambah Data user</h4>
<hr>
  <form method="post" class="form-horizontal" action="" enctype="multipart/form-data">
      <input type="hidden" name="id" class="form-control" >
    		<table class="table table-bordered">
                <tr align="left" valign="top" >
                            <td width="18%">Username</td>
                        <td>:</td>
                        <td><input type="text" name="username" class="form-control" ></td>
          				</tr>    
               		              
                        <tr align="left" valign="top" >
                            <td>Password</td>
                        <td>:</td>
                        <td><input type="text" name="password" class="form-control" ></td>
          				</tr>
                  <tr align="left" valign="top" >
                            <td>Email</td>
                        <td>:</td>
                        <td><input type="email" name="email" class="form-control" ></td>
                  </tr>
                  <tr align="left" valign="top" >
                  <td>Role</td>
                        
                        <td>:</td>
                        <td>
                        <input type="radio" name="role" value="admin" class="form-control" >Admin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="role" value="user" class="form-control" >User
                        </td>
                  </tr>
                  
                  <tr align="left" valign="top">
                        <td></td>
                        <td></td>
                        <td>
                        <input type="submit" class="btn btn-primary" value="Simpan" name="simpan" >
                              <a href="aplikasi.php?p=user" class="btn btn-warning">Batal </a>
                        </td>
                  </tr>
                  
           </table>
    </form>
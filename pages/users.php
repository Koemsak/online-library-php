
<?php 
    require_once("database/database.php");
    $users = selectAllUser();
?>
<div class="container p-4">
    <h1 class="display-4 mb-4 text-white">List of all users</h1>
    <div class="table-responsive-xl">
      <table class="table mt-4 table-hover ">
          <thead class="table-primary">
              <tr>
                <th scope="col">ID</th>   
                <th scope="col">Profile</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Role</th>
                <?php if($_SESSION['username'] == "Admin" or $_SESSION['username'] == "admin"): ?>
                <th scope="col">Action</th>
                <?php endif; ?>
              </tr>
          </thead>
          <tbody>
              <?php foreach($users as $user): ?>
                <tr class="table-info">
                  <th class="align-self-center" scope="row"><?=$user['user_id']?></th>
                  <td><img src="images/user/<?=$user['profile']?>" class="rounded-circle" style="width: 40px; height: 40px;"></td>
                  <td class="align-self-center"><?=$user['username']?></td>
                  <td class="align-self-center"><?=$user['email']?></td>
                  <td class="align-self-center"><?=$user['password']?></td>
                  <td class="align-self-center"><?=$user['role']?></td>
                  <?php if($_SESSION['username'] == "Admin" or $_SESSION['username'] == "admin"): ?>
                    <?php if($user['role'] != "Admin"): ?>
                      <td class="align-self-center">
                        <a href="deleteuser.php?id=<?=$user['user_id']?>" class="btn btn-danger">Delete</a>
                      </td>
                    <?php else: ?>
                      <td class="align-self-center"></td>
                    <?php endif; ?>
                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
    </div>
</div>

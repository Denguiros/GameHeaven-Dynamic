
<?php $this->_t = "GameHeaven Admins"
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">All Admins</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>First</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Secret code</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>First</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Secret code</th>
                    <th>Edit</th>
                </tr>
                </tfoot>
                <tbody>
                    <?php
                        foreach($admins as $admin )
                        {

                        
                    ?>
                <tr>
                    <td><?=$admin->admin_firstname?></td>
                    <td><?=$admin->admin_lastname?></td>
                    <td><?=$admin->admin_email?></td>
                    <td><?=$admin->admin_code?></td>
                    <td><button style="width:90%;margin:5%" type="button" onclick="showEditModal('<?=$admin->admin_firstname?>','<?=$admin->admin_lastname?>','<?=$admin->admin_email?>','<?=$admin->admin_code?>','<?=$admin->admin_id?>');"> Edit</button>
                    <?php if($admin->level!=0){
                        ?>
                         <form method="POST" action="">
                            <input type="hidden" name="adminId" value="<?=$admin->admin_id?>">
                            <button style="width:90%;margin:5%" name="removeAdmin" type="submit">Remove Admin</button>
                    </form>
                        
                        <?php
                    } ?>
                   
                   </td>
                </tr>
                        <?php }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>




<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit admin info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
            <form  class="user" method="POST" action="" >

            <input type="hidden" name="adminId" id="adminId">
            <input type="text" class="form-control form-control-user" id="adminFname" placeholder="First Name" name="fname">
            <br>
            <input type="text" class="form-control form-control-user" id="adminLname" placeholder="Last Name" name="lname">
            <br>
            <input type="email" class="form-control form-control-user" id="adminEmail" placeholder="Email" name="email">
            <br>
            <input type="password" class="form-control form-control-user" placeholder="Password" name="pass">
            <br>
            <input type="text" class="form-control form-control-user" id="adminCode" placeholder="Secret Code" name="code">
                


            


      </div>
      <div class="modal-footer">
        <button type="submit" name="editAdmin" class="btn btn-primary">Edit admin</button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script>

    function showEditModal(fn,ln,em,code,id){
        document.getElementById("adminFname").value = fn;
        document.getElementById("adminLname").value = ln;
        document.getElementById("adminEmail").value = em;
        document.getElementById("adminCode").value = code;
        document.getElementById("adminId").value = id;
        $("#editModal").modal("show");

    }


</script>



<!-- Page level plugins -->
<script src="<?=AdminPanel?>views/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?=AdminPanel?>views/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?=AdminPanel?>views/assets/js/demo/datatables-demo.js"></script>
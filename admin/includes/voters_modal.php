  
  
  
  <!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Voter</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_add.php" enctype="multipart/form-data">


                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="firstname" name="firstname" required oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')">
                    </div>
                </div>

                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="lastname" name="lastname" required oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')"> 
                    </div>
                </div>

                <div class="form-group">
                    <label for="year" class="col-sm-3 control-label">Year</label>

                    <div class="col-sm-9">
                    <select class="form-control" id="year" name="year" required>
                <option value="">Select Year</option>
                <option value="1ST">First Year</option>
                <option value="2ND">Second Year</option>
                <option value="3RD">Third Year</option>
                <option value="4TH">Fourth Year</option>
                </select>
                    </div>
                </div>

                <div class="form-group">
                <label for="department" class="col-sm-3 control-label">Department</label>
                <div class="col-sm-9">
                <select class="form-control" id="department" name="department" required>
                <option value="">Select Department</option>
                <option value="BSCS">BSCS</option>
                <option value="BSCRIM">BSCRIM</option>
                <option value="EDUC">EDUC</option>
                <option value="BSBA">BSBA</option>
                <option value="BSA">BSA</option>
                </select>
                </div>
                </div>
                
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="gmail" class="col-sm-3 control-label">Gmail</label>
                  
                  
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="gmail" name="gmail" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" accept="image/*">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Voter</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_edit.php">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_firstname" name="firstname" required oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-3 control-label" >Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_lastname" name="lastname" required oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')">
                    </div>
                </div>

                
                <div class="form-group">
                    <label for="edit_year" class="col-sm-3 control-label">Year</label>

                    <div class="col-sm-9">
                    <select class="form-control" id="edit_year" name="year" required>
                <option value="">Select Year</option>
                <option value="1ST">First Year</option>
                <option value="2ND">Second Year</option>
                <option value="3RD">Third Year</option>
                <option value="4TH">Fourth Year</option>
                </select>
                    </div>
                </div>

                <div class="form-group">
                <label for="edit_department" class="col-sm-3 control-label">Department</label>
                <div class="col-sm-9">
                <select class="form-control" id="edit_department" name="department" required>
                <option value="">Select Department</option>
                <option value="BSCS">BSCS</option>
                <option value="BSCRIM">BSCRIM</option>
                <option value="EDUC">EDUC</option>
                <option value="BSBA">BSBA</option>
                <option value="BSA">BSA</option>
                </select>
                </div>
                </div>
                
                <div class="form-group">
                    <label for="edit_password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="edit_password" name="password">
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_gmail" class="col-sm-3 control-label">Gmail</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_gmail" name="gmail" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_delete.php">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>DELETE VOTER</p>
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" accept="image/*" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>


     
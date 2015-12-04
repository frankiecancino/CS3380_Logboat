<div class='row'>
        <div class='col-sm-6'>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addKegModal">
                  Add New Keg
                </button>
                <!-- Modal -->
                <div class="modal fade" id="addBeerModal" tabindex="-1" role="dialog" aria-labelledby="lblModal">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add A Keg</h4>
                      </div>
                      <div class="modal-body">
                        <form action='processKeg.php' method='POST'>
                                <div class='form-group'>
                                        <label>Barcode:</label>
                                        <input type='text' name='name' placeholder='Name' class='form-control' required='yes' autofocus='yes'>
                                </div>


        				</select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Beer</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
</div>


        <?php if($this->session->flashdata('success')){ ?>
        <div class="modal modal-success" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background-color:darkred;">
                <button type="button" class="close" data-dismiss="modal" onclick="hidedialog();" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Information</h4>
              </div>
              <div class="modal-body">
                  <br>
                <p> <?php echo $this->session->flashdata('success'); ?></p>
                <br>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right"  onclick="hidedialog();">Close</button>
              </div>
            </div>
          </div>
        </div>

        <?php }else if($this->session->flashdata('error')){  ?>

            <div class="modal modal-danger" id="modal-danger">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background-color:darkred;">
                <button type="button" class="close" data-dismiss="modal" onclick="hidedialog();" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Information</h4>
              </div>
              <div class="modal-body">
                  <br>
                <p> <?php echo $this->session->flashdata('error'); ?></p>
                <br>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right"  onclick="hidedialog();">Close</button>
              </div>
            </div>
          </div>
        </div>
        <?php }?>

        <style>
		.modal {display: block;}

		 .modal {
			background: transparent !important;
		}
	</style>


        <script>
            function hidedialog(){
                document.getElementById("modal-success").style.display="none";
                document.getElementById("modal-danger").style.display="none";
            }
        </script>

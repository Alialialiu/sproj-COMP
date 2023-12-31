<?php 
$conn = mysqli_connect("localhost","root","","complain");
$id = $_POST['akoSiID'];
				
$query = $conn->query("SELECT * FROM tb_usercomplain WHERE usrcomp_id = '$id'");

$data = mysqli_fetch_array( $query );
?>
<form id="updateUser">
		<div class="status"> </div>
		<input type="hidden" name="ID" value="<?php echo $id ?>" /> 
		<div class="form-group">
			<label> Complain Message </label>
                <div class="card">
                    <div class="card-body">
                       <?php echo $data['usrcomp_mess'] ?>
                    </div>
                </div>
		</div>
        <select name="status" class="form-select form-select-sm mt-2" aria-label=".form-select-sm example">
            <option selected><?php echo $data['usrcomp_status'] ?></option>
            <option value="Pending">Pending</option>
            <option value="Ongoing">Ongoing</option>
            <option value="Complete">Complete</option>
        </select>
		
		<button type="submit" class="btn btn-primary pull-right mt-2"> 
			<i class="glyphicon glyphicon-floppy-disk"> </i> Save 
		</button>
		<div class="clearfix"> </div>
</form>
<div class="content-wrapper">
	 <form method="post" action="<?php echo base_url('admin/update')?>">
	 <input type="hidden" name="id" value="<?php echo $id?>">	
	 	<table>
	 		<tr>
	 			<td>Kecamatan </td>
	 			<td><input type="text" name="kec" value="<?php echo $kecamatan?>"></td>
	 		</tr>
	 		<tr>
	 			<td>PP </td>
	 			<td><input type="text" name="pp" value="<?php echo $pp?>">+</td>
	 			<td><input type="number" name="pp_update"></td>
	 		</tr>
	 			<tr>
	 			<td>ODP </td>
	 			<td><input type="text" name="odp" value="<?php echo $odp?>">+</td>
	 			<td><input type="number" name="odp_update"></td>
	 		</tr>
	 			<tr>
	 			<td>PDP </td>
	 			<td><input type="text" name="pdp" value="<?php echo $pdp?>">+</td>
	 			<td><input type="number" name="pdp_update"></td>
	 		</tr>
	 		</tr>
	 			<tr>
	 			<td>OTG </td>
	 			<td><input type="text" name="otg" value="<?php echo $otg?>">+</td>
	 			<td><input type="number" name="otg_update"></td>
	 		</tr>
	 		<tr>
	 			<td>Positif </td>
	 			<td><input type="text" name="positif" value="<?php echo $positif?>">+</td>
	 			<td><input type="number" name="positif_update"></td>
	 			<td>Tanggal Update
	 				<input type="text" name="tgl" value="<?php echo date('Y-m-d')?>">
	 			</td>
	 		</tr>
	 	</table>
	 	<button type="submit" class="btn btn-primary">Update</button>
	 </form>
</div>
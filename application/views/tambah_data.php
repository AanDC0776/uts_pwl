<div class="content-wrapper">
	 <form method="post" action="<?php echo base_url('admin/simpan')?>">	
	 	<table>
	 		<tr>
	 			<td>Kecamatan </td>
	 			<td><input type="text" name="kec"></td>
	 		</tr>
	 		<tr>
	 			<td>PP </td>
	 			<td><input type="text" name="pp"></td>
	 		</tr>
	 			<tr>
	 			<td>ODP </td>
	 			<td><input type="text" name="odp"></td>
	 		</tr>
	 			<tr>
	 			<td>PDP </td>
	 			<td><input type="text" name="pdp"></td>
	 		</tr>
	 		</tr>
	 			<tr>
	 			<td>OTG </td>
	 			<td><input type="text" name="otg"></td>
	 		</tr>
	 		<tr>
	 			<td>Positif </td>
	 			<td><input type="text" name="positif"></td>
	 		</tr>
	 		<tr>
	 			<td>Tanggal Update</td>
	 			<td><input type="text" name="tgl" value="<?php echo date('Y-m-d')?>"></td>
	 		</tr>
	 	</table>
	 	<button type="submit" class="btn btn-primary">Simpan</button>
	 </form>
</div>
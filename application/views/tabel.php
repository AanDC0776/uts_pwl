<div class="content-wrapper">
<h3 align="center">Data Covid-19 di Jepara <?php echo date('Y-m-d'); ?></h3>

  </form><br>
   <table class="table table-bordered">
           <tr>
             <td>No. </td>
             <td>Kecamatan</td>
             <td>PP</td>
             <td>ODP</td>
             <td>PDP</td>
             <td>OTG</td>
             <td>Positif</td>
             <td>Tanggal Update</td>
             <td></td>
           </tr>
            <?php 
              $no = 1;
              foreach ($data_corona as $v0 => $k0) {
             ?>
           <tr>
              <td><?php echo $no++; ?></td>  
              <td><?php echo $k0['kecamatan']; ?></td>
              <td><?php echo $k0['pp']; ?></td>
              <td><?php echo $k0['pdp']; ?></td>
              <td><?php echo $k0['odp']; ?></td>
              <td><?php echo $k0['otg']; ?></td>
              <td><?php echo $k0['positif']; ?></td>
              <td><?php echo $k0['tgl']; ?></td>
           </tr>

            <?php 
              }
            ?>
    </table>
    <a href="<?php echo base_url('admin/export')?>" class="btn btn-primary">Export to Excel</a>
</div>
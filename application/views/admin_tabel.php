<div class="content-wrapper">
<h3 align="center">Data Covid-19 di Jepara <?php echo date('Y-m-d'); ?></h3>
  <form method="post" action="<?php echo base_url('admin/import')?>" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit">Upload</button>
    <input type="hidden" name="tgl_upload" value="<?php echo date('Y-m-d')?>">
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
              <td>
                <a href="<?php echo "hapus/".$k0['id_kec']?>" class="btn btn-danger">Hapus</a>
                <a href="<?php echo "ubah/".$k0['id_kec']?>" class="btn btn-primary">Update</a>
               
              </td>
           </tr>

            <?php 
              }
            ?>
    </table>
       <a href="<?php echo base_url('admin/insert')?>" class="btn btn-primary">Insert</a>
    <a href="" class="btn btn-primary">Export to PDF</a>
    <a href="<?php echo base_url('admin/export')?>" class="btn btn-primary">Export to Excel</a>
</div>
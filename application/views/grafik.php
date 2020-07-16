<div class="content-wrapper">
    <meta charset="utf-8">
    <title>Data Covid-19 Morris.js</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/morris.css'?>">
  </head>
  <body>
    <center><h2>Data Covid-19 Jepara 24 Juni 2020</h2><center>
    <center><h3>Menggunakan Morris.js</h3></center>
 
      <div id="graph"></div>
   
      <script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
      <script src="<?php echo base_url().'assets/js/raphael-min.js'?>"></script>
      <script src="<?php echo base_url().'assets/js/morris.min.js'?>"></script>
      <script>
        Morris.Bar({
          element: 'graph',
          data: <?php echo $data;?>,
          xkey: 'kecamatan',
          ykeys: ['pp', 'odp', 'pdp', 'otg' , 'positif'],
          labels: ['pp', 'odp', 'pdp', 'otg', 'positif']
        });
    </script>
</div>
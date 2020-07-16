<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('covid_m');
	}	
	public function index()
	{	
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard');
		$this->load->view('templates/footer');
	}
	public function tabel()
	{
		$data = array(
			'data_corona' => $this->covid_m->readData()
			, 'tgl' => $this->covid_m->tgl()
		);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('tabel',$data);
		$this->load->view('templates/footer');
	}
	
	public function hapus()
	{
		$this->covid_m->hapus_data();
	}
	public function insert()
	{
		$data = array('judul' => 'Tambah Data');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('tambah_data',$data);
		$this->load->view('templates/footer');
	}
	public function simpan()
	{
		$data = array(
			'id_kec' => ''
			, 'kecamatan' => $this->input->post('kec')
			, 'pp' => $this->input->post('pp')
			, 'odp' => $this->input->post('odp')
			, 'pdp' => $this->input->post('pdp')
			, 'otg' => $this->input->post('otg')
			, 'positif' => $this->input->post('positif')
			, 'tgl' => $this->input->post('tgl')
		);
		$this->covid_m->simpan_data($data);
	}
	public function ubah()
	{
		$id = $this->uri->segment(3);
		$q = $this->covid_m->getRow($id);
		$data = array(
			'id' => $q->row('id_kec')
			, 'kecamatan' => $q->row('kecamatan')
			, 'pp' => $q->row('pp')
			, 'odp' => $q->row('odp')
			, 'pdp' =>$q->row('pdp')
			, 'otg' =>$q->row('otg')
			, 'positif' =>$q->row('positif')
		);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('update_data',$data);
		$this->load->view('templates/footer');
	}
	public function update()
	{
		$this->covid_m->update_data();
	}
	public function import()
	{
		$filename = $_FILES['file']['name'];
		$config = array(
			'upload_path' => './simpan/'
			, 'allowed_types' => 'xls|xlsx|csv'
			, 'max_size' => 10000
		);
	$this->load->library('upload', $config);
    if ( !$this->upload->do_upload('file')){
      echo $this->upload->display_errors();
      exit();
    }
    $inputFileName = './simpan/'.$filename;
    try {
    	$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    	$objReader = PHPExcel_IOFactory::createReader($inputFileType);
    	$objPHPExcel = $objReader->load($inputFileName);
    	
    } catch ( Exception $e) {
    	die('error');
    }
    $sheet = $objPHPExcel->getSheet(0);
    $highestRow = $sheet->getHighestRow();
    $highestColumn = $sheet->getHighestColumn();
    for ($baris=2; $baris <= $highestRow; $baris++) { 
    	
    	$rowData=$sheet->rangeToArray('A'.$baris.':'.$highestColumn.$baris,NULL,TRUE,FALSE);
    	$data = array(
    		'id_kec' => $rowData[0][1]
    		, 'kecamatan' => $rowData[0][1]
    		, 'pp' => $rowData[0][2]
    		, 'odp' => $rowData[0][3]
    		, 'pdp' => $rowData[0][4]
    		, 'pdp' => $rowData[0][5]
    		, 'positif' => $rowData[0][6]
    		, 'tgl' => $this->input->post('tgl_upload')
    	);
    	$this->db->insert('corona_jepara', $data);
    	 $d = array(
			'data_corona' => $this->covid_m->readData()
		);
    	$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('tabel',$d);
		$this->load->view('templates/footer');
    }

	}
	public function export()
	{
		
		$q = $this->covid_m->readData();
		$object = new PHPExcel();
		$object->getProperties()->setCreator('Aan');
		$object->getProperties()->setLastModifiedBy('Aan');
		$object->getProperties()->setTitle('Data Covid Jepara');

		$object->setActiveSheetIndex(0);
		$object->getActiveSheet()->setCellValue('A1', 'No');
		$object->getActiveSheet()->setCellValue('B1', 'Kecamatan');
		$object->getActiveSheet()->setCellValue('C1', 'PP');
		$object->getActiveSheet()->setCellValue('D1', 'ODP');
		$object->getActiveSheet()->setCellValue('E1', 'PDP');
		$object->getActiveSheet()->setCellValue('F1', 'OTG');
		$object->getActiveSheet()->setCellValue('G1', 'Positif');
		$object->getActiveSheet()->setCellValue('H1', 'Tanggal');

		$baris = 2;
		$no =1;
		foreach ($q as $k0 => $v0) {
			$object->getActiveSheet()->setCellValue('A'.$baris, $no);
			$object->getActiveSheet()->setCellValue('B'.$baris, $v0['kecamatan']);
			$object->getActiveSheet()->setCellValue('C'.$baris, $v0['pp']);
			$object->getActiveSheet()->setCellValue('D'.$baris, $v0['odp']);
			$object->getActiveSheet()->setCellValue('E'.$baris, $v0['pdp']);
			$object->getActiveSheet()->setCellValue('F'.$baris, $v0['otg']);
			$object->getActiveSheet()->setCellValue('G'.$baris, $v0['positif']);
			$object->getActiveSheet()->setCellValue('H'.$baris, $v0['tgl']);

			$baris++;
			$no++;
		}
		$filename= "Data_Covid_jepara".'.xlsx';
		$object->getActiveSheet()->setTitle('Data Covid Jepara');
		header('Content-type:application/vnd.openxmlformats-officedocument.spreadsheet.sheet');
		header('Content-Disposition:attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');

		$writer = PHPExcel_IOFactory::createwriter($object,'Excel2007');
		$writer->save('php://output');
	}
	function grafik(){
	$data = array(
		'isi' => $this->covid_m->readData()
		);

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('grafik2', $data);
		$this->load->view('templates/footer');
	}

	
}

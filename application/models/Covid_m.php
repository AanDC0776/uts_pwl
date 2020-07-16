<?php
if(!defined('BASEPATH')) die('No access');

class Covid_m extends CI_Model
{
	public function readData()
	{
		$query = $this->db->get('corona_jepara');
		$data = $query->result_array();
		$query->free_result();

		return $data;
	}
	public function tgl()
	{

		$this->db->select('DISTINCT tgl');
		$this->db->from('corona_jepara');

	}
	public function getRow($id)
	{
		$q = $this->db->where('id_kec',$id)->get('corona_jepara');
		return $q;
	}
	public function hapus_data()
	{
		$id = $this->uri->segment(3);
		$q = $this->db->where('id_kec',$id)->delete('corona_jepara');
		if ($q) {
			redirect('admin/tabel');
		}
	}
	public function simpan_data($data)
	{
		$q=$this->db->insert('corona_jepara',$data);
		if ($q) {
			redirect('admin/tabel');
		}else{
			redirect('admin/insert');
		}
	}
	public function update_data()
	{
		$id=$this->input->post('id');

		$data = array(
			'kecamatan' =>$this->input->post('kec') 
			, 'pp' => $this->input->post('pp')+$this->input->post('pp_update')
			, 'odp' =>$this->input->post('odp')+$this->input->post('odp_update')
			, 'pdp' => $this->input->post('pdp')+$this->input->post('pdp_update')
			, 'otg' => $this->input->post('otg')+$this->input->post('otg_update')
			, 'positif' => $this->input->post('positif')+$this->input->post('positif_update')
			,'tgl' => $this->input->post('tgl')
		);
		$q = $this->db->where('id_kec', $id)->update('corona_jepara', $data);
		if ($q) {
			redirect('admin/tabel');
		}else{
			redirect('admin/ubah');
		}
	}
	public function get_data()
	{
		$this->db->select('kecamatan,pp,odp,pdp,otg,positif');
		$result = $this->db->get('corona_jepara');
		return $result;
	}
	public function corona()
	{
		$query = $this->db->query("select * from corona_jepara");
		$hasil = $query->result();
		$query->free_result();
		return $hasil;
	}
	


}
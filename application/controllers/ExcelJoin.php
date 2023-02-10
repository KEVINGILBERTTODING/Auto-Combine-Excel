<?php

use FontLib\Table\Type\post;

defined('BASEPATH') or exit('No direct script access allowed');

class ExcelJoin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('excel', 'session'));


		// $this->load->model('coklit/Coklit_model', 'Coklit_model');
		// $this->load->model('coklit/Excel_model', 'Excel_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->library('pagination');
	}
	public function insert_data()
	{

		$this->load->view('pengentry/v_entry_coklit');
	}
	public function index($data)
	{

		echo "<pre>";
		print_r($data);


		// $this->load->view('pengentry/iw/v_result');
	}

	public function testData($data)
	{
		print_r($data);
	}

	public function import_excel()
	{





		// Table 1
		if (isset($_FILES["fileExcel1"]["name"])) {
			$path = $_FILES["fileExcel1"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);

			foreach ($object->getWorksheetIterator() as $worksheet) {


				// Table1
				$highestRowTable1 = $worksheet->getHighestRow();
				$highestColumnTable1 = $worksheet->getHighestColumn();


				$results_1 = array();

				for ($row = 1; $row <= $highestRowTable1; $row++) {
					for ($col = 'A'; $col <= $highestColumnTable1; $col++) {
						$cell = $worksheet->getCell($col . $row);
						$val = $cell->getValue();
						$dataType = PHPExcel_Cell_DataType::dataTypeForValue($val);
						$results_1[$row][$col] = $val;
					}
				}

				// Table 1
				$data['total_table_1'] = count($results_1);
				$data['result_1'] = $results_1;
				$data['total_row_1'] = $this->get_number_from_abjad($highestColumnTable1);
				$data['coll_unique_1'] = $this->format_abjad($this->input->post('col_unique_1'));
			}
		} else {
			$this->session->set_flashdata('upload_error', 'Upload File Failed');
			redirect('ExcelJoin/insert_data');
		}



		// Table 2
		if (isset($_FILES["fileExcel2"]["name"])) {
			$path = $_FILES["fileExcel2"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);

			foreach ($object->getWorksheetIterator() as $worksheet) {

				$highestRowTable2 = $worksheet->getHighestRow();
				$highestColumnTable2 = $worksheet->getHighestColumn();


				$results_2 = array();

				for ($row = 1; $row <= $highestRowTable2; $row++) {
					for ($col = 'A'; $col <= $highestColumnTable2; $col++) {
						$cell = $worksheet->getCell($col . $row);
						$val = $cell->getValue();
						$dataType = PHPExcel_Cell_DataType::dataTypeForValue($val);
						$results_2[$row][$col] = $val;
					}
				}


				// Table 2
				$data['total_table_2'] = count($results_2);
				$data['result_2'] = $results_2;
				$data['total_row_2'] = $this->get_number_from_abjad($highestColumnTable1);
				$data['coll_unique_2'] = $this->format_abjad($this->input->post('col_unique_2'));
			}
		} else {
			$this->session->set_flashdata('upload_error', 'Upload File Failed');
			redirect('ExcelJoin/insert_data');
		}



		$this->session->set_flashdata('message', 'Berhasil Menggabungkan Data');
		$this->load->view('pengentry/v_result', $data);
	}

	public function get_number_from_abjad($abjad)
	{
		$abjad = strtoupper($abjad);
		$abjad = str_split($abjad);
		$abjad = array_reverse($abjad);
		$abjad = array_map(function ($value) {
			return ord($value) - 64;
		}, $abjad);
		$abjad = array_map(function ($value, $key) {
			return $value * pow(26, $key);
		}, $abjad, array_keys($abjad));
		$abjad = array_sum($abjad);
		return $abjad;
	}


	public function format_abjad($number)
	{
		$number = intval($number);
		$abjad = '';
		while ($number > 0) {
			$abjad = chr(($number - 1) % 26 + 65) . $abjad;
			$number = intval(($number - 1) / 26);
		}
		return $abjad;
	}

	// public function delete($irms_id, $dasi_id)
	// {
	// 	$this->Coklit_model->delete('irms', 'irms_id', $irms_id);
	// 	$this->Coklit_model->delete('dasi', 'dasi_id', $dasi_id);
	// 	$this->session->set_flashdata('message', "Berhasil menghapus data");
	// 	redirect('pengentry/Coklit/insert_data');
	// }

	// public function update_setting()
	// {
	// 	$data = array(
	// 		'row_start' => $this->input->post('row_start'),
	// 		'col_tanggal' => $this->input->post('col_tanggal'),
	// 		'col_korban' => $this->input->post('col_korban'),
	// 		'col_cidera' => $this->input->post('col_cidera'),
	// 		'col_no_lp' => $this->input->post('col_no_lp')

	// 	);

	// 	$this->Excel_model->update_setting($this->input->post('table'), $data, $this->input->post('id'));
	// 	$this->session->set_flashdata('message', "Berhasil mengubah setting");
	// 	redirect('pengentry/Coklit/insert_data');
	// }





	// public function get_explode_no_lp($no_lp)
	// {
	// 	$no_lp = explode('/', $no_lp);
	// 	$no_lp = $no_lp[2];
	// 	return $no_lp;
	// }
}

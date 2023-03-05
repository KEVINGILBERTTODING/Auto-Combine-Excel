<?php

use FontLib\Table\Type\post;
// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


defined('BASEPATH') or exit('No direct script access allowed');

class ExcelJoin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('excel', 'session'));
		date_default_timezone_set('Asia/Jakarta');

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



		$this->session->set_flashdata('message', 'Combine Excel Success');
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

	public function introduction()

	{
		$this->load->view('pengentry/v_introduction');
	}

	public function instructions()
	{
		$this->load->view('pengentry/v_instructions');
	}


	public function export()
	{

		$alpahbeth = range('A', 'Z');
		$total_row_1 = $this->input->post('total_row_1');
		$row_1 = $this->parse_str($this->input->post('data'));
		$total_row_2 = $this->input->post('total_row_2');
		$row_2 = $this->parse_str($this->input->post('data2'));
		$unique_col_1 = $this->input->post('col_unique_1');
		$unique_col_2 = $this->input->post('col_unique_2');



		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = [
			'font' => [
				'bold' => true,
				'color' => ['rgb' => 'FFFFFF']

			], // Set font nya jadi bold
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			],
			'borders' => [
				'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
				'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
				'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
				'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
			],
			'fill' => [
				'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, // Set fill type sebagai solid fill
				'startColor' => [
					'argb' => '217346' // Set nilai argb sebagai kode warna (contoh: warna abu-abu)
				]
			]

		];


		$style_empty = [
			'font' => [
				'bold' => true,
				'color' => ['rgb' => 'FFFFFF']

			], // Set font nya jadi bold
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			],
			'borders' => [
				'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
				'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
				'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
				'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
			],
			'fill' => [
				'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, // Set fill type sebagai solid fill
				'startColor' => [
					'argb' => 'FB6340' // Set nilai argb sebagai kode warna (contoh: warna abu-abu)
				]
			]

		];

		$style_empty_2 = [
			'font' => [
				'bold' => true,
				'color' => ['rgb' => 'FFFFFF']

			], // Set font nya jadi bold
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			],
			'borders' => [
				'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
				'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
				'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
				'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
			],
			'fill' => [
				'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, // Set fill type sebagai solid fill
				'startColor' => [
					'argb' => 'F23D30'
				]
			]

		];
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = [
			'alignment' => [
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			],
			'borders' => [
				'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
				'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
				'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
				'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
			]
		];


		$alpahbeth = range('A', 'Z');
		$no = 1;
		$no2 = 1;
		for ($i = 0; $i < $total_row_1; $i++, $no2++) {
			$sheet->setCellValue('A1', '#');
			$sheet->getStyle('A1')->applyFromArray($style_col);
			$sheet->setCellValue($alpahbeth[$no2] . $no, $row_1[1][$alpahbeth[$i]]);
			$sheet->getStyle($alpahbeth[$no2] . $no)->applyFromArray($style_col);
		}
		$noo = 1;

		for ($i = 0; $i < $total_row_2; $i++, $noo++) {
			$sheet->setCellValue($alpahbeth[$total_row_1 + $noo] . $no, $row_2[1][$alpahbeth[$i]]);
			$sheet->getStyle($alpahbeth[$total_row_1 + $noo] . $no)->applyFromArray($style_col);
		}



		$not_match_1 = [];
		$not_match_2 = [];
		$match_1 = [];
		$match_2 = [];
		// Validation if data is not matching
		foreach ($row_1 as $rww1) {
			$founded = false;
			foreach ($row_2 as $rww2) {
				if ($rww1[$unique_col_1] == $rww2[$unique_col_2]) {
					$founded = true;
					break;
				}
			}
			if (!$founded) {
				$not_match_1[] = $rww1;
			} else {
				$match_1[] = $rww1;
			}
		}

		foreach ($row_2 as $rww2) {
			$founded = false;
			foreach ($row_1 as $rww1) {
				if ($rww2[$unique_col_2] == $rww1[$unique_col_1]) {
					$founded = true;
					break;
				}
			}

			if (!$founded) {
				$not_match_2[] = $rww2;
			} else {
				$match_2[] = $rww2;
			}
		}






		$numrow = 2;
		$no3 = 1;
		$no4 = 1;



		foreach ($row_1 as $rw1) {
			foreach ($row_2 as $rw_2) {

				if ($rw1[$unique_col_1] == $rw_2[$unique_col_2]) {


					for ($i = 0; $i < $total_row_1; $i++, $no3++) {
						$sheet->setCellValue('A' . $numrow, $numrow - 1)->getStyle('A' . $numrow)->applyFromArray($style_row)->getAlignment()->setHorizontal('center');
						$cell = $alpahbeth[$no3] . $numrow;
						$sheet->setCellValue($cell, $rw1[$alpahbeth[$i]]);
						$sheet->getStyle($cell)->applyFromArray($style_row);
					}

					for ($i = 0; $i < $total_row_2; $i++, $no4++) {

						$cell2 = $alpahbeth[$total_row_1 + $no4] . $numrow;
						$sheet->setCellValue($cell2, $rw_2[$alpahbeth[$i]]);
						$sheet->getStyle($cell2)->applyFromArray($style_row);
					}
					$no4 = 1;
					$no3 = 1; // reset nomor kolom pada file excel menjadi 0
					$numrow++; // menambah nomor baris untuk data berikutnya
				}
			}
		}



		// merged cell
		$sheet->mergeCells('A' . (count($match_1) + 3) . ':' . $alpahbeth[$total_row_1 + $total_row_2] . (count($match_1) + 3))->setCellValue('A' . (count($match_1) + 3), 'Data Not Match')->getStyle('A' . (count($match_1) + 3))->applyFromArray($style_empty)->getAlignment()->setHorizontal('center');
		$sheet->mergeCells('A' . (count($match_1) + 5) . ':' . $alpahbeth[$total_row_1 + $total_row_2] . (count($match_1) + 5))->setCellValue('A' . (count($match_1) + 5), 'Table 1')->getStyle('A' . (count($match_1) + 5))->applyFromArray($style_empty_2)->getAlignment()->setHorizontal('center');

		$numrow2 = 1;
		$numrow3 = 2;
		foreach ($not_match_1 as $nm1) {
			for ($i = 0; $i < count($nm1); $i++) {

				$cell3 = $alpahbeth[$i + 1] . count($match_1) + $numrow2 + 6;
				$sheet->setCellValue($cell3, $nm1[$alpahbeth[$i]]);
				$sheet->getStyle($cell3)->applyFromArray($style_row);
			}
			$numrow2++;
		}

		$sheet->mergeCells('A' . (count($match_1) + count($not_match_1)  + $numrow3 + 6) . ':' . $alpahbeth[$total_row_1 + $total_row_2] . (count($match_1) + count($not_match_1)  + $numrow3 + 6))->setCellValue('A' . (count($match_1) + count($not_match_1)  + $numrow3 + 6), 'Table 2')->getStyle('A' . (count($match_1) + count($not_match_1)  + $numrow3 + 6))->applyFromArray($style_empty_2)->getAlignment()->setHorizontal('center');


		$numrow3 = 1;
		foreach ($not_match_2 as $nm2) {
			for ($i = 0; $i < count($nm2); $i++) {

				$cell3 = $alpahbeth[$i + 1] . count($match_1) + count($not_match_1)  + $numrow3 + 9;
				$sheet->setCellValue($cell3, $nm2[$alpahbeth[$i]]);
				$sheet->getStyle($cell3)->applyFromArray($style_row);
			}
			$numrow3++;
		}








		$sheet->getDefaultRowDimension()->setRowHeight(-1);
		$sheet->getDefaultColumnDimension()->setWidth(25);
		// Set orientasi kertas jadi LANDSCAPE
		$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$sheet->setTitle("Result-" . date('Y-m'));
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Result"' . date('Y-m-d') . '.xlsx'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
	}

	public function parse_str($data)
	{
		parse_str($data, $output);
		return $output;
	}
}

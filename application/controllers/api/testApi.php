<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class testApi extends CI_Controller {


	public function api_view()
	{
		$this->load->view('api_view.php');

	}
	function action(){
		if($this->input->post('data_action'))
		{
			$data_action =$this->input->post('data_action');

			if($data_action== "fetch_all")
			{
				$api_url = "http://localhost/quanlykho/index.php/api/api";

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				
				$response = curl_exec($client);

				curl_close($client);

				$result = json_decode($response);

				$output ='';
				if(count($result)>0){
					$i=1;
					foreach($result as $row){
						$output .='
						<tr>
							<td>'.$i.'</td>
							<td>'.$row->hoten.'</td>
							<td>'.$row->ngaysinh.'</td>
							<td>'.$row->gioitinh.'</td>
							<td>'.$row->chucvu.'</td>
							<td>'.$row->taikhoan.'</td>
						</tr> 
						';
						$i++;
					}
				}else {
					$output .='
					<tr>
						<td colspan="4" align="center"> NO DATA FOUND </td>
					</tr>
					';	
				}
				echo $output;
			} 
		}
	}
}

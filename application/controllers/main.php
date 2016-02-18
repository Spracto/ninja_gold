<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class main extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('money'))
		{
			$money = $this->session->userdata('money');
		}
		else
		{
			$this->session->set_userdata('money', 0);
			$this->session->set_userdata('activity', array());
		}
		$this->load->view('index', array("money" => $this->session->userdata('money')));
	}

	public function process_money()
	{
		$money = $this->session->userdata('money');
		$class = "<p class ='green'>";
		if($this->input->post('building'))
		{
			$building = $this->input->post('building');
		}

		switch ($building)
		{
		case 'farm':
			$money_gained = rand(10, 20);
			break;

		case 'cave':
			$money_gained = rand(5, 10);
			break;

		case 'house':
			$money_gained = rand(2, 5);
			break;

		case 'casino':
			$casino_luck = rand(0, 100);
			if($casino_luck <= 70)
			{
				$money_gained = rand(-1, -50);
				$message = 'well that sucks.';
				$class = "<p class ='red'>";
			}
			else
			{
				$money_gained = rand(1, 50);
				$message = 'a regular James Bond.';

			}
			break;
		case 'reset':
			$this->session->sess_destroy();
			break;

		default:
			$money_gained = 0;
			break;
		}

		$this->session->set_userdata('money', $money + $money_gained);

		$activity = $this->session->userdata('activity');
		$activity[] =
			$class."You entered {$building} and earned {$money_gained} golds ".
			(($building=='casino') ? "..." . $message . "..." : "" ) . "(".date('M d, Y h:ia').")</p>";
		$this->session->set_userdata('activity', $activity);


		redirect('/');


	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

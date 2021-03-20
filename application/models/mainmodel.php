<?php
class mainmodel extends CI_model
{
	public function reg($a)
	{
		$this->db->insert("register",$a);
	}
	public function encpswd($pass)
	{
		return password_hash($pass, PASSWORD_BCRYPT);
	}
	public function encpaswd($pass)
	{
		return password_hash($pass, PASSWORD_BCRYPT);
	}
	public function regv()
	{
		$this->db->select('*');
		$qry=$this->db->get("register");
        return $qry;
	}

		public function deletedetails($id)
		{
			$this->db->where('id',$id);
			$this->db->delete("register");
		}
	public function action()
	{
		$this->db->select('*');
		$qry=$this->db->get("register");
        return $qry;
	}
	public function approve($id)
	{   $this->db->set('status','1');
		$qry=$this->db->where("id",$id);
		$qry=$this->db->update("register");
		return $qry;
	}
	public function reject($id)
	{   $this->db->set('status','2');
		$qry=$this->db->where("id",$id);
		$qry=$this->db->update("register");
		return $qry;
	}
	public function selectpass($email,$pass)
	{
		$this->db->select('password');
		$this->db->form("register");
		$this->db->where("email",$email);
		$qry=$this->db->get()->row->row('password');
		return $this->verifypass($pass,$qry);
	}
	public function verifypass($pass,$qry)
	{
		return password_verify($pass,$qry);
	}
	public function getuserid($email)
	{
		$this->db->select('id');
		$this->db->from("register");
		$this->db->where("email",$email);
		return $this->db->get()->row('id');
	}
	public function getuser($id)
	{
		$this->db->select('*');
		$this->db->from("register");
		$this->db->where("id",$id);
		return $this->db->get()->row();
	}
	public function inreg($b,$c)
	{
		$this->db->insert("details2",$c);
		$loginid=$this->db->insert_id();
		$b['loginid']=$loginid;
	   $this->db->insert("details",$b);
	}
	public function inreq($b)
	{
		$this->db->insert("req",$b);
		
	}
	public function userview()
	{
		$this->db->select('*');
		$qry=$this->db->get("details");
		 return $qry;
	}
	public function tview()
	{
		$this->db->select('*');
		$this->db->join('details2','details2.id=details.loginid','inner');
		$qry=$this->db->get("details");
		 return $qry;
	}
	public function newaction()
	{
		$this->db->select('*');
		// $this->db->join('details2','details2.id=details.loginid','inner');
		$qry=$this->db->get("req");
        return $qry;
	}
	public function newapprove($id)
	{   $this->db->set('status','1');
		$qry=$this->db->where("id",$id);
		$qry=$this->db->update("req");
		return $qry;
	}
	public function newreject($id)
	{   $this->db->set('status','2');
		$qry=$this->db->where("id",$id);
		$qry=$this->db->update("req");
		return $qry;
	}
	public function teacher_insrt($b,$c)
	{
		$this->db->insert("details2",$c);
		$loginid=$this->db->insert_id();
		$b['loginid']=$loginid;
	   $this->db->insert("tdetails1",$b);
	}
	public function strgetuserid($email)
	{
		$this->db->select('id');
		$this->db->from("details2");
		$this->db->where("email",$email);
		return $this->db->get()->row('id');
	}
	public function strverifypass($pass,$qry)
	{
		return password_verify($pass,$qry);
	}

	public function strselectpass($email,$pass)
	{
		$this->db->select('password');
		$this->db->from("details2");
		$this->db->where("email",$email);
		$qry=$this->db->get()->row('password');
		//echo"$qry";exit;
		return $this->strverifypass($pass,$qry);
	}
	
	public function strgetuser($id)
	{
		$this->db->select('*');
		$this->db->from("details2");
		$this->db->where("id",$id);
		return $this->db->get()->row();
	}


public function update($id)
	{
		$this->db->select("*");
		
		$qry=$this->db->join('details2','details.loginid=details2.id','inner');
		$qry=$this->db->where("details.loginid",$id);
		$qry=$this->db->get("details");
		 return $qry;
	}
	public function updatesdetails($a,$b,$id)
	{
	 	$this->db->select('*');
	 	$qry=$this->db->where("loginid",$id);
	 	$qry=$this->db->join('details2','details2.id=details.loginid','inner');
	 	$qry=$this->db->update("details",$a);
	 	$qry=$this->db->where("id",$id);
	 	$qry=$this->db->update("details2",$b);
	 	return $qry;
	 }
	
	public function singledata($id)		//function for updating fetching id
	{
		$this->db->select('*');
		$this->db->where("id",$id);
		$qry=$this->db->get("details");
		return $qry;
	}
	public function singleselect()		//function  for select data from table
	{
		$qry=$this->db->get("details");
		return $qry;
	}
	/*public function update($id)
	{
		$this->db->select("*");
		$qry=$this->db->where("details",$id);
		$qry=$this->db->get("details");
		 return $qry;
	}

	public function updatedetails($a,$id)
	{
		$this->db->select('*');
		$qry=$this->db->update("details",$a);
		$qry=$this->db->where("id",$id);
		return $qry;
	}*/

	public function notinsert($a)
	{
	   $this->db->insert("notification",$a);
	}
	public function nview()
	{
		$this->db->select('*');
		$qry=$this->db->join('tdetails1','tdetails1.loginid=notification.loginid','inner');
		$qry=$this->db->get("notification");
        return $qry;
	}
	public function noti()
	{
		$this->db->select('*');

		$qry=$this->db->get("notification");
        return $qry;
	}
	public function deletenot($id)
	{
		$this->db->where('id',$id);
		//$qry=$this->db->join('tdetails1','tdetails1.loginid=notification.loginid','inner');
		$this->db->delete("notification");
	}

	public function pinreg($b)
	{
		$this->db->insert("req",$b);
	}
	public function bookview()
	{
		$this->db->select('*');
		$qry=$this->db->get("req");
        return $qry;
	}
	public function billinsert($a)
	{
		$this->db->insert("bill",$a);
	}
	public function pview()
	{
		/*$this->db->select('*');
		$this->db->join('details2','details2.id=details.loginid','inner');
		$qry=$this->db->get("tdetails1");
		 return $qry;
*/
		$this->db->select('*');
		$qry=$this->db->get("tdetails1");
        return $qry;
	}
	

    public function issueb($id)
	{
		$this->db->select("*");
		$qry=$this->db->get("details");
        return $qry;
	}
	public function uissuez($id)
	{
		$this->db->select('*');
		$this->db->where('id',$id);
		$qry=$this->db->get("details");
        return $qry;
	}
	public function bview($id)
	{
		$this->db->select("*");
		$qry=$this->db->get("issuebook");
        return $qry;
	}
	public function uissue()
    {
        $this->load->model('mainmodel');
         $id=$this->uri->segment(3);
        $data['user_data']=$this->mainmodel->uissuez($id);
        $this->load->view('issuebook',$data);
    }
    public function issuebook($a)
	{
		$this->db->insert("issuebook",$a);

	}
	public function viewissuez()
	{
		$this->db->select("*");
		$qry=$this->db->get("issuebook");
        return $qry;
	}
	public function bookdet($id)
	{
		$this->db->select("*");
		$this->db->where('id',$id);
		$qry=$this->db->get("issuebook");
        return $qry;
	}
	//bill

	public function uploadbill($a)
		{
			$this->db->insert("bill",$a);
		}
	
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('new');
	}
	public function register()
	{
		$this->load->view('register');
	}
	
	
	
	public function reg()
	{
        $this->load->library('form_validation');
        $this->form_validation->set_rules("name","name",'required');
        $this->form_validation->set_rules("address","address",'required');
        $this->form_validation->set_rules("gender","gender",'required');
        $this->form_validation->set_rules("age","age",'required');
        $this->form_validation->set_rules("email","email",'required');
        $this->form_validation->set_rules("password","password",'required');
        if($this->form_validation->run())
        {
        $this->load->model('mainmodel');
        $pass=$this->input->post("password");
        $encpass=$this->mainmodel->encpswd($pass);
        $a=array("Name"=>$this->input->post("name"),
                "Address"=>$this->input->post("address"),
                "Gender"=>$this->input->post("gender"),
                "Age"=>$this->input->post("age"),
                "emailid"=>$this->input->post("email"),
                "password"=>$encpass);
        $this->mainmodel->reg($a);       	
        redirect(base_url().'main/register');	
        }
 

	}
	public function regv()
	{
		$this->load->model('mainmodel');
		$data['n']=$this->mainmodel->regv();
		$this->load->view('regview',$data);
	}
	public function updatedetails()
	{
		$a = array("Name"=>$this->input->post("name"),
			"Address"=>$this->input->post("address"),
			"Gender"=>$this->input->post("gender"),
			"Age"=>$this->input->post("age"),
			"emailid"=>$this->input->post("email") );
		$this->load->model('mainmodel');
		$id=$this->uri->segment(3);
		$data['user_data']=$this->mainmodel->singledata($id);
		$this->mainmodel->singleselect();
		$this->load->view('regview',$data);
		if($this->input->post("update"))
		{
			$this->mainmodel->updatedetails($a,$this->input->post("id"));
			redirect('main/regv','refresh');
		}
	}
    public function deletedetails()
    {
    	$this->load->model('mainmodel');
    	$id=$this->uri->segment(3);
    	$this->mainmodel->deletedetails($id);
    	redirect('main/regv','refresh');
    }	
	public function action()
	{
		$this->load->model('mainmodel');
		$data['n']=$this->mainmodel->action();
		$this->load->view('view',$data);
	}	
	public function approve()
	{
		$this->load->model('mainmodel');
		
    	$id=$this->uri->segment(3);
    	$this->mainmodel->approve($id);
    	redirect('main/action','refresh');
	}	
	public function reject()
	{
		$this->load->model('mainmodel');
		
    	$id=$this->uri->segment(3);
    	$this->mainmodel->reject($id);
    	redirect('main/reject','refresh');
	}	
	public function login()
	{
		$this->load->view('login');
	}
	public function logvalidation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("email","email",'required');
        $this->form_validation->set_rules("password","password",'required');
        	if($this->form_validation->run())
        	{
        		$this->load->model('mainmodel');
        		$email=$this->input->post("email");
       			$pass=$this->input->post("password");
        		$rslt->$this->mainmodel->selectpass($email,$pass);
        		if($rslt)
        		{
        			$id->$this->mainmodel->getuserid($email);
       				$user=$this->mainmodel->getuser($id);
        			$this->load->library(array('session'));
        			$this->session->set_userdata(array('id'=>(int)$user->id,'status'=>$user->status));
        		    if($_SESSION['status']=='1')
        			{
        						redirect(base_url().'main/action');
       				}
        			else
        			{
        			echo"waiting for approval";
       				}
                }
                else
                {
    	         echo "invalid user";
                }
            }
else{
	redirect('main/login','refresh');
	}
}
public function newreg()
{
	$this->load->view('newregister');
}
public function insrtreg()
	{
        $this->load->library('form_validation');
        $this->form_validation->set_rules("fname","fname",'required');
        $this->form_validation->set_rules("lname","lname",'required');
        $this->form_validation->set_rules("address","address",'required');
        $this->form_validation->set_rules("district","district",'required');
        $this->form_validation->set_rules("pin","pin",'required');
        $this->form_validation->set_rules("number","number",'required');
        $this->form_validation->set_rules("dob","dob",'required');
        $this->form_validation->set_rules("gender","gender",'required');
        $this->form_validation->set_rules("education","education",'required');
        $this->form_validation->set_rules("email","email",'required');
        $this->form_validation->set_rules("password","password",'required');
        if($this->form_validation->run())
        {
        $this->load->model('mainmodel');
        $pass=$this->input->post("password");
        $encpass=$this->mainmodel->encpaswd($pass);
        $b=array("fname"=>$this->input->post("fname"),
        	     "lname"=>$this->input->post("lname"),
                "address"=>$this->input->post("address"),
                "district"=>$this->input->post("district"),
                "pin"=>$this->input->post("pin"),
                "number"=>$this->input->post("number"),
                "dob"=>$this->input->post("dob"),
                "gender"=>$this->input->post("gender"),
                "education"=>$this->input->post("education")
               );
         $c=array( "email"=>$this->input->post("email"),
                "password"=>$encpass,
                "usertype"=>'0');
        $this->mainmodel->inreg($b,$c);    
        redirect(base_url().'main/tview');	
        }
}
public function tview()
	{
		$this->load->model('mainmodel');
		$data['n']=$this->mainmodel->tview();
		$this->load->view('newview',$data);
	}
    public function newaction()
    {
        $this->load->model('mainmodel');
        $data['n']=$this->mainmodel->newaction();
        $this->load->view('newview',$data);
    }   
    public function newapprove()
    {
        $this->load->model('mainmodel');
        
        $id=$this->uri->segment(3);
        $this->mainmodel->newapprove($id);
        redirect('main/newaction','refresh');
    }   
    public function newreject()
    {
        $this->load->model('mainmodel');
        
        $id=$this->uri->segment(3);
        $this->mainmodel->newreject($id);
        redirect('main/newaction','refresh');
    }   
    public function treg()
    {
        $this->load->view('teacherreg');
    }
    public function teacher_insrt()
    {
         $this->load->library('form_validation');
        $this->form_validation->set_rules("name","name",'required');
        $this->form_validation->set_rules("address","address",'required');
        $this->form_validation->set_rules("district","district",'required');
        $this->form_validation->set_rules("pin","pin",'required');
        $this->form_validation->set_rules("number","number",'required');
        $this->form_validation->set_rules("gender","gender",'required');
        $this->form_validation->set_rules("age","age",'required');
        $this->form_validation->set_rules("subject","subject",'required');
        $this->form_validation->set_rules("email","email",'required');
        $this->form_validation->set_rules("password","password",'required');
        if($this->form_validation->run())
        {

        $this->load->model('mainmodel');
        $pass=$this->input->post("password");
        $encpass=$this->mainmodel->encpaswd($pass);
        $b=array("name"=>$this->input->post("name"),
                "address"=>$this->input->post("address"),
                "district"=>$this->input->post("district"),
                "pin"=>$this->input->post("pin"),
                "number"=>$this->input->post("number"),
                "gender"=>$this->input->post("gender"),
                "age"=>$this->input->post("age"),
                "subject"=>$this->input->post("subject")
                );
         $c=array( "email"=>$this->input->post("email"),
                "password"=>$encpass,"status"=>'1',
                "usertype"=>'1');
        $this->mainmodel->teacher_insrt($b,$c);    
        redirect(base_url().'main/strlogin');  
        }
    }
    public function strlogin()
    {
        $this->load->view('studtrlogin');
    }
    public function logins()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("email","email",'required');
        $this->form_validation->set_rules("Password","password",'required');
            if($this->form_validation->run())
            {
                $this->load->model('mainmodel');
                $email=$this->input->post("email");
                $pass=$this->input->post("Password");

                $rslt=$this->mainmodel->strselectpass($email,$pass);
              
                if($rslt)
                {
                    $id=$this->mainmodel->strgetuserid($email);
                    $user=$this->mainmodel->strgetuser($id);
                    $this->load->library(array('session'));
                    $this->session->set_userdata(array('id'=>(int)$user->id,'status'=>$user->status,'usertype'=>$user->usertype));
                    if($_SESSION['status']=='1' && $_SESSION['usertype']=='1')
                    {
                                redirect(base_url().'main/tdash');
                    }
                    else if($_SESSION['status']=='1' && $_SESSION['usertype']=='0')
                    {
                            redirect(base_url().'main/sdash');
                   }
                  
                   else
                    {
                        echo "Waiting for Approval";
                    }
                }
                    else
                    {
                        echo "invalid user";
                    }
                }
                else
                {
                    redirect('main/strlogin','refresh');
                }
        }

    

    public function update()
    {
        $this->load->model('mainmodel');
        $id=$this->session->id;
        $data['user_data']=$this->mainmodel->update($id);
        $this->load->view('update',$data);
    }
    
    public function updatdetails()
    {
        $a = array("fname"=>$this->input->post("fname"),
            "lname"=>$this->input->post("lname"),
            "address"=>$this->input->post("address"),
            "district"=>$this->input->post("district"),
            "pin"=>$this->input->post("pin"),
            "number"=>$this->input->post("number"),
            "dob"=>$this->input->post("dob"),
            "gender"=>$this->input->post("gender"),
            "education"=>$this->input->post("education"));

         $b= array("email"=>$this->input->post("email"),'usertype'=>'1');

        $this->load->model('mainmodel');
        if($this->input->post("update"))
        {
            $id=$this->session->id;
            $this->mainmodel->updatesdetails($a,$b,$id);
            redirect('main/update','refresh');
        }
    }
  public function note()
    {
        $this->load->view('notification');
    }
    public function notev()
    {
        $this->load->view('notview');
    }

    public function notinsert()
    {
         $this->load->library('form_validation');
        $this->form_validation->set_rules("notification","notification",'required');

        if($this->form_validation->run())
        {
      
        $this->load->model('mainmodel');
         $id=$this->session->id;
        $a=array("notification"=>$this->input->post("notification"),
                "currdate"=>date('y-m-d'),
                "loginid"=>$id);
        $this->mainmodel->notinsert($a);    
        redirect(base_url().'main/nview');  
        }
        
    }
public function nview()
    {
        $this->load->model('mainmodel');
        $data['n']=$this->mainmodel->nview();
        $this->load->view('notview',$data);
    }
    //VIEw NOTIFICATION
    public function noti()
    {
        $this->load->model('mainmodel');
        $data['n']=$this->mainmodel->noti();
        $this->load->view('viewnotification',$data);
    }
    public function deletenot()
    {
        $this->load->model('mainmodel');
        $id=$this->uri->segment(3);
        $this->mainmodel->deletenot($id);
        redirect('main/noti','refresh');
    }
    public function sdash()
    {
        $this->load->view('sdash');
    }
    public function tdash()
    {
        $this->load->view('tdash');
    }
}
 













 public function register()
    {
        $this->load->view('register');
    }
    public function reg()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("name","name",'required');
        $this->form_validation->set_rules("address","address",'required');
        $this->form_validation->set_rules("gender","gender",'required');
        $this->form_validation->set_rules("age","age",'required');
        $this->form_validation->set_rules("email","email",'required');
        $this->form_validation->set_rules("password","password",'required');
        if($this->form_validation->run())
        {
        $this->load->model('mainmodel');
        $pass=$this->input->post("password");
        $encpass=$this->mainmodel->encpswd($pass);
        $a=array("Name"=>$this->input->post("name"),
                "Address"=>$this->input->post("address"),
                "Gender"=>$this->input->post("gender"),
                "Age"=>$this->input->post("age"),
                "emailid"=>$this->input->post("email"),
                "password"=>$encpass);
        $this->mainmodel->reg($a);          
        redirect(base_url().'main/register');   
        }
 

    }
    public function regv()
    {
        $this->load->model('mainmodel');
        $data['n']=$this->mainmodel->regv();
        $this->load->view('regview',$data);
    }
    public function updatedetails()
    {
        $a = array("Name"=>$this->input->post("name"),
            "Address"=>$this->input->post("address"),
            "Gender"=>$this->input->post("gender"),
            "Age"=>$this->input->post("age"),
            "emailid"=>$this->input->post("email") );
        $this->load->model('mainmodel');
        $id=$this->uri->segment(3);
        $data['user_data']=$this->mainmodel->singledata($id);
        $this->mainmodel->singleselect();
        $this->load->view('regview',$data);
        if($this->input->post("update"))
        {
            $this->mainmodel->updatedetails($a,$this->input->post("id"));
            redirect('main/regv','refresh');
        }
    }
    public function deletedetails()
    {
        $this->load->model('mainmodel');
        $id=$this->uri->segment(3);
        $this->mainmodel->deletedetails($id);
        redirect('main/regv','refresh');
    }   
    public function action()
    {
        $this->load->model('mainmodel');
        $data['n']=$this->mainmodel->action();
        $this->load->view('view',$data);
    }   
    public function approve()
    {
        $this->load->model('mainmodel');
        
        $id=$this->uri->segment(3);
        $this->mainmodel->approve($id);
        redirect('main/action','refresh');
    }   
    public function reject()
    {
        $this->load->model('mainmodel');
        
        $id=$this->uri->segment(3);
        $this->mainmodel->reject($id);
        redirect('main/reject','refresh');
    }   
    public function login()
    {
        $this->load->view('login');
    }
    public function logvalidation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("email","email",'required');
        $this->form_validation->set_rules("password","password",'required');
            if($this->form_validation->run())
            {
                $this->load->model('mainmodel');
                $email=$this->input->post("email");
                $pass=$this->input->post("password");
                $rslt->$this->mainmodel->selectpass($email,$pass);
                if($rslt)
                {
                    $id->$this->mainmodel->getuserid($email);
                    $user=$this->mainmodel->getuser($id);
                    $this->load->library(array('session'));
                    $this->session->set_userdata(array('id'=>(int)$user->id,'status'=>$user->status));
                    if($_SESSION['status']=='1')
                    {
                                redirect(base_url().'main/action');
                    }
                    else
                    {
                    echo"waiting for approval";
                    }
                }
                else
                {
                 echo "invalid user";
                }
            }
else{
    redirect('main/login','refresh');
    }
}
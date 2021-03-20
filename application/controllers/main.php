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
	
    
public function newreg()
{
    $this->load->view('newregister');
}
public function insrtreg()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("fname","fname",'required');
        $this->form_validation->set_rules("address","address",'required');
        $this->form_validation->set_rules("district","district",'required');
        $this->form_validation->set_rules("city","city",'required');
        $this->form_validation->set_rules("pin","pin",'required');
        $this->form_validation->set_rules("number","number",'required');
        $this->form_validation->set_rules("gender","gender",'required');
        $this->form_validation->set_rules("email","email",'required');
        $this->form_validation->set_rules("password","password",'required');
        if($this->form_validation->run())
        {
        $this->load->model('mainmodel');
        $pass=$this->input->post("password");
        $encpass=$this->mainmodel->encpaswd($pass);
        $b=array("fname"=>$this->input->post("fname"),
                "address"=>$this->input->post("address"),
                "district"=>$this->input->post("district"),
                "city"=>$this->input->post("city"),
                "pin"=>$this->input->post("pin"),
                "number"=>$this->input->post("number"),
                "gender"=>$this->input->post("gender")
               );
         $c=array( "email"=>$this->input->post("email"),
                "password"=>$encpass,
                "status"=>'1',
                "usertype"=>'0');
        $this->mainmodel->inreg($b,$c);    
        redirect(base_url().'main/logins');  
        }
    }
    public function userrview()
    {

        $this->load->view('userview');
    }

    /*public function userview()
    {
        $this->load->model('mainmodel');
        $data['n']=$this->mainmodel->userview();
        $this->load->view('userview',$data);
    }*/
   public function tview()
    {
        $this->load->model('mainmodel');
        $data['n']=$this->mainmodel->tview();
        $this->load->view('newview',$data);
    }
    public function pview()
    {
        $this->load->model('mainmodel');
        $data['n']=$this->mainmodel->pview();
        $this->load->view('pubview',$data);
    }
    public function newaction()
    {
        $this->load->model('mainmodel');
        $data['n']=$this->mainmodel->newaction();
        $this->load->view('bookview',$data);
    }   
    public function newapprove()
    {
        $this->load->model('mainmodel');
        $id=$this->uri->segment(3);
        $this->mainmodel->newapprove($id);
        redirect('main/bill','refresh');
    }   
    public function newreject()
    {
        $this->load->model('mainmodel');
        
        $id=$this->uri->segment(3);
        $this->mainmodel->newreject($id);
        redirect('main/bookview','refresh');
    } 
     public function bill()
    {
        $this->load->view('bill');
    }  
    public function treg()
    {
        $this->load->view('pubreg');
    }
    public function pub_insrt()
    {
         $this->load->library('form_validation');
        $this->form_validation->set_rules("name","name",'required');
        $this->form_validation->set_rules("address","address",'required');
        $this->form_validation->set_rules("number","number",'required');
        $this->form_validation->set_rules("email","email",'required');
        $this->form_validation->set_rules("password","password",'required');
        if($this->form_validation->run())
        {

        $this->load->model('mainmodel');
        $pass=$this->input->post("password");
        $encpass=$this->mainmodel->encpaswd($pass);
        $b=array("name"=>$this->input->post("name"),
                "address"=>$this->input->post("address"),
                "number"=>$this->input->post("number")
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
                    else if($_SESSION['status']=='1' && $_SESSION['usertype']=='2')
                    {
                            redirect(base_url().'main/adash');
                    }
                   else
                    {
                        echo "Waiting for Approval";
                    }
                }
                    else
                    {
                        // redirect(base_url().'main/logins');
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
            "address"=>$this->input->post("address"),
            "district"=>$this->input->post("district"),
            "city"=>$this->input->post("city"),
            "pin"=>$this->input->post("pin"),
            "number"=>$this->input->post("number"),
            "gender"=>$this->input->post("gender"));
         $b= array("email"=>$this->input->post("email"));

        $this->load->model('mainmodel');
        if($this->input->post("update"))
        {
            $id=$this->session->id;
            $this->mainmodel->updatesdetails($a,$b,$id);
            redirect('main/update','refresh');
        }
    }
    public function viewusrdet()
    {
        $this->load->model('mainmodel');
        $id=$this->session->id;
        $data['user_data']=$this->mainmodel->update($id);
        $this->load->view('viewusrdet',$data);
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
    public function adash()
    {
        $this->load->view('adash');
    }
 
    public function req()
    {
        $this->load->view('req');
    }
    public function insrtreq()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("bname","bname",'required');
        $this->form_validation->set_rules("type","type",'required');
        $this->form_validation->set_rules("author","author",'required');
        $this->form_validation->set_rules("qty","qty",'required');
        if($this->form_validation->run())
        {
        $this->load->model('mainmodel');
        $b=array("bname"=>$this->input->post("bname"),
                "type"=>$this->input->post("type"),
                "author"=>$this->input->post("author"),
                "qty"=>$this->input->post("qty"));
        $this->mainmodel->inreq($b);    
        redirect(base_url().'main/req');  
        }
    }

    public function bookview()
    {
        $this->load->model('mainmodel');
        $data['n']=$this->mainmodel->bookview();
        $this->load->view('bookview',$data);
    }

     public function billinsert()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("file","file",'required');
       
        if($this->form_validation->run())
        {
        $this->load->model('mainmodel');
        $b=array("file"=>$this->input->post("file"));
        $this->mainmodel->billinsert($b);    
        redirect(base_url().'main/bookview');  
        }
    }
     public function uissue()
    {
        $this->load->model('mainmodel');
         $id=$this->uri->segment(3);
        $data['user_data']=$this->mainmodel->uissuez($id);
        $this->load->view('issuebook',$data);
    }
     public function bview()
    {
        $this->load->model('mainmodel');
        $id=$this->session->id;
        $data['user_data']=$this->mainmodel->bview($id);
        $this->load->view('arya',$data);
    }
     public function issueb()
    {
         $this->load->library('form_validation');
        $this->form_validation->set_rules("name","name",'required',
                                            "bname","bname",'required',
                                            "bid","bid",'required',
                                            "author","author",'required',
                                            "date","date",'required',
                                            "rdate","rdate",'required');

        if($this->form_validation->run())
        {
      
            $this->load->model('mainmodel');
             $id=$this->session->id;
            $a=array("name"=>$this->input->post("name"),
                    "bname"=>$this->input->post("bname"),
                    "bid"=>$this->input->post("bid"),
                    "author"=>$this->input->post("author"),
                    "date"=>date('y-m-d'),
                    "rdate"=>date('y-m-d'));
            $this->mainmodel->issuebook($a);    
            redirect(base_url().'main/tview');  
        }
        
    }
    public function viewissuez()
    {
        $this->load->model('mainmodel');
        $data['user_data']=$this->mainmodel->viewissuez();
        $this->load->view('arya',$data);
    } 
    public function bookdet()
    {
        $this->load->model('mainmodel');
        $id=$this->session->id;
        $data['user_data']=$this->mainmodel->bookdet($id);
        $this->load->view('aryas',$data);
    }

    //Bill
     public function upload()
    {
      $this->load->view('bill');
    }
    public function fileupload()
    {

       $this->load->library('form_validation');
       $this->form_validation->set_rules("pic","pic",'required');
        if($this->form_validation->run())
        {
        $this->load->model('mainmodel');
        $config['upload_path']='./upload/';
        $config['allowed_types']='gif/jpg/pdf';
        $congig['max-size']=1000;
        // $congig['max-hieght']=1000;
        // $congig['max-width']=700;
        $this->load->library('upload',$config);
        if(!$this->upload->do_upload('pic'))
        {
          $error=array("error"=>$this->upload->display_errors());

        }
        else
        {
          $data=array('pic'=>$this->upload->data());
          $pdf=$data['pic']['salarybill.pdf'];
        }
        $a=array("bill"=>$this->input->post("pic"),
       "currentdate"=>date('y-m-d'));
         $this->mainmodel->uploadbill($a);    
        redirect(base_url().'main/upload'); 



}

    }

  
}
 
>input->post('username');
        $pass = $this->input->post('password');
  
        $data= $this->model->getuser($user,$pass);
         if($data==true) {
            $arrData = array('status'=> $data['u_enable'], 'su_id'=>$data['su_id'], 'username'=> $data['username'],'sug_id'=>$data['sug_id'],'login' => "OK");	
             $this->session->set_userdata($arrData);
             $username = $this->session->userdata('username');
             if($data['u_enable'] != 1){
                echo "<script>alert('You has been disable')</script>";
                redirect('login','refresh');  
             }else if($data['sug_enable'] != 1){
                echo "<script>alert('Your group has been disable')</script>";
                redirect('login','refresh'); 
             } else{
                echo "<script>alert('Welcome $username')</script>";
                redirect('user/manage','refresh');
             }
        }
     else{
        echo "<script>alert('Wrong password or username')</script>";
        redirect('login','refresh');  
     
     }
   
   }

    

}


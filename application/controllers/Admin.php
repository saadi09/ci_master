<?php
/**
 * Created by PhpStorm.
 * User: saadi
 * Date: 11/30/2017
 * Time: 4:38 AM
 */
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('My_PHPMailer');


        /*==== cache control ====*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    /*==== ADMIN DASHBOARD ====*/
   public function index()
   {
       if($this->isLoggedIn())
       {
           $data['menu'] = $this->Admin_model->getMenuItems();
           $data['theme']=$this->Admin_model->getActiveTheme();
           $data['title'] = "Real Estate | Dashboard";
           $this->load->view('backend/static/head',$data);
           $this->load->view('backend/static/header');
           $this->load->view('backend/static/sidebar1');
           $this->load->view('backend/admin/dashboard');
           $this->load->view('backend/static/footer');
       }
       else
       {
           redirect(base_url());
       }
   }

    ///////////////////////////////////////
    ///                                 ///
    ///     Admin Menu Section Starts   ///
    ///                                 ///
    ///////////////////////////////////////

    /*==== ADD ADMIN SIDEBAR MENU ====*/
    public function add_menu()
    {
        if($this->isLoggedIn())
        {
            $data['parents']=$this->Admin_model->getMenuParents();
            $data['menu']=$this->Admin_model->getMenuItems();
            $data['theme']=$this->Admin_model->getActiveTheme();
            $email = $this->session->userdata['email'];
            //$data['profile'] = $this->admin_model->get_admin_data($email);
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'parent',
                        'label' =>  'Parent',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    //$this->session->set_flashdata('flashmsg', ['type' => 'error', 'content' => validation_errors()]);
                    $data['parents']=$this->Admin_model->getMenuParents();
                    $data['theme']=$this->Admin_model->getActiveTheme();
                    $data['title'] = "Real Estate | Add Admin Menu";
                    $this->load->view('backend/static/head',$data);
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/static/sidebar1');
                    $this->load->view('backend/admin/add_menu');
                    $this->load->view('backend/static/footer');
                }
                else
                {
                    $this->Admin_model->addMenuItem($_POST);
                    $data['success']='Congratulations! Menu Item Added Successfully';
                    $data['parents']=$this->Admin_model->getMenuParents();
                    $data['menu']=$this->Admin_model->getMenuItems();
                    $data['theme']=$this->Admin_model->getActiveTheme();
                    /*$email = $this->session->userdata['email'];
                    $data['profile'] = $this->admin_model->get_admin_data($email);*/
                    $data['title'] = "Real Estate | Add Admin Menu";
                    $this->load->view('backend/static/head',$data);
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/static/sidebar1');
                    $this->load->view('backend/admin/add_menu');
                    $this->load->view('backend/static/footer');
                }
            }
            else
            {
                $data['theme']=$this->Admin_model->getActiveTheme();
                $data['parents']=$this->Admin_model->getMenuParents();
                $data['title'] = "Real Estate | Add Admin Menu";
                $this->load->view('backend/static/head',$data);
                $this->load->view('backend/static/header');
                $this->load->view('backend/static/sidebar1');
                $this->load->view('backend/admin/add_menu');
                $this->load->view('backend/static/footer');
            }
        }
        else
        {
            redirect(base_url());
        }

    }

    /*==== EDIT ADMIN SIDEBAR MENU =====*/
    public function edit_admin_menu()
    {
        if($this->isLoggedIn())
        {
            $menuId=$this->uri->segment(3);
            $data['parents']=$this->Admin_model->getMenuParents();
            $data['menu']=$this->Admin_model->getMenuItems();
            $data['menu_item']=$this->Admin_model->getMenuItemDetail($menuId);
            $email = $this->session->userdata['email'];
            //$data['profile'] = $this->Admin_model->get_admin_data($email);
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'parent',
                        'label' =>  'Parent',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['parents']=$this->Admin_model->getMenuParents();
                    $data['menu_item']=$this->Admin_model->getMenuItemDetail($menuId);
                    $data['theme']=$this->Admin_model->getActiveTheme();
                    $email = $this->session->userdata['email'];
                    $data['profile'] = $this->Admin_model->get_admin_data($email);
                    $data['title']='Real Estate | Edit Admin Menu';
                    $this->load->view('backend/static/head',$data);
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/static/sidebar1');
                    $this->load->view('backend/admin/edit_admin_menu');
                    $this->load->view('backend/static/footer');
                }
                else
                {
                    $this->Admin_model->updateMenuItem($_POST,$menuId);
                    $data['success']='Congratulations! Menu Item Updated Successfully';
                    $data['parents']=$this->Admin_model->getMenuParents();
                    $data['menu']=$this->Admin_model->getMenuItems();
                    $data['theme']=$this->Admin_model->getActiveTheme();
                    $data['menu_item']=$this->Admin_model->getMenuItemDetail($menuId);
                    $email = $this->session->userdata['email'];
                    //$data['profile'] = $this->admin_model->get_admin_data($email);
                    $data['title']='Technologicx PM System';
                    $this->load->view('backend/static/head',$data);
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/static/sidebar1');
                    $this->load->view('backend/admin/edit_admin_menu');
                    $this->load->view('backend/static/footer');
                }
            }
            else
            {
                $data['parents']=$this->Admin_model->getMenuParents();
                $data['theme']=$this->Admin_model->getActiveTheme();
                $data['title']='Real Estate | Edit Admin Menu';
                $this->load->view('backend/static/head',$data);
                $this->load->view('backend/static/header');
                $this->load->view('backend/static/sidebar1');
                $this->load->view('backend/admin/edit_admin_menu');
                $this->load->view('backend/static/footer');
            }
        }
        else
        {
            redirect(base_url());
        }

    }

    /*==== DEL ADMIN SIDEBAR MENU ====*/
    public function del_admin_menu()
    {
        $menuId=$this->uri->segment(3);
        $this->Admin_model->delAdminMenu($menuId);
        redirect(base_url().'admin/manage_admin_menu');
    }

    /*==== MANAGE ADMIN SIDEBAR MENU ====*/
    public function manage_admin_menu()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->Admin_model->getMenuItems();
            $data['theme']=$this->Admin_model->getActiveTheme();
            $data['menu_items']=$this->Admin_model->getAllMenuItems();
            /*$email = $this->session->userdata['email'];
            $data['profile'] = $this->Admin_model->get_admin_data($email);*/
            $data['title']='Real Estate | Manage Admin Menu';
            $this->load->view('backend/static/head',$data);
            $this->load->view('backend/static/header');
            $this->load->view('backend/static/sidebar1');
            $this->load->view('backend/admin/manage_admin_menu');
            $this->load->view('backend/static/footer');
        }
        else
        {
            redirect(base_url());
        }
    }
    /*===== EXPORT DATA =====*/
    public function action()
    {
        if($this->isLoggedIn())
        {
            $this->load->model("Admin_model");
            $this->load->library('Excel');
            $object = new PHPExcel();
            $object->setActiveSheetIndex(0);
            $table_columns = array("parent", "name", "class", "url");
            $columns = 0;
            foreach($table_columns as $field)
            {
                $object->setActiveSheetIndex()->setCellValueByColumnAndRow($columns,1,$field);
                $columns++;
            }

            $menu_items = $this->Admin_model->getAll('admin_menu');
            $excel_row = 2;
            for($i=0; $i<count($menu_items); $i++)
            {
                $object->setActiveSheetIndex()->setCellValueByColumnAndRow(0,$excel_row,$menu_items[$i]['parent']);
                $object->setActiveSheetIndex()->setCellValueByColumnAndRow(1,$excel_row,$menu_items[$i]['name']);
                $object->setActiveSheetIndex()->setCellValueByColumnAndRow(2,$excel_row,$menu_items[$i]['class']);
                $object->setActiveSheetIndex()->setCellValueByColumnAndRow(3,$excel_row,$menu_items[$i]['url']);
                $excel_row++;
            }
            $object_writer = PHPExcel_IOFactory::createWriter($object,'Excel5');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename="Admin_menu.xls"');
            $object_writer->save('php://output');
        }
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Admin Menu Section Ends     ///
    ///                                 ///
    ///////////////////////////////////////

   /*==== FUNCTION CHECK USER SESSION =====*/
   public function isLoggedIn()
    {
        if (!empty($this->session->userdata['id']) && $this->session->userdata['type'] == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    /*==== FUNCTION LOGOUT CURRENT USER =====*/
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    /*==== FUNCTION CHANGE CURRENT THEME ====*/
    public function changeTheme()
    {
        $id=$this->uri->segment(3);
        $path=$_SERVER['HTTP_REFERER'];
        $this->Admin_model->activateTheme($id);
        redirect($path);
    }

    /*==== CHANGE PASSWORD ====*/
    public function change_password()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->Admin_model->getMenuItems();
            $data['theme']=$this->Admin_model->getActiveTheme();
            $email=$this->session->userdata['email'];
            //$data['profile']=$this->admin_model->get_admin_data($email);
            $data['email']=$this->session->userdata['email'];
            if($_POST){
                $config=array(
                    array(
                        'field' =>  'new_pass',
                        'label' =>  'New Password',
                        'rules' =>  'required|matches[confirm_pass]'
                    ),
                    array(
                        'field' =>  'confirm_pass',
                        'label' =>  'Confirm Password',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['title']='Real Estate | Change Password';
                    $this->load->view('backend/static/head',$data);
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/static/sidebar1');
                    $this->load->view('backend/admin/change_password',$data);
                    $this->load->view('backend/static/footer');
                }
                else
                {
                    $encrpTPass=md5(sha1($_POST['old_pass']));
                    $data['oldPass']=$this->Admin_model->checkOldPass($data['email'],$encrpTPass);
                    if($data['oldPass']>0){
                        $confirmPass=md5(sha1($_POST['confirm_pass']));
                        $data['user_Id']=$this->Admin_model->getUserId($data['email']);
                        $this->Admin_model->updatePass($data['user_Id']['id'],$confirmPass);
                        $this->passwordChangeEmail();
                        $data['success']='Congratulations! Password Updated Successfully';
                        $data['theme']=$this->Admin_model->getActiveTheme();
                        $data['title']='Real Esate | Change Password';
                        $this->load->view('backend/static/head',$data);
                        $this->load->view('backend/static/header');
                        $this->load->view('backend/static/sidebar1');
                        $this->load->view('backend/admin/change_password',$data);
                        $this->load->view('backend/static/footer');
                    }
                    else
                    {
                        $data['theme']=$this->Admin_model->getActiveTheme();
                        $data['errors']='Sorry Old Password does not Match';
                        $data['title']='Real Estate | Change Password';
                        $this->load->view('backend/static/head',$data);
                        $this->load->view('backend/static/header');
                        $this->load->view('backend/static/sidebar1');
                        $this->load->view('backend/admin/change_password',$data);
                        $this->load->view('backend/static/footer');
                    }
                }
            }
            else
            {
                $data['theme']=$this->Admin_model->getActiveTheme();
                $data['title']='Real Estate | Change Password';
                $this->load->view('backend/static/head',$data);
                $this->load->view('backend/static/header');
                $this->load->view('backend/static/sidebar1');
                $this->load->view('backend/admin/change_password',$data);
                $this->load->view('backend/static/footer');
            }
        }
        else
        {
            redirect(base_url());
        }
    }

    /*==== SEND PASSWORD CHANGE EMAIL ====*/
    public function passwordChangeEmail()
    {
        $settings=$this->Admin_model->getEmailSettings();
        $data['user']=$this->session->userdata;
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host       = $settings->host;
        $mail->Port       = $settings->port;
        $mail->Username   = $settings->email;
        $mail->Password   = $settings->password;
        $mail->SetFrom($settings->sent_email, $settings->sent_title);
        $mail->AddReplyTo($settings->reply_email,$settings->reply_email);
        $mail->Subject    = "Congratulations! Your Password has been Changed";
        $mail->IsHTML(true);
        $body = $this->load->view('emails/passwordChangeEmail', $data, true);
        $mail->MsgHTML($body);
        $destination = $data['user']['email'];
        $mail->AddAddress($destination);
        if(!$mail->Send()) {
            $data['code']=300;
            $data["message"] = "Error: " . $mail->ErrorInfo;
        }
    }

    ///////////////////////////////////////
    ///                                 ///
    ///     SMTP  Settings  Start       ///
    ///                                 ///
    ///////////////////////////////////////

    /*==== EDIT SMTP CONFIG ====*/
    public function edit_smtp_config()
    {
        if ($this->isLoggedIn()) {
            $menuId = $this->uri->segment(3);
            $data['menu'] = $this->Admin_model->getMenuItems();
            $data['theme']=$this->Admin_model->getActiveTheme();
            $email = $this->session->userdata['email'];
            //$data['profile'] = $this->admin_model->get_admin_data($email);
            $data['smtp_config'] = $this->Admin_model->getConfig_Byid($menuId);
            if ($_POST) {
                $config = array(
                    array(
                        'field' => 'host',
                        'label' => 'Host',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'port',
                        'label' => 'Port',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'sent_email',
                        'label' => 'Sent_Email',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'sent_title',
                        'label' => 'Sent_Title',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'reply_email',
                        'label' => 'Reply_Email',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'reply_title',
                        'label' => 'Reply_Title',
                        'rules' => 'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if ($this->form_validation->run() == false) {
                    $data['errors'] = validation_errors();
                    $data['menu'] = $this->Admin_model->getMenuItems();
                    $data['theme']=$this->Admin_model->getActiveTheme();
                    $email = $this->session->userdata['email'];
                    //$data['profile'] = $this->admin_model->get_admin_data($email);
                    $data['smtp_config'] = $this->Admin_model->getConfig_Byid($menuId);
                    $data['title'] = 'Real Estate | Edit SMTP Config';
                    $this->load->view('backend/static/head', $data);
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/static/sidebar1');
                    $this->load->view('backend/admin/edit_smtp_config');
                    $this->load->view('backend/static/footer');
                }
                else
                {
                    $this->Admin_model->update_stmp_config($_POST, $menuId);
                    $data['success'] = 'Congratulations! SMTP Configuration Updated Successfully';
                    $data['menu'] = $this->Admin_model->getMenuItems();
                    $data['theme']=$this->Admin_model->getActiveTheme();
                    $email = $this->session->userdata['email'];
                    //$data['profile'] = $this->admin_model->get_admin_data($email);
                    $data['smtp_config'] = $this->Admin_model->getConfig_Byid($menuId);
                    $data['title'] = 'Real Estate | Edit SMTP Config';
                    $this->load->view('backend/static/head', $data);
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/static/sidebar1');
                    $this->load->view('backend/admin/edit_smtp_config');
                    $this->load->view('backend/static/footer');
                }
            }
            else
            {
                $data['title'] = 'Real Esate | Edit SMTP Config';
                $data['theme']=$this->Admin_model->getActiveTheme();
                $this->load->view('backend/static/head', $data);
                $this->load->view('backend/static/header');
                $this->load->view('backend/static/sidebar1');
                $this->load->view('backend/admin/edit_smtp_config');
                $this->load->view('backend/static/footer');
            }
        } else {
            redirect(base_url());
        }

    }

    ///////////////////////////////////////
    ///                                 ///
    ///     SMTP Settings End           ///
    ///                                 ///
    ///////////////////////////////////////

    ///////////////////////////////////////
    ///                                 ///
    ///     FRONTEND SETTINGS START     ///
    ///                                 ///
    ///////////////////////////////////////

    /*===== ADD SLIDER IMAGE =====*/
    public function add_slider_image()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->Admin_model->getMenuItems();
            $data['theme']=$this->Admin_model->getActiveTheme();
            $email = $this->session->userdata['email'];
            //$data['profile'] = $this->admin_model->get_admin_data($email);
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'title',
                        'label' =>  'Title',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'sub_title',
                        'label' =>  'Sub Title',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'quote',
                        'label' =>  'Quote',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'alt',
                        'label' =>  'AlT',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'link',
                        'label' =>  'Link',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'align',
                        'label' =>  'Alignment',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['title']='Real Estate | Add Slider Image';
                    $this->load->view('backend/static/head',$data);
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/static/sidebar1');
                    $this->load->view('backend/admin/add_slider_image');
                    $this->load->view('backend/static/footer');
                }
                else
                {
                    $this->Admin_model->add_slider($_POST);
                    $data['success']='Congratulations! Image Added Successfully';
                    $data['menu']=$this->Admin_model->getMenuItems();
                    $data['theme']=$this->Admin_model->getActiveTheme();
                    $email = $this->session->userdata['email'];
                    //$data['profile'] = $this->admin_model->get_admin_data($email);
                    $data['title']='Real Estate | Add Slider Image';
                    $this->load->view('backend/static/head',$data);
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/static/sidebar1');
                    $this->load->view('backend/admin/add_slider_image');
                    $this->load->view('backend/static/footer');
                }
            }
            else
            {
                $data['theme']=$this->Admin_model->getActiveTheme();
                $data['title']='Real Estate | Add Slider Image';
                $this->load->view('backend/static/head',$data);
                $this->load->view('backend/static/header');
                $this->load->view('backend/static/sidebar1');
                $this->load->view('backend/admin/add_slider_image');
                $this->load->view('backend/static/footer');
            }
        }
        else
        {
            redirect(base_url());
        }
    }

    /*===== EDIT SLIDE DETAIL ======*/
    public function edit_slide_detail()
    {
        if ($this->isLoggedIn()) {
            $menuId = $this->uri->segment(3);
            $data['menu'] = $this->Admin_model->getMenuItems();
            $data['theme']=$this->Admin_model->getActiveTheme();
            $email = $this->session->userdata['email'];
            //$data['profile'] = $this->admin_model->get_admin_data($email);
            $data['slide_detail'] = $this->Admin_model->getById('slider',$menuId);
            if ($_POST) {
                $config=array(
                    array(
                        'field' =>  'title',
                        'label' =>  'Title',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'sub_title',
                        'label' =>  'Sub Title',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'quote',
                        'label' =>  'Quote',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'alt',
                        'label' =>  'AlT',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if ($this->form_validation->run() == false) {
                    $data['errors'] = validation_errors();
                    $data['menu'] = $this->Admin_model->getMenuItems();
                    $data['theme']=$this->Admin_model->getActiveTheme();
                    $email = $this->session->userdata['email'];
                    //$data['profile'] = $this->admin_model->get_admin_data($email);
                    $data['slide_detail'] = $this->Admin_model->getById('slider',$menuId);
                    $data['title'] = 'Real Estate | Edit Slide Detail';
                    $this->load->view('backend/static/head', $data);
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/static/sidebar1');
                    $this->load->view('backend/admin/edit_slider_image');
                    $this->load->view('backend/static/footer');
                }
                else
                {
                    $this->Admin_model->update_slide_detail($_POST, $menuId);
                    $data['success'] = 'Congratulations! Slide Detail Updated Successfully';
                    $data['menu'] = $this->Admin_model->getMenuItems();
                    $data['theme']=$this->Admin_model->getActiveTheme();
                    $email = $this->session->userdata['email'];
                    //$data['profile'] = $this->admin_model->get_admin_data($email);
                    $data['slide_detail'] = $this->Admin_model->getById('slider',$menuId);
                    $data['title'] = 'Real Estate | Edit Slide Detail';
                    $this->load->view('backend/static/head', $data);
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/static/sidebar1');
                    $this->load->view('backend/admin/edit_slider_image');
                    $this->load->view('backend/static/footer');
                }
            }
            else
            {
                $data['title'] = 'Real Esate | Edit Slide Detail';
                $data['theme']=$this->Admin_model->getActiveTheme();
                $this->load->view('backend/static/head', $data);
                $this->load->view('backend/static/header');
                $this->load->view('backend/static/sidebar1');
                $this->load->view('backend/admin/edit_slider_image');
                $this->load->view('backend/static/footer');
            }
        } else {
            redirect(base_url());
        }
    }

    /*===== VIEW SLIDE DETAIL =====*/
    public function view_slide_detail()
    {
        if($this->isLoggedIn())
        {
            $menuId = $this->uri->segment(3);
            $data['menu'] = $this->Admin_model->getMenuItems();
            $data['theme']=$this->Admin_model->getActiveTheme();
            $data['slide_detail']=$this->Admin_model->getById('slider',$menuId);
            $data['title']="Real Estate | Manage Slider";
            $this->load->view('backend/static/head',$data);
            $this->load->view('backend/static/header');
            $this->load->view('backend/static/sidebar1');
            $this->load->view('backend/admin/view_slide');
            $this->load->view('backend/static/footer');
        }
        else
        {
            redirect(base_url());
        }
    }
    /*===== MANAGE SLIDER IMAGES =====*/
    public function manage_slider()
    {
        if($this->isLoggedIn())
        {
            $data['menu'] = $this->Admin_model->getMenuItems();
            $data['theme']=$this->Admin_model->getActiveTheme();
            $data['slider']=$this->Admin_model->getAll('slider');
            $data['title']="Real Estate | Manage Slider";
            $this->load->view('backend/static/head',$data);
            $this->load->view('backend/static/header');
            $this->load->view('backend/static/sidebar1');
            $this->load->view('backend/admin/manage_slider');
            $this->load->view('backend/static/footer');
        }
        else
        {
            redirect(base_url());
        }
    }

    /*==== ENABLE SLIDER IMAGE ====*/
    public function enable_slider_image()
    {
        $id=$this->uri->segment(3);
        $this->Admin_model->enable_slider($id);
        redirect(base_url().'Admin/manage_slider');
    }

    /*===== DISABLE SLIDER IMAGE ====*/
    public function disable_slider_image()
    {
        $id=$this->uri->segment(3);
        $this->Admin_model->disable_slider($id);
        redirect(base_url().'Admin/manage_slider');
    }

    /*==== DELETE SLIDER IMAGE ====*/
    public function del_sliderImage()
    {
        $menuId=$this->uri->segment(3);
        $this->Admin_model->del_slider_image($menuId);
        redirect(base_url().'Admin/manage_slider');
    }


    /*===== ADD BRAND LOGO =====*/
    public function add_brand()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->Admin_model->getMenuItems();
            $data['theme']=$this->Admin_model->getActiveTheme();
            $email = $this->session->userdata['email'];
            //$data['profile'] = $this->admin_model->get_admin_data($email);
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'title',
                        'label' =>  'Title',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'alt',
                        'label' =>  'ALT',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['title']='Real Estate | Add Slider Image';
                    $this->load->view('backend/static/head',$data);
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/static/sidebar1');
                    $this->load->view('backend/admin/add_brand_logo');
                    $this->load->view('backend/static/footer');
                }
                else
                {
                    $this->Admin_model->add_brand_logo($_POST);
                    $data['success']='Congratulations! Brand Added Successfully';
                    $data['menu']=$this->Admin_model->getMenuItems();
                    $data['theme']=$this->Admin_model->getActiveTheme();
                    $email = $this->session->userdata['email'];
                    //$data['profile'] = $this->admin_model->get_admin_data($email);
                    $data['title']='Real Estate | Add Brand ';
                    $this->load->view('backend/static/head',$data);
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/static/sidebar1');
                    $this->load->view('backend/admin/add_brand_logo');
                    $this->load->view('backend/static/footer');
                }
            }
            else
            {
                $data['theme']=$this->Admin_model->getActiveTheme();
                $data['title']='Real Estate | Add Brand';
                $this->load->view('backend/static/head',$data);
                $this->load->view('backend/static/header');
                $this->load->view('backend/static/sidebar1');
                $this->load->view('backend/admin/add_brand_logo');
                $this->load->view('backend/static/footer');
            }
        }
        else
        {
            redirect(base_url());
        }
    }

    /*===== MANAGE BRANDS LOGO ====*/
    public function manage_brands()
    {
        if($this->isLoggedIn())
        {
            $data['menu'] = $this->Admin_model->getMenuItems();
            $data['theme']=$this->Admin_model->getActiveTheme();
            $data['brands']=$this->Admin_model->getAll('brands');
            $data['title']="Real Estate | Manage Slider";
            $this->load->view('backend/static/head',$data);
            $this->load->view('backend/static/header');
            $this->load->view('backend/static/sidebar1');
            $this->load->view('backend/admin/manage_brands');
            $this->load->view('backend/static/footer');
        }
        else
        {
            redirect(base_url());
        }
    }

    public function edit_brand()
    {
        if ($this->isLoggedIn()) {
            $menuId = $this->uri->segment(3);
            $data['menu'] = $this->Admin_model->getMenuItems();
            $data['theme']=$this->Admin_model->getActiveTheme();
            $email = $this->session->userdata['email'];
            //$data['profile'] = $this->admin_model->get_admin_data($email);
            $data['brand_detail'] = $this->Admin_model->getById('slider',$menuId);
            if ($_POST) {
                $config=array(
                    array(
                        'field' =>  'title',
                        'label' =>  'Title',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'alt',
                        'label' =>  'ALT',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if ($this->form_validation->run() == false) {
                    $data['errors'] = validation_errors();
                    $data['menu'] = $this->Admin_model->getMenuItems();
                    $data['theme']=$this->Admin_model->getActiveTheme();
                    $email = $this->session->userdata['email'];
                    //$data['profile'] = $this->admin_model->get_admin_data($email);
                    $data['brand_detail'] = $this->Admin_model->getById('brands',$menuId);
                    $data['title'] = 'Real Estate | Edit Slide Detail';
                    $this->load->view('backend/static/head', $data);
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/static/sidebar1');
                    $this->load->view('backend/admin/edit_brand');
                    $this->load->view('backend/static/footer');
                }
                else
                {
                    $this->Admin_model->update_brand($_POST, $menuId);
                    $data['success'] = 'Congratulations! Brand Updated Successfully';
                    $data['menu'] = $this->Admin_model->getMenuItems();
                    $data['theme']=$this->Admin_model->getActiveTheme();
                    $email = $this->session->userdata['email'];
                    //$data['profile'] = $this->admin_model->get_admin_data($email);
                    $data['brand_detail'] = $this->Admin_model->getById('brands',$menuId);
                    $data['title'] = 'Real Estate | Edit Slide Detail';
                    $this->load->view('backend/static/head', $data);
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/static/sidebar1');
                    $this->load->view('backend/admin/edit_brand');
                    $this->load->view('backend/static/footer');
                }
            }
            else
            {
                $data['title'] = 'Real Esate | Edit Slide Detail';
                $data['theme']=$this->Admin_model->getActiveTheme();
                $this->load->view('backend/static/head', $data);
                $this->load->view('backend/static/header');
                $this->load->view('backend/static/sidebar1');
                $this->load->view('backend/admin/edit_brand');
                $this->load->view('backend/static/footer');
            }
        } else {
            redirect(base_url());
        }
    }

    /*==== DELETE BRAND LOGO ====*/
    public function del_brand_logo()
    {
        $menuId=$this->uri->segment(3);
        $this->Admin_model->delete('brands',$menuId);
        redirect(base_url().'Admin/manage_brands');
    }


    ///////////////////////////////////////
    ///                                 ///
    ///     Product CRUD Section Start  ///
    ///                                 ///
    ///////////////////////////////////////

    /*===== ADD PRODUCT CATEGORY =====*/
    public function add_category()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->Admin_model->getMenuItems();
            $data['theme']=$this->Admin_model->getActiveTheme();
            $email = $this->session->userdata['email'];
            //$data['profile'] = $this->admin_model->get_admin_data($email);
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['title']='Real Estate | Add Slider Image';
                    $this->load->view('backend/static/head',$data);
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/static/sidebar1');
                    $this->load->view('backend/admin/add_category');
                    $this->load->view('backend/static/footer');
                }
                else
                {
                    $this->Admin_model->add_category($_POST);
                    $data['success']='Congratulations! Category Added Successfully';
                    $data['menu']=$this->Admin_model->getMenuItems();
                    $data['theme']=$this->Admin_model->getActiveTheme();
                    $email = $this->session->userdata['email'];
                    //$data['profile'] = $this->admin_model->get_admin_data($email);
                    $data['title']='Real Estate | Add Brand ';
                    $this->load->view('backend/static/head',$data);
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/static/sidebar1');
                    $this->load->view('backend/admin/add_category');
                    $this->load->view('backend/static/footer');
                }
            }
            else
            {
                $data['theme']=$this->Admin_model->getActiveTheme();
                $data['title']='Real Estate | Add Brand';
                $this->load->view('backend/static/head',$data);
                $this->load->view('backend/static/header');
                $this->load->view('backend/static/sidebar1');
                $this->load->view('backend/admin/add_category');
                $this->load->view('backend/static/footer');
            }
        }
        else
        {
            redirect(base_url());
        }
    }

    /*==== EDIT PRODUCT CATEGORY =====*/
    public function edit_category()
    {
        if ($this->isLoggedIn()) {
            $menuId = $this->uri->segment(3);
            $data['menu'] = $this->Admin_model->getMenuItems();
            $data['theme']=$this->Admin_model->getActiveTheme();
            $email = $this->session->userdata['email'];
            //$data['profile'] = $this->admin_model->get_admin_data($email);
            $data['category_detail'] = $this->Admin_model->getById('category',$menuId);
            if ($_POST) {
                $config=array(
                    array(
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if ($this->form_validation->run() == false) {
                    $data['errors'] = validation_errors();
                    $data['menu'] = $this->Admin_model->getMenuItems();
                    $data['theme']=$this->Admin_model->getActiveTheme();
                    $email = $this->session->userdata['email'];
                    //$data['profile'] = $this->admin_model->get_admin_data($email);
                    $data['category_detail'] = $this->Admin_model->getById('category',$menuId);
                    $data['title'] = 'Real Estate | Edit Slide Detail';
                    $this->load->view('backend/static/head', $data);
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/static/sidebar1');
                    $this->load->view('backend/admin/edit_category');
                    $this->load->view('backend/static/footer');
                }
                else
                {
                    $this->Admin_model->update_category($_POST, $menuId);
                    $data['success'] = 'Congratulations! Category Updated Successfully';
                    $data['menu'] = $this->Admin_model->getMenuItems();
                    $data['theme']=$this->Admin_model->getActiveTheme();
                    $email = $this->session->userdata['email'];
                    //$data['profile'] = $this->admin_model->get_admin_data($email);
                    $data['category_detail'] = $this->Admin_model->getById('category',$menuId);
                    $data['title'] = 'Real Estate | Edit Slide Detail';
                    $this->load->view('backend/static/head', $data);
                    $this->load->view('backend/static/header');
                    $this->load->view('backend/static/sidebar1');
                    $this->load->view('backend/admin/edit_category');
                    $this->load->view('backend/static/footer');
                }
            }
            else
            {
                $data['title'] = 'Real Esate | Edit Slide Detail';
                $data['theme']=$this->Admin_model->getActiveTheme();
                $this->load->view('backend/static/head', $data);
                $this->load->view('backend/static/header');
                $this->load->view('backend/static/sidebar1');
                $this->load->view('backend/admin/edit_category');
                $this->load->view('backend/static/footer');
            }
        } else {
            redirect(base_url());
        }
    }

    /*===== MANAGE CATEGORY =====*/
    public function manage_categories()
    {
        if($this->isLoggedIn())
        {
            $data['menu'] = $this->Admin_model->getMenuItems();
            $data['theme']=$this->Admin_model->getActiveTheme();
            $data['categories']=$this->Admin_model->getAll('category');
            $data['title']="Real Estate | Manage Slider";
            $this->load->view('backend/static/head',$data);
            $this->load->view('backend/static/header');
            $this->load->view('backend/static/sidebar1');
            $this->load->view('backend/admin/manage_categories');
            $this->load->view('backend/static/footer');
        }
        else
        {
            redirect(base_url());
        }
    }

    /*===== DELETE CATEGORY =====*/
    public function delete_category()
    {
        $menuId=$this->uri->segment(3);
        $this->Admin_model->delete('category',$menuId);
        redirect(base_url().'Admin/manage_categories');
    }

    /*==== ADD PRODUCT SUB CATEGORY =====*/
    public function add_sub_category()
    {
        $data['menu'] = $this->Admin_model->getMenuItems();
        $data['theme']=$this->Admin_model->getActiveTheme();
        $data['category']=$this->Admin_model->getAll('category');
        $data['brand']=$this->Admin_model->getAll('brands');
        $data['title'] = "Technology Revolutions | Add Sub category ";
        $this->load->view('backend/static/head',$data);
        $this->load->view('backend/static/header');
        $this->load->view('backend/static/sidebar1');
        $this->load->view('backend/admin/add_sub_category');
        $this->load->view('backend/static/footer');
    }

    /*==== EDIT PRODUCT SUB CATEGORY ====*/
    public function edit_sub_category()
    {
        if($this->isLoggedIn())
        {

        }
        else
        {
            redirect(base_url());
        }
    }

    /*==== MANAGE SUB CATEGORIES ====*/
    public function manage_sub_categories()
    {

    }

    /*===== DELETE SUB CATEGORY ====*/
    public function delete_sub_category()
    {

    }

    /*===== ADD PRODUCT =====*/
    public function add_product()
    {
        if($this->isLoggedIn())
        {

        }
        else
        {
            redirect(base_url());
        }
    }

    /*==== EDIT PRODUCT ====*/
    public function edit_product()
    {
        if($this->isLoggedIn())
        {

        }
        else
        {
            redirect(base_url());
        }
    }

    /*==== MANAGE PRODUCTS ====*/
    public function manage_product()
    {
        if($this->isLoggedIn())
        {

        }
        else
        {
            redirect(base_url());
        }
    }

    /*==== VIEW PRODUCT DETAIL ====*/
    public function product_detail()
    {
        if($this->isLoggedIn())
        {

        }
        else
        {
            redirect(base_url());
        }
    }

    ///////////////////////////////////////
    ///                                 ///
    ///     Product CRUD Section End    ///
    ///                                 ///
    ///////////////////////////////////////

}
<?php
/**
 * Created by PhpStorm.
 * User: saadi
 * Date: 11/30/2017
 * Time: 4:40 AM
 */
class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    ///////////////////////////////////////
    ///                                 ///
    ///     Admin Menu Section Starts   ///
    ///                                 ///
    ///////////////////////////////////////

    /*==== GET MENU PARENTS ====*/
    public function getMenuParents()
    {
        return $this->db->select('*')->from('admin_menu')->where('parent', 0)->get()->result_array();
    }

    /*==== ADD ADMIN MENU ITEM ====*/
    public function addMenuItem($data)
    {
        $item = array(
            'parent' => $data['parent'],
            'name' => $data['name'],
            'class' => $data['class'],
            'url' => $data['url']
        );

        $this->db->insert('admin_menu', $item);
    }

    /*==== UPDATE ADMIN MENU ITEM =====*/
    public function updateMenuItem($data, $menuId)
    {
        $item = array(
            'parent' => $data['parent'],
            'name' => $data['name'],
            'class' => $data['class'],
            'url' => $data['url']
        );

        $this->db->WHERE('id', $menuId)->update('admin_menu', $item);
    }

    /*==== GET ADMIN MENU ITEMS =====*/
    public function getMenuItems()
    {
        $st = $this->db->select('*')->from('admin_menu')->where('parent', 0)->get()->result_array();
        if (count($st) > 0) {
            for ($i = 0; $i < count($st); $i++) {
                $st[$i]['child'] = $this->db->select('*')->from('admin_menu')->where('parent', $st[$i]['id'])->get()->result_array();
            }
        } else {
            return false;
        }

        return $st;
    }

    /*==== GET ALL ADMIN MENU ITEMS ====*/
    public function getAllMenuItems()
    {
        return $this->db->query('SELECT admin_menu.*, a.name as parent from admin_menu left join admin_menu a on a.id=admin_menu.parent')->result_array();
    }

    /*==== GET MENU ITEM DETAIL ====*/
    public function getMenuItemDetail($menuId)
    {
        $st = $this->db->select('*')->from('admin_menu')->WHERE('id', $menuId)->get()->result_array();
        return $st[0];
    }

    /*===== DEL ADMIN MENU =====*/
    public function delAdminMenu($id)
    {
        $this->db->query('DELETE from admin_menu WHERE id=' . $id);
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Admin Menu Section Ends     ///
    ///                                 ///
    ///////////////////////////////////////

    /*==== FUNCTION GET ALL DATA ====*/
    public function getAll($table)
    {
        return $this->db->select('*')->from($table)->get()->result_array();
    }

    /*==== FUNCTION GET ACTIVE THEME ====*/
    public function getActiveTheme()
    {
        $st=$this->db->select('name')->from('theme')->where('status','Active')->get()->result_array();
        return $st[0]['name'];
    }

    /*==== FUNCTION GET ACTIVE THEME ID ====*/
    public function getActiveThemeId()
    {
        $st=$this->db->select('*')->from('theme')->where('status','Active')->get()->result_array();
        return $st[0]['id'];
    }

    /*==== FUNCTION ACTIVATE THEME ====*/
    public function activateTheme($id)
    {
        $theme=$this->getActiveThemeId();
        $data=array(
            'status'=> 'Inactive'
        );
        $this->db->WHERE('id',$theme)->update('theme',$data);

        $data=array(
            'status'=> 'Active'
        );
        $this->db->WHERE('id',$id)->update('theme',$data);
    }

    /*==== CHECK OLD PASSWORD ====*/
    public function checkOldPass($email, $oldPass)
    {
        $array = array(
            'email' => $email,
            'password' => $oldPass
        );
        $st = $this->db->select('id')->from('users')->WHERE($array)->get()->result_array();
        return $this->db->affected_rows();
    }

    /*==== UPDATE PASSWORD ====*/
    public function updatePass($id, $pass)
    {
        $update = array(
            'password' => $pass
        );
        $this->db->WHERE('id', $id)->update('users', $update);
    }

    /*==== GET USER ID ====*/
    public function getUserId($email)
    {
        $st = $this->db->select('id')->from('users')->WHERE('email', $email)->get()->result_array();
        return $st[0];
    }

    /*==== GET EMAIL SETTINGS ====*/
    public function getEmailSettings()
    {
        return $this->db->select('*')->from('email_settings')->WHERE('id', 1)->get()->row();
    }

    public function getConfig_Byid($id)
    {
        $st = $this->db->query('SELECT * from email_settings where id=' . $id)->result_array();
        return $st[0];
    }

    /*==== UPDATE SMTP CONFIG ====*/
    public function update_stmp_config($data, $menuId)
    {
        $item = array(
            'host' => $data['host'],
            'port' => $data['port'],
            'email' => $data['email'],
            'password' => $data['password'],
            'sent_email' => $data['sent_email'],
            'sent_title' => $data['sent_title'],
            'reply_email' => $data['reply_email'],
            'reply_title' => $data['reply_title']
        );

        $this->db->WHERE('id', $menuId)->update('email_settings', $item);
    }

    /*===== ADD SLIDER IMAGE =====*/
    public function add_slider($data)
    {
        $item = array(
            'title' => $data['title'],
            'sub_title' => $data['sub_title'],
            'quote' => $data['quote'],
            'alt' => $data['alt'],
            'link' => $data['link'],
            'align' => $data['align']
        );
        $this->db->insert('slider', $item);
        $row_id = $this->db->insert_id();
        $this->upload_image($row_id);
        return $row_id;
    }

    /*==== UPLOAD CLIENT IMAGE ====*/
    public function upload_image($row_id)
    {
        $configUpload['upload_path'] = './uploads/';
        $configUpload['allowed_types'] = 'jpg|png|jpeg';
        $configUpload['max_size'] = '0';
        $configUpload['max_width'] = '0';
        $configUpload['max_height'] = '0';
        $configUpload['encrypt_name'] = true;
        $this->load->library('upload', $configUpload);
        $this->upload->initialize($configUpload);
        if (!$this->upload->do_upload('image')) {
            $uploadedDetails = $this->upload->display_errors();
            print_r($uploadedDetails);
            exit;
        } else {
            $image_name = $this->upload->data('file_name');
            $this->db->update('slider', ['image' => $image_name], ['id' => $row_id]);
        }
    }

    /*===== GET RECORD BY ID =====*/
    public function getById($table, $id)
    {
        $st = $this->db->select('*')->from($table)->WHERE('id', $id)->get()->result_array();
        return $st[0];
    }

    public function update_slide_detail($data, $menuId)
    {
        $item = array(
            'title' => $data['title'],
            'sub_title' => $data['sub_title'],
            'quote' => $data['quote'],
            'alt' => $data['alt']
        );

        $this->db->WHERE('id', $menuId)->update('slider', $item);
    }

    /*==== DELETE SLIDER IMAGE =====*/
    public function del_slider_image($id)
    {
        $this->db->query('DELETE from slider WHERE id=' . $id);
    }

    /*==== ADD BRAND LOGO =====*/
    public function add_brand_logo($data)
    {
        $item = array(
            'title' => $data['title'],
            'alt' => $data['alt']
        );
        $this->db->insert('brands', $item);
        $row_id = $this->db->insert_id();
        $this->upload_brand_logo($row_id);
        return $row_id;
    }

    /*==== UPLOAD CLIENT IMAGE ====*/
    public function upload_brand_logo($row_id)
    {
        $configUpload['upload_path'] = './uploads/';
        $configUpload['allowed_types'] = 'jpg|png|jpeg';
        $configUpload['max_size'] = '0';
        $configUpload['max_width'] = '0';
        $configUpload['max_height'] = '0';
        $configUpload['encrypt_name'] = true;
        $this->load->library('upload', $configUpload);
        $this->upload->initialize($configUpload);
        if (!$this->upload->do_upload('image')) {
            $uploadedDetails = $this->upload->display_errors();
            print_r($uploadedDetails);
            exit;
        } else {
            $image_name = $this->upload->data('file_name');
            $this->db->update('brands', ['logo' => $image_name], ['id' => $row_id]);
        }
    }

    /*==== DELETE BRAND LOGO =====*/
    public function del_brand_logo($id)
    {
        $this->db->query('DELETE from brands WHERE id=' . $id);
    }

    /*==== UPDATE BRAND ====*/
    public function update_brand($data,$id)
    {
        $item =
            array(
                'title' => $data['title'],
                'alt'   => $data['alt']
            );

        $this->db->WHERE('id',$id)->update('brands', $item);
    }

    /*==== ADD CATEGORY ====*/
    public function add_category($data)
    {
        $item = array(
            'name' => $data['name']
        );
        $this->db->insert('category', $item);
        $row_id = $this->db->insert_id();
        $this->upload_cat_banner($row_id);
        return $row_id;
    }

    /*==== UPLOAD CATEGORY BANNER =====*/
    public function upload_cat_banner($row_id)
    {
        $configUpload['upload_path'] = './uploads/';
        $configUpload['allowed_types'] = 'jpg|png|jpeg';
        $configUpload['max_size'] = '0';
        $configUpload['max_width'] = '0';
        $configUpload['max_height'] = '0';
        $configUpload['encrypt_name'] = true;
        $this->load->library('upload', $configUpload);
        $this->upload->initialize($configUpload);
        if (!$this->upload->do_upload('image')) {
            $uploadedDetails = $this->upload->display_errors();
            print_r($uploadedDetails);
            exit;
        } else {
            $image_name = $this->upload->data('file_name');
            $this->db->update('category', ['banner' => $image_name], ['id' => $row_id]);
        }
    }

    /*==== UPDATE CATEGORY ====*/
    public function update_category($data,$id)
    {
        $item =
            array(
                'name' => $data['name']
            );

        $this->db->WHERE('id',$id)->update('category', $item);
    }

    /*==== FUNCTION DELETE SINGLE RECORD ====*/
    public function delete($table,$id)
    {
        $this->db->query("DELETE from $table WHERE id='$id'");
    }

    /*==== ENABLE SLIDER IMAGE ====*/
    public function enable_slider($id)
    {
       $item = array(
           'status' => 'Enable'
       );
       $this->db->WHERE('id',$id)->update('slider',$item);
    }

    /*==== DISABLE SLIDER IMAGE ====*/
    public function disable_slider($id)
    {
        $item = array(
            'status' => "Disable"
        );
        $this->db->WHERE('id',$id)->update('slider',$item);
    }
}
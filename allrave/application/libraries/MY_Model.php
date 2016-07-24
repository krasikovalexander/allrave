<?php 
if (!defined("BASEPATH")) exit("No direct script access allowed");
if (!class_exists('CI_Model')) require_once (BASEPATH . 'core/Model.php');

class MY_Model extends CI_Model {
    protected $table            = NULL;    
    protected $primary_key      = 'id';
    protected $fields           = array();
    public $original_path       = './uploads';
    protected $before_create    = array();
    protected $after_create     = array();
    protected $before_update    = array();
    protected $after_update     = array();
    protected $before_get       = array();
    protected $after_get        = array();
    protected $before_delete    = array();
    protected $after_delete     = array();
    protected $result_mode      = 'object';
    protected $validate         = array();
    protected $skip_validation  = FALSE;

    public function __call($method, $params) 
    {
        if (method_exists($this->db, $method)) 
        {
            call_user_func_array(array($this->db, $method), $params);
            return $this;
        }
    }
    public function get() 
    {
        $where = & func_get_args();

        $where = $this->_callbacks('before_get', array($where));
        $this->_set_where($where);
        
        if ($this->result_mode == 'object') {
            $row = $this->db->get($this->_table())->row();
        } else {
            $row = $this->db->get($this->_table())->row_array();
        }
        
        $row = $this->_callbacks('after_get', array($row));
        
        return $row;
    }

    public function get_all() 
    {
        $where = & func_get_args();
        
        $where = $this->_callbacks('before_get', array($where));
        $this->_set_where($where);
        
        if ($this->result_mode == 'object') {
            $result = $this->db->get($this->_table())->result();
        } else {
            $result = $this->db->get($this->_table())->result_array();
        }
        
        foreach ($result as &$row) {
            $row = $this->_callbacks('after_get', array($row));
        }
        
        return $result;
    }

    public function get_many() 
    {
        return $this->get_all();
    }

    public function insert($data, $skip_validation = FALSE) 
    {
        $valid = TRUE;
        
        if ($skip_validation === FALSE) {
            $valid = $this->_run_validation($data);
        }
        
        if ($valid) {
            $data = $this->_callbacks('before_create', array($data));
            
            $data = array_intersect_key($data, array_flip($this->_fields()));
            $this->db->insert($this->_table(), $data);
            
            $this->_callbacks('after_create', array($data, $this->db->insert_id()));
            
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

    public function update($primary_value, $data, $skip_validation = FALSE) 
    {
        $valid = TRUE;
        
        $data = $this->_callbacks('before_update', array($data, $primary_value));
        
        if ($skip_validation === FALSE) {
            $valid = $this->_run_validation($data);
        }
        
        if ($valid) {
            $data = array_intersect_key($data, array_flip($this->_fields()));
            
            $result = $this->db->where($this->primary_key, $primary_value)->set($data)->update($this->_table());
            
            $this->_callbacks('after_update', array($data, $primary_value, $result));
            
            return $this->db->affected_rows();
        } else {
            return FALSE;
        }
    }

    public function delete() 
    {
        $where = & func_get_args();
        
        $where = $this->_callbacks('before_delete', array($where));
        $this->_set_where($where);
        
        $result = $this->db->delete($this->_table());
        
        $this->_callbacks('after_delete', array($where, $result));
        
        return $this->db->affected_rows();
    }

    public function count_all_results() 
    {
        $where = & func_get_args();
        $this->_set_where($where);
        
        return $this->db->count_all_results($this->_table());
    }

    public function count_all() 
    {
        return $this->db->count_all($this->_table());
    }

    public function limit($limit = NULL, $offset = NULL) 
    {
        if (is_numeric($limit) && is_numeric($offset)) {
            $this->db->limit($limit, $offset);
        } elseif (is_numeric($limit)) {
            $this->db->limit($limit);
        }
        return $this;
    }

    public function list_fields() 
    {
        return $this->db->list_fields($this->_table());
    }

    public function dropdown() 
    {
        $args = & func_get_args();
        
        if (count($args) == 2) {
            list($key, $value) = $args;
        } else {
            $key = $this->primary_key;
            $value = $args[0];
        }
        
        $this->_callbacks('before_get', array($key, $value));
        
        if ($this->result_mode == 'object') {
            $result = $this->db->select(array($key, $value))->get($this->_table())->result();
            
            $options = array();
            foreach ($result as $row) {
                $row = $this->_callbacks('after_get', array($row));
                $options[$row->{$key}] = $row->{$value};
            }
        } else {
            $result = $this->db->select(array($key, $value))->get($this->_table())->result_array();
            
            $options = array();
            foreach ($result as $row) {
                $row = $this->_callbacks('after_get', array($row));
                $options[$row[$key]] = $row[$value];
            }
        }
        
        return $options;
    }

    public function direct_dropdown() 
    {
        $args = & func_get_args();
        
        if (count($args) == 2) {
            list($key, $value) = $args;
        } else if (count($args) == 3) {
            list($key, $value, $result) = $args;
        } else {
            $key = $this->primary_key;
            $value = $args[0];
        }
        
        $this->_callbacks('before_get', array($key, $value, $result));
        
        if ($this->result_mode == 'object') {
            $result = $result;
            
            $options = array();
            foreach ($result as $row) {
                $row = $this->_callbacks('after_get', array($row));
                $options[$row->{$key}] = $row->{$value};
            }
        } else {
            $result = $result;
            
            $options = array();
            foreach ($result as $row) {
                $row = $this->_callbacks('after_get', array($row));
                $options[$row[$key]] = $row[$value];
            }
        }
        
        return $options;
    }

    public function custom_dropdown() 
    {
        $args = & func_get_args();
        
        if (count($args) == 2) {
            list($key, $value) = $args;
        } else if (count($args) == 3) {
            list($key, $value, $where) = $args;
        } else {
            $key = $this->primary_key;
            $value = $args[0];
        }
        $this->_callbacks('before_get', array($key, $value, $where));
        $this-> db -> where($where);
        
        if ($this->result_mode == 'object') {
            $result = $this->db->select(array($key, $value))->get($this->_table())->result();
            
            $options = array();
            foreach ($result as $row) {
                $row = $this->_callbacks('after_get', array($row));
                $options[$row->{$key}] = $row->{$value};
            }
        } else {
            $result = $this->db->select(array($key, $value))->get($this->_table())->result_array();
            
            $options = array();
            foreach ($result as $row) {
                $row = $this->_callbacks('after_get', array($row));
                $options[$row[$key]] = $row[$value];
            }
        }
        
        return $options;
    }

    public function skip_validation($bool = TRUE) 
    {
        $this->skip_validation = $bool;
        return $this;
    }

    private function _callbacks($name, $params = array()) 
    {
        $data = (isset($params[0])) ? $params[0] : FALSE;
        
        if (!empty($this->$name)) {
            foreach ($this->$name as $method) {
                $data = call_user_func_array(array($this, $method), $params);
            }
        }
        
        return $data;
    }

    private function _run_validation($data) 
    {
        if ($this->skip_validation) {
            return TRUE;
        }
        
        if (!empty($this->validate)) {
            foreach ($data as $key => $val) {
                $_POST[$key] = $val;
            }
            
            $this->load->library('form_validation');
            
            if (is_array($this->validate)) {
                $this->form_validation->set_rules($this->validate);
                
                return $this->form_validation->run();
            } else {
                return $this->form_validation->run($this->validate);
            }
        } else {
            return TRUE;
        }
    }

    private function _set_where($params) 
    {
        if (count($params) == 1) {
            if (!is_array($params[0]) && !strstr($params[0], "'")) {
                $this->db->where($this->primary_key, $params[0]); // 1.
            } else {
                $this->db->where($params[0]); // 2.
            }
        } elseif (count($params) == 2) {
            if (is_array($params[1])) {
                $this->db->where_in($params[0], $params[1]); // 4.
            } else {
                $this->db->where($params[0], $params[1]); // 3.
            }
        }
    }

    private function _fields() 
    {
        if ($this->_table() && empty($this->fields)) {
            $this->fields = $this->db->list_fields($this->_table());
        }
        return $this->fields;
    }

    private function _table() 
    {
        if ($this->table == NULL) {
            $this->load->helper('inflector');
            $class = preg_replace('#((_m|_model)$|$(m_))?#', '', strtolower(get_class($this)));
            $this->table = plural(strtolower($class));
        }
        return $this->table;
    }

    public function options_list($result)
    {   
        $options='';
        if(is_array($result)&& count($result)>0){
            $options .='<option value="" selected="selected">Choose from list</option>';
            foreach ($result as $key => $value) {
                $options .='<option value="'.$key.'">'.$value.'</option>';
            }
        }
        else{
            $options .='<option value="">No data Available</option>';
        }
        return $options;
    }

    function do_upload_file($file='') 
    {
        if (!is_dir($this->original_path)) {
            mkdir($this->original_path);
        }
        $config = array('allowed_types' => '*','upload_path' => $this->original_path);
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if(!$this->upload->do_upload($file))
        {
            return $error = array('upload_error' => $this->upload->display_errors());
        }
        else
        {
            $upload_data = $this->upload->data();
            return $upload_data['file_name'];
        }
    }

    function do_upload_pdf($image_name='') 
    {
        if (!is_dir($this->original_path)) {
            mkdir($this->original_path);
        }
        if (!is_dir($this->original_path.'/'.$this->table)) {
            mkdir($this->original_path.'/'.$this->table);
        }
        if (!is_dir($this->original_path.'/'.$this->table.'/thumbs')) {
            mkdir($this->original_path.'/'.$this->table.'/thumbs');
        }
        $config = array('allowed_types' => 'pdf','upload_path' => $this->original_path.'/'.$this->table);
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if(!$this->upload->do_upload($image_name))
        {
            return $error = array('upload_error' => $this->upload->display_errors());
        }
        else
        {
            $upload_data = $this->upload->data();
            return $upload_data['file_name'];
        }
    }

    function do_upload_image($image_name='',$width='',$height='') 
    {
        if (!is_dir($this->original_path)) {
            mkdir($this->original_path);
        }
        if (!is_dir($this->original_path.'/'.$this->table)) {
            mkdir($this->original_path.'/'.$this->table);
        }
        if ($width!='' && $height='' && !is_dir($this->original_path.'/'.$this->table.'/thumbs')) {
            mkdir($this->original_path.'/'.$this->table.'/thumbs');
        }
        $config = array('allowed_types' => 'jpeg|jpg|png|gif','upload_path' => $this->original_path.'/'.$this->table);
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if(!$this->upload->do_upload($image_name))
        {
            return $error = array('upload_error' => $this->upload->display_errors());
        }
        else
        {
            $upload_data = $this->upload->data();
            if($width!='' && $height!='')
            {
                $config2 = array(
                    'source_image' => $upload_data['full_path'],
                    'new_image' => $this->original_path.'/'.$this->table.'/thumbs',
                    'maintain_ratio' => true,
                    'width' => $width,
                    'height' => $height
                );
                $this->image_lib->clear();
                $this->load->library('image_lib', $config2);
                $this->image_lib->resize();
            }
            return $upload_data['file_name'];
        }
    }

    public function enum_values($field)
    {
        $row = $this->db->query("SHOW COLUMNS FROM ".$this->table." LIKE '$field'")->row()->Type;
        $regex = "/'(.*?)'/";
        preg_match_all( $regex , $row, $enum_array );
        return array_combine($enum_array[1], $enum_array[1]);  
    } 


    public function generateJsonWithIndex($fields,$index='') 
    {
        $str = "CONCAT('{',GROUP_CONCAT(CONCAT('\"',".$index.",'\"',':{\"";

        for ($i = 0, $l = count($fields); $i < $l; ++$i) {
            $str.= $fields[$i] . "\":','\"'," . $fields[$i];

            if ($i != $l - 1) {
                $str.= ",'\",\"";
            }
        }
        $str.= ",'\"}')),'}','}')";
        return $str;
    }

    public function generateJson($fields) 
    {
        $str = "CONCAT('[',GROUP_CONCAT(CONCAT('{\"";

        for ($i = 0, $l = count($fields); $i < $l; ++$i) {
            $str.= $fields[$i] . "\":','\"'," . $fields[$i];

            if ($i != $l - 1) {
                $str.= ",'\",\"";
            }
        }
        $str.= ",'\"}')),']')";
        return $str;
    }

    public function keyresult($result,$key)
    {
        $result_array = array();
        foreach ($result as $value) $result_array[$value->$key]=$value; 
        return $result_array;
    }
        
    public function send_mail($from,$to,$subject,$message,$cc='')
    {
        $this->load->library('email'); 
        $this->email->set_mailtype("html");
               
        $this->email->from($from, 'Web Admin');
        $this->email->to($to);
        if($cc!='')
            $this->email->cc($cc);
       
        $this->email->subject($subject);
        $this->email->message($message);
       
        $this->email->send();
       
       return $this->email->print_debugger(); 
    }
}

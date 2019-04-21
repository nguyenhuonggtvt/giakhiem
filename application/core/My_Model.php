<?php
/**
|     _ +----------------------------------------------+ _
|    /o)| webadmin - Created By Team TPT(P33) - Fithou |(o\
|   / / |                                              | \ \
|  ( (_ |  _                                        _  | _) )
| ((\ \)+-/o)--------------------------------------(o\-+(/ /))
| (\\\ \_/ /                                        \ \_/ ///)
|  \      /                                          \      /
|   \____/ Class name: MY_Model modify by @author ThanhBatmon - 0167.371.3098
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Model extends CI_Model {
    private  $table = '';
    function SaveData_ToTable($table=null,$data=null,$primary_key_name='id'){
        $columns=$this->db->list_fields($table);
        $primary_key_val=0;
        if($table!=null && $data!=null){
            foreach($columns as $column){
                    if($column!=$primary_key_name && isset($data[$column])){
                         $data_save[$column]=trim($data[$column]); 
                    }else{
                        if(isset($data[$primary_key_name])){
                            $primary_key_val=$data[$primary_key_name];
                        }
                        if($column!='id' && isset($data[$column])){
                            $data_save[$column]=$data[$column];
                        }
                    }
                }
               
            $has_row=$this->db->get_where($table,array('id'=>$primary_key_val))->num_rows();
                if($has_row){
                    $data_save['last_update']=time();
                     $this->db->update($table,$data_save,array($primary_key_name=>$primary_key_val));
                     return 1;
                }else{
                    
                    $data_save['created']=time();
                    $data_save['status']=1;
                    $this->db->insert($table,$data_save);
                   
                    return  $this->db->insert_id();
                }  
            }
        }
        
}


;?>
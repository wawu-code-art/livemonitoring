<?php 

class Historymonitoringstock_model extends CI_model {
    public function getAllHistoryMonitoringStock($number,$offset)
    {
        // $this->db->select('UNIX_TIMESTAMP(CONCAT(substr(jdge_date_in,7,4),substr(jdge_date_in,4,2),substr(jdge_date_in,1,2)))');
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,jdge_date_in,jdge_date_out,ydate_shift_out,histbantest.probcode');
        $this->db->from('marktech');
        $this->db->join('histbantest', 'histbantest.bc_entried = marktech.bc_entried','inner');
        $this->db->group_start();
        $this->db->where('histbantest.jdge_date_out', '');
        $this->db->where("UNIX_TIMESTAMP(substr(histbantest.ydate_shift_in,1,8)) <", time()-(24*60*60*45));
        $this->db->or_where('histbantest.jdge_date_out !=', '');
        $this->db->group_end();
        return $this->db->get('',$number,$offset)->result_array();     
    }

    public function getAllHistoryMonitoringStockforExcel()
    {
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,jdge_date_in,jdge_date_out,ydate_shift_out,histbantest.probcode');
        $this->db->from('marktech');
        $this->db->join('histbantest', 'histbantest.bc_entried = marktech.bc_entried','inner');
        $this->db->group_start();
        $this->db->where('histbantest.jdge_date_out', '');
        $this->db->where("UNIX_TIMESTAMP(substr(histbantest.ydate_shift_in,1,8)) <", time()-(24*60*60*45));
        $this->db->or_where('histbantest.jdge_date_out !=', '');
        $this->db->group_end();
        return $this->db->get('')->result();     
    }

    public function getHistoryMonitoringStockByBarcode($barcode)
    {
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,jdge_date_in,date_shift_in,ydate_shift_in,jdge_date_out,date_shift_out,ydate_shift_out,ydate_shift_out,jdge,probcode,pic,pic_out,histbantest.opr,opr_out,catatan');
        $this->db->from('marktech');
        $this->db->join('histbantest', 'histbantest.bc_entried = marktech.bc_entried','inner');
        $this->db->group_start();
        $this->db->where('histbantest.jdge_date_out', '');
        $this->db->where("UNIX_TIMESTAMP(substr(histbantest.ydate_shift_in,1,8)) <", time()-(24*60*60*45));
        $this->db->or_where('histbantest.jdge_date_out !=', '');
        $this->db->group_end();
        $newbarcode = str_replace('%20',' ',$barcode);
        return $this->db->get_where('', ['marktech.bc_entried' => $newbarcode])->row_array();
    }

    public function cariDataHistoryMonitoringStock()
    {    
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,jdge_date_in,jdge_date_out,ydate_shift_out,histbantest.probcode');
        $this->db->from('marktech');
        $this->db->join('histbantest', 'histbantest.bc_entried = marktech.bc_entried','inner');
        $this->db->group_start();
        $this->db->where('histbantest.jdge_date_out', '');
        $this->db->where("UNIX_TIMESTAMP(substr(histbantest.ydate_shift_in,1,8)) <", time()-(24*60*60*45));
        $this->db->or_where('histbantest.jdge_date_out !=', '');
        $this->db->group_end();

        $keyword = $this->input->post('keyword', true);
        $this->db->like('marktech.bc_entried', $keyword);
        return $this->db->get()->result_array();
    }

    public function getTotalBaris()
    { 
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,jdge_date_in,jdge_date_out,ydate_shift_out,histbantest.probcode');
        $this->db->from('marktech');
        $this->db->join('histbantest', 'histbantest.bc_entried = marktech.bc_entried','inner');
        $this->db->group_start();
        $this->db->where('histbantest.jdge_date_out', '');
        $this->db->where("UNIX_TIMESTAMP(substr(histbantest.ydate_shift_in,1,8)) <", time()-(24*60*60*45));
        $this->db->or_where('histbantest.jdge_date_out !=', '');
        $this->db->group_end();
        return $this->db->get()->num_rows();
    }

    public function getArrayKeyDate()
    {
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,jdge_date_in,jdge_date_out,ydate_shift_out,histbantest.probcode');
        $this->db->from('marktech');
        $this->db->join('histbantest', 'histbantest.bc_entried = marktech.bc_entried','inner');
        $this->db->group_start();
        $this->db->where('histbantest.ydate_shift_out', '');
        $this->db->where("UNIX_TIMESTAMP(substr(histbantest.ydate_shift_in,1,8)) <", time()-(24*60*60*45));
        $this->db->where('histbantest.probcode !=', 'SCRAP');
        $this->db->group_end();
        $query = $this->db->get();
        $A = [];
        foreach ($query->result() as $row)
        {
            $A[]= substr(date('Y-m',strtotime(str_replace('/','-',$row -> jdge_date_in))),0,7) ;
        }      
        sort($A);      
        return array_keys(array_count_values($A));
    }

    public function getTotalLostTire()
    {
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,jdge_date_in,jdge_date_out,ydate_shift_out,histbantest.probcode');
        $this->db->from('marktech');
        $this->db->join('histbantest', 'histbantest.bc_entried = marktech.bc_entried','inner');
        $this->db->group_start();
        $this->db->where('histbantest.ydate_shift_out', '');
        $this->db->where("UNIX_TIMESTAMP(substr(histbantest.ydate_shift_in,1,8)) <", time()-(24*60*60*45));
        $this->db->where('histbantest.probcode !=', 'SCRAP');
        $this->db->group_end();
        $query = $this->db->get();
        $A = [];
        foreach ($query->result() as $row)
        {
            $A[]= substr(date('Y-m',strtotime(str_replace('/','-',$row -> jdge_date_in))),0,7) ;
        }            
        return array_count_values($A);
    }

}
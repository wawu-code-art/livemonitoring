<?php 

class Livemonitoringstock_model extends CI_model {
    public function getAllLiveMonitoringStock()
    {
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,histbantest.location,jdge_date_in,jdge_date_out,ydate_shift_in');
        $this->db->from('marktech');
        $this->db->join('histbantest', 'histbantest.bc_entried = marktech.bc_entried','inner');
        $this->db->where('histbantest.jdge_date_out', '');
        $this->db->where('UNIX_TIMESTAMP(substr(histbantest.ydate_shift_in,1,8)) >=', time()-(24*60*60*45));
        return $this->db->get('')->result_array();
    }

    public function getLiveMonitoringStock($number,$offset)
    {
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,histbantest.location,jdge_date_in,jdge_date_out,ydate_shift_in');
        $this->db->from('marktech');
        $this->db->join('histbantest', 'histbantest.bc_entried = marktech.bc_entried','inner');
        $this->db->where('histbantest.jdge_date_out', '');
        $this->db->where('UNIX_TIMESTAMP(substr(histbantest.ydate_shift_in,1,8)) >=', time()-(24*60*60*45));
        return $this->db->get('',$number,$offset)->result_array();             
    }

    public function getAllLiveMonitoringStockforExcel()
    {
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,histbantest.location,jdge_date_in,jdge_date_out,ydate_shift_in');
        $this->db->from('marktech');
        $this->db->join('histbantest', 'histbantest.bc_entried = marktech.bc_entried','inner');
        $this->db->where('histbantest.jdge_date_out', '');
        $this->db->where('UNIX_TIMESTAMP(substr(histbantest.ydate_shift_in,1,8)) >=', time()-(24*60*60*45));
        return $this->db->get('')->result();             
    }

    public function getLiveMonitoringStockByBarcode($barcode)
    {
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,jdge_date_in,date_shift_in,ydate_shift_in,jdge_date_out,date_shift_out,ydate_shift_out,ydate_shift_out,jdge,probcode,pic,pic_out,histbantest.opr,opr_out,catatan');
        $this->db->from('marktech');
        $this->db->join('histbantest', 'histbantest.bc_entried = marktech.bc_entried','inner');
        $this->db->where('histbantest.jdge_date_out', '');
        $this->db->where('UNIX_TIMESTAMP(substr(histbantest.ydate_shift_in,1,8)) >=', time()-(24*60*60*45));
        $newbarcode = str_replace('%20',' ',$barcode);
        return $this->db->get_where('', ['marktech.bc_entried' => $newbarcode])->row_array();
    }

    public function cariDataLiveMonitoringStock()
    {
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,histbantest.location,jdge_date_in,jdge_date_out,ydate_shift_in');
        $this->db->from('marktech');
        $this->db->join('histbantest', 'histbantest.bc_entried = marktech.bc_entried','inner');
        $this->db->where('histbantest.jdge_date_out', '');
        $this->db->where('UNIX_TIMESTAMP(substr(histbantest.ydate_shift_in,1,8)) >=', time()-(24*60*60*45));
        
        $keyword = $this->input->post('keyword', true);
        $this->db->like('marktech.bc_entried', $keyword);
        return $this->db->get('')->result_array();
    }

    public function getTotalBaris()
    { 
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,histbantest.location,jdge_date_in,jdge_date_out,ydate_shift_in');
        $this->db->from('marktech');
        $this->db->join('histbantest', 'histbantest.bc_entried = marktech.bc_entried','inner');
        $this->db->where('histbantest.jdge_date_out', '');
        $this->db->where('UNIX_TIMESTAMP(substr(histbantest.ydate_shift_in,1,8)) >=', time()-(24*60*60*45));
        return $this->db->get()->num_rows();            
    }

}
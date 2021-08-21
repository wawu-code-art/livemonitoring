<?php 

class Historymonitoringprocess_model extends CI_model {
    
    public function getAllHistoryMonitoringProcess($number,$offset)
    {
        // laborat
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj,jlbtest.regtest.reg_date,histbantest.jdge_date_in,monitor.probcode');
        $this->db->from('bcradv2.marktech');
        $this->db->join('bcradv2.histbantest', 'bcradv2.histbantest.bc_entried = bcradv2.marktech.bc_entried','left');
        $this->db->join('bcradv2.ws_log', 'bcradv2.ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('bcradv2.monitor', 'bcradv2.monitor.bc_entried = bcradv2.marktech.bc_entried','inner');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'inner');
        $query1 = $this->db->get()->result_array();
        // test tire warehouse
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj,jlbtest.regtest.reg_date,histbantest.jdge_date_in,monitor.probcode');
        $this->db->from('marktech');
        $this->db->join('ws_log', 'ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'left');
        $this->db->join('monitor', 'monitor.bc_entried = marktech.bc_entried','inner');
        $this->db->join('histbantest', 'histbantest.bc_entried = marktech.bc_entried','inner');
        $query2 = $this->db->get()->result_array();
        // lost tire in process
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj,jlbtest.regtest.reg_date,histbantest.jdge_date_in,monitor.probcode');
        $this->db->from('marktech');
        $this->db->join('histbantest', 'histbantest.bc_entried = marktech.bc_entried','left');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'left');
        $this->db->join('ws_log', 'ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('monitor', 'monitor.bc_entried = marktech.bc_entried','inner');
        $this->db->where('UNIX_TIMESTAMP(substr(monitor.ydate_shift,1,8)) <', time()-(24*60*60*7));
        $this->db->where('bcradv2.histbantest.ydate_shift_in =', null);
        $this->db->where('jlbtest.regtest.date_shiftj =', null);
        $query3 = $this->db->get()->result_array();
        return $query = array_slice((array_merge($query1,$query2,$query3)),$offset,$number);     
    }
    
    public function getAllHistoryMonitoringProcessforExcel()
    {
        // laborat
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj,jlbtest.regtest.reg_date,histbantest.jdge_date_in,monitor.probcode');
        $this->db->from('bcradv2.marktech');
        $this->db->join('bcradv2.histbantest', 'bcradv2.histbantest.bc_entried = bcradv2.marktech.bc_entried','left');
        $this->db->join('bcradv2.ws_log', 'bcradv2.ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('bcradv2.monitor', 'bcradv2.monitor.bc_entried = bcradv2.marktech.bc_entried','inner');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'inner');
        $query1 = $this->db->get()->result();
        // test tire warehouse
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj,jlbtest.regtest.reg_date,histbantest.jdge_date_in,monitor.probcode');
        $this->db->from('marktech');
        $this->db->join('ws_log', 'ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'left');
        $this->db->join('monitor', 'monitor.bc_entried = marktech.bc_entried','inner');
        $this->db->join('histbantest', 'histbantest.bc_entried = marktech.bc_entried','inner');
        $query2 = $this->db->get()->result();
        // lost tire in process
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj,jlbtest.regtest.reg_date,histbantest.jdge_date_in,monitor.probcode');
        $this->db->from('marktech');
        $this->db->join('histbantest', 'histbantest.bc_entried = marktech.bc_entried','left');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'left');
        $this->db->join('ws_log', 'ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('monitor', 'monitor.bc_entried = marktech.bc_entried','inner');
        $this->db->where('UNIX_TIMESTAMP(substr(monitor.ydate_shift,1,8)) <', time()-(24*60*60*7));
        $this->db->where('bcradv2.histbantest.ydate_shift_in =', null);
        $this->db->where('jlbtest.regtest.date_shiftj =', null);
        $query3 = $this->db->get()->result();
        return $query = array_merge($query1,$query2,$query3);     
    }

    public function getHistoryMonitoringProcessByBarcode($barcode)
    {            
        $this->db->select('monitor.bc_entried,marktech.bc_entried,bld_date,bld_mcn01,bld_mcn02,bld_shift,monitor.date_shift,monitor.ydate_shift,bld_opr01,bld_opr02,cur_in,cur_out,cur_shift,date_shiftc,ydate_shiftc,cur_mcn,lr_mcn,cur_opr01,jdge_date,date_shiftj,ydate_shiftj,date_shiftjr,ydate_shiftjr,jdge,probcode,pic,status,note,whs_in,whs_out,whs_rmk,f_bld,f_cur_in,f_cur_out,f_jdg,f_ship,lastUpdate,serialnumb,f_jdgm1,f_jdgm2,f_jdgm3,f_jdgm4,f_jdgm5,f_jdgm6,f_jdgm7');
        $this->db->from('marktech');
        $this->db->join('monitor', 'monitor.bc_entried = marktech.bc_entried','inner');
        $newbarcode = str_replace('%20',' ',$barcode);
        return $this->db->get_where('', ['marktech.bc_entried' => $newbarcode])->row_array();  
    }
    
    public function cariDataHistoryMonitoringProcess()
    {
        // laborat
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj,jlbtest.regtest.reg_date,histbantest.jdge_date_in,monitor.probcode');
        $this->db->from('bcradv2.marktech');
        $this->db->join('bcradv2.histbantest', 'bcradv2.histbantest.bc_entried = bcradv2.marktech.bc_entried','left');
        $this->db->join('bcradv2.ws_log', 'bcradv2.ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('bcradv2.monitor', 'bcradv2.monitor.bc_entried = bcradv2.marktech.bc_entried','inner');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'inner');
        $keyword = $this->input->post('keyword', true);
        $this->db->like('bcradv2.marktech.bc_entried', $keyword);
        $query1 = $this->db->get()->result_array();
        // test tire warehouse
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj,jlbtest.regtest.reg_date,histbantest.jdge_date_in,monitor.probcode');
        $this->db->from('marktech');
        $this->db->join('ws_log', 'ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'left');
        $this->db->join('monitor', 'monitor.bc_entried = marktech.bc_entried','inner');
        $this->db->join('histbantest', 'histbantest.bc_entried = marktech.bc_entried','inner');
        $keyword = $this->input->post('keyword', true);
        $this->db->like('bcradv2.marktech.bc_entried', $keyword);
        $query2 = $this->db->get()->result_array();
        // lost tire in process
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj,jlbtest.regtest.reg_date,histbantest.jdge_date_in,monitor.probcode');
        $this->db->from('marktech');
        $this->db->join('histbantest', 'histbantest.bc_entried = marktech.bc_entried','left');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'left');
        $this->db->join('ws_log', 'ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('monitor', 'monitor.bc_entried = marktech.bc_entried','inner');
        $this->db->where('UNIX_TIMESTAMP(substr(monitor.ydate_shift,1,8)) <', time()-(24*60*60*7));
        $this->db->where('bcradv2.histbantest.ydate_shift_in =', null);
        $this->db->where('jlbtest.regtest.date_shiftj =', null);
        $keyword = $this->input->post('keyword', true);
        $this->db->like('bcradv2.marktech.bc_entried', $keyword);
        $query3 = $this->db->get()->result_array();   
        // merge array
        return $query = array_merge($query1,$query2,$query3);   
    }


    public function getTotalBaris()
    { 
        // laborat
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj,jlbtest.regtest.reg_date,histbantest.jdge_date_in,monitor.probcode');
        $this->db->from('bcradv2.marktech');
        $this->db->join('bcradv2.histbantest', 'bcradv2.histbantest.bc_entried = bcradv2.marktech.bc_entried','left');
        $this->db->join('bcradv2.ws_log', 'bcradv2.ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('bcradv2.monitor', 'bcradv2.monitor.bc_entried = bcradv2.marktech.bc_entried','inner');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'inner');
        $query1 = $this->db->get()->result_array();
        // test tire warehouse
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj,jlbtest.regtest.reg_date,histbantest.jdge_date_in,monitor.probcode');
        $this->db->from('marktech');
        $this->db->join('ws_log', 'ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'left');
        $this->db->join('monitor', 'monitor.bc_entried = marktech.bc_entried','inner');
        $this->db->join('histbantest', 'histbantest.bc_entried = marktech.bc_entried','inner');
        $query2 = $this->db->get()->result_array();
        // lost tire in process
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj,jlbtest.regtest.reg_date,histbantest.jdge_date_in,monitor.probcode');
        $this->db->from('marktech');
        $this->db->join('histbantest', 'histbantest.bc_entried = marktech.bc_entried','left');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'left');
        $this->db->join('ws_log', 'ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('monitor', 'monitor.bc_entried = marktech.bc_entried','inner');
        $this->db->where('UNIX_TIMESTAMP(substr(monitor.ydate_shift,1,8)) <', time()-(24*60*60*7));
        $this->db->where('bcradv2.histbantest.ydate_shift_in =', null);
        $this->db->where('jlbtest.regtest.date_shiftj =', null);
        $query3 = $this->db->get()->result_array();
        // merge array
        return $query = count(array_merge($query1,$query2,$query3));
    }

    public function getArrayKeyDate()
    {
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj,jlbtest.regtest.reg_date,histbantest.jdge_date_in,monitor.probcode');
        $this->db->from('marktech');
        $this->db->join('histbantest', 'histbantest.bc_entried = marktech.bc_entried','left');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'left');
        $this->db->join('ws_log', 'ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('monitor', 'monitor.bc_entried = marktech.bc_entried','inner');
        $this->db->where('UNIX_TIMESTAMP(substr(monitor.ydate_shift,1,8)) <', time()-(24*60*60*7));
        $this->db->where('bcradv2.histbantest.ydate_shift_in =', null);
        $this->db->where('jlbtest.regtest.date_shiftj =', null);
        $this->db->where('monitor.probcode !=', 'SCRAP');
        $query = $this->db->get();
        $A = [];
        foreach ($query->result() as $row)
        {
            $A[]= substr(date('Y-m',strtotime(str_replace('/','-',$row -> bld_date))),0,7) ;
        }      
        sort($A);      
        return array_keys(array_count_values($A));
    }

    public function getTotalLostTire()
    {
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj,jlbtest.regtest.reg_date,histbantest.jdge_date_in,monitor.probcode');
        $this->db->from('marktech');
        $this->db->join('histbantest', 'histbantest.bc_entried = marktech.bc_entried','left');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'left');
        $this->db->join('ws_log', 'ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('monitor', 'monitor.bc_entried = marktech.bc_entried','inner');
        $this->db->where('UNIX_TIMESTAMP(substr(monitor.ydate_shift,1,8)) <', time()-(24*60*60*7));
        $this->db->where('bcradv2.histbantest.ydate_shift_in =', null);
        $this->db->where('jlbtest.regtest.date_shiftj =', null);
        $this->db->where('monitor.probcode !=', 'SCRAP');
        $query = $this->db->get();
        $A = [];
        foreach ($query->result() as $row)
        {
            $A[]= substr(date('Y-m',strtotime(str_replace('/','-',$row -> bld_date))),0,7) ;
        }            
        return array_count_values($A);
    }
}
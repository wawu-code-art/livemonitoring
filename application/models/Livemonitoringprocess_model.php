<?php 

class Livemonitoringprocess_model extends CI_model {
    public function getAllLiveMonitoringProcess($number,$offset)
    {    
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj');
        $this->db->from('bcradv2.marktech');
        $this->db->join('bcradv2.histbantest', 'bcradv2.histbantest.bc_entried = bcradv2.marktech.bc_entried','left');
        $this->db->join('bcradv2.ws_log', 'bcradv2.ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'left');        
        $this->db->join('monitor', 'monitor.bc_entried = marktech.bc_entried','inner');
        $this->db->where('UNIX_TIMESTAMP(substr(monitor.ydate_shift,1,8)) >=', time()-(24*60*60*7));
        $this->db->where('bcradv2.histbantest.ydate_shift_in =', null);
        $this->db->where('jlbtest.regtest.date_shiftj =', null);
        return $this->db->get('',$number,$offset)->result_array();     
    }
    
    public function getAllLiveMonitoringProcessforExcel()
    {    
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj');
        $this->db->from('bcradv2.marktech');
        $this->db->join('bcradv2.histbantest', 'bcradv2.histbantest.bc_entried = bcradv2.marktech.bc_entried','left');
        $this->db->join('bcradv2.ws_log', 'bcradv2.ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'left');        
        $this->db->join('monitor', 'monitor.bc_entried = marktech.bc_entried','inner');
        $this->db->where('UNIX_TIMESTAMP(substr(monitor.ydate_shift,1,8)) >=', time()-(24*60*60*7));
        $this->db->where('bcradv2.histbantest.ydate_shift_in =', null);
        $this->db->where('jlbtest.regtest.date_shiftj =', null);
        return $this->db->get('')->result();     
    }

    public function cariDataLiveMonitoringProcess()
    {
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj');
        $this->db->from('bcradv2.marktech');
        $this->db->join('bcradv2.histbantest', 'bcradv2.histbantest.bc_entried = bcradv2.marktech.bc_entried','left');
        $this->db->join('bcradv2.ws_log', 'bcradv2.ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'left');        
        $this->db->join('monitor', 'monitor.bc_entried = marktech.bc_entried','inner');
        $this->db->where('UNIX_TIMESTAMP(substr(monitor.ydate_shift,1,8)) >=', time()-(24*60*60*7));
        $this->db->where('bcradv2.histbantest.ydate_shift_in =', null);
        $this->db->where('jlbtest.regtest.date_shiftj =', null);

        $keyword = $this->input->post('keyword', true);
        $this->db->like('marktech.bc_entried', $keyword);
        return $this->db->get()->result_array();
    }

    public function getLiveMonitoringProcessByBarcode($barcode)
    {
        $this->db->select('monitor.bc_entried,marktech.bc_entried,bld_date,bld_mcn01,bld_mcn02,bld_shift,monitor.date_shift,monitor.ydate_shift,bld_opr01,bld_opr02,cur_in,cur_out,cur_shift,date_shiftc,ydate_shiftc,cur_mcn,lr_mcn,cur_opr01,jdge_date,monitor.date_shiftj,monitor.ydate_shiftj,date_shiftjr,ydate_shiftjr,monitor.jdge,monitor.probcode,,monitor.pic,,monitor.status,,monitor.note,whs_in,whs_out,whs_rmk,f_bld,f_cur_in,f_cur_out,f_jdg,f_ship,lastUpdate,serialnumb,f_jdgm1,f_jdgm2,f_jdgm3,f_jdgm4,f_jdgm5,f_jdgm6,f_jdgm7');
        $this->db->from('bcradv2.marktech');
        $this->db->join('bcradv2.histbantest', 'bcradv2.histbantest.bc_entried = bcradv2.marktech.bc_entried','left');
        $this->db->join('bcradv2.ws_log', 'bcradv2.ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'left');        
        $this->db->join('monitor', 'monitor.bc_entried = marktech.bc_entried','inner');
        $this->db->where('UNIX_TIMESTAMP(substr(monitor.ydate_shift,1,8)) >=', time()-(24*60*60*7));
        $this->db->where('bcradv2.histbantest.ydate_shift_in =', null);
        $this->db->where('jlbtest.regtest.date_shiftj =', null);
        $newbarcode = str_replace('%20',' ',$barcode);
        return $this->db->get_where('', ['monitor.bc_entried' => $newbarcode])->row_array();
    }

    public function getDataBuilding()
    { 
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj');
        $this->db->from('bcradv2.marktech');
        $this->db->join('bcradv2.histbantest', 'bcradv2.histbantest.bc_entried = bcradv2.marktech.bc_entried','left');
        $this->db->join('bcradv2.ws_log', 'bcradv2.ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'left');        
        $this->db->join('monitor', 'monitor.bc_entried = marktech.bc_entried','inner');
        $this->db->where('UNIX_TIMESTAMP(substr(monitor.ydate_shift,1,8)) >=', time()-(24*60*60*7));
        $this->db->where('bcradv2.histbantest.ydate_shift_in =', null);
        $this->db->where('jlbtest.regtest.date_shiftj =', null);
        return $this->db->get_where('', ['bld_date !=' => null ])->num_rows();
    }

    public function getDataGip()
    { 
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj');
        $this->db->from('bcradv2.marktech');
        $this->db->join('bcradv2.histbantest', 'bcradv2.histbantest.bc_entried = bcradv2.marktech.bc_entried','left');
        $this->db->join('bcradv2.ws_log', 'bcradv2.ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'left');        
        $this->db->join('monitor', 'monitor.bc_entried = marktech.bc_entried','inner');
        $this->db->where('UNIX_TIMESTAMP(substr(monitor.ydate_shift,1,8)) >=', time()-(24*60*60*7));
        $this->db->where('bcradv2.histbantest.ydate_shift_in =', null);
        $this->db->where('jlbtest.regtest.date_shiftj =', null);
        $this->db->like('eventdate','-');
        return $this->db->get('')->num_rows();
    }
    
    public function getDataCuring()
    { 
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj');
        $this->db->from('bcradv2.marktech');
        $this->db->join('bcradv2.histbantest', 'bcradv2.histbantest.bc_entried = bcradv2.marktech.bc_entried','left');
        $this->db->join('bcradv2.ws_log', 'bcradv2.ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'left');        
        $this->db->join('monitor', 'monitor.bc_entried = marktech.bc_entried','inner');
        $this->db->where('UNIX_TIMESTAMP(substr(monitor.ydate_shift,1,8)) >=', time()-(24*60*60*7));
        $this->db->where('bcradv2.histbantest.ydate_shift_in =', null);
        $this->db->where('jlbtest.regtest.date_shiftj =', null);
        $this->db->like('cur_in','/');
        return $this->db->get()->num_rows();
    }
    
    public function getDataTrimming()
    { 
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj');
        $this->db->from('bcradv2.marktech');
        $this->db->join('bcradv2.histbantest', 'bcradv2.histbantest.bc_entried = bcradv2.marktech.bc_entried','left');
        $this->db->join('bcradv2.ws_log', 'bcradv2.ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'left');        
        $this->db->join('monitor', 'monitor.bc_entried = marktech.bc_entried','inner');
        $this->db->where('UNIX_TIMESTAMP(substr(monitor.ydate_shift,1,8)) >=', time()-(24*60*60*7));
        $this->db->where('bcradv2.histbantest.ydate_shift_in =', null);
        $this->db->where('jlbtest.regtest.date_shiftj =', null);
        $this->db->like('jdge_date','/');
        return $this->db->get()->num_rows();
    }

    public function getArrayKeyTire()
    { 
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj');
        $this->db->from('bcradv2.marktech');
        $this->db->join('bcradv2.histbantest', 'bcradv2.histbantest.bc_entried = bcradv2.marktech.bc_entried','left');
        $this->db->join('bcradv2.ws_log', 'bcradv2.ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'left');        
        $this->db->join('monitor', 'monitor.bc_entried = marktech.bc_entried','inner');
        $this->db->where('UNIX_TIMESTAMP(substr(monitor.ydate_shift,1,8)) >=', time()-(24*60*60*7));
        $this->db->where('bcradv2.histbantest.ydate_shift_in =', null);
        $this->db->where('jlbtest.regtest.date_shiftj =', null);
        $query = $this->db->get();
        $A = [];
        foreach ($query->result() as $row)
        {
                $A[]= substr(($row -> bc_entried),0,5);
        }            
        return array_keys(array_count_values($A));
    }

    public function getTotalTireByItemCode()
    { 
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj');
        $this->db->from('bcradv2.marktech');
        $this->db->join('bcradv2.histbantest', 'bcradv2.histbantest.bc_entried = bcradv2.marktech.bc_entried','left');
        $this->db->join('bcradv2.ws_log', 'bcradv2.ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'left');        
        $this->db->join('monitor', 'monitor.bc_entried = marktech.bc_entried','inner');
        $this->db->where('UNIX_TIMESTAMP(substr(monitor.ydate_shift,1,8)) >=', time()-(24*60*60*7));
        $this->db->where('bcradv2.histbantest.ydate_shift_in =', null);
        $this->db->where('jlbtest.regtest.date_shiftj =', null);
        $query = $this->db->get();
        $A = [];
        foreach ($query->result() as $row)
        {
                $A[]= substr(($row -> bc_entried),0,5);
        }            
        return array_count_values($A);
    }

    public function getTotalBaris()
    { 
        $this->db->select('histbantest.bc_entried,marktech.bc_entried,ws_log.barcode,jlbtest.regtest.bc_entried,monitor.bc_entried,bld_date,eventdate,cur_in,jdge_date,monitor.ydate_shift,ydate_shift_in,jlbtest.regtest.date_shiftj');
        $this->db->from('bcradv2.marktech');
        $this->db->join('bcradv2.histbantest', 'bcradv2.histbantest.bc_entried = bcradv2.marktech.bc_entried','left');
        $this->db->join('bcradv2.ws_log', 'bcradv2.ws_log.barcode = marktech.bc_entried','left');
        $this->db->join('jlbtest.regtest', 'jlbtest.regtest.bc_entried = bcradv2.marktech.bc_entried', 'left');        
        $this->db->join('monitor', 'monitor.bc_entried = marktech.bc_entried','inner');
        $this->db->where('UNIX_TIMESTAMP(substr(monitor.ydate_shift,1,8)) >=', time()-(24*60*60*7));
        $this->db->where('bcradv2.histbantest.ydate_shift_in =', null);
        $this->db->where('jlbtest.regtest.date_shiftj =', null);
        return $this->db->get()->num_rows();
    }
    
}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Event_model extends CI_Model
{

	function get_all_records($table,$where,$join_table,$join_criteria,$order)
	{
		$this->db->where($where);
		if($join_table){
		$this->db->join($join_table,$join_criteria);
		}
		$query = $this->db->order_by($order,'desc')->get($table);
		if ($query->num_rows() > 0){
			return $query->result();
		} else{
			return NULL;
		}
	}
	function event_detailss($events)
	{
		return $this->db->where(array('event_id'=>$_GET['event_id']))->get('events')->result();
	}
	
	function event_details($events)
	{
		return $this->db->where(array('event_id'=>$events))->get('events')->result();
	}
	
	function modify_packages($food)
	{
		$this->db->select('*');
		$this->db->from('modify_packages');
		$this->db->join('food', 'food.modify_pid = modify_packages.id');
		$this->db->where('food.cid',$food);
		$result = $this->db->get();
		return $result->result();
	}
	
	function beverages_packages($food)
	{
		$this->db->select('*');
		$this->db->from('beverage_packages');
		$this->db->join('event_beverages', 'event_beverages.beverages_pid = beverage_packages.id');
		$this->db->where('event_beverages.cid',$food);
		$result = $this->db->get();
		return $result->result();
	}
	
	function equipment_packages($food)
	{
		$this->db->select('*');
		$this->db->from('equipmentanddeco');
		$this->db->join('event_equipment', 'event_equipment.equipment_pid = equipmentanddeco.id');
		$this->db->where('event_equipment.cid',$food);
		$result = $this->db->get();
		return $result->result();
	}
	
	function logistics_packages($food)
	{
		$this->db->select('*');
		$this->db->from('logistics');
		$this->db->join('event_logistics', 'event_logistics.logistic_pid = logistics.id');
		$this->db->where('event_logistics.cid',$food);
		$result = $this->db->get();
		return $result->result();
	}
	
	function room_setup_packages($food)
	{
		$this->db->select('*');
		$this->db->from('room_layouts');
		$this->db->join('event_room_setup', 'event_room_setup.room_setup_pid = room_layouts.id');
		$this->db->where('event_room_setup.cid',$food);
		$result = $this->db->get();
		return $result->result();
	}
	
	function running_order_packages($food)
	{
		$this->db->select('*');
		$this->db->from('order_items');
		$this->db->join('event_running_order', 'event_running_order.running_order_pid = order_items.co_id');
		$this->db->where('event_running_order.cid',$food);
		$result = $this->db->get();
		return $result->result();
	}
	function staff_packages($food)
	{
		$this->db->select('*');
		$this->db->from('internal_staff');
		$this->db->join('event_staff', 'event_staff.staff_pid = internal_staff.id');
		$this->db->where('event_staff.cid',$food);
		$result = $this->db->get();
		return $result->result();
	}
	
	function get_template_details($template)
	{
		return $this->db->where('template_id',$template)->get('saved_tasks')->result();
	}
	function project_activities($project)
	{
		$this->db->join('users','users.id = activities.user');
		$this->db->where('module','events');
		return $this->db->where('module_field_id',$project)->order_by('activity_date','desc')->get('activities')->result();
	}
	function project_comments($project)
	{
		return $this->db->where(array('deleted'=>'No','project'=>$project))->order_by('date_posted','desc')->get('comments')->result();
	}
	function project_tasks($project)
	{
		return $this->db->where('project',$project)->order_by('date_added','desc')->get('tasks')->result();
	}
	function saved_tasks()
	{
		return $this->db->order_by('added','desc')->get('saved_tasks')->result();
	}
	function project_files($project)
	{
		$this->db->join('users','users.id = files.uploaded_by');
		return $this->db->where('project',$project)->order_by('date_posted','desc')->get('files')->result();
	}
	function project_event_orders($project)
	{
		$this->db->join('users','users.id = event_orders.reporter');
		return $this->db->where('project',$project)->order_by('reported_on','desc')->get('event_orders')->result();
	}
	function timesheets($project)
	{
		return $this->db->where('project',$project)->order_by('date_timed','desc')->get('project_timer')->result();
	}
	function assign_to()
	{
		return $this->db->where('role_id !=',2)->get('users')->result();
	}
	
	function task_timer($project)
	{
		return $this->db->where('pro_id',$project)->order_by('date_timed','desc')->get('tasks_timer')->result();
	}

	function search_event($room_name, $event_id, $start_date)
	{
		//$this->db->join('events','events.co_id = events.event_id');
		return $this->db->like(array('room_name'=>$room_name, 'event_id'=>$event_id, 'start_date'=>$start_date))						
						->get('events')->result();
	}
	
	function search_report($room_name, $start_date, $end_date)
	{
		$this->db->select('*');
		$this->db->from('events');
		$this->db->where('start_date >= ', $start_date);
		$this->db->where('start_date <= ', $end_date); 
		$this->db->where('room_name',$room_name);
		$result = $this->db->get();
		return $result->result();


	}

	function search_cal($time, $room_name, $start_date)
	{
		$today = date("Y/n/j", time());
        $current_month = date("n", $time);
        $current_year = date("Y", $time);
        $current_month_text = date("F Y", $time);
        $total_days_of_current_month = date("t", $time);
 
        $search_events = array();
		$query = $this->db->like('room_name',$room_name)
						->or_like('start_date',$start_date)
						->order_by('date_created','desc')
						->get('events')->result();
		foreach ($query->result() as $row_event)
        {
            $search_events[intval($row_event->day)][] = $row_event;
        }
        $query->free_result();
        return $search_events;				
	}

	function get_project_start($project){
	$query = $this->db->select('timer_start')->where('event_id',$project)->get('events');
		if ($query->num_rows() > 0)
			{
  		 $row = $query->row();
  		 return $row->timer_start;
  		}
	}
	function get_task_start($task){
	$query = $this->db->select('start_time')->where('t_id',$task)->get('tasks');
		if ($query->num_rows() > 0)
			{
  		 $row = $query->row();
  		 return $row->start_time;
  		}
	}
	function get_project_logged_time($project){
	$query = $this->db->select('time_logged')->where('event_id',$project)->get('events');
		if ($query->num_rows() > 0)
			{
  		 $row = $query->row();
  		 return $row->time_logged;
  		}
	}
	function get_task_logged_time($task){
	$query = $this->db->select('logged_time')->where('t_id',$task)->get('tasks');
		if ($query->num_rows() > 0)
			{
  		 $row = $query->row();
  		 return $row->logged_time;
  		}
	}
	function comment_replies($comment)
	{
		return $this->db->where('parent_comment',$comment)->get('comment_replies')->result();
	}
	function get_file($file_id)
		{
			return $this->db->select()
					->from('files')
					->where('file_id', $file_id)
					->get()
					->row();
		}
	function insert_file($filename,$project,$description)
	{
		$data = array(
			'project'	=> $project,
			'file_name'			=> $filename,
			'description'			=> $description,
			'uploaded_by'			=> $this->tank_auth->get_user_id(),
		);
		$this->db->insert('files', $data);
		return $this->db->insert_id();
	}
	//////// event calendar
	function getDateEvent($year, $month){
		$year  = ($month < 10 && strlen($month) == 1) ? "$year-0$month" : "$year-$month";
		$query = $this->db->select('due_date, total_events')->from('events')->like('start_date', $year, 'after')->get();
		if($query->num_rows() > 0){
			$data = array();
			foreach($query->result_array() as $row){
				$data[(int) end(explode('-',$row['due_date']))] = $row['total_events'];
			}
			return $data;
		}else{
			return false;
		}
	}
	
	// get event detail for selected date
	function getEvent($year, $month, $day){
		$day   = ($day < 10 && strlen($day) == 1)? "0$day" : $day;
		$year  = ($month < 10 && strlen($month) == 1) ? "$year-0$month-$day" : "$year-$month-$day";
		$query = $this->db->select('idevent as id, event_time as time, event')->order_by('event_time')->get_where('event_detail', array('event_date' => $year));
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return null;
		}
	}
	function addEvent($year, $month, $day, $time, $event){	
		$check = $this->db->get_where('events', array('event_date' => "$year-$month-$day"));
		if($check->num_rows() > 0){
			$this->db->query("UPDATE events SET total_events = total_events + 1 WHERE event_date = ?", array("$year-$month-$day"));
			$this->db->insert('event_detail', array('event_date' => "$year-$month-$day", 'event_time' => $time, 'event' => $event));
		}else{
			$this->db->insert('events', array('event_date' => "$year-$month-$day", 'total_events' => 1));
		    $this->db->insert('event_detail', array('event_date' => "$year-$month-$day", 'event_time' => $time, 'event' => $event));
		}
		
	}
	
	// delete event
	function deleteEvent($year, $month, $day, $id){
		$this->db->delete("event_detail", array('idevent' => $id, 'event_date' => "$year-$month-$day"));
		$check = $this->db->query('SELECT count(*) as total FROM event_detail WHERE event_date = ?', array("$year-$month-$day"))->row();
		if($check->total > 0){
			$this->db->update('events', array('total_events' => $check->total), array('event_date' => "$year-$month-$day"));
		}else{
			$this->db->delete("events", array('event_date' => "$year-$month-$day"));
		}
		return $check->total;
	}
	function rooms($id)
	{
		$query = $this->db->where('id',$id)->get('rooms');
		if ($query->num_rows() > 0){
			return $query->result();
		} 
	}
	function get_customer($q){
    $this->db->select('*');
    $this->db->like('customer_name', $q);
    $query = $this->db->get('companies');
    if($query->num_rows > 0){
	$matches = array();
      foreach ($query->result_array() as $row){
       $row['value']=$row['customer_name'];
        $row['label']="{$row['customer_name']}, {$row['customer_email']}";
        $matches[] = $row; //build an array
      }
	 
      echo json_encode($matches); //format the array into json data
    }
  }
  
  function get_hall($q){
    $this->db->select('*');
    $this->db->like('room_name', $q);
    $query = $this->db->get('rooms');
    if($query->num_rows > 0){
	$matches = array();
      foreach ($query->result_array() as $row){
       $row['value']=$row['room_name'];
        $row['label']="{$row['room_name']}";
        $matches = $row; //build an array
      }
	 
      echo json_encode($matches); //format the array into json data
    }
  }
  
  function get_food($q){
    $this->db->select('*');
    $this->db->like('title', $q);
    $query = $this->db->get('modify_packages');
    if($query->num_rows > 0){
	$matches = array();
      foreach ($query->result_array() as $row){
       $row['value']=$row['title'];
        $row['label']="{$row['title']}, {$row['customer_price']}";
        $matches[] = $row; //build an array
      }
	 
      echo json_encode($matches); //format the array into json data
    }
  }
  function event_idt_details($customer)
	{
		return $this->db->where(array('co_id'=>$project))->get('companies')->result();
	}
	/* Calendar Data  */
	function getCalendar($year, $month){
		$year  = ($month < 9 && strlen($month) == 1) ? "$year-0$month" : "$year-$month";
		$query = $this->db->select('*')->from('events')->like('start_date', $year, 'after')->get();
		if($query->num_rows() > 0){
			$data = array();
			foreach($query->result_array() as $row){
				//$abc="SELECT color FROM fx_rooms JOIN fx_events ON fx_events.room_id = fx_rooms.id WHERE fx_rooms.id =4";
 
				//$data[(int) end(explode('-',$row['start_date']))][] = "<div style=''><a href=".base_url()."events/view/details/".$row['event_id'].">".$row['event_title']."</a></div>";
				
				$day=(int) end(explode('-',$row['start_date']));
				$data[$day][] = $row['event_title'];
				//echo $row['event_title']."</li>";
				//$d[] = $row['event_title'];
			}
			//echo "<pre>";
			/*print_r( $data ); */
			return $data;
		}else{
			return false;
		}
	}
	function getEvents($time){
 
        $today = date("Y/n/j", time());
        $current_month = date("n", $time);
        $current_year = date("Y", $time);
        $current_month_text = date("F Y", $time);
        $total_days_of_current_month = date("t", $time);
 
        $events = array();
 
        $query = $this->db->query("
        SELECT DATE_FORMAT(start_date,'%d') AS day, event_id,
        event_title, room_name FROM fx_events
        WHERE start_date BETWEEN  '$current_year/$current_month/01'
                        AND '$current_year/$current_month/$total_days_of_current_month'");
 
        foreach ($query->result() as $row_event)
        {
            $events[intval($row_event->day)][] = $row_event;
        }
        $query->free_result();
        return $events;
    }
 
function getMyEvents($time, $user_id=0){
 
        $today = date("Y/n/j", time());
        $current_month = date("n", $time);
        $current_year = date("Y", $time);
        $current_month_text = date("F Y", $time);
        $total_days_of_current_month = date("t", $time);
 
        $events = array();
 
        $query = $this->db->select('*')->from('events')->like('start_date', $year, 'after')->get();
        foreach ($query->result() as $row_event)
        {
            $events[intval($row_event->day)][] = $row_event;
        }
        $query->free_result();
        return $events;
    }
 
    function getEventsById($id){
 
    $this->db->where('id', $id);
    $query = $this->db->get('events');
    foreach ($query->result_array() as $event)
        {
            $data[] = $event;
        }
    $query->free_result();
     return $data;
    }
    function scheduling_details($id)
	{
		$query = $this->db->where('id',$id)->get('scheduling');
		if ($query->num_rows() > 0){
			return $query->result();
		} 
	}
	function scheduling_by_event($event_id)
	{
		$query = $this->db->where('event_id',$event_id)->get('scheduling');
		if ($query->num_rows() > 0){
			return $query->result();
		} 
	}
}

/* End of file model.php */

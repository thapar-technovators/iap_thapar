<?php

class Default_model extends CI_Model {

/* SOME RILES AND CONVENTIONS TO BE FOLLOWED:
 * For each function written, mention a comment above for what it will be used for
 * Use Joins wherever possible
 * Use UNION keyword instead of OR in queries, it will be faster
 * Avoid nested queries to the maximum extent
 * Use query Caching for appropriate queries
 * Use LIMIT and OFFSET wherever possible
 * Create indexes for columns other than primary keys for faster search
 * For efficient search that corrects typos automatically find the appropriate way
 *
 */



	/*Used to check in form validation whether any field is empty*/
	function isEmpty($var)
	{
		if($var=="")
			return true;
		else
			return false;
	}

	function getData()
	{
		$query = $this->db->query("SELECT * FROM previous_training");
		$trainingdata=array();
		$result=$query->result_array();
		/*foreach ($result as $res) {
			array_push($training_data, $res);
		}*/
		return $result;
	}

	function message_admin($document)
	{
		$data = array(
        'from_user' => $document['email'],
        'to_user' => "admin",
        'subject' => $document['subject'],
        'message' => $document['name'],
        'ip_address' => $document['ip_address']
        );
		if($this->db->insert('admin_messages', $data))
			return true;
		else
			return false;

	}
}
?>
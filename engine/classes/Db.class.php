<?php

/**
 * Class Db
 */
class Db
{
    /**
     * Db constructor.
     * @param $config
     */
    public function __construct($config)
    {
        $this->db = new mysqli($config['host'], $config['user'], $config['pass'], $config['base']);
        if ($this->db->connect_error) {
            die('Ошибка подключения (' . $this->db->connect_errno . ') ' . $this->db->connect_error);
        }
        if (!$this->db->set_charset("utf8")) {
            die("Ошибка при загрузке набора символов utf8: " . $this->db->error);
        }
    }

    /**
     * @param $query
     * @return bool|mysqli_result
     */
    public function query($query)
    {
        return $this->db->query($query);
    }

    /**
     * @param $query
     * @return object|stdClass|null
     */
    public function query_result($query)
    {
    	$query = @$this->db->query($query);
    	if(!$query){ return null; }

        return @$query->fetch_object();
    }

    /**
     * @param $query
     * @return array|null
     */
    public function query_array($query)
    {
		$query = @$this->db->query($query);
		if(!$query){ return null; }

        return @$query->fetch_assoc();
    }

    /**
     * @return mixed
     */
    public function insert_id()
    {
        return $this->db->insert_id;
    }

    /**
     * @param $str
     * @return string
     */
    public function escape($str)
    {
        return $this->db->real_escape_string($str);
    }
}
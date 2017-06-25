<?php

/**
 * DB class generated from table: tablename
 *
 * Uses sprocs.
 *
 * @author Jonathon McKitrick
 */
class Classname
{
	/* properties */

	public function __construct()
	{
		/* initialize */
	}

	/**
	 * Populate this Classname from a db result.
	 *
	 * @param mixed $result
	 */
	public function populate_from_result($result)
	{
        if ($result['return_type'] == 'none')
            return false;

		/* getters */

        return $this;
	}

	/**
	 * Get a Classname by id.
	 *
	 * @param integer $id the desired Classname
	 * @param resource $db database handle
	 * @return Classname
	 */
	public function get($id, $db)
	{
		$sql = "SELECT * FROM `tablename` WHERE id = $id";

		$result = $db->query($sql);

		return $this->populate_from_result($result);
	}

	/**
	 * Get a list of Classname rows by a specific column and value.
	 *
	 * @param string $column to be searched
	 * @param string $value to be matched
	 * @param resource $db database handle
	 * @return Classname
	 */
	public function get_by($column, $value, $db)
	{
		$sql = "SELECT * FROM `tablename` WHERE " .
			$column . " = '" .
			$value .
			"'";

		return $db->query($sql);
	}

	/**
	 * Get a Classname by a specific column and value.
	 *
	 * @param string $column to be searched
	 * @param string $value to be matched
	 * @param resource $db database handle
	 * @return Classname
	 */
	public function get_one_by($column, $value, $db)
	{
		$sql = "SELECT * FROM `tablename` WHERE $column = '$value' LIMIT 1";

		$result = $db->query($sql);

		return $this->populate_from_result($result);
	}

	/**
	 * Get a list of Classnames by a specific column and value.
	 *
	 * @param integer $limit max result count
	 * @param string $column to be searched
	 * @param string $value to be matched
	 * @param resource $db database handle
	 * @return array of db rows
	 */
	public function getlist($limit, $column, $value, $db)
	{
		$sql = "SELECT * FROM `tablename` WHERE " . $column . " IN (" . $value . ") LIMIT " . $limit;

		return $db->query($sql);
	}

	/**
	 * Get a list of Classnames.
	 *
	 * @param integer $limit max result count
	 * @param resource $db database handle
	 * @return array of db rows
	 */
	public function getall($limit, $db)
	{
		$sql = "SELECT * FROM `tablename` LIMIT $limit";

		return $db->query($sql);
	}

	/**
	 * Save this Classname.
	 *
	 * @param resource $db database handle
	 */
	public function save($db)
	{
		if ($this->id == 0)
		{
			$sql = 'CALL SP_InsertIntoSprocname' .
				"(sprocinsert)";
		}
		else
		{
			$sql = 'CALL SP_UpdateSprocnameByID' .
				"(sprocupdate)";
		}

		$result = $db->query($sql);

		if ($item = item_from_db_result($result))
			$this->id = $item['id'];
	}

	/**
	 * Delete this Classname.
	 *
	 * @param resource $db database handle
	 */
	public function delete($db)
	{
		$sql = "CALL SP_DeleteSprocnameByID($this->id)";
		$result = $db->stock_query($sql);
		$db->free_result($result);
	}
}

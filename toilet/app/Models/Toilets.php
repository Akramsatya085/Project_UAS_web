<?php

class Toilets
{
    protected $db;

    public function __construct()
    {
        require_once BASE_PATH . "Config/Config.php";

        $this->db = $db;
    }

    public function get_toilets($data = [], $orData = [], $notData = [], $limit = 0)
    {
        $query = "SELECT * FROM toilets";
        $conditionsArray = [];

        if (!empty($data)) {
            $condition = [];

            foreach ($data as $key => $val) {
                $cleanValue = mysqli_real_escape_string($this->db, $val);
                $condition[] = "$key = '$cleanValue'";
            }

            $conditionsArray[] = implode(" AND ", $condition);
        }

        if (!empty($orData)) {
            $condition = [];

            foreach ($orData as $key => $val) {
                $cleanValue = mysqli_real_escape_string($this->db, $val);
                $condition[] = "$key = '$cleanValue'";
            }

            $conditionsArray[] = implode(" OR ", $condition);
        }

        if (!empty($notData)) {
            $condition = [];

            foreach ($notData as $key => $val) {
                $cleanValue = mysqli_real_escape_string($this->db, $val);
                $condition[] = "$key != '$cleanValue'";
            }

            $conditionsArray[] = implode(" AND ", $condition);
        }

        if (!empty($conditionsArray)) {
            $query .= " WHERE " . implode(" AND ", $conditionsArray);
        }

        $query .= " ORDER BY location";

        if ($limit) {
            $query .= " LIMIT $limit";
        }

        $result = mysqli_query($this->db, $query);

        if ($limit == 1) {
            return mysqli_fetch_assoc($result);
        }

        $toilets = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $toilets[] = $row;
        }

        return $toilets;
    }

    public function get_unchecked_toilets($date)
    {
        $query = "SELECT *, t.id AS id_toilet, cl.id AS id_checklist, u.username FROM toilets t ";
        $query .= "LEFT JOIN checklists cl ON cl.toilet_id = t.id AND DATE(cl.date) = '" . mysqli_real_escape_string($this->db, $date) . "' ";
        $query .= "LEFT JOIN users u ON u.id = cl.user_id ";

        $result = mysqli_query($this->db, $query);

        $unchecked_toilet = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $unchecked_toilet[] = $row;
        }

        return $unchecked_toilet;
    }

    public function get_minus_toilets($date)
    {
        $query = "SELECT *, t.id AS id_toilet, cl.id AS id_checklist, u.username FROM toilets t ";
        $query .= "LEFT JOIN checklists cl ON cl.toilet_id = t.id AND DATE(cl.date) = '" . mysqli_real_escape_string($this->db, $date) . "' ";
        $query .= "LEFT JOIN users u ON u.id = cl.user_id ";
        // $query .= "WHERE "

        $result = mysqli_query($this->db, $query);

        $unchecked_toilet = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $unchecked_toilet[] = $row;
        }

        return $unchecked_toilet;
    }

    public function get_check_toilet($data)
    {
        $query = "SELECT *, t.id AS id_toilet, cl.id AS id_checklist, u.username FROM toilets t ";
        $query .= "LEFT JOIN checklists cl ON cl.toilet_id = t.id AND DATE(cl.date) = '" . mysqli_real_escape_string($this->db, $data['date']) . "'";
        $query .= "LEFT JOIN users u ON u.id = cl.user_id ";
        $query .= " WHERE t.id = '{$data['id']}'";

        $result = mysqli_query($this->db, $query);

        return mysqli_fetch_assoc($result);
    }

    public function get_worst_toilet($date)
    {
        $query = "SELECT *, t.id AS id_toilet, cl.id AS id_checklist, u.username FROM toilets t ";
        $query .= "JOIN checklists cl ON cl.toilet_id = t.id AND DATE(cl.date) = '" . mysqli_real_escape_string($this->db, $date) . "'";
        $query .= "JOIN users u ON u.id = cl.user_id ";

        $result = mysqli_query($this->db, $query);

        $toilet = [];

        $worst = [2, 3];

        $column_worst = [
            'kloset',
            'wastafel',
            'lantai',
            'dinding',
            'kaca',
        ];

        while ($row = mysqli_fetch_assoc($result)) {
            $columns = [];

            foreach ($row as $key => $val) {
                if (in_array($val, $worst) && in_array($key, $column_worst)) {
                    $columns[] = $key;
                }
            }

            $row['result_worst'] = $columns;
            $toilet[] = $row;
        }

        return $toilet;
    }

    public function process_add_toilet($data, $table = 'toilets')
    {
        $columns = implode(', ', array_keys($data));
        $values = implode("', '", array_map([$this->db, 'real_escape_string'], array_values($data)));

        $query = "INSERT INTO $table ($columns) VALUES ('$values')";

        $result = mysqli_query($this->db, $query);

        if ($result) {
            return true;
        }
        return false;
    }

    public function process_delete_toilet($id)
    {
        $query = "DELETE FROM toilets WHERE id = '$id'";
        $delete = mysqli_query($this->db, $query);

        if ($delete) {
            return true;
        }

        return false;
    }

    public function process_edit_toilet($id, $data, $table = 'toilets')
    {
        $update_data = [];

        foreach ($data as $key => $value) {
            $clean_value = mysqli_real_escape_string($this->db, $value);
            $update_data[] = "$key = '$clean_value'";
        }

        $update_string = implode(', ', $update_data);
        $id = mysqli_real_escape_string($this->db, $id);

        $query = "UPDATE $table SET $update_string WHERE id = '$id'";

        $result = mysqli_query($this->db, $query);

        if ($result) {
            return true;
        }
        return false;
    }
}

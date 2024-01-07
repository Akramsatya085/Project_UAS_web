<?php

class Users
{
    protected $db;

    public function __construct()
    {
        require_once BASE_PATH . "Config/Config.php";

        $this->db = $db;
    }

    public function get_users($data = [], $orData = [], $notData = [], $limit = 0)
    {
        $query = "SELECT * FROM users";
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

        $query .= " ORDER BY name";

        if ($limit) {
            $query .= " LIMIT $limit";
        }

        $result = mysqli_query($this->db, $query);

        if ($limit == 1) {
            return mysqli_fetch_assoc($result);
        }

        $users = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }

        return $users;
    }

    public function process_add_user($data)
    {
        $columns = implode(', ', array_keys($data));
        $values = implode("', '", array_map([$this->db, 'real_escape_string'], array_values($data)));

        $query = "INSERT INTO users ($columns) VALUES ('$values')";

        $result = mysqli_query($this->db, $query);

        if ($result) {
            return true;
        }
        return false;
    }

    public function process_edit_user($user_id, $data)
    {
        $update_data = [];

        foreach ($data as $key => $value) {
            $clean_value = mysqli_real_escape_string($this->db, $value);
            $update_data[] = "$key = '$clean_value'";
        }

        $update_string = implode(', ', $update_data);
        $user_id = mysqli_real_escape_string($this->db, $user_id);

        $query = "UPDATE users SET $update_string WHERE id = '$user_id'";

        $result = mysqli_query($this->db, $query);

        if ($result) {
            return true;
        }
        return false;
    }
}

<?php
class Database
{

    var $host = "localhost";
    var $user = "root";
    var $pass = "";
    var $db = "resep";


    function __construct()
    {
        $con = $this->con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);

        return $con;
    }

    function user()
    {
        $data = mysqli_query(
            $this->con,
            "SELECT * FROM user"
        );

        return $data;
    }

    function show()
    {

        $data = mysqli_query($this->con, "SELECT * from artikel");
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    function create($judul, $isi, $foto)
    {
        mysqli_query($this->con, "INSERT INTO artikel VALUES ('','$judul','1','$isi')");
    }

    function delete($id)
    {
        mysqli_query($this->con, "DELETE FROM artikel WHERE id='$id'");
    }

    function update($id, $judul, $foto, $isi)
    {
        mysqli_query($this->con, "UPDATE artikel SET judul='$judul',category='',isi='$isi' where id='$id'");
    }
}

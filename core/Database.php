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

    function user($username, $password)
    {
        $data = mysqli_query(
            $this->con,
            "SELECT * FROM user WHERE username='$username' and password='$password'"
        );

        return $data;
    }

    function show($cari)
    {
        //SELECT nama_kolom_tampil FROM nama_tabel_pertama INNER JOIN nama_tabel_kedua 
        //ON nama_kolom_join_tabel_pertama = nama_kolom_join_tabel_kedua

        $data = mysqli_query($this->con, "SELECT * FROM artikel INNER JOIN foto ON foto_cate=foto WHERE judul LIKE '%$cari%'");
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    function register($nama, $username, $password)
    {

        mysqli_query($this->con, "INSERT INTO user VALUES ('','$nama','$username','$password')");
    }

    function create($judul, $isi, $foto)
    {

        mysqli_query($this->con, "INSERT INTO foto VALUES ('','$foto')");
        mysqli_query($this->con, "INSERT INTO artikel VALUES ('','$judul','$foto','$isi')");
    }

    function delete($id, $nama)
    {
        mysqli_query($this->con, "DELETE FROM foto WHERE foto='$nama'");
        mysqli_query($this->con, "DELETE FROM artikel WHERE id='$id'");
    }

    function update($id, $judul, $isi)
    {
        mysqli_query($this->con, "UPDATE artikel SET judul='$judul',isi='$isi' where id='$id'");
    }

    function dataModal($id)
    {

        $sql = mysqli_query($this->con, "SELECT * FROM artikel where id='$id'");

        $data = mysqli_fetch_array($sql);
        return $data;
    }
}

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
        //SELECT nama_kolom_tampil FROM nama_tabel_pertama INNER JOIN nama_tabel_kedua 
        //ON nama_kolom_join_tabel_pertama = nama_kolom_join_tabel_kedua

        $data = mysqli_query($this->con, "SELECT * FROM artikel INNER JOIN foto ON foto_cate=foto");
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
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

    function update($id, $judul, $foto, $isi)
    {
        mysqli_query($this->con, "UPDATE artikel SET judul='$judul',category='',isi='$isi' where id='$id'");
    }
}

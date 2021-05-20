<?php

session_start();
unset($_SESSION['login']);
unset($_SESSION['email']);

echo "<script>alert('Logout Berhasil');</script>";
echo "<script>window.location.replace('./');</script>";
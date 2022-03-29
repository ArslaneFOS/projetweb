<?php
session_start();
require_once('../models/model.php');

function has_student_access_level()
{
    if (isset($_SESSION['user-type'])) {
        if ($_SESSION['user-type'] == 'student') {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function has_admin_access_level()
{
    if (isset($_SESSION['user-type'])) {
        if ($_SESSION['user-type'] == 'admin') {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function has_pilot_access_level()
{
    if (isset($_SESSION['user-type'])) {
        if ($_SESSION['user-type'] == 'pilot') {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function has_representative_access_level($auth)
{
    if (isset($_SESSION['user-type'])) {
        if ($_SESSION['user-type'] == 'representative') {
            $id_rep = $_SESSION['id_user'];
            $bdd = new DB();
            $binds = array(
                ':id_rep' => array($id_rep, PDO::PARAM_INT),
                ':auth' => array($auth, PDO::PARAM_STR),
            );

            $hasprivilege = $bdd->select("SELECT 1 from rep_auth where id_rep = :id_rep AND id_auth = (SELECT id_auth from authorization where auth = :auth);", $binds);

            if ($hasprivilege) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}


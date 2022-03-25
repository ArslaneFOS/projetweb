<?php
session_start();

function has_student_access_level() {
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

function has_admin_access_level() {
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

function has_pilot_access_level() {
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
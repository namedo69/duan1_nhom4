<?php
session_start();
session_destroy();
header("location: http://localhost/duan1_nhom4/?url=page&act=home");
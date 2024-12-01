<?php
include_once("./view/layouts/header.php");
?>

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>Profile Statistics</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Doanh thu <br>trong ngày</h6>
                                        <h6 class="font-extrabold mb-0"><?= $doanhthungay ?> Vnđ</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                    <div class="stats-icon green">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Doanh thu <br>trong tuần</h6>
                                        <h6 class="font-extrabold mb-0"><?= $doanhthutuan ?> Vnđ</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                    <div class="stats-icon red">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Doanh thu <br>trong tháng</h6>
                                        <h6 class="font-extrabold mb-0"><?= $doanhthuthang ?> Vnđ</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Profile Visit</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-profile-visit"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                   
                    
                        <div class="card cmt">
                            <div class="card-header">
                                <h4>Latest Comments</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-lg">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Comment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                            <?php
                            foreach ($listComment as $key => $value) {
                                $clientName = 'Không xác định';
                                $avt = 'Không xác định'; // Giá trị mặc định
                                foreach ($listClient as $client) {
                                    if ($client['client_id'] == $value['client_id']) {
                                        $clientName = $client['name'];
                                        $avt=$client['image'];
                                        break;
                                    }
                                }
                                ?>
                                            <tr>
                                                <td class="col-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-md">
                                                            <img src="upload/AnhNhanBan/Client/<?php echo $avt ?>">
                                                        </div>
                                                        <p class="font-bold ms-3 mb-0"><?=  $clientName ?></p>
                                                    </div>
                                                </td>
                                                <td class="col-auto">
                                                    <p class=" mb-0"><?= $value['content'] ?></p>
                                                </td>
                                            </tr>
                            <?php
                            }
                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body ">
                        <div class="d-flex align-items-center">
                            <?php  
                                $avt = 'Không xác định'; // Giá trị mặc định
                                $email='';
                                foreach ($listClient as $client) {
                                    if ($client['username'] == $_SESSION['admin']['username']) {                                      
                                        $avt=$client['image'];
                                        $name=$client['name'];
                                        $email=$client['email'];
                                        break;
                                    }
                                } ?>
                            <div class="avatar avatar-xl">
                            <img src="upload/AnhNhanBan/Client/<?php echo $avt ?>">
                            </div>
                            <div class="ms-3 name"> 
                                <h7 class="font-bold">Xin chào admin</h7>
                                <h6 class="font-bold"><?= $name?></h6>
                                <h class="text-muted mb-0"><?= $email ?></h>
                                <button class='btn btn-light-primary font-bold mt-3'>
                                    <a href="./logout.php">Đăng Xuất</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mess">
                    <div class="card-header">
                        <h4>Recent Messages</h4>
                    </div>
                    <div class="card-content pb-4">
                       <?php   foreach ($listContact as $key => $value) { ?>
                       <div class="card">
                       <div class="recent-message d-flex px-4 py-3">
                            <div class="name ms-4">
                                <h5 class="mb-1"><?= $value['name'] ?></h5>
                                <h6 class="text-muted mb-2"><?= $value['email'] ?></h6>
                                <h8 class="text-muted mb-0"><?= $value['message'] ?></h8>
                            </div>
                        </div>
                       </div>
                       <?php }?>
                        <div class="px-4">
                            <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Start
                                Conversation</button>
                        </div>
                    </div>
                </div>
                
            </div>

            
        </section>
    </div>
    <?php
    include_once("./view/layouts/footer.php");
    ?>
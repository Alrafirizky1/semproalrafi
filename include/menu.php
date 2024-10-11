<?php
//cek session
if (!empty($_SESSION['admin'])) {
?>

    <nav class="blue-grey darken-1">
        <div class="nav-wrapper">
            <a href="./" class="brand-logo center hide-on-large-only"><i class="material-icons md-36">business</i> BPKP Jawa Barat</a>
            <ul id="slide-out" class="side-nav" data-simplebar-direction="vertical">
                <li class="no-padding">
                    <div class="logo-side center blue-grey darken-3">
                        <?php
                        $query = mysqli_query($config, "SELECT * FROM tbl_instansi");

                        ?>
                    </div>
                </li>
                <li class="no-padding blue-grey darken-4">
                    <ul class="collapsible collapsible-accordion">
                        <li>
                            <a class="collapsible-header"><i class="material-icons">account_circle</i><?php echo $_SESSION['nama']; ?></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="?page=pro">Profil</a></li>
                                    <li><a href="?page=pro&sub=pass">Ubah Password</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li><a href="./"><i class="material-icons middle">dashboard</i> Beranda</a></li>
                <li class="no-padding">
                    <?php
                    if ($_SESSION['admin'] == 1 || $_SESSION['admin'] == 2 || $_SESSION['admin'] == 3) { ?>
                        <ul class="collapsible collapsible-accordion">
                            <li>
                                <a class="collapsible-header"><i class="material-icons">repeat</i> Transaksi Surat</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="?page=tsm">Surat Masuk</a></li>
                                        <li><a href="?page=tsk">Surat Keluar</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    <?php
                    }
                    ?>
                <li class="no-padding">
                    <?php
                    if ($_SESSION['admin'] == 1) { ?>
                        <ul class="collapsible collapsible-accordion">
                            <li>
                                <a class="collapsible-header"><i class="material-icons">settings</i> Pengaturan</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="?page=sett">Instansi</a></li>
                                        <li><a href="?page=sett&sub=usr">User</a></li>
                                        <li><a href="?page=sett&sub=back">Backup Database</a></li>
                                        <li><a href="?page=sett&sub=rest">Restore Database</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    <?php
                    }
                    ?>
                    <?php
                    if ($_SESSION['admin'] == 2) { ?>
                        <ul class="collapsible collapsible-accordion">
                            <li>
                                <a class="collapsible-header"><i class="material-icons">settings</i> Pengaturan</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="?page=sett">Instansi</a></li>
                                        <li><a href="?page=sett&sub=usr">User</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    <?php
                    }
                    ?>
                </li>
            </ul>
            <!-- Menu on medium and small screen END -->

            <!-- Menu on large screen START -->
            <ul class="center hide-on-med-and-down" id="nv">
                <li><a href="./" class="ams hide-on-med-and-down"><i class="material-icons md-36">business</i> BPKP Jawa Barat</a></li>
                <li>
                    <div class="grs">
                        </>
                </li>
                <li><a href="./"><i class="material-icons"></i>&nbsp; Beranda</a></li>
                <?php
                if ($_SESSION['admin'] == 1 || $_SESSION['admin'] == 2 || $_SESSION['admin'] == 3) { ?>
                    <li><a class="dropdown-button" href="#!" data-activates="transaksi">Transaksi Surat <i class="material-icons md-18">arrow_drop_down</i></a></li>
                    <ul id='transaksi' class='dropdown-content'>
                        <li><a href="?page=tsm">Surat Masuk</a></li>
                        <li><a href="?page=tsk">Surat Keluar</a></li>
                    </ul>
                <?php
                }
                ?>
                <?php
                if ($_SESSION['admin'] == 1) { ?>
                    <li><a class="dropdown-button" href="#!" data-activates="pengaturan">Pengaturan <i class="material-icons md-18">arrow_drop_down</i></a></li>
                    <ul id='pengaturan' class='dropdown-content'>
                        <li><a href="?page=sett">Instansi</a></li>
                        <li><a href="?page=sett&sub=usr">User</a></li>
                        <li class="divider"></li>
                        <li><a href="?page=sett&sub=back">Backup Database</a></li>
                        <li><a href="?page=sett&sub=rest">Restore Database</a></li>
                    </ul>
                <?php
                }
                ?>
                <?php
                if ($_SESSION['admin'] == 2) { ?>
                    <li><a class="dropdown-button" href="#!" data-activates="pengaturan">Pengaturan <i class="material-icons md-18">arrow_drop_down</i></a></li>
                    <ul id='pengaturan' class='dropdown-content'>
                        <li><a href="?page=sett">Instansi</a></li>
                        <li><a href="?page=sett&sub=usr">User</a></li>
                    </ul>
                <?php
                }
                ?>
                <li class="right" style="margin-right: 10px;"><a class="dropdown-button" href="#!" data-activates="logout"><i class="material-icons">account_circle</i> <?php echo $_SESSION['nama']; ?><i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='logout' class='dropdown-content'>
                    <li><a href="?page=pro">Profil</a></li>
                    <li><a href="?page=pro&sub=pass">Ubah Password</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="material-icons">settings_power</i> Logout</a></li>
                </ul>
            </ul>
            <!-- Menu on large screen END -->
            <a href="#" data-activates="slide-out" class="button-collapse" id="menu"><i class="material-icons">menu</i></a>
        </div>
    </nav>

<?php
} else {
    header("Location: ../");
    die();
}
?>
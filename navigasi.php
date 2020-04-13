<!--navbar-->

<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle Navigasi</span>
                <span class="icon-bar">Toggle Navigasi</span>
                <span class="icon-bar">Toggle Navigasi</span>
                <span class="icon-bar">Toggle Navigasi</span>
            </button>
            <a class="navbar-brand" href="produk.php">Situs Anda</a>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?php echo $page_title=="Daftar Produk" ? "class='active'" : ""; ?> >
                    <a href="produk.php">Daftar Produk</a>
                </li>

                <li <?php echo $page_title=="Keranjang" ? "class='active'" : ""; ?> >
                    <a href="keranjang.php">
                        <?php 
                        //menghitung produk dalam keranjang
                        $cart_count=count($_SESSION['cart_items']);
                        ?>
                        Keranjang
                        <span class="badge" id="comparison-count">
                            <?php echo $cart_count; ?>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    
    </div>

</div>
<?php
$sesi = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($sesi == "admin") {
    function highlight($text, $keyword)
    {
        $keyword = explode(" ", $keyword);
        $keyword_count = count($keyword);
        for ($i = 0; $i < $keyword_count; $i++) {
            $highlighted_text = '<strong><span class="text-info">' . $keyword[$i] . '</span></strong>';
            $text = str_ireplace($keyword[$i], $highlighted_text, $text);
        }
        return $text;
    }
    $keyword = $_POST['cari'];
    $sql = mysqli_query($dblink, "SELECT * from alat_view where nama_peralatan like '%$keyword%'");
?>
    <div class='card'>
        <div class='card-header card-header-primary'>
            <h4 class='card-title'>Pencarian</h4>
            <p class='card-category'>Hasil pencarian dengan kata kunci <strong><span class='text-light'> <?php echo '"' . $keyword . '"' ?> </span></strong></p>
        </div>
        <div class='card-body'>

            <?php
            if ($keyword == "") {
                echo "tidak ada hasil";
            } else { ?>
                <ol>
                    <?php
                    while ($gr = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
                        $xidbk = isset($gr['nama_peralatan']) ? $gr['nama_peralatan'] : '';
                        echo "<li><div class='p-2'>" . highlight($xidbk, $keyword) . "</div></li>";
                    } ?>
                </ol>
            <?php } ?>
        </div>
    </div>
<?php } else {
    echo "<center>Silakan login untuk akses data</center";
} ?>
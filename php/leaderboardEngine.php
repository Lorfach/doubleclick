<?

    require_once 'db.php';

    $suo_leaderboard_normal = mysqli_fetch_all(mysqli_query($db, "SELECT * FROM `suoLeaderboardNormal` ORDER BY `top` ASC"));
    $suo_leaderboard_harder = mysqli_fetch_all(mysqli_query($db, "SELECT * FROM `suoLeaderboardHarder` ORDER BY `top` ASC"));
    $suo_leaderboard_satanic = mysqli_fetch_all(mysqli_query($db, "SELECT * FROM `suoLeaderboardSatanic` ORDER BY `top` ASC"));

    echo json_encode([$suo_leaderboard_normal, $suo_leaderboard_harder, $suo_leaderboard_satanic]);

?>
<html>
<link rel="stylesheet" type='text/css' href='assets/style.css'>
    <div id='container'>
        <div id='score_container'>
            <p>Your Gold:</p>
            <div id='score'>
                <p><?= $this->session->userdata['money']?></p>
            </div>
        </div>
        <div id='farm_box'>
            <h2>Farm</h2>
            <h4>(earns 10-20 golds)</h4>
            <form action='process_money' method='post'>
                <input type='hidden' name='building' value='farm'>
                <input type='submit' value='Get rich or die trying'>
            </form>
        </div>
        <div id='cave_box'>
            <h2>Cave</h2>
            <h4>(earns 5-10 golds)</h4>
            <form action='process_money' method='post'>
                <input type='hidden' name='building' value='cave'>
                <input type='submit' value='Get rich or die trying'>
            </form>
        </div>
        <div id='house_box'>
            <h2>House</h2>
            <h4>(earns 2-5 golds)</h4>
            <form action='process_money' method='post'>
                <input type='hidden' name='building' value='house'>
                <input type='submit' value='Get rich or die trying'>
            </form>
        </div>
        <div id='casino_box'>
            <h2>Casino</h2>
            <h4>(earns/takes 0-50 golds)</h4>
            <form action='process_money' method='post'>
                <input type='hidden' name='building' value='casino'>
                <input type='submit' value='Get rich or die trying'>
            </form>
        </div>
        <hr>
        <div id='activity'>
            <p><?php foreach(array_reverse($this->session->userdata['activity']) as $activity) {echo $activity;}?></p>
        </div>
        <form action='process_money' method='post'>
            <input type='hidden' name='building' value='reset'>
            <input type='submit' value='start over'>
        </form>
    </div>

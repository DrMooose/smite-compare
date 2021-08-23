<?php
$god1_name = $_GET['name1'];
$god2_name = $_GET['name2'];

$database = new PDO('sqlite:smite_lv1-database.sqlite');

$god1 = $database->query("SELECT * FROM smite_lv1 WHERE gname LIKE '%{$god1_name}%' ");
$god2 = $database->query("SELECT * FROM smite_lv1 WHERE gname LIKE '%{$god2_name}%' ");

$result1 = $god1->fetchAll(PDO::FETCH_ASSOC);
$result2 = $god2->fetchAll(PDO::FETCH_ASSOC);

if (empty($_GET['name1']) && empty($_GET['name2'])) {
    $will = "";
    $spill = "";
}

else if (empty($_GET['name1']) && !empty($_GET['name2'])) {
    $will = "";
    foreach ($result2 as $g2)
    {
        $spill = array($g2['gname'], $g2['class'], $g2['health'], $g2['mana'], $g2['basic_attack'], $g2['physical_protect'], $g2['hp5'], $g2['mp5'], $g2['attack_speed'], $g2['move_speed']);
    }
}

else if (!empty($_GET['name1']) && empty($_GET['name2'])) {
    $spill = "";
    foreach ($result1 as $g1)
    {
    $will = array($g1['gname'], $g1['class'], $g1['health'], $g1['mana'], $g1['basic_attack'], $g1['physical_protect'], $g1['hp5'], $g1['mp5'], $g1['attack_speed'], $g1['move_speed']);
    } 
}

else {
foreach ($result1 as $g1)
    {
        $will = array($g1['gname'], $g1['class'], $g1['health'], $g1['mana'], $g1['basic_attack'], $g1['physical_protect'], $g1['hp5'], $g1['mp5'], $g1['attack_speed'], $g1['move_speed']);
    } 

    foreach ($result2 as $g2)
    {
        $spill = array($g2['gname'], $g2['class'], $g2['health'], $g2['mana'], $g2['basic_attack'], $g2['physical_protect'], $g2['hp5'], $g2['mp5'], $g2['attack_speed'], $g2['move_speed']);
    }
}

?>
<!DOCTYPE html>
    <head>
        <link rel="stylesheet" type="text/css" href="smite_stats_style.css">
        <link href="https://fonts.googleapis.com/css?family=Cinzel|Hind+Madurai&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="main">
            <header>
                <h1>Smite God Level 1 Comparer</h1>
            </header>
            <div class="content">
                <form>
                    <div class="picker1">
                        <h3>God Name 1</h3>
                        <h3> <?php echo "<h3> {$will[0]} </h3>" ?> </h3>
                        <h4> <?php echo "<h4> {$will[1]} </h4>" ?> </h4>
                        <input type="search" name='name1' placeholder="Name" list="god_list">
                        <datalist id="god_list">
                            <option>Achilles</option> <option>Agni</option> <option>Ah Muzen Cab</option> <option>Ah Puch</option> <option>Amaterasu</option> <option>Anhur</option> <option>Amaterasu</option> <option>Anubis</option> <option>Ao Kuang</option> <option>Aphrodite</option> <option>Apollo</option> <option>Arachne</option> <option>Ares</option> <option>Artemis</option> <option>Artio</option> <option>Athena</option> <option>Awilix</option> <option>Baba Yaga</option> <option>Bacchus</option> <option>Bakasura</option> <option>Baron Samedi</option> <option>Bastet</option> <option>Bellona</option> <option>Cabrakan</option> <option>Camazotz</option> <option>Cerberus</option> <option>Cernunnos</option> <option>Chaac</option> <option>Chang'e</option> <option>Chernobog</option> <option>Chiron</option> <option>Chronos</option> <option>Cu Chulainn</option> <option>Cupid</option> <option>Da Ji</option> <option>Discordia</option> <option>Erlang Shen</option> <option>Fafnir</option> <option>Fenrir</option> <option>Freya</option> <option>Ganesha</option> <option>Geb</option> <option>Guan Yu</option> <option>Hachiman</option> <option>Hades</option> <option>He Bo</option> <option>Heimdallr</option> <option>Hel</option> <option>Hera</option> <option>Hercules</option> <option>Horus</option> <option>Hou Yi</option> <option>Hun Batz</option> <option>Isis</option> <option>Izanami</option> <option>Janus</option> <option>Jing Wei</option> <option>Jormungandr</option> <option>Kali</option> <option>Khepri</option> <option>King Arthur</option> <option>Kukulkan</option> <option>Kumbhakarna</option> <option>Kuzenbo</option> <option>Loki</option> <option>Medusa</option> <option>Mercury</option> <option>Merlin</option> <option>Mulan</option> <option>Ne Zha</option> <option>Neith</option> <option>Nemesis</option> <option>Nike</option> <option>Nox</option> <option>Nu Wa</option> <option>Odin</option> <option>Olorun</option> <option>Osiris</option> <option>Pele</option> <option>Persephone</option> <option>Poseidon</option> <option>Ra</option> <option>Raijin</option> <option>Rama</option> <option>Ratatoskr</option> <option>Ravana</option> <option>Scylla</option> <option>Serqet</option> <option>Set</option> <option>Skadi</option> <option>Sobek</option> <option>Sol</option> <option>Sun Wukong</option> <option>Susano</option> <option>Sylvanus</option> <option>Terra</option> <option>Thanatos</option> <option>The Morrigan</option> <option>Thor</option> <option>Thoth</option> <option>Tyr</option> <option>Ullr</option> <option>Vamana</option> <option>Vulcan</option> <option>Xbalanque</option> <option>Xing Tian</option> <option>Yemoja</option> <option>Ymir</option> <option>Zeus</option> <option>Zhong Kui</option>
                        </datalist>
                    </div>

                    <div class="picker2">
                        <h3>God Name 2</h3>
                        <h3> <?php echo "<h3> {$spill[0]} </h3>" ?> </h3>
                        <h4> <?php echo "<h4> {$spill[1]} </h4>" ?> </h4>
                        <input type="search" name='name2' placeholder="Name" list="god_list">
                        <datalist id="god_list">
                            <option>Achilles</option> <option>Agni</option> <option>Ah Muzen Cab</option> <option>Ah Puch</option> <option>Amaterasu</option> <option>Anhur</option> <option>Amaterasu</option> <option>Anubis</option> <option>Ao Kuang</option> <option>Aphrodite</option> <option>Apollo</option> <option>Arachne</option> <option>Ares</option> <option>Artemis</option> <option>Artio</option> <option>Athena</option> <option>Awilix</option> <option>Baba Yaga</option> <option>Bacchus</option> <option>Bakasura</option> <option>Baron Samedi</option> <option>Bastet</option> <option>Bellona</option> <option>Cabrakan</option> <option>Camazotz</option> <option>Cerberus</option> <option>Cernunnos</option> <option>Chaac</option> <option>Chang'e</option> <option>Chernobog</option> <option>Chiron</option> <option>Chronos</option> <option>Cu Chulainn</option> <option>Cupid</option> <option>Da Ji</option> <option>Discordia</option> <option>Erlang Shen</option> <option>Fafnir</option> <option>Fenrir</option> <option>Freya</option> <option>Ganesha</option> <option>Geb</option> <option>Guan Yu</option> <option>Hachiman</option> <option>Hades</option> <option>He Bo</option> <option>Heimdallr</option> <option>Hel</option> <option>Hera</option> <option>Hercules</option> <option>Horus</option> <option>Hou Yi</option> <option>Hun Batz</option> <option>Isis</option> <option>Izanami</option> <option>Janus</option> <option>Jing Wei</option> <option>Jormungandr</option> <option>Kali</option> <option>Khepri</option> <option>King Arthur</option> <option>Kukulkan</option> <option>Kumbhakarna</option> <option>Kuzenbo</option> <option>Loki</option> <option>Medusa</option> <option>Mercury</option> <option>Merlin</option> <option>Mulan</option> <option>Ne Zha</option> <option>Neith</option> <option>Nemesis</option> <option>Nike</option> <option>Nox</option> <option>Nu Wa</option> <option>Odin</option> <option>Olorun</option> <option>Osiris</option> <option>Pele</option> <option>Persephone</option> <option>Poseidon</option> <option>Ra</option> <option>Raijin</option> <option>Rama</option> <option>Ratatoskr</option> <option>Ravana</option> <option>Scylla</option> <option>Serqet</option> <option>Set</option> <option>Skadi</option> <option>Sobek</option> <option>Sol</option> <option>Sun Wukong</option> <option>Susano</option> <option>Sylvanus</option> <option>Terra</option> <option>Thanatos</option> <option>The Morrigan</option> <option>Thor</option> <option>Thoth</option> <option>Tyr</option> <option>Ullr</option> <option>Vamana</option> <option>Vulcan</option> <option>Xbalanque</option> <option>Xing Tian</option> <option>Yemoja</option> <option>Ymir</option> <option>Zeus</option> <option>Zhong Kui</option>
                        </datalist>
                    </div>

                    <div id="send"> <input type="submit" value="compare"> </div>
                </form>

                <div class="info">
                    <div class="health"> <?php echo "<h2> {$will[2]} - {$spill[2]} </h2>" ?> <p>God 1 - God 2</p> <h3>Health</h3>  </div>
                    <div class="mana"> <?php echo "<h2> {$will[3]} - {$spill[3]} </h2>" ?> <p>God 1 - God 2</p> <h3>Mana</h3> </div>
                    <div class="basic"> <?php echo "<h2> {$will[4]} - {$spill[4]} </h2>" ?> <p>God 1 - God 2</p> <h3>Basic Attack<br>Damage</h3> </div>
                    <div class="protect"> <?php echo "<h2> {$will[5]} - {$spill[5]} </h2>" ?> <p>God 1 - God 2</p> <h3>Physical Protection</h3> </div>
                    <div class="hp5"> <?php echo "<h2> {$will[6]} - {$spill[6]} </h2>" ?> <p>God 1 - God 2</p> <h3>Hp5</h3> </div>
                    <div class="mp5"> <?php echo "<h2> {$will[7]} - {$spill[7]} </h2>" ?> <p>God 1 - God 2</p> <h3>Mp5</h3> </div>
                    <div class="attack"> <?php echo "<h2> {$will[8]} - {$spill[8]} </h2>" ?> <p>God 1 - God 2</p> <h3>Attack Speed</h3> </div>
                    <div class="move"> <?php echo "<h2> {$will[9]} - {$spill[9]} </h2>" ?> <p>God 1 - God 2</p> <h3>Movement Speed</h3> </div>
                </div>

                <div class="extra"> *Cu Chulainn does not use mana and instead uses 'rage', which starts at 25 and caps at 100. 'Rage' contains different properties than mana. </div>
            </div>
        </div>
    </body>
</html>
<script>
</script>

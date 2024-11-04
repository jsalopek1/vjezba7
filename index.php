<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator ocjena</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Kalkulator ocjena</h2>
    <form method="post">
        <div class="form-group">
            <label for="exam1">Ocjena I. kolokvija:</label>
            <input type="number" id="exam1" name="ocjene[]" placeholder="Ocjena" min="1" max="5" required>
        </div>
        
        <div class="form-group">
            <label for="exam2">Ocjena II. kolokvija:</label>
            <input type="number" id="exam2" name="ocjene[]" placeholder="Ocjena" min="1" max="5" required>
        </div>

        <button type="submit">Izračunaj</button>
        <hr> 
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $ocjene = $_POST['ocjene'];
        $validne = true;

        foreach ($ocjene as $ocjena) {
            if ($ocjena < 1 || $ocjena > 5) {
                $validne = false;
                break;
            }
        }

        if ($validne) {
            $prosjekOcjena = array_sum($ocjene) / count($ocjene);
            $konacnaOcjena = round($prosjekOcjena);

            if (min($ocjene) < 2) {
                $konacnaOcjena = 1;
                echo "<section style='color: red;'>Jedan od kolokvija je negativan.</section>";
            }


            echo "<p>Prosjek ocjena: " . number_format($prosjekOcjena, 2) . "</p>";
            echo "<p>Konačna ocjena: " . $konacnaOcjena . "</p>";

        } else {
            echo "<section style='color: red;'>Sve ocjene moraju biti između 1 i 5.</section>";
        }
    }
    ?>

    <!-- vježba 7 - Prosjek ocjena -->
</body>
</html>
<div>
    <form>
        <input type="number" placeholder="Number" min="5" name="patternNum">
        <input type="submit">
    </form>

</div>

<div>
    <?php
    // loops
    if (isset($_GET['patternNum'])) {

        //  while 
        echo "Your Series is <br>";
        $num = $_GET['patternNum'];

        while ($num) {
            echo "$num ";
            $num--;
        }

        // do while
        echo "<br>Your Series is <br>";
        $num = $_GET['patternNum'];
        $i = 1;
        do {
            echo "$i ";
            $i++;
        } while ($i <= $num);

        // for loop
        echo "<br>Your Pattern is <br>";
        $num = $_GET['patternNum'];
        for ($i = 0; $i <= $num; $i++) {
            for ($j = 0; $j < $i; $j++) {
                echo "😀";
            }
            echo "<br>";
        }
    }

    // switch
    echo "<br>";

    // switch ($num) {
    //     case 12:

    //         break;
    //     case 10:
    //         break;
    //     case 6:
    //         break;
    //     case 11:
    //         break;
    //     default:
    // }
        $testNumber =10;
        switch ($testNumber) {
            case '10':
                echo "its string 10";
                break;
            case 10:
                echo "its number 10";
                    break;
            default:
                echo "noooo";
                break;
        }

    ?>

</div>
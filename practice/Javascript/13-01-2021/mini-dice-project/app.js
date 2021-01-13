let scores, tmpScore, activePlayer;

scores = [0, 0];
tmpScore = 0;
activePlayer = 0;

document.getElementById("score-0").textContent = "0";
document.getElementById("current-score-0").textContent = "0";
document.getElementById("score-1").textContent = "0";
document.getElementById("current-score-1").textContent = "0";

// add listener to roll dice btn
document.querySelector(".btn-roll").addEventListener("click", rollDice);

// add listener to hold btn
document.querySelector(".btn-hold").addEventListener("click", hold);

// add listener to new btn
document.querySelector(".btn-new").addEventListener("click", newGame);

// hold and change the player
function hold() {
  /**
   *  in hold activeplayer will change and tmp score will added in scores
   *
   */
  if (activePlayer == 0) {
    scores[0] = tmpScore + scores[0];
    document.getElementById("score-0").textContent = scores[0];
    document.getElementById("current-score-0").textContent = "0";
  } else {
    scores[1] = tmpScore + scores[1];
    document.getElementById("score-1").textContent = scores[1];
    document.getElementById("current-score-1").textContent = "0";
  }
  tmpScore = 0;
  changePlayer();
}

// rolling dice
function rollDice() {
  let diceValue = Math.floor(Math.random() * 6 + 1); // get value from dice
  if (diceValue == 1) {
    /** 
     *  if dice value is 1 then 
     * change player and reset tmpscore
     */
    tmpScore = 0;
    document.getElementById("current-score-" + activePlayer).textContent = tmpScore.toString(); // display in current div of active player
    changePlayer();
  } else {
    tmpScore = tmpScore + diceValue; // add to tmp value
    document.getElementById("current-score-" + activePlayer).textContent = tmpScore.toString(); // display in current div of active player
  }
  //   change image of dice
  let imgDice = document.querySelector(".dice");
  imgDice.style = "block";
  imgDice.src = "assests/dice-" + diceValue + ".png";
}

//  change player
function changePlayer() {
  isPlayerWins();
  if (activePlayer == 0) {
    // if player 1 active
    document
      .querySelector(".player-" + activePlayer + "-panel")
      .classList.remove("active");
    activePlayer = 1;
  } else {
    // if player 2 active
    document
      .querySelector(".player-" + activePlayer + "-panel")
      .classList.remove("active");
    activePlayer = 0;
  }
  // add active class to active player
  document
    .querySelector(".player-" + activePlayer + "-panel")
    .classList.add("active");
}

function isPlayerWins() {
  /**
   *  checking is player win or not
   *  condition : player should acheive 200
   *
   *  */

  if (scores[0] >= 200) {
    alert("player 1 wins");
    newGame();
  }

  if (scores[1] >= 200) {
    alert("player 2 wins");
    newGame();
  }
}

function newGame() {
  /**
   *  new game or reset game
   *
   */

  scores = [0, 0];
  tmpScore = 0;
  activePlayer = 0;

  document.getElementById("score-0").textContent = "0";
  document.getElementById("current-score-0").textContent = "0";
  document.getElementById("score-1").textContent = "0";
  document.getElementById("current-score-1").textContent = "0";
}

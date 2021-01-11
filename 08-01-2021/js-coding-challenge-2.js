// score of all teams
/**
 *  Storing score in array beczuse multiple values of same team
 */
let johnTeamScore = [89, 120, 20];
let markTeamScore = [145, 94, 12];
let maryTeamScore = [0, 134, 10];

// average of all teams 
/**
 *  use reduce method of array ,to take sum of all values of array
 * 
*/
let avgOfJohnTeam =
  johnTeamScore.reduce((a, b) => {
    return a + b;
  }, 0) / johnTeamScore.length;
let avgOfMarkTeam =
  markTeamScore.reduce((a, b) => {
    return a + b;
  }, 0) / markTeamScore.length;

let avgOfMaryTeam =
  maryTeamScore.reduce((a, b) => {
    return a + b;
  }, 0) / maryTeamScore.length;

  // comparing all teams avg
if (
  avgOfMarkTeam == avgOfJohnTeam &&
  avgOfMarkTeam == avgOfMaryTeam &&
  avgOfJohnTeam == avgOfMaryTeam
) {
  console.log("match Draw");
} else if (avgOfJohnTeam > avgOfMarkTeam && avgOfJohnTeam > avgOfMaryTeam) {
  console.log("Winner is John Team with average " + avgOfJohnTeam);
} else if (avgOfMarkTeam > avgOfJohnTeam && avgOfMarkTeam > avgOfMaryTeam) {
  console.log("Winner is Mark Team with average " + avgOfMarkTeam);
}else{
  console.log("Winner is Mary Team with average " + avgOfMaryTeam);
}

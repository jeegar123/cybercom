export class User {
  static countUser = 0;

  // constructor to initailize object
  constructor(name, userName, password) {
    this.name = name;
    this.userName = userName;
    this.password = password;
    User.counter();
  }

  // getter
  get role() {
    return "User";
  }

  //  sttaic method for counting user
  static counter() {
    this.countUser++;
  }
}
// export function User(name, userName, password) {
//   this.name = name;
//   this.userName = userName;
//   this.password = password;
// }

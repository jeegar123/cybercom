
// not working
import {User} from './class/User.js';   
import {Admin} from './class/Admin.js';   

// class User {
//   static countUser = 0;

//   // constructor to initailize object
//   constructor(name, userName, password) {
//     this.name = name;
//     this.userName = userName;
//     this.password = password;
//     User.counter();
//   }

//   // getter
//   get role() {
//     return "User";
//   }

//   //  sttaic method for counting user
//   static counter() {
//     this.countUser++;
//   }
// }

let user1 = new User("root", "root@gmail.com", "test123");

console.log(user1);
console.log(user1);

console.log(user1.name);
console.log(user1.password);
console.log(user1.userName);

console.log(user1.role);

let user2 = new User("root2", "root2@gmail.com", "test123");
let user3 = new User("root3", "root@gmail.com", "test123");
let user4 = new User("root4", "root@gmail.com", "test123");
let user5 = new User("root5", "root@gmail.com", "test123");

console.log(User.countUser);

let admin = new Admin("admin","admin@gmail.com","admin","database","hr","back-end");

console.log(admin.data);


var test =10;
console.log(test);
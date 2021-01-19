import {User} from './User.js';

export class Admin extends User{
        constructor(name,userName,password,...args){
            super(name,userName,password);
            this.data =args;
        }

        // display task

        displayTask(){
            this.data.forEach(element => {
                    console.log(element);
            });
        }
}
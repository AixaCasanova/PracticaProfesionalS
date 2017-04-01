import { Component } from '@angular/core';

import { NavController } from 'ionic-angular';

@Component({
  selector: 'login',
  templateUrl: 'login.html'
})

export class login 
{

    constructor(public navCtrl: NavController) 
    {

    }
 
    Unusuario = {};
   
    loguear()
    {
      
        console.log(this.Unusuario);
        alert("usuario:"+this.Unusuario['usuario']+ "  password:"+this.Unusuario['password']);
    }
 
}
/*
export class persona 
{

  usuario:string="";
  password:string="";
  constructor(public navCtrl: NavController) {

  }}*/
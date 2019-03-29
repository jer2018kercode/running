"use strict";

var validForm = document.getElementById( 'send' );
var username = document.getElementById( 'username' );
var missUsername = document.getElementById( 'missUsername' );
var validUsername = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;
            
validForm.addEventListener( 'click', validAction );

function validAction( event )
{
    if( username.value == "" )
    {
        event.preventDefault();
        missUsername.textContent = 'Votre prénom est manquant';
        missUsername.style.color = 'red';
    }
    else if ( validUsername.test( username.value ) == false )
    {
        event.preventDefault();
        missUsername.textContent = 'Le format est incorrect';
        missUsername.style.color = 'orange';
    }
}
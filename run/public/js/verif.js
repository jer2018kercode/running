var validForm = document.getElementById( 'send' );
var username = document.getElementById( 'username' );
var missUsername = document.getElementById( 'missUsername' );

validForm.addEventListener( 'click', validAction );

function validAction( event )
{
    if( username.validity.valueMissing )
    {
        event.preventDefault();
        missUsername.textContent = 'Prénom manquant';
        missUsername.style.color = 'red';
    }
}